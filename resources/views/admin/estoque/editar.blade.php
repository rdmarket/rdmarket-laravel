@extends('layout.site')

@section('titulo', 'Editar Estoque')


@section('conteudo')
    <div class="container">
        <h3>Editar Estoque</h3>
        <div class="row">
            <form action="{{route('admin.estoque.atualizar', $item->id_produto)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('admin.estoque.form')
                <button type="submit" class="btn btn-success" style="background-color: #77d353; border: #77d353">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
