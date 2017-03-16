@extends('layouts.app')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<!-- New Task Form -->
<div class="row">
  <div class="Absolute-Center">
    <h1>Cadastro de Usuário</h1>
    <br/>
    <br/>
    <form id="formRegister" action="/registrar" method="POST" class="form-signin" onsubmit="return $('#formRegister').valid();">
       {{ csrf_field() }}
      <div class="form-group row">
        <label for="nome" class="col-sm-2 col-form-label">Usuário</label>
        <div class="col-sm-10">
          <input type="text" class="form-control required" id="nome" name="nome">
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
        <div class="col-sm-10">
          <input type="email" class="form-control required email" id="email" name="email">
        </div>
      </div>
      <div class="form-group row">
        <label for="senha" class="col-sm-2 col-form-label">Senha</label>
        <div class="col-sm-10">
          <input type="password" class="form-control required" id="senha" name="senha">
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-def btn-block btn-lg btn-primary">Registrar</button>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
$(function(){
  $("#formRegister").validate({
			rules: {
				nome: "required",
				senha: "required",
				email: {
					required: true,
					email: true
				}
			}
    });
})
</script>
@endsection
