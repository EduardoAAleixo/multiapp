@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <!--BUTTON BACK-->
    <a href="{{ URL::route('estagio.index') }}" class="btn btn-default">Voltar atrás</a>

    <hr>
    <!--TITULO-->
    <h1 class="text-primary text-center"><b>Estágio "{{ $estagio->id }}"</b></h1>
    <h4 class="text-center">Lista de cursos do estágio {{ $estagio->id }} registados na base de dados.</h4>

    <hr>

    <!--TABELA-->
    <div class="table-responsive">
        <table class="table table-striped">
            
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Pertense aos anos</th>
                </tr>
            </thead>
           
            <tbody>
                <tr>
                    <td><?php echo $estagio->empresa; ?></td>
                    <td><?php foreach ($estagio->anos as $ano) {
                        echo $ano->nome."<br>" ; 
                    }?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop