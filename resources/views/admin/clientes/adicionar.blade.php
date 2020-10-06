@extends('layout.site')

@section('titulo', 'Adicionar Produto')


@section('conteudo')
    <div class="container">
        <h3>Adiconar Produto</h3>
        <div class="row">
            <form action="{{ route('admin.produtos.salvar') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @include('admin.produtos.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
