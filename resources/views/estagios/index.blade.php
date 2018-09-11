@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <!--TITULO-->
    <h1 class="text-primary text-center"><b>Estágios</b></h1>
    <h4 class="text-center">Estágios registados na base de dados</h4>
    
    <hr>
    
    <!--TABELA-->
    <div class="table-responsive">
        <table class="table table-striped">
            <!--HEADER TABELA-->
            <thead>
                <tr>
                    <th>Nº Estágio</th>
                    <th>Àrea</th>
                    <th>Empresa</th>
                    <th>Nº Horas</th>
                    <th>Contacto</th>
                    <th>Anos</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            
            <!--BODY TABELA-->
            <tbody>

                @foreach($estagios as $estagio)
                <tr>
                    <td><?php echo $estagio->id; ?></td>
                    <td><?php echo $estagio->area; ?></td>
                    <td><?php echo $estagio->empresa; ?></td>
                    <td><?php echo $estagio->horas; ?></td>
                    <td><?php echo $estagio->contacto; ?></td>

                    <!-- BUTTON SHOW -->
                    <td>
                        <a class="btn btn-default" href="{{ URL::route('estagio.show', $aviso->id) }}">
                            <span class="glyphicon glyphicon-tags""></span>
                        </a>
                    </td>

                    <!-- BUTTON EDIT -->
                    <td>
                        <a class="btn btn-warning" href="{{ URL::route('estagio.edit', $estagio->id) }}">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </td>

                    <!-- BUTTON DESTROY -->
                    <td>
                        <form action="{{ route('estagio.destroy', $estagio->id) }}" method="POST">
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
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        
                                        <h4 class="modal-title" id="myModalLabel">Atenção</h4>
                                    </div>
                                    <!--BODY MODAL-->
                                    <div class="modal-body">
                                        <p>Tem a certeza que deseja apagar o estagio?</p>
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
    </div>

    <hr>
    <!--BUTTON ADD -->
    <a href="{{ URL::route('estagio.create') }}" class="btn btn-primary">Adicionar novo Estágio</a>
</div>

<!--APAGA A DISCIPLINA-->
<script>
    $('button[name="remover"]').on('click', function(e) {
        var $form = $(this).closest('form');
        e.preventDefault();
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