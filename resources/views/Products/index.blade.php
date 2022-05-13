<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex-auto">

                  <!--Busqueda-->
<div class="my-2 flex items-center justify-between"><form action="{{route('products.index')}}" class="w-full" method="GET">@csrf
  <input type="search" name="ProductSearchBar" class="bg-white w-1/2 shadow rounded border-2" placeholder="Buscar un producto por nombre o descripción" value="{{$productSearch}}"></form>
  <a href="{{route('imports.index')}}"><button type="button" class="text-white bg-blue-400 hover:bg-blue-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Importar Masivamente</button></a>
  <a href="{{route('reports.index')}}"><button type="button" class="text-white bg-lime-400 hover:bg-blue-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reportes y Estadísticas</button></a>
  <a href="{{route('products.create')}}"><button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Crear Producto</button></a>
</div>
                  <!-- UserTable-->
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edición</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detalles</th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Editar</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($searched as $products)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="{{asset($products->images->first()->path)}}" alt="">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">{{$products->title}}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$products->description}}</div>
              </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$products->price}}</div>
              </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$products->stock}}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @if($products->status=='available')
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Disponible</span>
                @else
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">No Disponible</span>
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{route('products.edit',['product'=> $products->id])}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{route('products.show',['product'=> $products->id])}}" class="text-indigo-600 hover:text-indigo-900">Detalle</a>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

                </div>
                <ul>
                </ul>
            </div>
        </div>
    </div>
            <div class="bg-gray-200 text-black font-bold py-2 px-4 rounded">
                {{ $searched->links('pagination::tailwind') }}
            </div>
</x-app-layout>