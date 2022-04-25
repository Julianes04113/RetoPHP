@if(session()->has('success'))
    <div {{ $attributes }}>
        <ul class="mt-3 list-disc list-inside text-xl text-lime-600">
           {{session('success')}}
        </ul>
    </div>
@endif

