@extends('layout.site')

@section('titulo', 'Adicionar Cliente')


@section('conteudo')
    <div class="container">
        <h3>Adicionar Cliente</h3>
        <div class="row">
            <form action="{{ route('admin.clientes.salvar') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @include('admin.clientes.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
