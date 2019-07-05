@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-white" style="text-align: center; font-style: italic; font-size: 20px"><strong>Cadastro de Procedimento</strong></div>

                <div class="card-body">
                    <form method="post" action="{{route('procedures.store')}}">
                        {!! csrf_field ()!!}
                        <div class="form-group">
                            <label for="name" >Nome:</label>
                            <input type="text" maxlength="60" class="form-control" style="font-style: italic" name="name" placeholder="Insira o nome do procedimento" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Valor R$:</label>
                            <input type="text" class="form-control" style="font-style: italic" name="price" placeholder="Insira o valor do procedimento" required>
                        </div>
                        <input type="submit" class="btn btn-outline-success btn-lg btn-block" style="font-style: italic;" value="Confirmar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
