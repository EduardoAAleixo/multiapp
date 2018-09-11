@extends('layouts.master')
@section('content')

<div class="container-fluid">
	<!--TITULO-->
	<h1 class="text-primary text-center"><b>Disciplinas</b></h1>
	<h4 class="text-center">Disciplinas registadas na base de dados</h4>
    
    <hr>

    <!--TABELA-->
    <div class="table-responsive">
        <table class="table table-striped">
            <!--HEADER TABELA-->
            <thead>
                <tr>
                    <th>Nº Disciplina</th>
                    <th>Nome</th>
                    <th>Ects</th>
                    <th>Informações</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <!--BODY TABELA-->
            <tbody>
            	
            	@foreach($disciplinas as $disciplina)
            	<tr>
            		<td><?php echo $disciplina->id; ?></td>
            		<td><?php echo $disciplina->nome; ?></td>
            		<td><?php echo $disciplina->ects; ?></td>

            		<!-- BUTTON SHOW -->
            		<td>
            			<a class="btn btn-default" href="{{ URL::route('disciplina.show', $disciplina->id) }}">
            				<span class="glyphicon glyphicon-tags"></span>
            			</a>
            		</td>

            		<!-- BUTTON EDIT -->
					<td>
						<a href="{{ URL::route('disciplina.edit', $disciplina->id) }}" class="btn btn-warning">
							<span class="glyphicon glyphicon-cog"></span>
						</a>
					</td>

					<!-- BUTTON DESTROY -->
					<td>
						<form action="{{ route('disciplina.destroy', $disciplina->id) }}" method="POST">
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
										<button type="button" class="close"data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									
										<h3 class="modal-title" id="myModalLabel">Atenção!</h3>
									</div>
									<!--BODY MODAL-->
									<div class="modal-body">
										<p>Tem a certeza que deseja apagar a Disciplina?</p>
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
    <a href="{{ URL::route('disciplina.create') }}" class="btn btn-primary ">Adicionar nova Disciplina</a>
</div>


<!--APAGA A DISCIPLINA-->
<script>
	$('button[name="remover"').on('click', function(e) {
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
		

