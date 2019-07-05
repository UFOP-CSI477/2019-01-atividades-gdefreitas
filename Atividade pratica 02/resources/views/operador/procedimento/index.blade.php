@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('mensagem_edit_error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_edit_error') }}</strong><br>
                    Por favor insira um id válido para ter acesso a página de edição de preço.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('mensagem_update_sucesso'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_update_sucesso') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('mensagem_update_error_vazio'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_update_error_vazio') }}</strong><br>
                    Por favor preencha o campo de preço para atualizar o preço do procedimento.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('mensagem_update_error_number'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_update_error_number') }}</strong><br>
                    Por favor preencha o campo de preço somente com valor numérico.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header bg-dark text-white" align="center"><strong>Procedimentos</strong></div>

                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped table-sm">
                        <thead class="p-3 mb-2 bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Valor R$</th>
                                <th>Administrador</th>
                                <th>Criação</th>
                                <th>Última Atualização</th>
                                <th>Editar Valor</th>
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
                                    <td><button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="window.location='{{ route('procedure.edit', [ 'id' => $e -> id]) }}'">Editar</button></td>
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
