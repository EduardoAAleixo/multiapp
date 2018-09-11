@extends('layouts.master')
@section('content')

<div class="container-fluid">
	
	<!--BUTTON BACK-->
	<a href="{{ URL::route('aviso.index') }}" class="btn btn-default">Voltar atrás</a>

	<hr>
	<!--TITULO-->
	<h1 class="text-primary text-center"><b>Editar Aviso</b> "{{ $aviso->id }}"</h1>
	<h4 class="text-center">Edite a informação e guarde</h4>

	<hr>

	<!--FORMULÁRIO-->
	<form action="{{ route('aviso.update', $aviso->id) }}" method="POST">
		
		<input type="hidden" name="_method" value="PUT">

		<!--Nº AVISO-->	
		<div class="form-group">
			<label for="id" class="control-label">Nº Aviso</label>
			
			<input type="number" id="id" name="id" class="form-control" value="{{ $aviso->id }}" readonly>
		</div>

		<!--DESCRIÇÃO-->
		<div class="form-group">
			<label for="descricao" class="control-label">Descrição:</label>
			
			<textarea id="descricao" name="descricao" class="form-control" required><?php echo $aviso->descricao; ?></textarea>
		</div>

		<!--ANO-->
		<div class="form-group">
			<label for="ano" class="control-label">Ano:</label>
			<select id="ano" name="ano[]" class="form-control" multiple>
				
				<?php $var = 1; ?>

				{{ $var }}

				@foreach($anos as $ano)
					@foreach($aviso->anos as $avisoano)
						@if($ano->id == $avisoano->id)
							<option value="<?php echo $avisoano->id; ?>" selected><?php echo $avisoano->nome; ?></option>

							{{ $var = 0 }}
							break;
						@else
							{{ $var = 1 }}
						@endif
					@endforeach
					@if($var==1)
						<option value="<?php echo $ano->id; ?>"><?php echo $ano->nome; ?>
						</option>
					@endif
				@endforeach
			</select>
		</div>

		<!--DISCIPLINA-->		
		<div class="form-group">
            <label for="disciplina" class="control-label">Disciplina:</label>
            <select id="disciplina" name="disciplina[]" class="form-control" multiple>
                
                <?php $vdisciplina = 1; ?>
                
                {{ $vdisciplina }}
                
                @foreach($disciplinas as $disciplina)
                    @foreach($aviso->disciplinas as $avisodisciplina)
                        @if($disciplina->id == $avisodisciplina->id)
                            
                            <option value="<?php echo $avisodisciplina->id; ?>" selected><?php echo $avisodisciplina->nome; ?></option> 
                            
                            {{ $dvisciplina = 0 }}
                           
                            @break;
                        @else
                            {{ $vdisciplina = 1 }}
                        @endif
                    @endforeach
                    @if($vdisciplina==1 )
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

