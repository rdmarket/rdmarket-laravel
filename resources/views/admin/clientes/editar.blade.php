@extends('layout.site')

@section('titulo', 'Editar Cliente')


@section('conteudo')
    <div class="container">
        <h3>Editar Cliente</h3>
        <div class="row">
            <form action="{{route('admin.clientes.atualizar', $item->id_cliente)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">      <!-- Esse input não é visível para o usuário -- Serve para tratar o formulário post para que ele possa fazer o put, que ´e atualizar -->
                @include('admin.clientes.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
