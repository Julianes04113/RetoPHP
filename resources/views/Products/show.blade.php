<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Aquí se muestran la información de un producto!
                    <!-- cómo mostrar la info de un solo producto??-->
                    <p>ID del Producto:{{ $product->id}}
                    <br>Nombre:{{ $product->title}}
                    <br>Precio:{{ $product->price}}
                    <br>Stock:{{ $product->stock}}
                    <br>Estado: 
                        @if($product->status =='available')
                            Disponible
                        @else
                            Deshabilitado
                        @endif 
                    <br></br> </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>