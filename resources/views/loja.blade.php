@extends('layouts.app')

@section('content')

@if (count($produtos) > 0)
<div class="row">
@foreach ($produtos as $produto)
  <div class="col-6 col-lg-4">
    <h2>{{$produto->nome}}</h2>
    <img src="data:image/jpeg;base64,{{$produto->imagem}}" width="200px"/>
    <p>R${{$produto->preco}}</p>
    <?php echo Form::open(array('action' => 'HomeController@adicionarItem')); ?>
        {{ csrf_field() }}
        <input type="hidden" name="produtoAdicionar" value="{{ $produto->id }}" />
    <p><input type="submit" class="btn btn-secondary" role="button" value="Comprar" /></p>
  </form>
  </div><!--/span-->
@endforeach
</div>
@endif
@endsection
