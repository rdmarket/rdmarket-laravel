@extends('layout.site')

@section('titulo', 'Adicionar Imagem')


@section('conteudo')
    <div class="container">
        <h3>Adicionar Imagem</h3>
        <div class="row">
            <form action="{{ route('admin.imagem.salvar') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @include('admin.imagem.form')
                <button type="submit" class="btn btn-success" style="background-color: #77d353; border: #77d353">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
