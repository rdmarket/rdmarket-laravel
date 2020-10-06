<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{$item->nome ?? ''}}">
   
</div>
<div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" value="{{$item->cpf ?? ''}}" placeholder="Ex: 111.111.111/11">
</div>
<div class="form-group">
    <label for="data_nascimento">Data de nascimento</label>
    <input type="date" class="form-control-file" id="data_nascimento" name="data_nascimento" value="{{$item->data_nascimento ?? ''}}">
</div>
