<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<link rel="shortcut icon" type="image/x-icon" href="http://www.cafw.ufsm.br/mostraciencias/2014/assets/img/mostra.ico" />
	
	<title>@yield('titulo', 'Administrativo Blog')</title>    
	
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css') }}">

	<style>
		#container{background: red};
	</style>
	
	</head>
<body>
		@include('menu.menu')
	
		<div class="container">
	
        @yield('conteudo')
        @yield('rodape')

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div>        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
