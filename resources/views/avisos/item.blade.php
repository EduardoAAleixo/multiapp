@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <!--BUTTON BACK-->
    <a href="{{URL::route('aviso.index')}}" class="btn btn-default">Voltar atrás</a>

    <hr>

    <!--TITULO-->
    <h1 class="text-primary text-center"><b>Aviso "{{ $aviso->assunto }}"</b></h1>
    <h4 class="text-center">Lista de informações do aviso com o assunto <b>"{{ $aviso->assunto }}"</b> registados na base de dados.</h4>
    
    <hr>

    <!--TABELA-->
    <div class="table-responsive">
        <table class="table table-striped">
            <!--HEADER TABELA-->   
            <thead>
                <tr>
                    <th>Assunto do aviso</th>
                    <th>Pertence aos anos</th>
                    <th>Pertence às disciplina</th>
                </tr>
            </thead>
            <!--BODY TABELA-->
            <tbody>
                <tr>
                    <!--ASSUNTO-->
                    <td><?php echo $aviso->assunto; ?></td>
                    <!--ANO-->
                    <td><?php foreach ($aviso->anos as $ano) {
                        echo $ano->nome."<br>" ; 
                    }?></td>
                    <!--DISCIPLINA-->
                    <td><?php foreach ($aviso->disciplinas as $disciplina) {
                        echo $disciplina->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop