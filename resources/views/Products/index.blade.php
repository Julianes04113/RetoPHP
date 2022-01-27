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
                    Aquí se muestran la lista de productos!
                    <br></br>
                    <a href="{{route('products.create')}}" type="button" class="bg-blue-200 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">Crear Producto</a>

                    @foreach ($list as $products) 
                    <p>ID del Producto:{{ $products->id}}
                    <br>Nombre:{{ $products->title}}
                    <br>Precio:{{ $products->price}}
                    <br>Stock:{{ $products->stock}}
                    <br>Estado:{{ $products->status}}
                    <br>Acciones
                    <br>
                    <a href="{{route('products.edit', ['product'=> $products->id]) }}" type="button" class="bg-yellow-100 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">Editar producto</a>
                    <form method="POST" action="{{route('products.destroy', ['product'=>$products->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-100 hover:bg-red-500 text-black font-bold py-2 px-4 rounded">Eliminar Producto</button></form>
                    <br></br> </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>