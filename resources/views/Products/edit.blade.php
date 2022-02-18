<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar un producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Editar un producto</h1>

                    <form method="POST" action="{{route('products.update', ['product'=> $product->id]) }}">
                           @csrf
                           @method('PUT')
                
                      <!-- Titulo -->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Nombre:</span>
    <input name="title" class="border border-2 rounded-r px-4 py-2 w-full" type="text" placeholder="Ingrese el nombre del producto" value="{{$product->title}}" />
    @error('title')
   <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
</div>
                         <!-- Descripción -->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Descripción:</span>
    <input name="description" class="border border-2 rounded-r px-4 py-2 w-full" type="text" placeholder="Ingrese el precio del producto" value="{{$product->description}}" />
    @error('description')
   <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
</div>
<!--Precio -->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Precio:</span>
    <input name="price" class="border border-2 rounded-r px-4 py-2 w-full" type="number" value="{{$product->price}}"/>
    @error('price')
   <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
</div>
<!-- Cantidad-->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Cantidad:</span>
    <input name="stock" class="border border-2 rounded-r px-4 py-2 w-full" type="number" value="{{$product->stock}}"/>
    @error('stock')
   <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
</div>
                
<!--Status-->
<div class="w-full flex flex-col mb-3">
<label class="font-semibold text-gray-800 py-2">Estado</label>
<select name="status" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required>
<option value="available" {{$product->status == 'available' ? 'selected' : ''}} >Disponible</option>
<option value="unavailable" {{$product->status == 'unavailable' ? 'selected' : ''}}>Deshabilitado</option></select>
<button class="bg-yellow-100 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">Editar Producto</button>
</div>

                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>