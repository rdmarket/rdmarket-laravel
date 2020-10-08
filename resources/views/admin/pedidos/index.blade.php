@extends('layout.site')

@section('titulo', 'Pedidos')

@section('conteudo')
<div class="container">
<div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
                <h3>Lista de Pedidos</h3>
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
                        <th scope="col">Data</th>
                        <th scope="col">Id</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Número do Pedido</th>
                        <th scope="col">Forma de Pagamento</th>
                        <th scope="col">Valor total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->data_pedido }}</td>
                            <td>{{ $item->id_pedido }}</td>
                            <td>{{ $item->id_cliente}}</td>
                            <td>{{ $item->id_forma_pagamento }}</td>
                            <td>{{ $item->nr_pedido }}</td>
                            <td>{{ $item->vlr_total_pedido }}</td>
                            <td>{{ $item->id_status_pedido}}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{route('admin.pedidos.editar', $item->id_pedido)}}" style="background-color: #969faa; border: #969faa">
                                    Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
