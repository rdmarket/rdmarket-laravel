<div class="form-group">
    <label for="data_aquisicao">Data de aquisição</label>
    <input type="date" class="form-control" id="data_aquisicao" name="data_aquisicao" value="{{$item->data_aquisicao ?? ''}}">
</div>
<div class="form-group">
    <label for="ds_produto">Descrição do produto</label>
    <input type="text" class="form-control" id="ds_produto" name="ds_produto" value="{{$item->ds_produto ?? ''}}">
</div>
<div class="form-group">
    <label for="id-categoria">Categoria</label>
    <select name="id_categoria" class="form-control" id="id-categoria">
        @foreach ($opcoes as $opcao)
            <option value="{{$opcao->id_categoria}}" {{$opcao->id_categoria == $item->id_categoria ? 'selected':''}}>{{$opcao->ds_categoria}}</option>
        @endforeach
    </select>
</div>
