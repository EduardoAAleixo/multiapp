@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <!--BUTTON BACK-->
    <a href="{{ URL::route('professor.index') }}" class="btn btn-default">Voltar atrás</a>

    <hr>
    <!--TITULO-->
    <h1 class="text-primary text-center"><b>Adicionar um novo Professor</b></h1>
    <h4 class="text-center">Preencha toda a informação.</h4>
    
    <hr>

    <!--FORMULÁRIO-->
    <form action="{{ URL::route('professor.store') }}" method="POST">
        
        <!--NOME-->
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <!--EMAIL-->
        <div class="form-group">
            <label for="email" class="control-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        
        <!--DISCIPLINA-->
        <div class="form-group">
            <label for="disciplina" class="control-label">Disciplina:</label>
            <select id="disciplina" name="disciplina[]" class="form-control" multiple required>
                
                @foreach($disciplinas as $disciplina)
                    <option value="<?php echo $disciplina->id; ?>"><?php echo $disciplina->nome; ?></option>
                @endforeach

            </select>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Inserir">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@stop