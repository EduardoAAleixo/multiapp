@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <!--BUTTON BACK-->
    <a href="{{ URL::route('aluno.index') }}" class="btn btn-default">Voltar atrás</a>

	<hr>    
    <!--TITULO-->
    <h1 class="text-primary text-center"><b>Editar Aluno</b> "{{ $aluno->nome }}"</h1>
	<<h4 class="text-center">Edite e Guarde a informação</h4>

	<hr>

    <!--FORMULÁRIO-->
	<form action="{{ URL::route('aluno.update', $aluno->id) }}" method="POST">
		<input type="hidden" name="_method" value="PUT">

        <!-- NUMERO ALUNO -->
        <div class="form-group">
			<label for="id" class="control-label">Nº Aluno:</label>

			<input type="number" id="id" name="id" class="form-control" value="{{ $aluno->id }}" readonly>
        </div>

        <!-- NOME -->
        <div class="form-group">
			<label for="nome" class="control-label">Nome:</label>

			<input type="text" id="nome" name="nome" class="form-control" value="<?php echo $aluno->nome; ?>">
        </div>

        <!-- CARTAO CIDADAO -->
        <div class="form-group">
			<label for="cartao_cidadao" class="control-label">Cartão Cidadão:</label>

			<input type="text" id="cartao_cidadao" name="cartao_cidadao" class="form-control" value="<?php echo $aluno->cartao_cidadao; ?>">
        </div>

        <!-- SEXO -->
        <div class="form-group">
			<label for="sexo" class="control-label">Sexo:</label>

			<select id="sexo" name="sexo" class="form-control" required>
				<option value="Masculino">Maculino</option>
				<option value="Feminino">Feminino</option>
			</select>
        </div>

        <!-- MORADA -->
        <div class="form-group">
			<label for="morada" class="control-label">Morada:</label>

			<input type="text" id="morada" name="morada" class="form-control" value="<?php echo $aluno->morada; ?>" required>
        </div>

        <!-- NACIONALIDADE -->
        <div class="form-group">
			<label for="Nacionalidade" class="control-label">Nacionalidade:</label>

			<input type="text" id="nacionalidade" name="nacionalidade" class="form-control" value="<?php echo $aluno->nacionalidade; ?>" required>
        </div>

        <!-- E-MAIL -->
        <div class="form-group">
			<label for="email" class="control-label">E-Mail:</label>

			<input type="email" id="email" name="email" class="form-control" value="<?php echo $aluno->email; ?>" required>
        </div>

        <!-- TELEMOVEL -->
        <div class="form-group">
			<label for="telemovel" class="control-label">Telemóvel:</label>

			<input type="text" id="telemovel" name="telemovel" class="form-control" value="<?php echo $aluno->telemovel; ?>">
        </div>

        <!-- ANO -->
        <div class="form-group">
            <label for="ano" class="control-label">Ano:</label>
            <select id="ano" name="ano[]" class="form-control" multiple>
                
                <?php $var = 1; ?>

                {{ $var }}

                <!--CHAMATA TABELA ANOS-->
                @foreach($anos as $ano)
                    <!--CHAMATA TABELA DE RELAÇÃO-->
                    @foreach($aluno->anos as $alunoano)
                        <!--COMPARA OS ID'S DAS TABELAS-->
                        @if($ano->id == $alunoano->id)
                            <option value="<?php echo $alunoano->id; ?>" selected><?php echo $alunoano->nome; ?></option>

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

        <!-- DISCIPLINA -->
        <div class="form-group">
            <label for="" class="control-label">Disicplina:</label>
            <select id="disciplina" name="disciplina[]" class="form-control" multiple>
                
                <?php $var = 1; ?>
                
                {{ $var }}
               
                <!--CHAMATA TABELA DISCIPLINAS-->
                @foreach($disciplinas as $disciplina)
                    <!--CHAMATA TABELA DE RELAÇÃO-->
                    @foreach($aluno->disciplinas as $alunodisciplina)
                        <!--COMPARA OS ID'S DAS TABELAS-->
                        @if($disciplina->id == $alunodisciplina->id)
                            
                            <option value="<?php echo $alunodisciplina->id; ?>" selected><?php echo $alunodisciplina->nome; ?></option> 
                            
                            {{ $var = 0 }}
                            @break;
                        @else
                            {{ $var = 1 }}
                        @endif
                    @endforeach
                    @if($var==1 )
                        <option value="<?php echo $disciplina->id; ?>"><?php echo $disciplina->nome; ?></option>
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
