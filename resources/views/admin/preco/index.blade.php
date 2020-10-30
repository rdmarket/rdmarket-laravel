@extends('layout.site')

@section('titulo', 'Preço')

@section('conteudo')
<div class="container">
<div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
                <h3>Lista de Preços</h3>
            </div>
            <div class="col-3">
                <a class="btn btn-success"
                   href="{{ route('admin.preco.adicionar') }}" style="background-color: #77d353; border: #77d353">
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
                        <th scope="col">Id</th>
                        <th scope="col">Produto</th>
                        <th scope="col">% de desconto</th>
                        <th scope="col">Valor de Venda</th>
                        <th scope="col">Ações</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->id_preco}}</td>
                            <td>{{ $item->ds_produto }}</td>
                            <td>{{ $item->p_desconto }}</td>

                            @if ($item->status_desconto == 'ativo')
                                <td>R$ {{ money_format('%n', $item->valor_venda *= ((100 - $item->p_desconto)/100))}}</td>
                                @else 
                                    <td>R$ {{ money_format('%n', $item->valor_venda) }}</td>
                            
                            @endif
                            <td>
                                <a class="btn btn-primary"
                                    href="{{route('admin.preco.editar', $item->id_preco)}}" style="background-color: #969faa; border: #969faa">
                                    Editar</a>
                            </td>
                            <td>
                                <form action="{{route('admin.preco.deletar', $item->id_preco)}}" method="post"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="background-color: #C81E21; border: #C81E21">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!!$itens->links()!!}
        </div>
    </div>
@endsection