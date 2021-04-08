


<div class="container" >
<div class="bg-dark text-white py-3" id="encabezado">

  </div>
</div>
<head>

  <title>LISTA USUARIOS LARAVEL.</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


</head>

<div class="container">
  <div class="card">
    <div class="card-body">
        <div class="card-title">
<!--

   @if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>

@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>


@endif
-->

<input  type="text" class="form-control"  onkeypress="return soloLetrasProbarArriba(event)"  placeholder="Nombre" maxlength="21" name="Nombre" value="{{isset($usuario->Nombre)?$usuario->Nombre:old('Nombre') }}" id="Nombre">

<div class="alert {{$errors->first('Nombre','alert-danger')}}">
{{$errors->first('Nombre',':message')}}
</div>
<!--
    <input  type="text" class="form-control"  onkeypress="return soloLetrasProbarArriba(event)"  placeholder="Nombre" maxlength="21" name="Nombre" value="{{isset($usuario->Nombre)?$usuario->Nombre:old('Nombre') }}" id="Nombre">
<input type="text" class="form-control"  onkeypress="return soloLetras(event)" placeholder="Apellido" maxlength="21" name="Apellido" value="{{isset($usuario->Apellido)?$usuario->Apellido:old('Apellido')}}" id="Apellido">

-->

<input type="text" class="form-control"  onkeypress="return soloLetras(event)" placeholder="Apellido" maxlength="21" name="Apellido" value="{{isset($usuario->Apellido)?$usuario->Apellido:old('Apellido')}}" id="Apellido">

<div class="alert {{$errors->first('Apellido','alert-danger')}}">
{{$errors->first('Apellido',':message')}}
</div>




<input type="text" class="form-control"  onkeypress="return soloNumeros(event)" placeholder="Edad" maxlength="3" name="Edad" value="{{isset($usuario->Edad)?$usuario->Edad:old('Edad')}}" id="Edad">
<div class="alert {{$errors->first('Edad','alert-danger')}}">
{{$errors->first('Edad',':message')}}
</div>

<input type="text" class="form-control"  placeholder="Correo" maxlength="31" name="Correo" value="{{isset($usuario->Correo)?$usuario->Correo:old('Correo')}}" id="Correo">
<div class="alert {{$errors->first('Correo','alert-danger')}}">
{{$errors->first('Correo',':message')}}
</div>

<input type="password" class="form-control"  onkeypress="return verificar(event)" placeholder="Clave" maxlength="30" name="Clave" value="{{isset($usuario->Clave)?$usuario->Clave:old('Clave')}}" id="Clave">
<div class="alert {{$errors->first('Clave','alert-danger')}}">
{{$errors->first('Clave',':message')}}
</div>


<button   class="btn btn-success" >{{$modo}} Usuario
</button>



<a href="{{url('usuario/')}}" class="btn btn-secondary">
            Cancelar
 </a>

</button>

@section('js')
<script>
  function soloLetras(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = [8, 37, 39, 46];

      tecla_especial = false
      for(var i in especiales) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla) == -1 && !tecla_especial)
          return false;
  }

  function limpia() {
      var val = document.getElementById("miInput").value;
      var tam = val.length;
      for(i = 0; i < tam; i++) {
          if(!isNaN(val[i]))
              document.getElementById("miInput").value = '';
      }
  }

  function soloNumeros(evt){

			// code is the decimal ASCII representation of the pressed key.
			var code = (evt.which) ? evt.which : evt.keyCode;

			if(code==8) { // backspace.
			  return true;
			} else if(code>=48 && code<=57) { // is a number.
			  return true;
			} else{ // other keys.
			  return false;
			}
		}

        function verificar(e) {

 // comprovamos con una expresion regular que el caracter pulsado sea
 // una letra, numero o un espacio
 if(e.key.match(/[a-z0-9ñçáéíóú\s]/i)===null) {

     // Si la tecla pulsada no es la correcta, eliminado la pulsación
     e.preventDefault();
 }
}

function soloLetrasProbarArriba(e) {
    var key = e.keyCode || e.which;
    var tecla = String.fromCharCode(key).toLowerCase();
    var letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    var especiales = [8, 37, 39, 46];

    var tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}
</script>


<script>
@include('sweetalert::alert')
</script>
