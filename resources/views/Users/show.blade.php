<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Aquí se muestra la información de un usuario!
                    <p class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-100">
                        <br>Nombre: {{$user->name}}    
                        <br>Email: {{$user->email}}
                        <br>Rol:
                        @if($user->admin_since==null)
                            Usuario
                        @else
                            Administrador
                        @endif 
                        <br>Estado:
                        @if($user->disabled_at!=null)
                            Deshabilitado
                        @else
                            Habilitado
                        @endif  
                        <br><a href="{{route('users.edit', ['user'=> $user->id]) }}" type="button" class="bg-yellow-100 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">Editar Usuario</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>