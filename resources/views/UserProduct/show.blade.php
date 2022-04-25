<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                </div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <x-success-message />
                  <!-- Product Detail-->
<!-- component -->
<div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">

  <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
    @foreach($product->images as $image)
    <img class="w-full" alt="img1" src="{{asset($image->path)}}" />
    @endforeach
  </div>
  <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
    <div class="border-b border-gray-200 pb-6">
      <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-black dark:text-black mt-2">{{$product->title}}</h1>
    </div>
    <div>
      <p class="xl:pr-48 text-base lg:leading-tight leading-normal text-black dark:text-black mt-7">{{$product->description}}</p>
      <p class="text-base leading-4 mt-7 text-black dark:text-black">Precio: {{$product->price}}</p>
      <p class="text-base leading-4 mt-4 text-black dark:text-black">Stock: {{$product->stock}}</p>
      @if($product->status=='available')
      <p class="text-base leading-4 mt-4 text-lime-600 dark:text-lime-300">Disponible</p>
      @else
      <p class="text-base leading-4 mt-4 text-red-600 dark:text-red-300">No Disponible</p>
      @endif
      <form method="POST" action="{{route('products.cart.store', ['product'=> $product->id])}}" class="uppercase self-end bg-green font-bold text-white px-6 py-4 rounded hover:bg-green-dark duration-4">
        @csrf
  <button class="bg-lime-100 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">
    Agregar al carrito
  </button>           
  </form>
    </div>
  </div>
</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>