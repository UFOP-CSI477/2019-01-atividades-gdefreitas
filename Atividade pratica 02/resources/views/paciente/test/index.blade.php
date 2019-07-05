@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('mensagem_store_sucesso'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_store_sucesso') }}</strong>
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
            @if (session('mensagem_destroy_sucesso'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_destroy_sucesso') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('mensagem_store_error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_store_error') }}</strong><br>
                    Por favor preencha todos os campos para realizar o cadastro do exame.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('mensagem_edit_error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_edit_error') }}</strong><br>
                    ID inválido, por favor insira um id válido para ter acesso a página de edição.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('mensagem_update_error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_update_error') }}</strong><br>
                    Por favor preencha todos os campos para realizar a atualização do exame.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header bg-dark text-white" align="center"><strong>Exames</strong></div>

                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped table-sm">
                        <thead class="p-3 mb-2 bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nome do Paciente</th>
                                <th>Nome do Procedimento</th>
                                <th>Data</th>
                                <th>Criação</th>
                                <th>Última Atualização</th>
                                <th>Atualizar</th>
                                <th>Excluir Exame</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tests as $e)
                                <tr>
                                    <td>{{$e -> id}}</td>
                                    <td>{{$e -> nameu}}</td>
                                    <td>{{$e -> namep}}</td>
                                    <td>{{$e -> date}}</td>
                                    <td><?php echo date("d/m/Y H:i:s ",strtotime($e -> created_at)) ?></td>
                                    <td><?php echo date("d/m/Y H:i:s ",strtotime($e -> updated_at)) ?></td>
                                    <td><button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="window.location='{{ route('test.edit', [ 'id' => $e -> id]) }}'">Editar</button></td>
                                    <td><form method="post" onsubmit="return confirm('Deseja mesmo excluir este exame?');" action="{{ route('test.destroy', $e->id) }}">

                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-outline-danger btn-lg btn-block" type="submit" value="Excluir">

                                        </form>
                                    </td>
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
