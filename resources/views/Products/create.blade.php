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
            {{ __('Lista de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center text-xl text-lime-500">Crear un producto</h1>

                    <form method="POST" action="{{route('products.store') }}" enctype="multipart/form-data">
                           @csrf
<!-- Código-->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Código:</span>
    <input name="code" class="border border-2 rounded-r px-4 py-2 w-full" type="text" value="{{old('code')}}"/>
   @error('code')
   <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
</div>
                      <!-- Titulo -->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Nombre:</span>
    <input name="title" class="border border-2 rounded-r px-4 py-2 w-full" type="text" placeholder="Ingrese el nombre del producto" value="{{old('title')}}"/>
    @error('title')
   <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
</div>
                         <!-- Descripción -->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Descripción:</span>
    <input name="description" class="border border-2 rounded-r px-4 py-2 w-full" type="text" placeholder="Ingrese el precio del producto" value="{{old('description')}}"/>
    @error('description')
   <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
</div>
<!--Precio -->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Precio:</span>
    <input name="price" class="border border-2 rounded-r px-4 py-2 w-full" type="number" min="1" value="{{old('price')}}"/>
    @error('price')
   <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
</div>
<!-- Cantidad-->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Cantidad:</span>
    <input name="stock" class="border border-2 rounded-r px-4 py-2 w-full" type="number" min="0" value="{{old('stock')}}"/>
    @error('stock')
   <p class="text-red-500 text-xs italic">{{$message}}</p>
    @enderror
</div>
        
<!--Status-->
<div class="w-full flex flex-col mb-3">
<label class="font-semibold text-gray-800 py-2">Estado</label>
<select name="status" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full">
<option value="Available">Disponible</option>
<option value="Unavailable">Deshabilitado</option></select>
<!-- checkbox>
<div class="block">
  <span class="text-gray-700">Checkboxes</span>
  <div class="mt-2">
    <div>
      <label class="inline-flex items-center">
        <input type="checkbox" class="form-checkbox" name="disabled_at">
        <span class="ml-2">Option 1</span>
      </label>
    </div>
  </div>
</div>

Imagen
<div class="grid grid-cols-1 mt-5 mx-7">
      <label class="text-center text-xl text-lime-500">Agregar Imagen</label>
        <div class='flex items-center justify-center w-full'>
            <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                <div class='flex flex-col items-center justify-center pt-7'>
                  <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                  <p class='text-sm text-gray-300 group-hover:text-lime-600 tracking-wider'>Seleccione una imagen</p>
                </div>
              <input type='file' class="hidden" field-label="image" field-name="image" id="image" name="image" />
            </label>
        </div>
</div> -->

<div class="flex justify-center">
  <div class="mb-3 w-96">
    <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Suba aquí la imagen</label>
    <input class="form-control
    block
    w-full
    px-3
    py-1.5
    text-base
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="image" name="image">
  </div>
</div>

<button class="bg-yellow-100 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">Crear Producto</button>
</div>

                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>