<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
@if(session()->has('success'))
Gracias por dejarse atracar. Vuelvas prontos!
@else
                    Se ha logeado correctamente!
                    @endif
                </div>
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
