@extends('layout.site')

@section('titulo', 'produtos')

@section('conteudo')
<div class="container">
<div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
                <h3>Lista de Produtos</h3>
            </div>
            <div class="col-3">
                <a class="btn btn-success"
                   href="{{ route('admin.produto.adicionar') }}" style="background-color: #77d353; border: #77d353">
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
                        <th scope="col">Categoria</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Data de aquisição</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Ações</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->id_produto}}</td>
                            <td>{{ $item->ds_categoria }}</td>
                            <td>{{ $item->ds_produto }}</td>
                            <td>{{ $item->valor_venda }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->data_aquisicao)->format('d/m/Y') }}</td>
                            <td>{{ $item->qtd_produto_estoque }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{route('admin.produto.editar', $item->id_produto)}}" style="background-color: #969faa; border: #969faa">
                                    Editar</a>
                            </td>
                            <td>
                                <form action="{{route('admin.produto.deletar', $item->id_produto)}}" method="post"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="background-color: #C81E21; border: #C81E21">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection