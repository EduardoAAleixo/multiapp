@extends('layouts.master')
@section('content')

<div class="container-fluid">
	
	<!--TITULO-->
	<h1 class="text-primary text-center"><b>Anos</b></h1>
	<h4  class="text-center">Anos registados na base de dados</h4>

	<hr>

	<!--TABELA-->
	<div class="table-responsive">
		<table class="table table-striped">
			<!--HEADER TABELA-->
			<thead>
				<tr>
					<th>Nome</th>
					<th>Nº de Alunos</th>
					<th>Editar</th>
					<th>Apagar</th>
				</tr>
			</thead>

			<tbody>

				@foreach($anos as $ano)
				<tr>
					<td><?php echo $ano->nome; ?></td>

					<!-- BUTTON SHOW -->
					<td>
						<a class="btn btn-default" href="{{ URL::route('ano.show', $ano->id) }}">
							<span class="glyphicon glyphicon-tags"></span>
						</a>
					</td>

					<!-- BUTTON EDIT -->
					<td>
						<a class="btn btn-warning" href="{{ URL::route('ano.edit', $ano->id) }}">
							<span class="glyphicon glyphicon-cog"></span>
						</a>
					</td>

					<!-- BUTTON DESTROY -->
					<td>
						<form action="{{ route('ano.destroy', $ano->id) }}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="_method" value="DELETE">
							
							<button name="remover" type="submit" class="btn btn-danger">
								<span class="glyphicon glyphicon-trash"></span>
							</button>
						</form>

						<!--MODAL / POP-UP -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<!--HEADER MODAL-->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h3 class="modal-title" id="myModalLabel">Atenção!</h3>
									</div>
									<!--BODY MODAL-->
									<div class="modal-body">
											<p>Tem a certeza que deseja apagar o ano?</p>
									</div>
									<!--FOOTER MODAL-->
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
											
										<button type="button" class="btn btn-default" data-dismiss="modal">Sim</button>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<hr>
	<!--BUTTON ADD -->
	<a href="{{ URL::route('ano.create') }}" class="btn btn-primary">Adicionar novo Ano</a>
</div>

<!--APAGA O ANO-->
<script>

	$('button[name="remover"]').on('click', function(e) {
		var $form = $(this).closest('form');e.preventDefault();
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