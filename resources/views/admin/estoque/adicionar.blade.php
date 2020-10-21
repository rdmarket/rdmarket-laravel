@extends('layout.site')

@section('titulo', 'Adicionar Produto')


@section('conteudo')
    <div class="container">
        <h3>Adicionar Produto</h3>
        <div class="row">
            <form action="{{ route('admin.produto.salvar') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @include('admin.produto.form')
                <button type="submit" class="btn btn-success" style="background-color: #77d353; border: #77d353">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
