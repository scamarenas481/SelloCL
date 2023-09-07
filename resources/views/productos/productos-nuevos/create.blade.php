@extends('layouts.app') <!-- Asegúrate de que estés extendiendo tu plantilla de diseño -->

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Nuevo Producto</h2>
                <!-- Formulario para Producto Nuevo -->
                <form id="formularioProductoNuevo" method="POST" action="{{ route('productos-nuevos.store') }}">

                    @csrf
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                        <div class="invalid-feedback">Campo requerido</div>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" step="0.01" class="form-control" id="cantidad" name="cantidad">
                        <div class="invalid-feedback">Campo requerido</div>
                    </div>

                    <!-- Agrega una lista desplegable para las unidades -->
                    <div class="form-group">
                        <label for="unidad">Unidad:</label>
                        <select class="form-control" id="unidad" name="unidad_id" required>
                            {{-- Agregar un comentario con el punto de interrupción --}}
                            {{-- xdebug_break(); --}}
                            @foreach ($unidades as $unidad)
                                <option value="{{ $unidad->UnidadID }}">{{ $unidad->NombreUnidad }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Otras entradas del formulario para Producto Nuevo según tus necesidades -->
                    <div class="modal fade" id="successModalNuevo" tabindex="-1" aria-labelledby="successModalNuevoLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="successModalNuevoLabel">Producto Guardado </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Producto nuevo guardado exitosamente.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarModalBtn" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="guardarProductoNuevo" class="btn btn-primary">Guardar Producto Nuevo</button>

                </form>
            </div>
            <div class="col-md-6">
                <h2>Producto Interno</h2>
                <!-- Formulario para Producto Interno -->
                <form id="formularioProductoInterno" method="POST" action="{{ route('productos-nuevos.storeInterno') }}">

                    @csrf
                    <div class="form-group">
                        <label for="producto_search">Buscar Producto:</label>
                        <input type="text" class="form-control" id="producto_search" name="producto_search"
                            list="productos_list">
                        <datalist id="productos_list"></datalist>
                        <div class="invalid-feedback">Campo requerido</div>
                    </div>

                    <div class="form-group">
                        <label for="fecha_interno">Fecha Producto Interno:</label>
                        <input type="date" class="form-control" id="fecha_interno" name="fecha_interno" required>
                    </div>

                    <div class="form-group">
                        <label for="cantidad_interno">Cantidad Producto Interno:</label>
                        <input type="number" step="0.01" class="form-control" id="cantidad_interno"
                            name="cantidad_interno">
                        <div class="invalid-feedback">Campo requerido</div>
                    </div>

                    <!-- Agrega una lista desplegable para las unidades internas -->
                    <div class="form-group">
                        <label for="unidad_interno">Unidad Interna:</label>
                        <select class="form-control" id="unidad_interno_id" name="unidad_interno_id" required>
                            @foreach ($unidades as $unidad)
                                <option value="{{ $unidad->UnidadID }}">{{ $unidad->NombreUnidad }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">Tipo de Solicitud:</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="NULL">Seleccionar estado</option>
                            <option value="Se Terminó">Se Terminó</option>
                            <option value="Pedido Especial">Pedido Especial</option>
                        </select>
                    </div>
                    <div id="estadoError" class="invalid-feedback" style="display: none;"></div>

                    <!-- Otras entradas del formulario para Producto Interno según tus necesidades -->
                    <div class="modal fade" id="successModalInterno" tabindex="-1"
                        aria-labelledby="successModalInternoLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="successModalInternoLabel">Producto Guardado
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Producto interno guardado exitosamente.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="guardarProductoInterno">Guardar Producto
                        Interno</button>
                </form>

            </div>

        </div>

    </div>
    <style>
        .container {
            max-width: 90%;
            margin: 0 auto;
        }

        h2 {
            color: #00408b;
        }

        .col-md-6 {
            width: 45%;
            margin-right: 5%;
            margin-bottom: 20px;
            float: left;
            border: 1px solid orange;
            padding: 10px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 767px) {
            .col-md-6 {
                width: 100%;
                margin-right: 0;
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Obtener la fecha actual en formato ISO (YYYY-MM-DD)
            const currentDate = new Date().toISOString().split("T")[0];

            // Establecer la fecha actual en los campos de fecha
            document.getElementById("fecha").value = currentDate;
            document.getElementById("fecha_interno").value = currentDate;

            const productoSearchInput = document.getElementById('producto_search');
            const productosList = document.getElementById('productos_list');

            productoSearchInput.addEventListener('input', function() {
                const searchTerm = this.value.trim();

                if (searchTerm === '') {
                    productosList.innerHTML = ''; // Limpiar la lista si el campo está vacío
                } else {
                    fetch(`/buscar-productos?search=${searchTerm}`)
                        .then(response => response.json())
                        .then(data => {
                            const optionsHtml = data.map(producto => {
                                return `<option value="${producto.CodigoInterno} - ${producto.Descripcion} - ${producto.ClaveAlterna} - ${producto.CodigoProveedor}">${producto.CodigoInterno} - ${producto.Descripcion}</option>`;
                            }).join('');

                            productosList.innerHTML = optionsHtml; // Agregar opciones al datalist
                        })
                        .catch(error => {
                            console.error('Error de búsqueda:', error);
                        });
                }
            });



            // Validar los campos en tiempo real
            const camposRequeridosProductoNuevo = [
                document.getElementById('descripcion'),
                document.getElementById('cantidad'),
            ];

            const camposRequeridosProductoInterno = [
                document.getElementById('producto_search'),
                document.getElementById('cantidad_interno'),
            ];

            camposRequeridosProductoInterno.forEach(campo => {
                campo.addEventListener('input', function() {
                    validarCampos(camposRequeridosProductoInterno);
                });
            });
            camposRequeridosProductoNuevo.forEach(campo => {
                campo.addEventListener('input', function() {
                    validarCampos(camposRequeridosProductoNuevo);
                });

            });


            const guardarProductoNuevo = document.getElementById('guardarProductoNuevo');
            guardarProductoNuevo.addEventListener('click', function(event) {
                event.preventDefault();

                validarCampos(camposRequeridosProductoNuevo);

                const descripcionProductoNuevo = document.getElementById('descripcion').value;
                const fechaProductoNuevo = document.getElementById('fecha').value;
                const cantidadProductoNuevo = document.getElementById('cantidad').value;
                const unidadIdProductoNuevo = document.getElementById('unidad').value;

                const data = {
                    descripcion: descripcionProductoNuevo,
                    fecha: fechaProductoNuevo,
                    cantidad: cantidadProductoNuevo,
                    unidad_id: unidadIdProductoNuevo,
                    _token: '{{ csrf_token() }}'
                };

                fetch('{{ route('productos-nuevos.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            // Limpiar los campos del formulario
                            document.getElementById('descripcion').value = '';
                            document.getElementById('fecha').value = currentDate;
                            document.getElementById('cantidad').value = '';

                            // Mostrar el modal
                            const successModalNuevo = new bootstrap.Modal(document.getElementById(
                                'successModalNuevo'));
                            successModalNuevo.show();


                        } else {
                            console.error('Error al guardar el producto.');
                        }
                    })
                    .catch(error => {
                        console.error('Error en la solicitud AJAX:', error);
                    })
                    .finally(() => {
                        guardarProductoNuevo.disabled = false; // Habilitar el botón nuevamente
                    });
            });

            // ...


            // ...


            const guardarProductoInterno = document.getElementById('guardarProductoInterno');
            guardarProductoInterno.addEventListener('click', function(event) {
                event.preventDefault();

                validarCampos(camposRequeridosProductoInterno);


                const productoSearch = document.getElementById('producto_search').value;
                const fechaInterno = document.getElementById('fecha_interno').value;
                const cantidadInterno = document.getElementById('cantidad_interno').value;
                const unidadInternoId = document.getElementById('unidad_interno_id').value;

                const estadoSelect = document.getElementById('estado');
                const selectedEstado = estadoSelect.value;
                const estadoErrorDiv = document.getElementById('estadoError');

                if (selectedEstado === 'NULL') {
                    estadoErrorDiv.innerHTML = 'Por favor, seleccione un estado válido.';
                    estadoErrorDiv.style.display = 'block';
                    return;
                } else {
                    estadoErrorDiv.style.display = 'none';
                }


                // Crear el objeto de datos para enviar
                const dataInterno = {
                    producto_search: productoSearch,
                    fecha_interno: fechaInterno,
                    cantidad_interno: cantidadInterno,
                    unidad_interno_id: unidadInternoId,
                    _token: '{{ csrf_token() }}' // Token CSRF
                };


                // Enviar la solicitud AJAX
                fetch('{{ route('productos-nuevos.storeInterno') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(dataInterno)
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            // Limpiar los campos del formulario interno
                            document.getElementById('producto_search').value = '';
                            document.getElementById('fecha_interno').value = currentDate;
                            document.getElementById('cantidad_interno').value = '';
                            document.getElementById('estado').value = 'NULL';
                            // Mostrar el modal de éxito
                            const successModalInterno = new bootstrap.Modal(document.getElementById(
                                'successModalInterno'));
                            successModalInterno.show();
                        } else {
                            console.error('Error al guardar el producto interno.');
                        }
                    })
                    .catch(error => {
                        console.error('Error en la solicitud AJAX:', error);
                    })
                    .finally(() => {
                        guardarProductoInterno.disabled = false; // Habilitar el botón nuevamente
                    });
            });

            function validarCampos(campos) {
                campos.forEach(campo => {
                    if (campo.value.trim() === '') {
                        campo.classList.add('is-invalid');
                    } else {
                        campo.classList.remove('is-invalid');
                    }
                });
            }
            const cerrarModalBtn = document.getElementById('cerrarModalBtn');
            cerrarModalBtn.addEventListener('click', function() {
                // Recarga la página
                location.reload();

                // Restablecer el campo de tipo de solicitud a "Seleccionar estado"
                const estadoSelect = document.getElementById('estado');
                estadoSelect.value = 'NULL';

                // También, limpiar cualquier mensaje de error relacionado con el estado
                const estadoErrorDiv = document.getElementById('estadoError');
                estadoErrorDiv.style.display = 'none';
                // Recarga la página
                location.reload();
            });
        });
    </script>
@endsection
