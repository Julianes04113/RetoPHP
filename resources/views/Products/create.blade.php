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
                    <h1>Crear un producto</h1>

                    <form method="POST" action="{{route('products.store') }}">
                           @csrf
                           <div class="form-row">
                                <label>Titulo</label>
                                <input class="form-control" type="text" name="title" required>
                            </div>
                            <div class="form-row">
                                <label>Descripción</label>
                                <input class="form-control" type="text" name="description" required>
                            </div>
                            <div class="form-row">
                                <label>Precio</label>
                                <input class="form-control" type="number" min="1" name="price" required>
                            </div>
                            <div class="form-row">
                                <label>Cantidad</label>
                                <input class="form-control" type="number" min="0" name="stock" required>
                            </div>
                            <div class="form-row">
                                <label>Estado</label>
                                <select class="custom-select" name="status" required>
                                    <option value="" selected>Seleccionar...</option>
                                    <option value="unavailable" >Disponible</option>
                                    <option value="unavailable">No disponible</option>
                            </div>
                            
                              
                    </form>
                    <p>aklgo</p>
                      <div><button>Crear Producto</button>
                               <!-- <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">Crear Producto</button> //Tailwind -->
                           </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>