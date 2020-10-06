<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="{{$produto->descricao ?? ''}}" placeholder="Ex: Arroz Camil">
   
</div>
<div class="form-group">
    <label for="conteudo">Conteúdo</label>
    <input type="text" class="form-control" id="conteudo" name="conteudo" value="{{$produto->conteudo ?? ''}}" placeholder="Ex: 5kg">
</div>
<div class="form-group">
    <label for="preco">Preço</label>
    <input type="text" class="form-control-file" id="preco" name="preco" value="{{$produto->preco ?? ''}}" placeholder="Ex: 24.90">
</div>
<div class="form-group">
    <label for="imagem">Imagem</label>
    <input type="file" class="form-control-file" id="imagem" name="imagem">
</div>
@if(isset($produto->imagem))
    <div class="form-group">
        <img width="120" src="{{asset($produto->imagem)}}" />
    </div>
@endif

<div class="form-group">
    <h5>Categoria</h5>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="categoria" id="alimentos" value="Alimentos" checked>
        <label class="form-check-label" for="Alimentos">
        Alimentos
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="categoria" id="bebidas" value="Bebidas" checked>
        <label class="form-check-label" for="Bebidas">
        Bebidas
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="categoria" id="higiene" value="Higiene" checked>
        <label class="form-check-label" for="Higiene">
        Higiene
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="categoria" id="limpeza" value="Limpeza" checked>
        <label class="form-check-label" for="Limpeza">
        Limpeza
        </label>
    </div>
</div>