<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    //

    //
     //6. Ahora procedemos a agregar nuestros metodos
    //6.1 vamos a declarar un constructor, todos estos metodos estaran trabajando con nuestra ruta resources que esta
    //router web
    public function __construct()
    {

    }
    //6.2 agregamos nuestra funcion index para agregar la pagina inicial
    public function index(Request $request)
    {
    	//7 ahora procedemos a defir a index primeramente la funciòn index va recibir como parametro un objeto
    	//7.1 de tipo Request index(Request $request)
    	//7.2 ahora procedemos a validar con if, si existe el objeto request, vamo a obtener todos los registros
    	// de nuestra tabla categoria de la base de datos
    	if ($request)
    	{
    		//7.3 para esto vamos a declarar un variable llamada query, esta va determinar cual sera el texto de busqueda
    		//para filtrar todas las categoria
    		$query=trim($request->get('searchText'));//vamos a decir que del objeto $request utilizando get entre
    		                                        //entre comillas el nombre del parametro de objeto de busqueda
    		//7.4 vamos a declar otra variable llamada $categoria, vamos a utilizar la clase DB, vamos especificar la
    		//tabla entre comillas, con una condicion es parecido a clausula de sql, para esto recibira tres parametro
    		//el campo, el comando, y texto a buscar pero sin importar al inicio o al final por eso los comodines
    		$articulo= DB::table('articulo as a')
            ->join ('categoria as c' , 'a.idcategoria', '=','c.idcategoria')
            ->select ('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            ->where ('a.nombre', 'LIKE','%'.$query.'%')
            ->where ('condicion', '=','1')
            ->orderBy ('a.idarticulo','desc')
            ->paginate(7);

    		//7.5 vamos agregar una segunda condicion where, igual tres parametros, donde la condicion sea igua
    		//a esta vista le pasaremos parametros categorias de nuestra variable $categorias y el texto de busqueda
    		//retornamos a la vista almacen categoria, todas las categorias y texto de busqueda
    		return view('almacen.articulo.index',["articulo"=>$articulo, "searchText"=>$query]);



    	}

    }
    //6.3 agregando create
    public function create()
    {
    	//8 realizaremos retornar a una vista, para esto vamos a crear un archivo create.php
    	return view("almacen.categoria.create");
    }
    //6.4 agregando store para almacenar, parametro limpio en el 6.4  store()
    public function store(ARTICULOFormRequest $request)
    {
    	//9 almacenar nuestro objeto del modelo categoria en nuestra tabla categoria de la base de datos
    	//para esto debemos validar utilizando el request en el parametro de la funcion CategoriaFormRequest
    	(CategoriaFormRequest $request)
    	//9.1 Creamos un objeto Categoria hace referencia al modelo llamado categoria que se encuentra en app-Categoria.php nombre, descripcion y condicion.
    	//9.2 a cada una de las propiedades del modelo le enviaremo un valor
    	$categoria->nombre=$request->get('nombre');
    	//9.3 descripcion
    	$categoria->descripcion=$request->get('descripcion');
    	//9.4 condicion
    	$categoria->condicion='1'; //en un primer inicio es igual a uno ya que debe de estar activa
    	//9.4 el objeto categoria almacenar
    	$categoria->save();
    	//9.5 vamos a retornar una redireccion a la url, ya que despues de almacenar, nos redireccione al listado de las categorias, esto esta en nuestra vista en la carpeta almacen en la sub carpeta categoria
    	return Redirect::to('almacen/categoria');

    }
    //6.5 agregando show para presentar show() estaba limpia
    public function show($id)
    {

    	//10 inicialmente va recibir el id de la categoria que desea mostrar show($id)
    	//10.1 llama a esta vista para que la muestre pero enviale esta categoria par aqu ela muestre
    	//categoria especifica finOrfail
    	return view("almacen.categoria.show",["categoria"=>CATEGORIA::findOrFail($id)]);

    }
    //6.6 agregando edit para editar
    public function edit($id)
    {
    	//11 para el edit se utiliza el mismo codigo, es igual la vista va ser edit
    	return view("almacen.categoria.edit",["categoria"=>CATEGORIA::findOrFail($id)]);
    }
    //6.7 agregando update para actualizar update()
    public function update(CATEGORIAFormRequest $request,$id)
    {
    	//12 en la funcion update se recibiran dos parametros update(CategoriaFormRequest $request)
    	//12.1 vamos a validar los datos que deseamos actualizar, y el otro parametro es el id de la categoria a modif
    	$categoria=CATEGORIA::findOrFail($id);
    	$categoria->nombre=$request->get('nombre');
    	$categoria->descripcion=$request->get('descripcion');
    	$categoria->update();
    	//12.2 realizaremos un return
    	return Redirect::to('almacen/categoria');


    }
    //6.8 agregando destroy para eliminar
    public function destroy($id)//13 recibimos como parametro el id
    {
    	//en este caso lo que realizaremos en cambiar la condicion de nuestra categoria a 0
    	$categoria=CATEGORIA::findOrFail($id);
    	$categoria->condicion='0';
    	$categoria->update();
    	return Redirect::to('almacen/categoria');

    }


}
