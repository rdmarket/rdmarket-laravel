@extends('layout.site')

@section('titulo', 'Editar Produto')


@section('conteudo')
    <div class="container">
        <h3>Editar Produto</h3>
        <div class="row">
            <form action="{{route('admin.produto.atualizar', $item->id_produto)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('admin.produto.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
