@extends('layout.site')

@section('titulo', 'produtos')

@section('conteudo')
<div class="container">
<div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
                <h3>Lista de Produto</h3>
            </div>
            <div class="col-3">
                <a class="btn btn-success"
                   href="{{ route('admin.produto.adicionar') }}">
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
                        <th scope="col">Tipo Produtp</th>
                        <th scope="col">Descrião</th>
                        <th scope="col">Data de aquisição</th>
                        <th scope="col">Ações</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->id_produto}}</td>
                            <td>{{ $item->tipo_produto }}</td>
                            <td>{{ $item->ds_produto }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->data_aquisicao)->format('d/m/Y') }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{route('admin.produto.editar', $item->id_produto)}}">
                                    Editar</a>
                            </td>
                            <td>
                                <form action="{{route('admin.produto.deletar', $item->id_produto)}}" method="post"> 
                                    @csrf
                                    @method('DELETE')
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