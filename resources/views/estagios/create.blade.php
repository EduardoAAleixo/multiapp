@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <!--BUTTON BACK-->
    <a href="{{ URL::route('estagio.index') }}" class="btn btn-default">Voltar atrás</a>

    <hr>
    <!--TITULO-->
    <h1 class="text-primary text-center"><b>Adicionar um novo Estágio</b></h1>
    <h4 class="text-center">Preencha toda a informação.</h4>

    <hr>

    <!--FORMULÁRIO-->
    <form action="{{ URL::route('estagio.store') }}" method="POST">

        <!--AREA-->
        <div class="form-group">
            <label for="area" class="control-label">Àrea:</label>
            
            <input type="text" id="area" name="area" class="form-control" required>
        </div>

        <!--EMPRESA-->
        <div class="form-group">
            <label for="empresa" class="control-label">Empresa:</label>
            
            <input type="text" id="empresa" name="empresa" class="form-control" required>
        </div>

        <!--HORAS-->
        <div class="form-group">
            <label for="horas" class="control-label">Nº Horas:</label>
            
            <input type="number" id="horas" name="horas" class="form-control" required>
        </div>

        <!--CONTACTO-->
        <div class="form-group">
            <label for="contacto" class="control-label">Contacto:</label>
        
            <input type="text" id="contacto" name="contacto" class="form-control" required>
        </div>

        <!--ANO-->
        <div class="form-group">
            <label for="ano" class="control-label">Anos:</label>
            
            <select id="ano" name="ano[]" class="form-control" multiple required>
            
                @foreach($anos as $ano)
                    <option value="<?php echo $ano->id; ?>"><?php echo $ano->nome; ?></option>
                @endforeach
            
            </select>
        </div>

        <!--BUTTON SUBMIT -->
        <input type="submit" class="btn btn-primary" value="Inserir">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop
