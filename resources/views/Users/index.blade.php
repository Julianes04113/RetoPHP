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
                    <br>
                    @foreach ($userslist as $users) 
                        <p class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-100">
                        <br>Nombre: {{$users->name}}    
                        <br>Email: {{ $users->email}}
                        <br>Rol:
                        @if($users->is_admin ==0)
                            Usuario
                        @else
                            Administrador
                        @endif 
                        <br>Estado:
                        @if($users->status ==0)
                            Deshabilitado
                        @else
                            Habilitado
                        @endif  
                        <br>Acción
                        <br>
                        <a href="{{route('users.edit', ['user'=> $users->id]) }}" type="button" class="bg-yellow-100 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">Editar Usuario</a>
                        <br></br> 
                    @endforeach
                </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>