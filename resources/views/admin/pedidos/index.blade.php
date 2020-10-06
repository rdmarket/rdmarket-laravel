@extends('layout.site')

@section('titulo', 'Pedidos')

@section('conteudo')
<div class="container">
<div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
                <h3>Lista de Cursos</h3>
            </div>
            <div class="col-3">
                <a class="btn btn-success"
                   href="{{ route('admin.pedidos.adicionar') }}">
                    Adicionar
                </a>
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
                        <th scope="col">Id Pedido</th>
                        <th scope="col">Id Cliente</th>
                        <th scope="col">Id Formada de Pagamento</th>
                        <th scope="col">Número do Pedido</th>
                        <th scope="col">Valor total do pedido</th>
                        <th scope="col">Id Status do Pedido</th>
                        <th scope="col">Id Endereço</th>
                        <th scope="col">Data do Pedido</th>
                        <th scope="col">Número de Parcelas</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Deletar</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->id_pedido }}</td>
                            <td>{{ $item->id_cliente }}</td>
                            <td>{{ $item->id_forma_pagamento }}</td>
                            <td>{{ $item->nr_pedido }}</td>
                            <td>{{ $item->vlr_total_pedido }}</td>
                            <td>{{ $item->id_status_pedido }}</td>
                            <td>{{ $item->id_endereco }}</td>
                            <td>{{ $item->data_pedido }}</td>
                            <td>{{ $item->nr_parcelas }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{route('admin.pedidos.editar', $item->id_pedido)}}">
                                    Editar</a>
                            </td>
                            <td>
                                <form action="{{route('admin.pedidos.deletar', $item->id_pedido)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <!-- <input type="submit" name="excluir" value="delete" class="btn btn-danger"> -->
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
