@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <!--BUTTON BACK-->
    <a href="{{ URL::route('professor.index') }}" class="btn btn-default">Voltar atrás</a>

    <hr>
    <!--TITULO-->
    <h1 class="text-primary text-center"><b>Professor "{{ $professor->nome }}"</b></h1>
    <h4 class="text-center">Lista de disciplinas lecionas pelo professor <b>"{{ $professor->nome }}"</b> registados na base de dados.</h4>
    
    <hr>
    
    <!--TABELA-->
    <div class="table-responsive">
        <table class="table table-striped">
            <!--HEADER TABELA-->
            <thead>
                <tr>
                    <th>Nome do professor</th>
                    <th>Pertence às disciplina</th>
                </tr>
            </thead>
            <!--BODY TABELA-->
            <tbody>
                <tr>
                    <!--NOME-->
                    <td><?php echo $professor->nome; ?></td>
                    <!--DISCIPLINA-->
                    <td><?php foreach ($professor->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop