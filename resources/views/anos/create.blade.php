@extends('layouts.master')
@section('content')

<div class="container-fluid">

	<!--BUTTON BACK-->
	<a href="{{ URL::route('ano.index') }}" class="btn btn-default">Voltar atrás</a>

	<hr>
    <!--TITULO-->
	<h1 class="text-primary text-center"><b>Adicionar novo Ano</b></h1>
	<h3 class="text-center">Preencha toda a informação</h3>

	<hr>

	<!--FORMULÁRIO-->
	<form action="{{ URL::route('ano.store') }}" method="POST">

		<!-- NOME -->
		<div class="form-group">
			<label for="nome" class="control-label">Nome:</label>
			<input type="text" id="nome" name="nome" class="form-control" required>
		</div>

		<!-- DISCIPLINAS -->
		<div class="form-group">
			<label for="disciplina" class="control-label">Disciplinas:</label>
			<select id="disciplina" name="disciplina[]" class="form-control" multiple required>
				
				@foreach($disciplinas as $disciplina)
					<option value="<?php echo $disciplina->id; ?><?php echo $disciplina->nome; ?>"></option>
				@endforeach

			</select>
		</div>

		<!--BUTTON SUBMIT -->
		<input type="submit" class="btn btn-primary" value="Inserir">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</div>
@stop		