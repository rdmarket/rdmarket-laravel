<div class="form-group">
    <label for="data_aquisicao">Data de aquisição</label>
    <input type="date" class="form-control" id="data_aquisicao" name="data_aquisicao" value="{{$item->data_aquisicao ?? ''}}">
</div>
<div class="form-group">
    <label for="ds_produto">Descrição do produto</label>
    <input type="text" class="form-control" id="ds_produto" name="ds_produto" value="{{$item->ds_produto ?? ''}}">
</div>
<div class="form-group">
    <label for="id_categoria">Tipo do produto</label>
    <input type="text" class="form-control" id="id_categoria" name="id_categoria" value="{{$item->id_categoria ?? ''}}">
</div>
