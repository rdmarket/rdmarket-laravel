<div class="form-group">
    <label for="descricao">Nome</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="{{$produto->descricao ?? ''}}" placeholder="Ex: Arroz Camil">
   
</div>
<div class="form-group">
    <label for="conteudo">CPF</label>
    <input type="text" class="form-control" id="conteudo" name="conteudo" value="{{$produto->conteudo ?? ''}}" placeholder="Ex: 5kg">
</div>
<div class="form-group">
    <label for="preco">Data de nascimento</label>
    <input type="text" class="form-control-file" id="preco" name="preco" value="{{$produto->preco ?? ''}}" placeholder="Ex: 24.90">
</div>
