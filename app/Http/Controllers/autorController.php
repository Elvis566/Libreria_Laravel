<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class autorController extends Controller
{
    public function index(){
        $autor =  Autor::all();
        return view('index',compact('autor'));
    }
    public function saveAutor(Request $request){
        $datos = new Autor();
        $datos->nombre = $request->nombre;
        $datos->estado = true;
        $datos->save();
        return back();
    }
    public function saveLibro(Request $request){
        $datos = new Libro();
        $datos->titulo = $request->titulo;
        $datos->estado = true;
        $datos->year = $request->year;
        $datos->autor_id = $request->id_autor;
        $datos->save();
        return back();
    }
    public function mostrar(){
        $autor =  Autor::all();
        $libros = DB::table('libro')
        ->join('autor', 'autor_id', '=', 'autor.id')
        ->where('libro.estado', 1)
        ->select('libro.*', 'autor.nombre')
        ->get();
         return view('tabla',compact('libros', 'autor'));
    }

    public function filtrar(Request $request){
        $autor =  Autor::all();

        $libros = DB::table('libro')
        ->join('autor', 'autor_id', '=', 'autor.id')
        ->where('libro.estado', 1)
        ->where('autor.id', '=', $request->datoFiltrado)
        ->select('libro.*', 'autor.nombre')
        ->get();
         return view('tabla',compact('libros', 'autor'));
    }

    public function eliminar($id){
        $libro = Libro::find($id);
        if($libro){
            $libro->estado = false;
            $libro->save();
            return back();
        }

    }

    public function actualizar($id){
        $autor = Autor::all();
        $libro = Libro::find($id);
        if($id){
            return view('actualizar', compact('libro', 'autor'));
        }
       
    }

    public function updateLibro(Request $request, $id){
        $autor = Autor::all();
        $datoNuevo = Libro::find($id);
        if ($datoNuevo) {
            $datoNuevo->update([
                "titulo" => $request->input("titulo"),
                "year" => $request->input("year"),
                "autor_id" => $request->input("id_autor")
            ]);
        } 
       return view('index',  compact('autor'));
    // return back();
    }
   
}
