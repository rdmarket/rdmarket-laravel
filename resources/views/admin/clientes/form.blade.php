<div class="form-group">
    <label for="nm_cliente">Nome</label>
    <input type="text" class="form-control" id="nm_cliente" name="nm_cliente" value="{{$item->nm_cliente ?? ''}}">
   
</div>
<div class="form-group">
    <label for="num_cpf">CPF</label>
    <input type="text" class="form-control cpf-mask" id="num_cpf" name="num_cpf" value="{{$item->num_cpf ?? ''}}" placeholder="Ex: 000.000.000-00">
    @if (!empty($cpfErrado ?? ''))
    <p style="color: red;">{{ $cpfErrado }} </p>
    @endif
</div>
<div class="form-group">
    <label for="data_nascimento">Data de nascimento</label>
    <input type="date" class="form-control-file" id="data_nascimento" name="data_nascimento" value="{{$item->data_nascimento ?? ''}}">
</div>

@yield('form senha')

