<div class="form-group">
      <label for="id_produto">Produto</label>
    <select id="id_produto" class="form-control" name="id_produto" value="{{ $item->id_produto ?? ''}}">
        <option selected>Escolha um produto</option>
        @foreach ($produtos as $produto)
            <option value= "{{ $produto->id_produto ?? ''}}">{{ $produto->ds_produto ?? ''}}</option>
        @endforeach
      </select>
</div>
<div class="form-group">
    <label for="valor_aquisicao">Valor de aquisição/label>
    <input type="text" class="form-control" id="valor_aquisicao" name="valor_aquisicao" value="{{ $item->valor_aquisicao ?? '' }}">
</div>
<div class="form-group">
    <label for="valor_venda">Valor de venda</label>
    <input type="text" class="form-control" id="valor_venda" name="valor_venda" value="{{ $item->valor_venda ?? '' }}">
</div>
<div class="form-group">
    <label for="p_desconto">% de desconto</label>
    <input type="text" class="form-control" id="p_desconto" name="p_desconto" value="{{ $item->p_desconto  ?? '' }}">
</div>
<div class="form-group">
      <label for="status_desconto">Status do desconto</label>
    <select id="status_desconto" class="form-control" name="status_desconto" value="{{ $item->status_desconto ?? ''}}">
        <option selected>selecione o status</option>
        <option value="Ativo">Ativo</option>
        <option value="Desativado">Desativado</option>
      </select>
</div>
<div class="form-group">
    <label for="dt_inicio_desconto">Data de ínicio</label>
    <input type="date" class="form-control" id="dt_inicio_desconto" name="dt_inicio_desconto" value="{{ $item->dt_inicio_desconto ?? '' }}">
</div>
<div class="form-group">
    <label for="dt_final_desconto">Data final</label>
    <input type="date" class="form-control" id="dt_final_desconto" name="dt_final_desconto" value="{{ $item->dt_final_desconto  ?? '' }}">
</div>

