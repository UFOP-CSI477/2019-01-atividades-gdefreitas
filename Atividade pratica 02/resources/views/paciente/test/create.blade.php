@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-white" align="center"><strong>Cadastro de Exame</strong></div>

                <div class="card-body">
                    <form method="post" action="{{route('test.store')}}">
                        {!! csrf_field ()!!}
                        <div class="form-group">
                            <label for="procedimento">Procedimento</label>
                            <select name="procedimento" class="form-control">
                                @foreach($procedimentos as $e)
                                <option value={{$e->id}}>{{$e->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Data</label><br>
                            <input type="date" name="date" required>
                        </div>
                        <input type="submit" class="btn btn-outline-success  btn-lg btn-block" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
