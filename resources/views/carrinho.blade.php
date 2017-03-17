@extends('layouts.app')

@section('content')

<table style="width:70%">
  <thead>
    <th colspan="2">
	  Produto
  </th>
	<th>
	  Preço
		</th>
	<th>
	  Quantidade
		</th>
	<th>
	  Subtotal
		</th>
    <th></th>
</thead>

@if (count($produtos) > 0)
<tbody>
@foreach ($produtos as $produto)
<tr>
<td>
        <img src="data:image/jpeg;base64,{{$produto->imagem}}"  width="150px" alt="{{$produto->nome}}" class="img-thumbnail"/>
      </td>
    <td>
      {{$produto->nome}}
    </td>

    <td>
    R$ {{$produto->preco}}
  </td>
    <td>
        <select>
          <?php for($i = 0; $i <= $carrinho[$produto->id]['quantidade']; $i++) : ?>
            <option value="<?php echo $i; ?>"<?php echo ($i == $carrinho[$produto->id]['quantidade'] ? " selected" : ""); ?>><?php echo $i; ?></option>
          <?php endfor; ?>
        </select>
      </td>
    <td>
      R$ <?php echo $produto->preco * $carrinho[$produto->id]['quantidade'];  ?>
    </td>
    <td>
    </td>
</tr>
@endforeach
</tbody>
@endif
</table>
<div class="row cart-footer">
  <div class="col-sm-3 col-sm-push-9 col-lg-3 col-lg-push-9 text-xs-center text-sm-left">
    <div class="row">
      <strong>Total: US$ 00.00<div class="clearfix hidden-xs-down"/>
        <span class="hidden-sm-up">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>S/. 00.00</strong>
    </div>
  </div>
  <div class="col-sm-9 col-sm-pull-3 col-lg-9 col-lg-pull-3 ">
    <div class="row">
      <span class="hidden-sm-up">
        <br>
        </span>
        <div class="col-xs-6 col-sm-8 text-xs-left text-sm-left">
          <div class="row">
            <input type="button" class="btn btn-sm myButton" value="Show more products" id="return">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-sm-4 text-xs-right">
              <input type="button" class="btn btn-sm myButton" value="Buy" id="exec_buy">
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
