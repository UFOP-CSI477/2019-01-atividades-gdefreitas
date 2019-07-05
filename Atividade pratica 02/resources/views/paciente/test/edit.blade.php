@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-white"><strong>Editar Exame</strong></div>

                <div class="card-body">
                    <form method="post" action="{{route('test.update' , [$tests -> id])}}">
                        {!! csrf_field ()!!}
                        @method('PATCH')
                        <div class="form-group">
                            <label for="procedimento">Procedimento</label>
                            <select name="procedimento" class="form-control">
                                @foreach($procedimentos as $e)
                                    @if($e->id == $tests->procedure_id)
                                        <option value={{$e->id}} selected>{{$e->name}}</option>
                                    @else
                                        <option value={{$e->id}}>{{$e->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Data</label><br>
                            <input type="date" name="date" value="{{$tests->date}}" required>
                        </div>
                        <input type="submit" class="btn btn-success pull-right" value="Editar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
