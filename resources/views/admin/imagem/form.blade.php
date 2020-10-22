<div class="form-group">
    <label for="caminho_imagem">Adicionar Imagem</label>
    <input type="file" class="form-control" id="caminho_imagem" name="caminho_imagem" value="{{$item->caminho_imagem ?? ''}}">
</div>

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
    <label for="ds_imagem_produto">Descrição</label>
    <input type="text" class="form-control" id="ds_imagem_produto" name="ds_imagem_produto" value="{{$item->ds_imagem_produto ?? ''}}">
</div>


