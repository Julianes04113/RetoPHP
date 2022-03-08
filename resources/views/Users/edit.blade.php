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
            {{ __('Editar un Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Editar un Usuario</h1>

                    <form method="POST" action="{{route('users.update', ['user'=> $user->id]) }}">
                           @csrf
                           @method('PUT')
                      <!-- Nombre -->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Nombre:</span>
    <input name="name" class="border border-2 rounded-r px-4 py-2 w-full" type="text" placeholder="Ingrese el nombre del Usuario" value="{{$user->name}}" />
</div>
                         <!-- Email -->
<div class="flex">
    <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Email:</span>
    <input name="email" class="border border-2 rounded-r px-4 py-2 w-full" type="text" placeholder="Ingrese el correo del Usuario" value="{{$user->email}}" />
</div>

<!--Rol-->
<div class="w-full flex flex-col mb-3">
<label class="font-semibold text-gray-800 py-2">Rol</label>
<select name="admin_since" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full ">
<option value="{{null}}">Usuario</option>
<option value="{{now()}}">Admin</option></select>
<!--Habilitación-->
<div class="w-full flex flex-col mb-3">
<label class="font-semibold text-gray-800 py-2">Estado</label>
<select name="disabled_at" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full ">
<option value="{{null}}" {{$user->disabled_at == null ? 'selected' : ''}}>Habilitado</option>
<option value="{{now()}}" {{$user->disabled_at != null ? 'selected' : ''}}>No Habilitado</option></select>
<button class="bg-yellow-100 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">Editar Usuario</button>
</div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <x-sucess-message />

                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>