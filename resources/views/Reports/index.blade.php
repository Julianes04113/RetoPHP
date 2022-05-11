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
                    <h1 class="text-center text-xl text-lime-700">Reportes de Información</h1>
                    <p class="text-justify text-lg text-black"> Seleccione el Reporte que desee: </p>
                    <form method="GET" action="{{route('reports.export')}}">
                        @csrf
                    <select name="export" id="export" class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-1/4">
                    <option value="people">Personas</option>
                    <option value="products">Productos</option>
                    <option value="orders">Ordenes</option>
                    </select>
                    <p class="text-justify text-lg text-black"> En Personas encontrará información relacionada con los administradores y los usuarios consumidores</p>
                    <p class="text-justify text-lg text-black"> En Productos encontrará estadísticas relacionadas con los productos </p>
                    <p class="text-justify text-lg text-black"> En Ordenes encontrará estadísticas relacionadas con las ordenes y los pagos</p>
                      <button type="submit" class="bg-yellow-100 hover:bg-blue-500 justify-center text-black font-bold py-2 px-4 rounded">Exportar!</button>
                </form>
                <p class="text-justify text-lg text-black">*Nota mental: Es menester recordarle al iguazo que administra este chuzo que los reportes se realizan por colas 
                    que su resultado se notificará tanto por correo como por la descarga inmediata de su reporte a su carpeta Descargas apenas haya procesado la información.
                </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>