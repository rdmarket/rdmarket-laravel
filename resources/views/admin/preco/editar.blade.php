@extends('layout.site')

@section('titulo', 'Editar Preco')


@section('conteudo')
    <div class="container">
        <h3>Editar Preço</h3>
        <div class="row">
            <form action="{{route('admin.preco.atualizar', $item->id_preco)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('admin.preco.form')
                <button type="submit" class="btn btn-success" style="background-color: #77d353; border: #77d353">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
