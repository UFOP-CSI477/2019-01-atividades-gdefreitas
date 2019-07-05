@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-white" align="center"><strong>Editar Valor do Procedimento</strong></div>

                <div class="card-body">
                    <form method="post" action="{{route('procedure.update' , [$procedimento -> id])}}">
                        {!! csrf_field ()!!}
                        @method('PATCH')
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" maxlength="60" class="form-control" name="id" value="{{$procedimento -> id}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" maxlength="60" class="form-control" name="name" value="{{$procedimento -> name}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="price">Valor R$</label>
                            <input type="text" class="form-control" name="price" value="{{$procedimento -> price}}" required>
                        </div>
                        <input type="submit" class="btn btn-outline-success btn-lg btn-block" value="Editar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
