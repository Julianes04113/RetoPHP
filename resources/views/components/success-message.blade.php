@if(session()->has('success'))
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Vientos huracanados! por fin algo bien hecho') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-lime-600">
           {{session('success')}}
        </ul>
    </div>
@endif

