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
            @if (session('mensagem_store_error_vazio'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_store_error_vazio') }}</strong><br>
                    Por favor preencha todos os campos para realizar o cadastro.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('mensagem_update_error_vazio'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_update_error_vazio') }}</strong><br>
                    Por favor preencha todos os campos para atualizar o cadastro.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('mensagem_store_error_number'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_store_error_number') }}</strong><br>
                    Por favor preencha o campo de preço somente com valor numérico.
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
            @if (session('mensagem_show_error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_show_error') }}</strong><br>
                    Por favor insira um id válido para ter acesso a página de exibição.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('mensagem_edit_error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_edit_error') }}</strong><br>
                    Por favor insira um id válido para ter acesso a página de edição.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('mensagem_destroy_error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('mensagem_destroy_error') }}</strong><br>
                    Impossível realizar exclusão deste procedimento. Pois este procedimento esta sendo solicitado nos testes.
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
            <div class="card">
                <div class="card-header bg-dark text-white" align="center" style="font-style: italic; font-size: 25px; "><strong>Procedimentos Ofertados</strong></div>

                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped table-sm">
                        <thead class="p-3 mb-2 bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Valor R$</th>
                                <th>Administrador </th>
                                <th>Visualização</th>
                                <th>Atualização</th>
                                <th>Exclusão</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($procedimentos as $e)
                                <tr>
                                    <td>{{$e -> id}}</td>
                                    <td>{{$e -> name}}</td>
                                    <td>{{$e -> price}}</td>
                                    <td>{{$e -> nameuser}}</td>
                                    
                                    <td><button type="button" class="btn btn-outline-dark" onclick="window.location='{{ route('procedures.show', [ 'id' => $e -> id]) }}'">Detalhes</button></td>

                                    <td><button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('procedures.edit', [ 'id' => $e -> id]) }}'">Editar</button></td>

                                    <td><form method="post" onsubmit="return confirm('Deseja mesmo excluir este procedimento?');" action="{{ route('procedures.destroy', $e->id) }}">

                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger btn btn-outline-danger" type="submit" value="Excluir">

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
