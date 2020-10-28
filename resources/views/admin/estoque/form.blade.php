<div class="form-group">
      <label for="id_produto">Produto</label>
    <select id="id_produto " class="form-control" name="id_produto" value="{{ $item->id_produto ?? ''}}">
        <option selected>Escolha uma produto</option>
        @foreach ($produtos as $produto)
            <option value= "{{ $produto->id_produto ?? ''}}">{{ $produto->ds_produto ?? ''}}</option>
        @endforeach
      </select>
</div>


<div class="form-group">
    <label for="qtd_produto_estoque">Quantidade</label>
    <input type="text" class="form-control" id="qtd_produto_estoque" name="qtd_produto_estoque" value="{{$item->qtd_produto_estoque ?? ''}}">
</div>


