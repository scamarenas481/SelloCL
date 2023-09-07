<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Productosnuevo;
use App\Models\Unidade;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductoNuevoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // ...

    public function index(Request $request)
    {
        // Obtener el valor seleccionado de elementos por página, o usar el valor predeterminado (5)
        $perPage = $request->input('itemsPerPage', session('itemsPerPage', 5));

        // Almacenar el valor de itemsPerPage en la sesión
        session(['itemsPerPage' => $perPage]);

        // Obtener los valores de los filtros de rango de fechas
        $fechaInicio = $request->input('fechaInicio', Carbon::now()->toDateString()); // Valor predeterminado: fecha actual
        $fechaFin = $request->input('fechaFin', Carbon::now()->toDateString()); // Valor predeterminado: fecha actual);

        // Construir la consulta para los productos nuevos con el filtro de rango de fechas
        $query = Productosnuevo::query();
        if ($fechaInicio) {
            $fechaInicioCarbon = Carbon::parse($fechaInicio);
            $query->whereDate('Fecha', '>=', $fechaInicioCarbon);
        }
        if ($fechaFin) {
            $fechaFinCarbon = Carbon::parse($fechaFin);
            $query->whereDate('Fecha', '<=', $fechaFinCarbon);
        }

        // Obtener los productos nuevos paginados con el valor seleccionado de elementos por página
        $productosNuevos = $query->paginate($perPage);

        // Agregar los parámetros de fecha a la paginación
        if ($fechaInicio) {
            $productosNuevos->appends('fechaInicio', $fechaInicio);
        }
        if ($fechaFin) {
            $productosNuevos->appends('fechaFin', $fechaFin);
        }

        // Pasar los valores de las fechas de inicio y fin a la vista
        return view('.productos.productos-nuevos.index', compact('productosNuevos', 'fechaInicio', 'fechaFin'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all(); // Obtener todas las unidades para el formulario

        return view('.productos.productos-nuevos.create', compact('unidades'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar el formulario para Producto Nuevo

        $request->validate([
            'descripcion' => 'required',
            'fecha' => 'required|date',
            'cantidad' => 'required|numeric',
            'unidad_id' => 'required|exists:unidades,UnidadID',
        ]);
        // Obtener el usuario autenticado
        $user = Auth::user();
        // Crear un nuevo producto nuevo
        $productoNuevo = new Productosnuevo([
            'Descripcion' => $request->descripcion,
            'Fecha' => $request->fecha,
            'Revisado' => '0',
            'Cantidad' => $request->cantidad,
            'users_id' => $user->id, // ID del usuario autenticado
            'Unidad_UnidadID' => $request->unidad_id,
            'no-se-maneja' => 1,
        ]);
        if ($productoNuevo->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function storeInterno(Request $request)
    {
        // Validar el formulario para Producto Interno

        $request->validate([
            'producto_search' => 'required',
            'fecha_interno' => 'required|date',
            'cantidad_interno' => 'required|numeric',
            'unidad_interno_id' => 'required|exists:unidades,UnidadID',
        ]);
        //dd($request->all());

        // Crear un nuevo producto interno
        $productoInterno = new Productosnuevo([
            'Descripcion' => $request->producto_search,
            'Fecha' => $request->fecha_interno,
            'Revisado' => '0',
            'Cantidad' => $request->cantidad_interno,
            'Usuarios_UsuarioID' => '17',
            'Unidad_UnidadID' => $request->unidad_interno_id
        ]);
        if ($productoInterno->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // Obtener el valor seleccionado de elementos por página, o usar el valor predeterminado (5)
        $perPage = $request->input('itemsPerPage', session('itemsPerPage', 5));

        // Almacenar el valor de itemsPerPage en la sesión
        session(['itemsPerPage' => $perPage]);

        // Obtener los valores de los filtros de rango de fechas
        $fechaInicio = $request->input('fechaInicio', Carbon::now()->toDateString()); // Valor predeterminado: fecha actual
        $fechaFin = $request->input('fechaFin', Carbon::now()->toDateString()); // Valor predeterminado: fecha actual);

        // Construir la consulta para los productos nuevos con el filtro de rango de fechas y orden descendente
        $query = Productosnuevo::query()
            ->whereDate('Fecha', '>=', $fechaInicio)
            ->whereDate('Fecha', '<=', $fechaFin)
            ->orderBy('ProductoNuevoID', 'desc'); // Orden descendente por ProductoNuevoID

        // Obtener los productos nuevos paginados con el valor seleccionado de elementos por página
        $productosNuevos = $query->paginate($perPage);

        // Agregar los parámetros de fecha a la paginación
        $productosNuevos->appends(['fechaInicio' => $fechaInicio, 'fechaFin' => $fechaFin]);

        // Pasar los valores de las fechas de inicio y fin a la vista
        return view('.productos.productos-nuevos.show', compact('productosNuevos', 'fechaInicio', 'fechaFin'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function buscarProductos(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        $resultados = Producto::where('CodigoInterno', 'LIKE', "%$searchTerm%")
            ->orWhere('Descripcion', 'LIKE', "%$searchTerm%")
            ->get();

        return response()->json($resultados);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
