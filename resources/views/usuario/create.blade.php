
<div class="container" >
<div class="bg-dark text-white py-3" id="encabezado">
  <h1>Agregar Usuarios</h1>
  </div>
</div>
<head>

  <title>LISTA USUARIOS LARAVEL.</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


</head>


<form action="{{url('/usuario')}}" method="post">
@csrf

@include('usuario.form', ['modo'=>'Guardar'])


</form>
<script>
@include('sweetalert::alert')
</script>

