@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white"><strong>Detalhamento</strong></div>

                <div class="card-body">
                    <h4><strong>Id: </strong>{{$procedimentos[0] -> id}}</h4>
                    <h4><strong>Nome: </strong>{{$procedimentos[0] -> name}}</h4>
                    <h4><strong>Preço: </strong>{{$procedimentos[0] -> price}}</h4>
                    <h4><strong>Administrador Criador: </strong>{{$procedimentos[0] -> nameuser}}</h4>
                    <h4><strong>Criado em: </strong>{{$procedimentos[0] -> created_at}}</h4>
                    <h4><strong>Atualizado em: </strong>{{$procedimentos[0] -> updated_at}}</h4><br><br>

                    <a href="{{ route('procedures.index') }}" class="btn btn-primary btn-sm" style="width:200px">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
