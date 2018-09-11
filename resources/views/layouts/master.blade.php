<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MultiApp</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    
</head>

<body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                
                <!--HEADER-->
                <div class="navbar-header">

                    <!--HOME/MULTIAPP-->
                    <a href="{{ route('index') }}"><span class="col-sm-4 navbar-brand text-info"><b>MultiApp</b></span></a>
                </div> 

                <div class="nav navbar-nav navbar-right ">
                    <!--ALUNOS-->
                    <a href="{{ route('aluno.index') }}"><span class=" Request::is('web/aluno ') ? 'active' : '' navbar-brand">Alunos</span></a>
                    
                    <!--ANOS-->
                    <a href="{{ route('ano.index') }}"><span class=" Request::is('web/ano ') ? 'active' : '' navbar-brand">Anos</span></a>

                    <!--AVISOS-->
                    <a href="{{ route('aviso.index') }}"><span class=" Request::is('web/aviso ') ? 'active' : '' navbar-brand">Avisos</span></a>

                    <!--DISCIPLINAS-->
                    <a href="{{ route('disciplina.index') }}"><span class=" Request::is('web/disciplina ') ? 'active' : '' navbar-brand">Disciplinas</span></a>
                    
                    <!--PROFESSORES-->
                    <a href="{{ route('professor.index') }}"><span class=" Request::is('web/professor ') ? 'active' : '' navbar-brand">Professores</span></a>

                    <!--HORÁRIOS-->
                    <a href="{{ route('horario.index') }}"><span class=" Request::is('web/horario ') ? 'active' : '' navbar-brand">Horários</span></a>

                    <!--ESTÁGIOS-->
                    <a href="{{ route('estagio.index') }}"><span class=" Request::is('web/estagio ') ? 'active' : '' navbar-brand">Estágios</span></a>               
                </div>

            </div>
          </nav>
    </header>

    <!--MAIN-->
    <main class="container-fluid">
        <div class="col-md-10 col-md-offset-1 main">

            @yield('content')
        
        </div>
    </main>

    <!--FOOTER

    <footer>
        <div class="container-fluid fixed-bottom">
            <p>Eduardo Aleixo</p>
        </div>
    </footer>

    -->
</body>
</html>