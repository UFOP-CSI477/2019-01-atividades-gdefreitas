@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white" align="center" style="font-style: italic;"><strong>Procedimentos</strong></div>

                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped table-sm">
                        <thead class="p-3 mb-2 bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Valor R$</th>
                                <th>Administrador </th>
                                <th>Criação</th>
                                <th>Última Atualização</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($procedimentos as $e)
                                <tr>
                                    <td>{{$e -> id}}</td>
                                    <td>{{$e -> name}}</td>
                                    <td>{{$e -> price}}</td>
                                    <td>{{$e -> nameuser}}</td>
                                    <td><?php echo date("d/m/Y H:i:s ",strtotime($e -> created_at)) ?></td>
                                    <td><?php echo date("d/m/Y H:i:s ",strtotime($e -> updated_at)) ?></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
