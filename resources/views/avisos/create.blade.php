@extends('layouts.master')
@section('content')

<div class="container-fluid">
	
	<!--BUTTON BACK-->
	<a href="{{ URL::route('aviso.index') }}" class="btn btn-default">Voltar Atrás</a>

	<hr>
	<!--TITULO-->
	<h1 class="text-primary text-center"><b>Adicionar um novo Aviso</b></h1>
	<h3 class="text-center">Preencha toda a informação.</h3>

	<hr>

	<!--FORMULÁRIO-->
	<form action="{{ URL::route('aviso.store') }}" method="POST">


		<!--NOME -->
		<div class="form-group">
			<label for="titulo" class="control-label">Titulo</label>

			<input type="text" id="titulo" name="titulo" class="form-control" required>
		</div>

		<!--DESCRIÇÃO-->
		<div class="form-group">
			<label for="assunto" class="control-label">Assunto</label>
			
			<textarea id="assunto" name="assunto" class="form-control" rows="5" required></textarea>
		</div>

		<!--ANO-->
		<div class="form-group">
            <label for="ano" class="control-label">Anos:</label>
            
            <select id="ano" name="ano[]" class="form-control" multiple required>
                
                @foreach($anos as $ano)
                    <option value="<?php echo $ano->id; ?>"><?php echo $ano->nome; ?></option>
                @endforeach

            </select>
        </div>


		<!--DISCIPLINA-->
		<div class="form-group">
			<label for="´disciplina" class="control-label">Disciplinas:</label>
			
			<select id="disciplina" name="disciplina[]" class="form-control" multiple required>
				
				  @foreach($disciplinas as $disciplina)
				  	<option value="<?php echo $disciplina->id; ?>"><?php echo $disciplina->nome; ?>
				  	</option>
				  @endforeach

			</select>
		</div>


		<!--BUTTON SUBMIT -->
		<input type="submit" class="btn btn-primary" value="Inserir">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</div>
@stop