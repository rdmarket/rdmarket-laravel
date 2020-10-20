@extends('layout.site')

@section('titulo', 'Estoque')

@section('conteudo')
<div class="container">
<div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
                <h3>Estoque</h3>
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
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Ações</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->ds_produto}}</td>
                            <td>{{ $item->qtd_produto_estoque }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{route('admin.estoque.editar', $item->id_estoque)}}" style="background-color: #969faa; border: #969faa">
                                    Editar</a>
                            </td>
                            <td>
                                <form action="{{route('admin.estoque.deletar', $item->id_estoque)}}" method="post"> 
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