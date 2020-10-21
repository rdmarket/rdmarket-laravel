@extends('layout.site')

@section('titulo', 'Editar Pedido')


@section('conteudo')
    <div class="container">
        <h3>Editar Pedido</h3>
        <div class="row">
            <form action="{{route('admin.pedidos.atualizar', $item->id_pedido)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">      <!-- Esse input não é visível para o usuário -- Serve para tratar o formulário post para que ele possa fazer o put, que ´e atualizar -->
                
                <div class="form-group">
                    <label for="id-status-pedido">Status do Pedido</label>
                    <select name="id_status_pedido" class="form-control" id="id-status-pedido">Id Status do Pedido
                        @foreach ($opcoes as $opcao)
                            <option value="{{$opcao->id_status_pedido}}" {{$opcao->id_status_pedido == $item->id_status_pedido ? 'selected':''}}>{{$opcao->desc_status_pedido}}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-success" style="background-color: #77d353; border: #77d353">Salvar</button>
            </form>
        </div>
    </div>
@endsection()
