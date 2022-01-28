<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Listado de Usuarios
                    <br></br>
                    @foreach ($userslist as $users) 
                    <p>
                    <br>Nombre:{{ $users->name}}
                    <br>Email:{{ $users->name}}
                    <br>Rol:{{ $users->is_admin}} 
                    <br>Estado:{{ $users->status}} 
                    <br>Acciones
                    <br>
                    <a href="{{route('users.edit', ['user'=> $users->id]) }}" type="button" class="bg-yellow-100 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">Editar Usuario</a>
                    <br></br> </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>