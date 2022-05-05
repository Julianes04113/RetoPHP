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
                    
                    <h1 class="text-center text-xl text-lime-500">Creación masiva de Productos</h1> <br>
                    <p class="text-justify text-lg text-black"> Para la creación masiva de productos, es necesario subirlos en un archivo de Excel (preferiblemente .xlsx), descargue
                        <a href="{{route('imports.example')}}">AQUÍ</a> el archivo modelo para la satisfactoria importación.</p>
                    <br>
                    <p class="text-justify text-lg text-black"> Recuerde que el nombre debe tener más de 5 caracteres, la descripción 10 caracteres, el precio debe anotarse sin puntos ni comas, y el estado como "available" cuando esté disponible y "unavailable" cuando no lo esté
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>