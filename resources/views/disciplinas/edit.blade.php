@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <!--BUTTON BACK-->
    <a href="{{ URL::route('disciplina.index') }}" class="btn btn-default">Voltar atrás</a>

    <hr>    
    <!--TITULO-->
    <h1 class="text-primary text-center"><b>Editar Disciplina</b> "{{ $disciplina->id }}"</h1>
    <h4 class="text-center">Edite a informação e guarde.</h4>

    <hr>

    <!--FORMULÁRIO-->
    <form action="{{ route('disciplina.update', $disciplina->id) }}" method="POST">

        <input type="hidden" name="_method" value="PUT">

        <!-- NUMERO DISCIPLINA
        <div class="form-group">
            <label for="id" class="control-label">Nº Disciplina:</label>
            <input type="text" id="id" name="id" class="form-control" value="{{ $disciplina->id }}" readonly>
        </div>
        -->

        <!-- NOME -->
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $disciplina->nome }}">
        </div>

        <!-- ETCS -->
        <div class="form-group">
            <label for="ects" class="control-label">Ects:</label>
            
            <input type="number" id="ects" name="ects" class="form-control" value="{{ $disciplina->ects }}">
        </div>

        <!-- ANOS -->


        <!--BUTTON SUBMIT -->
        <input type="submit" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@stop

