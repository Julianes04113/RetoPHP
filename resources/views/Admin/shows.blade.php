<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-#4ade80 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Aquí se muestran la lista de productos!
                    @foreach ($list as $products) 
                    <br>{{ $products->title}}</br>
                     <br>{{ $products->price}} </br>
                     <br>{{ $products->stock}} </br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>