<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Productos') }}
        </h2>
    </x-slot>
<!--Busqueda-->
<div class="relative mr-2 my-2"><form action="{{route('products.index')}}" method="GET">
  <input type="search" name="ProductSearchBar" class="bg-purple-white shadow rounded border-2 object-center" placeholder="Buscar un producto por nombre o descripción" value="{{$productSearch}}">
</div>
</form>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Listado de Productos
                        <a href="{{route('products.create')}}" type="button" class="bg-lime-100 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">Crear producto</a> 
                    @foreach ($searched as $products) 
                        <p class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-100">
                          @include('components.productcard')
                        <br>Acciones:
                            <div class="p-6 bg-white border-b border-gray-200">
                                <form method="POST" action="{{route('products.destroy', ['product'=>$products->id])}}">
                            @csrf
                            @method('DELETE')
                            <button class="object-center bg-red-100 hover:bg-red-500 text-black font-bold py-2 px-4 rounded">Eliminar Producto</button>  
                            </form>
                            <a href="{{route('products.edit', ['product'=> $products->id]) }}" type="button" class="object-center bg-yellow-100 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">Editar producto</a>
                            </div>
                        <br>
                        @endforeach
                        </p>
                </div>
            </div>
        </div>
        <div class="bg-gray-200 text-black font-bold py-2 px-4 rounded">
                {{ $searched->links('pagination::tailwind') }}
            </div>
    </div>

</x-app-layout>
