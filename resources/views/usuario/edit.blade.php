
<div class="container" >
<div class="bg-dark text-white py-3" id="encabezado">
  <h1>Editar Usuarios</h1>
  </div>
</div>

<form action="{{url('/usuario/'.$usuario->id)}}" method="post">
@csrf
{{method_field('PATCH')}}

@include('usuario.form',['modo'=>'Editar'])

</form>

<script>
@include('sweetalert::alert')
</script>
