<div class="form-group">
    <label for="id-cliente">Id Cliente</label>
    <input type="text" class="form-control" id="id-cliente" name="id_cliente" value="{{$item->id_cliente ?? ''}}">
   
</div>
<div class="form-group">
    <label for="id-forma-pagamento">Id Forma de Pagamento</label>
    <input type="text" class="form-control" id="id-forma-pagamento" name="id_forma_pagamento" value="{{$item->id_forma_pagamento ?? ''}}">
</div>
<div class="form-group">
    <label for="nr-pedido">Número do Pedido</label>
    <input type="text" class="form-control" id="nr-pedido" name="nr_pedido" value="{{$item->nr_pedido ?? ''}}">
</div>
<div class="form-group">
    <label for="vlr-total-pedido">Valor Total do Pedido</label>
    <input type="text" class="form-control" id="vlr-total-pedido" name="vlr_total_pedido" value="{{$item->vlr_total_pedido ?? ''}}">
</div>
<div class="form-group">
    <label for="id-status-pedido">Id Status do Pedido</label>
    <input type="text" class="form-control" id="id-status-pedido" name="id_status_pedido" value="{{$item->id_status_pedido ?? ''}}">
</div>
<div class="form-group">
    <label for="id-endereco">Id Endereco</label>
    <input type="text" class="form-control" id="id-endereco" name="id_endereco" value="{{$item->id_endereco ?? ''}}">
</div>
<div class="form-group">
    <label for="data-pedido">Data do Pedido</label>
    <input type="date" class="form-control" id="data-pedido" name="data_pedido" value="{{$item->data_pedido ?? ''}}">
</div>
<div class="form-group">
    <label for="nr-parcelas">Número de Parcelas</label>
    <input type="text" class="form-control" id="nr-parcelas" name="nr_parcelas" value="{{$item->nr_parcelas ?? ''}}">
</div>