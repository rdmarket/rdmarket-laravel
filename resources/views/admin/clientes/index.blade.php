@extends('layout.site')

@section('titulo', 'clientes')

@section('conteudo')
<div class="container">
<div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
                <h3>Lista de Clientes</h3>
            </div>
            <div class="col-3">
                <a class="btn btn-success"
                   href="{{ route('admin.clientes.adicionar') }}" style="background-color: #77d353; border: #77d353">
                    Adicionar
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(!empty($mensagem))
                    <div class="alert alert-success">
                        {{ $mensagem }}
                    </div>
                @endif
            </div>

        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->id_cliente}}</td>
                            <td>{{ $item->nm_cliente }}</td>
                            <td>{{ $item->num_cpf }}</td>   
                            <td>{{ $item->ds_tipo_contato }}</td> 
                            <td>{{ $item->ds_tipo_contato }}</td>                          <td>
                                <a class="btn btn-primary"
                                    href="{{route('admin.clientes.editar', $item->id_cliente)}}" style="background-color: #969faa; border: #969faa">
                                    Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
