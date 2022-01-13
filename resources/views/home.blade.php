@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Perfecto! Se ha enviado un email de verificación para acceder a la aplicación de forma segura. Por favor revise su bandeja de entrada en su Email') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
