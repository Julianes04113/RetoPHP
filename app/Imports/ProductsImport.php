<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\ImportFailed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Notifications\FailedImportNotification;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Validators\ValidationException;

HeadingRowFormatter::default('none');

class ProductsImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithUpserts, WithValidation, WithChunkReading, ShouldQueue, WithEvents
{
    public function __construct()
    {
        $this->user = Auth::user();
    }
    
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Product::upsert([
                'id' => $row['id'],
                'title' => $row['producto'],
                'description' => $row['descripcion'],
                'price' => $row['precio'],
                'stock' => $row['cantidad'],
                'status' => $row['estado'],
            ], [
                'id' => $row['id']
            ], [
                'id' => $row['id'],
                'title' => $row['producto'],
                'description' => $row['descripcion'],
                'price' => $row['precio'],
                'stock' => $row['cantidad'],
                'status' => $row['estado']
            ]);/*->each(
                function ($product) {
                    $images = Image::factory(1)->make();
                    $product->images()->saveMany($images);
                }
            );*/
        }
    }

    public function uniqueBy()
    {
        return 'id';
    }

    public function rules(): array
    {
        return [
            '*.id' => ['integer', 'required'],
            '*.producto' => ['string', 'required', 'min:5', 'max:100'],
            '*.descripcion'=> ['string', 'required', 'min:10', 'max:255'],
            '*.precio' => ['integer', 'required', 'min:1000'],
            '*.cantidad' => ['integer', 'required', 'min:0'],
            '*.estado' => ['string', 'required'],
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 50;
    }

    public function registerEvents(): array
    {
        return [
            ImportFailed::class => function (ImportFailed $event) {
                /*$failures = $event->e->failures();
                foreach ($failures as $failure) {*/
                    $this->user->notify(new FailedImportNotification());
            },
        ];
    }
}
