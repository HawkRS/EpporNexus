@extends('layouts.vertical',['title' => 'Ferreteria'])

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Inventario', 'title' => 'Ferreteria'])

<div class="row">

  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">Pedidos activos</h4>

        <header class="mb-4 d-flex justify-content-between align-items-center">
            <h1>Inventario de Ferretería</h1>

            <div class="d-flex align-items-center">
                <div x-show="isLoading" class="spinner-border text-primary me-3" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
                <button @click="fetchInventory()" :disabled="isLoading" class="btn btn-primary d-flex align-items-center">
                    <i class="bi bi-arrow-clockwise me-1"></i> Refrescar
                </button>
            </div>
        </header>

        {{-- Barra de Búsqueda --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input
                        type="text"
                        x-model="searchTerm"
                        placeholder="Buscar por código, nombre o categoría..."
                        class="form-control"
                    >
                </div>
            </div>
        </div>

        {{-- Contenedor de la Tabla --}}
    <div class="card shadow-lg">
        <div class="card-body p-0">

            {{-- Mensaje de Inventario Vacío --}}
            <div x-show="Object.keys(filteredInventory).length === 0 && !isLoading" class="alert alert-info m-4" role="alert">
                No se encontraron artículos que coincidan con la búsqueda.
            </div>

            <template x-for="(products, category) in filteredInventory" :key="category">
                <div class="mb-4 border-bottom">
                    {{-- Título de Categoría --}}
                    <h5 class="bg-light text-primary p-3 mb-0 border-bottom" x-text="category"></h5>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr class="text-uppercase small">
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col" class="text-center">Unidad</th>
                                    <th scope="col" class="text-end">Costo</th>
                                    <th scope="col" class="text-end">Precio Venta</th>
                                    <th scope="col" class="text-center">Cantidad</th>
                                    <th scope="col" class="text-end d-none d-md-table-cell">Margen</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="product in products" :key="product.id">
                                    <tr>
                                        {{-- Código --}}
                                        <td x-text="product.codigo" class="align-middle"></td>

                                        {{-- Nombre --}}
                                        <td x-text="product.nombre" class="align-middle"></td>

                                        {{-- Unidad --}}
                                        <td x-text="product.unidad_medida" class="text-center align-middle"></td>

                                        {{-- Costo Unitario --}}
                                        <td x-text="formatCurrency(product.costo_unitario)" class="text-end align-middle text-muted"></td>

                                        {{-- Precio Venta (Editable) --}}
                                        <td class="text-end align-middle">
                                            <div x-show="!product.editMode.precio_venta"
                                                 @dblclick="editItem(product, 'precio_venta')"
                                                 class="fw-bold text-success cursor-pointer p-1 rounded hover-bg-light"
                                                 x-text="formatCurrency(product.precio_venta)">
                                            </div>
                                            <input x-show="product.editMode.precio_venta"
                                                   type="number"
                                                   step="0.01"
                                                   :data-id="product.id"
                                                   data-field="precio_venta"
                                                   x-model.number="product.precio_venta"
                                                   @blur="saveItem(product, 'precio_venta')"
                                                   @keyup.enter="$event.target.blur()"
                                                   class="form-control form-control-sm text-end"
                                            >
                                        </td>

                                        {{-- Cantidad (Editable) --}}
                                        <td class="text-center align-middle">
                                            <div x-show="!product.editMode.cantidad"
                                                 @dblclick="editItem(product, 'cantidad')"
                                                 class="cursor-pointer p-1 rounded hover-bg-light"
                                                 x-text="product.cantidad">
                                            </div>
                                            <input x-show="product.editMode.cantidad"
                                                   type="number"
                                                   step="1"
                                                   :data-id="product.id"
                                                   data-field="cantidad"
                                                   x-model.number="product.cantidad"
                                                   @blur="saveItem(product, 'cantidad')"
                                                   @keyup.enter="$event.target.blur()"
                                                   class="form-control form-control-sm text-center"
                                            >
                                        </td>

                                        {{-- Margen --}}
                                        <td x-text="calculateMargin(product.precio_venta, product.costo_unitario)" class="text-end align-middle text-info d-none d-md-table-cell"></td>

                                        {{-- Acciones --}}
                                        <td class="text-center align-middle">
                                            <button @click="openDeleteDialog(product)" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </template>
        </div>
    </div>

    {{-- Alerta de Notificación (Mensaje del servidor) --}}
    <div x-cloak x-show="message" x-transition.opacity class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080;">
        <div
            :class="{'alert-success': messageType === 'success', 'alert-danger': messageType === 'danger', 'alert-info': messageType === 'info'}"
            class="alert shadow-sm"
            role="alert"
            x-text="message"
        ></div>
    </div>

    {{-- MODAL DE CONFIRMACIÓN DE ELIMINACIÓN (Bootstrap Modal) --}}
    <div x-ref="deleteModal" class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" @click.self="closeDeleteDialog()">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close btn-close-white" @click="closeDeleteDialog()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center mb-4">
                        ¿Estás seguro de eliminar <br>
                        <strong x-text="dialogProduct.nombre"></strong>?
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" @click="closeDeleteDialog()">Cancelar</button>
                    <button type="button" class="btn btn-danger" @click="confirmDelete()" :disabled="isLoading">
                        Sí, Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>

      </div>
    </div>
  </div>

</div>

@endsection