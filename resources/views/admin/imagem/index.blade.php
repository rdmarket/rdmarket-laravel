@extends('layout.site')

@section('titulo', 'Imagem')

@section('conteudo')
<div class="container">
<div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
                <h3>Imagem</h3>
            </div>
            <div class="col-3">
                <a class="btn btn-success"
                   href="{{ route('admin.imagem.adicionar') }}" style="background-color: #77d353; border: #77d353">
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
                        <th scope="col">Imagem</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->id_imagem }}</td>
                            <td>{{ $item->caminho_imagem }}</td>
                            <td>{{ $item->ds_produto }}</td>
                            <td>{{ $item->ds_imagem_produto }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{route('admin.imagem.editar', $item->id_imagem)}}" style="background-color: #969faa; border: #969faa">
                                    Editar</a>
                            </td>
                            <td>
                                <form action="{{route('admin.imagem.deletar', $item->id_imagem)}}" method="post"> 
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