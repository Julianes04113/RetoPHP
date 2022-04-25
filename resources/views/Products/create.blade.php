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
                    <div> <x-auth-validation-errors class="mb-4" :errors="$errors" /></div>
                    <div> <x-success-message /></div>

                    
                    <form method="POST" action="{{route('products.store') }}" enctype="multipart/form-data">
                           @csrf

                      <!-- Titulo -->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Nombre:</span>
    <input name="title" class="border border-2 rounded-r px-4 py-2 w-full" type="text" placeholder="Ingrese el nombre del producto" value="{{old('title')}}" required/>
</div>
                         <!-- Descripción -->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Descripción:</span>
    <input name="description" class="border border-2 rounded-r px-4 py-2 w-full" type="text" placeholder="Ingrese el precio del producto" value="{{old('description')}}"/>
</div>
<!--Precio -->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Precio:</span>
    <input name="price" class="border border-2 rounded-r px-4 py-2 w-full" type="number" min="1" value="{{old('price')}}"/>
</div>
<!-- Cantidad-->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Cantidad:</span>
    <input name="stock" class="border border-2 rounded-r px-4 py-2 w-full" type="number" min="0" value="{{old('stock')}}"/>
</div>
        
<!--Status-->
<div class="w-full flex flex-col mb-3">
<label class="font-semibold text-gray-800 py-2">Estado</label>
<select name="status" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full">
<option value="Available">Disponible</option>
<option value="Unavailable">Deshabilitado</option></select>

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