@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <!--BUTTON BACK-->
    <a href="{{ URL::route('estagio.index') }}" class="btn btn-default">Voltar atrás</a>

    <hr>    
    <!--TITULO-->
    <h1 class="text-primary text-center"><b>Editar Estágio</b> "{{ $estagio->area }}"</h1>
    <h4 class="text-center">Edite a informação e guarde.</h4>

    <hr>

    <!--FORMULÁRIO-->
    <form action="{{ route('estagio.update', $estagio->id) }}" method="POST">

        <input type="hidden" name="_method" value="PUT">

        <!--Nº ESTAGIO-->
        <div class="form-group">
            <label for="id" class="control-label">Nº Estágio:</label>
            <input type="number" id="id" name="id" class="form-control" value="{{ $estagio->id }}" readonly>
        </div>

        <!--AREA-->
        <div class="form-group">
            <label for="area" class="control-label">Area:</label>
            <input type="text" id="area" name="area" class="form-control" value="<?php echo $estagio->area; ?>" required>
        </div>

        <!--EMPRESA-->
        <div class="form-group">
            <label for="empresa" class="control-label">Empresa:</label>
            <input type="text" id="empresa" name="empresa" class="form-control" value="<?php echo $estagio->empresa; ?>">
        </div>

        <!--HORAS-->
        <div class="form-group">
            <label for="horas" class="control-label">Nº Horas:</label>
            <input type="number" id="horas" name="horas" class="form-control" value="<?php echo $estagio->horas; ?>" required>
        </div>
            
        <!--CONTACTO-->
        <div class="form-group">
            <label for="contacto" class="control-label">Contacto:</label>
            <input type="number" id="contacto" name="contacto" class="form-control" value="<?php echo $estagio->contacto; ?>" required>
        </div>

        <!--ANO-->
        <div class="form-group">
            <label for="ano" class="control-label">Ano:</label>
            <select id="ano" name="ano[]" class="form-control" multiple>
                <?php $var = 1; ?>

                {{ $var }}
                
                @foreach($anos as $ano)
                    @foreach($estagio->anos as $estagioano)
                        @if($ano->id == $estagioano->id)
                            <option value="<?php echo $estagioano->id; ?>" selected><?php echo $estagioano->nome; ?></option> 
                            {{ $var = 0 }}
                            @break;
                        @else
                            {{ $var = 1 }}
                        @endif
                    @endforeach
                    @if($var==1 )
                        <option value="<?php echo $ano->id; ?>"><?php echo $ano->nome; ?></option>
                    @endif
                @endforeach
            </select>
        </div>

        <!--BUTTON SUBMIT -->
        <input type="submit" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
@stop