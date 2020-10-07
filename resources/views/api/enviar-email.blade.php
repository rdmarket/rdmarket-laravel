@extends('layout.site')

@section('titulo', 'Contato')

@section('conteudo')
<div class="container">
    <h3>Contato</h3>
    <div class="row">
        <form action="{{ route('api.enviarEmail') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nm_nome">Nome</label>
                <input type="text" class="form-control" id="nr-nome" name="nome">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="assunto">Assunto</label>
                <input type="text" class="form-control" id="assunto" name="assunto">
            </div>
            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <input type="textarea" class="form-control" id="mensagem" name="mensagem">
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
    </div>
</div>
@endsection