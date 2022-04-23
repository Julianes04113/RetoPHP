<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido a Mercatodo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                  <!--Busqueda-->
<div class="basis-1/2 mr-2 my-2 object-center self-center"><form action="{{route('products.index')}}" method="GET">@csrf
  <input type="search" name="UProductSearchBar" class="bg-purple-white w-1/2 shadow rounded border-2 object-center" placeholder="Buscar un producto por nombre o descripción" value="{{$productSearch}}"></form>
</div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <x-success-message />
                    <div class="bg-grey-light py-8 items-stretch grid grid-cols-1 lg:grid-cols-4 sm:grid-cols-2">
@foreach($searched as $products)
@include('components.productcard')
@endforeach
</div>
            </div>
            </div>
        </div>
    </div>
            <div class="bg-gray-200 text-black font-bold py-2 px-4 rounded">
                {{ $searched->links('pagination::tailwind') }}
            </div>
</x-app-layout>