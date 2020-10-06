@extends('layout.site')

@section('titulo', 'Produtos')

@section('conteudo')
<div class="container">
<div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
                <h3>Lista de Cursos</h3>
            </div>
            <div class="col-3">
                <a class="btn btn-success"
                   href="{{ route('admin.produtos.adicionar') }}">
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
                        <th scope="col">Descrição</th>
                        <th scope="col">Conteúdo</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ações</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->descricao }}</td>
                            <td>{{ $item->conteudo }}</td>
                            <td>{{ $item->preco }}</td>
                            <td><img width="70" src="{{asset($item->imagem)}}"></td>
                            <td>{{ $item->categoria }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{route('admin.produtos.editar', $item->id)}}">
                                    Editar</a>
                            </td>
                            <td>
                                <form action="{{route('admin.produtos.deletar', $item->id)}}" method="post">
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
