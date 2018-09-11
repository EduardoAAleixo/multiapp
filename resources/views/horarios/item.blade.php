@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <!--BUTTON BACK-->
    <a href="{{ URL::route('horario.index') }}" class="btn btn-default">Voltar atrás</a>

    <hr> 
    <!--TITULO-->
    <h1 class="text-primary text-center"><b>Horario "{{ $horario->id }}"</b></h1>
    <h4 class="text-center">Lista de disciplinas do horario com o Nº{{ $horario->id }} registados na base de dados.</h4>

    <hr>

    <!--TABELA-->
    <div class="table-responsive">
        <table class="table table-striped">
            <!--HEADER TABELA-->
            <thead>
                <tr>
                    <th>Nome do horario</th>
                    <th>Pertence às disciplina</th>
                </tr>
            </thead>
            <!--BODY TABELA-->
            <tbody>
                <tr>
                    <!--ID-->
                    <td><?php echo $horario->id; ?></td>
                    <!--NOME-->
                    <td><?php foreach ($horario->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop