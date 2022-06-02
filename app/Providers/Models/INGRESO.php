<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class INGRESO extends Model
{
    use HasFactory;

     //1-Vamos a declarar una variable de tipo protected una variable php, le indicaremos que va hacer referncia a la tabla categoria
     protected $table='ingreso';
     //2-vamos hacer referencia al primer campo que será la llave primaria, primari key del modelo la k debe de ser en mayúscula según el estándar

     protected $primaryKey='idingreso';
     //3-Laravel automáticamente puede agregar o adicionar a la tabla dos columnas, estas columnas nos permitirán identificar cuando fue creado o modificado el registro, en el caso que deseemos que se agreguen automáticamente, se aplica true, en este caso le diremos falso para indicar que no agregue las columnas
     public $timestamps=false;
     //4-ahora vamos a crear vamos a indicar cuales son los campos que van a recibir un valor para poder almacenar en la base de datos
     //4.1para esto vamos a declarar los atributos de tipo fillable, lo indicaremos como una raíz
     protected $fillable =[
     'estado',
     'fecha_hora',
     'idproveedor',
     'impuesto',
     'numero_comprobante',
     'serie_comprobante',
     'tipo_comprobante'
     ];
     //5-tambien podemos agregar campos de tipo guarder,
     protected $guarder =[
     ];
     //6-Guardamos nuestro modelo con control + S
}
