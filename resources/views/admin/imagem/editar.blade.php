@extends('layout.site')

@section('titulo', 'Editar Imagem')


@section('conteudo')
    <div class="container">
        <h3>Editar Imagem</h3>
        <div class="row">
            <form action="{{route('admin.imagem.atualizar', $item->id_imagem)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('admin.imagem.form')
                <button type="submit" class="btn btn-success" style="background-color: #77d353; border: #77d353">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
