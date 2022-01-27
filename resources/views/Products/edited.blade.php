<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creación de producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Se ha editado el producto con éxito!
                </div>
                <!--¿cómo agregarle un span que me acepte el producto y envíe el ID a products/edit? -->
                <div><br><a href="{{route('products.edit', ['product'=> $products->id])}}" type="button" class="bg-blue-200 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">¿Desea editar otro producto? Haga Click aquí!</a></br>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>