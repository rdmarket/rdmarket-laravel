@extends('layout.site')

@section('titulo', 'clientes')

@section('conteudo')
<div class="container">
<div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
                <h3>Lista de Clientes</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(!empty($mensagem))
                    <div class="alert alert-success">
                        {{ $mensagem }}
                    </div>
                @endif
            </div>

        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->id_cliente}}</td>
                            <td>{{ $item->nm_cliente }}</td>
                            <td>{{ $item->num_cpf }}</td>
                            <td>{{ $item->ds_email }}</td> 
                            <td>{{ $item->num_celular }}</td>                         

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!!$itens->links()!!}
        </div>
    </div>
@endsection
