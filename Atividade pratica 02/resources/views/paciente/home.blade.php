@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white" align="center" style="font-size: 30px"> PACIENTE</div>

                <div class="card-body" style="font-size: 24px">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Sistema de controle de solicitações de análises laboratoriais
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
