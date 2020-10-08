@extends('layout.site')

@section('titulo', 'Adicionar Cliente')


@section('conteudo')
    <div class="container">
        <h3>Adicionar Cliente</h3>
        @section('form senha')
        <div class="form-group">
            <label for="vlr_senha">Senha</label>
            <input type="password" class="form-control" id="vlr_senha" name="vlr_senha" value="{{$item->vlr_senha ?? ''}}">
        @if (!empty($senhaErrada ?? ''))
            <p style="color: red;">{{ $senhaErrada }} </p>
        @endif
        </div>
        @endsection
        <div class="row">
            <form action="{{ route('admin.clientes.salvar') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @include('admin.clientes.form')
                <button type="submit" class="btn btn-success" style="background-color: #77d353; border: #77d353">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
