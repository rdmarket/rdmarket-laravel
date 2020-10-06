@extends('layout.site')

@section('titulo', 'Editar Produto')


@section('conteudo')
    <div class="container">
        <h3>Editar Produto</h3>
        <div class="row">
            <form action="{{route('admin.pedidos.atualizar', $item->id_pedido)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">      <!-- Esse input não é visível para o usuário -- Serve para tratar o formulário post para que ele possa fazer o put, que ´e atualizar -->
                @include('admin.pedidos.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
