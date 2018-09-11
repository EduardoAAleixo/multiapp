@extends('layouts.master')
@section('content')

<div class="container-fluid">
	
	<!--BUTTON BACK-->
	<a href="{{ URL::route('ano.index') }}" class="btn btn-default">Voltar atrás</a>

	<hr> 
    <!--TITULO-->
	<h1 class="text-primary text-center"><b>Ano "{{ $ano->nome }}"</b></h1>
	<h4 class="text-center">Lista de informações do ano <b>"{{ $ano->nome }}"</b> registados na BD.</h4>


	<hr>

	 <!--TABELA-->
	<div class="table-responsive">
		<table class="table table-striped">
			<!--HEADER TABELA-->
			<thead>
				<tr>
					<th>Nome do Ano</th>
					<th>Lista de alunos inscritos</th>
					<th>Lista de disciplinas do ano</th>
				</tr>
			</thead>

			<!--BODY TABELA-->
			<tbody>
				<tr>
					<td><?php echo $ano->nome; ?></td>
					<td><?php foreach ($ano->alunos as $aluno){
						echo $aluno->nome."<br>" ;
					} ?></td>
					<td><?php foreach ($ano->disciplinas as $disciplina){
						echo $disciplina->nome."<br>" ;
					} ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@stop