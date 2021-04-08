
<div class="container" >
<div class="bg-dark text-white py-3" id="encabezado">
  <h1>Listado Usuarios</h1>
  </div>
</div>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


  <title>LISTA USUARIOS LARAVEL.</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

  <style type="text/css">
 ul li .white{color: #fff;}
.inpSearch{ border: 5px solid #eee; border-radius: 5px; }
.icon-lg{font-size: 19px;}
.red {color: red;}
.blue{color: blue;}
.teal{color: teal;}
</style>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

</head>

<div class="container">
  <div class="card">
    <div class="card-body">
        <div class="card-title">


<!--
@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{Session::get('mensaje')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif

 -->


<br>
            <a href="{{url('usuario/create')}}">
            <button  class="btn btn-primary">
            Agregar Usuario </button>

            </a>
            <br>
            <br>
<table id="usuarios" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Correo</th>
            <th>Clave</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->Nombre}}</td>
            <td>{{$usuario->Apellido}}</td>
            <td>{{$usuario->Edad}}</td>
            <td>{{$usuario->Correo}}</td>
            <td>{{$usuario->Clave}}</td>
            <td>
            <a href="{{url('/usuario/'.$usuario->id.'/edit')}}">

  <button  class="btn btn-warning" >
<span class="glyphicon glyphicon-pencil"></span> </button>
            </td>

            <td>
            <form action="{{url('/usuario/'.$usuario->id)}}" method="post" class="formulario-eliminar" >
            @csrf
            {{method_field('DELETE')}}

<button  class="btn btn-danger" >

            <span class="glyphicon glyphicon-trash"></span>
            </button>
            </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
{!! $usuarios->links()!!}

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@if(session('mensaje')=='Usuario Borrado Correctamente')
<script>
Swal.fire(
      'Borrado!',
      'Usuario Borrado Correctamente.',
      'success'
    )
</script>

@endif

@if(session('mensaje')=='Usuario Agregado Correctamente')
<script>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Usuario Agregado Correctamente',
  showConfirmButton: false,
  timer: 1500
})
</script>

@endif


@if(session('mensaje')=='Usuario Editado Correctamente')
<script>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Usuario Editado Correctamente',
  showConfirmButton: false,
  timer: 1500
})
</script>

@endif

<script>

$('.formulario-eliminar').submit(function(e){
    e.preventDefault();
    Swal.fire({
  title: '¿Seguro que desea Eliminar el Registro?',
  text: "",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Aceptar'
}).then((result) => {
  if (result.isConfirmed) {

    this.submit();
  }
})
});


$(document).ready(function() {
    $('#usuarios').DataTable({
        "lengthMenu":[[5,10,50],[5,10,50,"All"]]
    });
} );



</script>



<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js" defer></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d2751eeee7.js" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>







