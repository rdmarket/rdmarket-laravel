@extends('layout.site')

@section('titulo', 'Adicionar Estoque')


@section('conteudo')
    <div class="container">
        <h3>Adicionar Estoque</h3>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <form action="{{ route('admin.estoque.salvar') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @include('admin.estoque.form')
                <button type="submit" class="btn btn-success" style="background-color: #77d353; border: #77d353">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
