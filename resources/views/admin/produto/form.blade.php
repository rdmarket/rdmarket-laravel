<div class="form-group">
    <label for="data_aquisicao">Data de aquisição</label>
    <input type="date" class="form-control" id="data_aquisicao" name="data_aquisicao" value="{{$item->data_aquisicao ?? ''}}">
</div>
<div class="form-group">
    <label for="ds_produto">Descrição do produto</label>
    <input type="text" class="form-control" id="ds_produto" name="ds_produto" value="{{$item->ds_produto ?? ''}}">
</div>

<div class="form-group">
      <label for="id_categoria ">Categoria</label>
    <select id="id_categoria " class="form-control" name="id_categoria" value="{{ $item->id_categoria ?? ''}}">
        <option selected>Escolha uma categoria</option>
        @foreach ($categorias as $categoria)
            <option value= "{{ $categoria->id_categoria ?? ''}}">{{ $categoria->ds_categoria ?? ''}}</option>
        @endforeach
      </select>
</div>
