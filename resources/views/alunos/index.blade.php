@extends('layouts.master')
@section('content')

<div class="conteiner-fluid">
	<!--TITULO-->
	<h1 class="text-primary text-center"><b>Alunos</b></h1>
	<h4 class="text-center">Alunos registados na base de dados</h4>

	<hr>	

	<!--TABELA-->
	<div class="table-responsive">
		<table class="table table-striped">
			<!--HEADER TABELA-->
			<thead>
				<tr>
					<th>Nº Aluno</th>
					<th>Nome</th>
					<th>Cartão de Cidadão</th>
					<th>Sexo</th>
					<th>Morada</th>
					<th>Nacionalidade</th>
					<th>E-mail</th>
					<th>Telemóvel</th>
					<th>Editar</th>
					<th>Apagar</th>
				</tr>
			<thead>

			<!--BODY TABELA-->
            <tbody>
            	
			@foreach ($alunos as $aluno):

				<tr>
					<td><?php echo $aluno->id; ?></td>
					<td><?php echo $aluno->nome; ?></td>
					<td><?php echo $aluno->cartao_cidadao; ?></td>
					<td><?php echo $aluno->sexo; ?></td>
					<td><?php echo $aluno->morada; ?></td>
					<td><?php echo $aluno->nacionalidade; ?></td>
					<td><?php echo $aluno->email; ?></td>
					<td><?php echo $aluno->telemovel; ?></td>


					<!-- BUTTON EDIT -->
					<td>
						<a class="btn btn-warning" href="{{ URL::route('aluno.edit', $aluno->id) }}">
							<span class="glyphicon glyphicon-cog"></span>
						</a>
					</td>

					<!-- BUTTON DESTROY -->
					<td>
						<form action="{{ route('aluno.destroy', $aluno->id) }}" method="POST"> 
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="_method" value="DELETE">
							<button name="remover" type="submit" class="btn btn-danger">
								<span class="glyphicon glyphicon-trash"></span>
							</button>
						</form>

					<!--MODAL / POP-UP -->
					<div class="modal face" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<!--HEADER MODAL-->
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>

									<h3 class="modal-title" id="myModalLabel">Atenção</h3>
								</div>
								<!--BODY MODAL-->
								<div class="modal-body">
									<p>Tem a ceteza que quer apagar aluno?</p>
								</div>
								<!--FOOTER MODAL-->
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
									
									<button type="button" class="btn btn-default" id="apagar">Sim</button>
								</div>
							</div>
						</div>
					</div>
				</td>	
			</tr>
			@endforeach
		</tbody>
	</table>

	<hr>
	<!--BUTTON ADD-->
	<a href="{{ URL::route('aluno.create') }}" class="btn btn-primary">Adicionar novo Aluno</a>
</div>

<!--APAGA O A DISCIPLINA-->
<script>
	$('button[name="remover"]').on('click', function(e) {
		var $form = $(this).closest('form'); e.preventDefault();
		$('#myModal').modal({
			backdrop: 'static',
			keyboard: false
		})
		.one('click', '#apagar', function(e) {
			$form.trigger('submit');
		});
	});
</script>
@stop