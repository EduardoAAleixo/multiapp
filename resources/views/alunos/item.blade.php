@extends('layouts.master')
@section('content')

<div class="container-fluid">
	
	<!--BUTTON BACK-->
    <a href="{{ URL::route('disciplina.index') }}" class="btn btn-default">Voltar atrás</a>

    <hr> 
    <!--TITULO-->
	<h1 class="text-primary text-center"><b>Aluno "{{ $aluno->nome }}"</b></h1>
	<h4 class="text-center">Lista de inscrições de <b>"{{ $aluno->nome }}"</b>" registados na bd</h4>

	<hr>

	<!--TABELA-->
	<div class="table-responsive">
		<table class="table table-striped">
			<!--HEADER TABELA-->
			<thead>
				<tr>
					<th>Nome do aluno</th>
					<th>Ano que frequenta</th>
					<th>Discipinas inscrito</th>
				</tr>
			</thead>
			<!--BODY TABELA-->
			<tbody>
				<tr>
					<!--NOME-->
					<td><?php echo $aluno->nome; ?></td>
					<!--ANO-->
					<td><?php foreach ($aluno->anos as $ano) {
					echo $ano->nome; }?></td>
					<!--DISCIPLINA-->
					<td><?php foreach ($aluno->disciplinas as $disciplina) {
					echo $disciplina->nome; }?></td>
				</tr> 
			</tbody>
		</table>
	</div>
</div>

@stop