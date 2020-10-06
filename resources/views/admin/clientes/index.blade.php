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
                   href="{{ route('admin.clientes.adicionar') }}">
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
                        <th scope="col">Data de nascimento</th>
                        <th scope="col">Ações</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->id_cliente}}</td>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->cpf }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->data_nascimento)->format('d/m/Y') }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{route('admin.clientes.editar', $item->id_cliente)}}">
                                    Editar</a>
                            </td>
                            <td>
                                <form action="{{route('admin.clientes.deletar', $item->id_cliente)}}" method="post"> 
                                    @csrf
                                    @method('DELETE')
                                    <!-- <input type="submit" name="excluir" value="delete" class="btn btn-danger"> -->
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
