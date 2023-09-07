@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-3">
            <!-- Agregar el formulario de filtro de rango de fechas -->
            <form action="{{ route('productos-nuevos.show') }}" method="get" class="mb-3">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="fechaInicio">Fecha de Inicio:</label>
                        <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" value="{{ $fechaInicio ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <label for="fechaFin">Fecha de Fin:</label>
                        <input type="date" name="fechaFin" id="fechaFin" class="form-control" value="{{ $fechaFin ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <label for="itemsPerPage">Elementos por página:</label>
                        <select id="itemsPerPage" class="form-control">
                            <option value="5" {{ request('itemsPerPage', $productosNuevos->perPage()) == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request('itemsPerPage', $productosNuevos->perPage()) == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ request('itemsPerPage', $productosNuevos->perPage()) == 20 ? 'selected' : '' }}>20</option>
                            <option value="50" {{ request('itemsPerPage', $productosNuevos->perPage()) == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('itemsPerPage', $productosNuevos->perPage()) == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
                        <a href="#" class="btn btn-primary mt-4 ml-2">Exportar</a>
                    </div>


                </div>
            </form>

        </div>
        <h1 style="color: #00408b">Listado de Productos Nuevos</h1>
        @if ($productosNuevos->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Revisado</th>
                        <th>Usuario</th>
                        <th>Cantidad</th>
                        <th>Unidades</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productosNuevos as $productoNuevo)
                        <tr>
                            <td>{{ $productoNuevo->ProductoNuevoID }}</td>
                            <td>{{ $productoNuevo->Descripcion }}</td>
                            <td>{{ $productoNuevo->Fecha }}</td>
                            <td>{{ $productoNuevo->Revisado }}</td>
                            <td>{{ $productoNuevo->usuario->NombreUsuario }}</td>
                            <td>{{ $productoNuevo->Cantidad }}</td>
                            <td>{{ $productoNuevo->unidade->NombreUnidad }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    Mostrando registros {{ $productosNuevos->firstItem() }} - {{ $productosNuevos->lastItem() }} de un
                    total de {{ $productosNuevos->total() }} registros
                </div>


                <div>
                    <ul class="pagination">
                        {{-- Botón Anterior --}}
                        @if ($productosNuevos->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Anterior</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $productosNuevos->previousPageUrl() }}"
                                    rel="prev">Anterior</a>
                            </li>
                        @endif

                        {{-- Números de página --}}
                        @php
                            $start = max($productosNuevos->currentPage() - 2, 1);
                            $end = min($start + 2, $productosNuevos->lastPage());
                        @endphp

                        @if ($start > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $productosNuevos->url(1) }}">1</a>
                            </li>
                            @if ($start > 2)
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            @endif
                        @endif

                        @for ($i = $start; $i <= $end; $i++)
                            <li class="page-item {{ $i == $productosNuevos->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $productosNuevos->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($end < $productosNuevos->lastPage())
                            @if ($end < $productosNuevos->lastPage() - 1)
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            @endif
                            <li class="page-item">
                                <a class="page-link"
                                    href="{{ $productosNuevos->url($productosNuevos->lastPage()) }}">{{ $productosNuevos->lastPage() }}</a>
                            </li>
                        @endif

                        {{-- Botón Siguiente --}}
                        @if ($productosNuevos->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $productosNuevos->nextPageUrl() }}"
                                    rel="next">Siguiente</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Siguiente</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        @else
            <p>No hay productos nuevos registrados.</p>
        @endif

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const itemsPerPageSelect = document.getElementById('itemsPerPage');
    const fechaInicioInput = document.getElementById('fechaInicio');
    const fechaFinInput = document.getElementById('fechaFin');
    const currentPage = {{ $productosNuevos->currentPage() }};

    itemsPerPageSelect.addEventListener('change', function() {
        const selectedValue = this.value;
        const currentUrl = new URL(window.location.href);

        // Actualizar el valor del parámetro itemsPerPage
        currentUrl.searchParams.set('itemsPerPage', selectedValue);

        // Mantener los parámetros de fecha y orden en la URL
        currentUrl.searchParams.set('fechaInicio', fechaInicioInput.value);
        currentUrl.searchParams.set('fechaFin', fechaFinInput.value);
        currentUrl.searchParams.set('page', currentPage); // Mantener la página actual

        // Redirigir a la nueva URL con los valores actualizados
        window.location.href = currentUrl.toString();
    });

    // Mantener los valores de los filtros de rango de fechas
    fechaInicioInput.addEventListener('change', function() {
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('fechaInicio', this.value);
        window.location.href = currentUrl.toString();
    });

    fechaFinInput.addEventListener('change', function() {
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('fechaFin', this.value);
        window.location.href = currentUrl.toString();
    });

    fechaInicioInput.value = "{{ $fechaInicio ?? '' }}";
    fechaFinInput.value = "{{ $fechaFin ?? '' }}";
});
    </script>




@endsection
