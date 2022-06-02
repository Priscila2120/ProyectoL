@extends ('Layouts.admin')
@section ('contenido')

<!-- 1 en esta sección vamos a mostrar el listado -->
<!-- 2 para realizar una buena estructrura utilizaremos la rejilla de Boostrat explicaciòn-->
<!-- 3 para realizar una buena estructrura utilizaremos la rejilla de Boostrat explicaciòn-->
<!-- 4 vamos crear una fila div.row + tab, ya el containe lo agregamos en una plantilla admi.blade.php-->
<div class="row">
	<!-- 5 vamos agregar las columnas div.col-lg- + tab cuando el dispositivo sea grande 8  clumnas, vamos a utilizar el diseño de las demas clases para que se tipo responses-->
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<!-- 6 agregando un titulo y dentro de la etiqueta un boton y un hipervinculo al boton registrar una nueva -->
		<!-- 6.1 le vamos a poner un hipervinculo al boton <a + tab-->
		<!--6.2</a> para encerrar el boton en el hipervinculo, ponemos al final de boton-->
		<!--6.3 en el href que nos redirecciones a categoria/create-->
		<!--6.4 resultado tenemos un titulo al lado un boton con un texto nuevo y un hipervinculo-->
		<h3>Listado de Categorias <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
		<!--7 vamos agregar un formulario para poder buscar las categorias par eso este formurio lo crearemos en otra vista-->
		<!--8 esta vista la crearemos en resource, view, almacen, categoria-->
		<!--8.1 una vez finalizaada vamos a incluir al vista creada search.blade.php-->
		@include('almacen.categoria.search')

	</div>

</div>
<!--9 fuera de div de la primea fil agregaremos una nueva fila-->
	<div class="row">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!--10 vamos agregar otros div le agregaremos la clase table-responsible div.table-responsive-->
			<div class="table-responsive">
			<!--11 agregaremos una tabla etiqueta table y dentro agregamos una class-->
			<table class="table table-striped table-bordered table-condensed table-hover">
			<!--12 agregaremos una fila a manera de cabezera thead-->
				<thead>
				<!--13 agregaremos varias celdas de encabezadao para cada campo celda th-->
				<th>Id</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Opciones</th>
				</thead>
				<!--14 agregaremos una fila simple tr y 14.1 luego el blucle para mostrar las categorias-->
				<!--14.2 variable desde el controlador recorre todas las categorias y cerramos el blucle-->
				@foreach($categorias as $cat)
				<tr>
				<!--15 vamos agregar celdas sencillas td-->
				<!--16 ahora dentro de cada td los elementos a mostrar {{$cat->idcategoria}}-->
				<td>{{$cat->idcategoria}}</td>
				<td>{{$cat->nombre}}</td>
				<td>{{$cat->descripcion}}</td>
				<!--17 vamos a mostrar dos botones le agreremos un hiperviculo una a y </a> se pega al final-->
				<!--SE MODIFICA CUANDO FINALIZAMOS LA EDIT.BLADE.PHP LA URL-->
		     	<td>
		     		<a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}"><button class="btn btn-info">Editar</button></a>
					<a href=""><button class="btn btn-danger">Eliminar</button></a>
				</td>
				</tr>
				@endforeach

			</table>
			</div>
			<!--faltaba una llave-->
			{{$categorias->render()}}

		</div>
	</div>

 @endsection
