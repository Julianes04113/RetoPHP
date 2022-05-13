<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <x-success-message />
                <div class="p-6 bg-white border-b border-gray-200 flex-auto">
                    
                    <h1 class="text-center text-xl text-lime-500">Creación masiva de Productos</h1> <br>
                    <p class="text-justify text-lg text-black"> Para la creación masiva de productos, es necesario subirlos en un archivo de Excel (preferiblemente .xlsx), descargue
                        <a href="{{route('imports.example')}}" style="color: blue">AQUÍ</a> el archivo modelo para la satisfactoria importación.</p>
                    <p class="text-justify text-lg text-black"> Si desea descargar la lista entera de todos los productos actuales para su fácil modificación, presione <a href="{{route('exports.allproducts')}}" style="color: green">AQUÍ</a></p>
                    <p class="text-justify text-lg text-black"> Recuerde que el nombre debe tener más de 5 caracteres, la descripción 10 caracteres, el precio debe anotarse sin puntos ni comas, y el estado como "available" cuando esté disponible y "unavailable" cuando no lo esté.
                        Además, el peso del archivo no puede superar los 80KB y sólo acepta XLSX (actualízate viejo).
                    <br>
                    Por la seguridad de la disque "base de datos", sólo permitiremos importar 500 productos máximo por archivo.
                    El estado de su importación será enviado a través de una notificación.
                    Si hay un error en algún registro, se le enviará un error por cada uno de ellos, no se importará ese registro pero los demás serán importados satisfactoriamente.
                    Si ya configuró su archivo correctamente, haga click en el siguiente enlace para subir el archivo.
                    </p>
                    <form method="POST" id="file" action="{{route('imports.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-center justify-center bg-grey-lighter">
                            <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-red">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Seleccione un archivo</span>
                                <input type="file" class="hidden" id="file" name="file"/>
                            </label>
                        </div>
                      <button type="submit" class="bg-yellow-100 hover:bg-blue-500 justify-center text-black font-bold py-2 px-4 rounded">Importar!</button>
                </form>
                <p class="text-justify text-lg text-black">*Nota mental: Es menester recordarle al iguazo que administra este chuzo que cada archivo tendrá una (sí, 1) imagen por defecto aleatoria por cada producto creado. 
                    Y que además, cada producto es único por su nombre, si se intenta subir un registro duplicado, este se actualizará.
                </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>