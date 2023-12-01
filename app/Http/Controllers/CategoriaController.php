<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $categorias = Categoria::where('codigo', 'LIKE', '%' . $busqueda . '%')
            ->orwhere('nombre', 'LIKE', '%' . $busqueda . '%')
            ->latest('id')
            ->paginate(8);
        // $categorias = Categoria::all(); //trae todos los registros
        return view('categorias.index', compact('categorias','busqueda'));
        // Compact es para enviar la informacion a la vista y poder usarla 

    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {

        $categoria = Categoria::create($request->all()); //todos los datos que reciba del request los crea y no necesita las lineas de abajo
        // $categoria = new Categoria();
        // $categoria->codigo = $request->codigo;
        // $categoria->nombre = $request->nombre;
        // $categoria->save();
        return redirect()->route('categorias.index');

    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));

    }

    public function edit(Categoria $categoria) //aca ya devuelve todo el registro con solo click en edit
    {
        return view('categorias.edit', compact('categoria'));


    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}