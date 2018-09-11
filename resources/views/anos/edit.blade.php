@extends('layouts.master')
@section('content')

<div class="container-fluid">

	<!--BUTTON BACK-->
	<a href="{{ URL::route('ano.index') }}" class="btn btn-default">Voltar atrás</a>

	<hr>  

    <!--TITULO-->
    <h1 class="text-primary text-center"><b>Editar</b> "{{ $ano->nome }}"</h1>
	<h4 class="text-center">Edite a informação pretendida e guarde</h4>

	<hr>

	<!--FORMULÁRIO-->
	<form action="{{ route('ano.update', $ano->id)}}" method="POST">

		<input type="hidden" name="_method" value="PUT">

		<!-- Nº ANO-->
		<div class="form-group">
			<label for="id" class="control-label">Nº Ano:</label>

			<input type="text" id="id" name="id" class="form-control" value="{{ $ano->id }}" readonly>
		</div>

		<!-- DISCIPLINAS -->
		<div class="form-group">
			<label for="disciplina" class="control-label">Modelo?</label>
			<select id="disciplina" name="disciplina[]" class="form-control" multiple>
				
				<?php $var = 1; ?>
                
                {{ $var }}
               
                @foreach($disciplinas as $disciplina)
                    @foreach($ano->disciplinas as $anodisciplina)
                        @if($disciplina->id == $anodisciplina->id)
                        	<option value="<?php echo $anodisciplina->id; ?>" selected><?php echo $anodisciplina->nome; ?></option> 
							{{ $var = 0 }}
							@break;
						@else
							{{ $var = 1 }}
						@endif
					@endforeach
					@if($var==1)
						<option value="<?php echo $disciplina->id; ?>">
							<?php echo $disciplina->nome; ?>
						</option>
					@endif
				@endforeach
			</select>
		</div>

		<!--BUTTON SUBMIT -->
		<input type="submit" class="btn btn-primary">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</div>
@stop		
