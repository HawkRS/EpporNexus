@extends('layouts.vertical',['title' => 'Ferreteria'])

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Inventario', 'title' => 'Ferreteria'])

<div class="row">
      <script> var articulos = {!! json_encode(articulos) !!}; </script>

  <!-- Contenedor principal de la aplicación Alpine -->
    <div class="col-md-10" x-data="inventoryManager()">

        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Control de Inventario de Ferretería</h4>

                <!-- Campo de Búsqueda -->
                <div class="mb-4">
                    <input x-model="searchTerm" type="text" placeholder="Buscar por Nombre, Código o Categoría..."
                           class="form-control form-control-lg" style="border-radius: 6px;">
                </div>

                <!-- Iteración por Categorías -->
                <template x-for="(products, category) in filteredInventory" :key="category">
                    <div class="mb-5 border rounded shadow-sm">
                        <div class="p-3 bg-light border-bottom">
                            <h5 class="mb-0 text-primary fw-bold"
                                x-text="category + ' (' + products.length + ' artículos)'">
                            </h5>
                        </div>

                        <!-- Tabla de Productos -->
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 10%;">Código</th>
                                        <th style="width: 30%;">Nombre</th>
                                        <th style="width: 10%;">Cantidad</th>
                                        <th style="width: 10%;">U. Medida</th>
                                        <th style="width: 15%;">Costo Unitario</th>
                                        <th style="width: 15%;">Precio Venta</th>
                                        <th style="width: 10%; text-align: center;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Fila del Producto -->
                                    <template x-for="product in products" :key="product.id">
                                        <tr>
                                            <td class="px-3 py-2 text-muted" x-text="product.codigo"></td>
                                            <td class="px-3 py-2 fw-medium" x-text="product.nombre"></td>

                                            <!-- Columna Editable: Cantidad -->
                                            <td class="editable-cell" @dblclick="editItem(product, 'cantidad')">
                                                <span x-show="!product.editMode.cantidad" x-text="product.cantidad" class="editable-span"></span>
                                                <input x-show="product.editMode.cantidad"
                                                       type="number"
                                                       x-model.number="product.cantidad"
                                                       @keydown.enter="saveItem(product, 'inline')"
                                                       @blur="saveItem(product, 'inline')"
                                                       :autofocus="product.editMode.cantidad"
                                                       class="editable-input">
                                            </td>

                                            <td class="px-3 py-2" x-text="product.unidad_medida"></td>
                                            <td class="px-3 py-2" x-text="'$' + product.costo_unitario.toFixed(2)"></td>

                                            <!-- Columna Editable: Precio Venta -->
                                            <td class="editable-cell" @dblclick="editItem(product, 'precio_venta')">
                                                <span x-show="!product.editMode.precio_venta" x-text="'$' + product.precio_venta.toFixed(2)" class="editable-span"></span>
                                                <input x-show="product.editMode.precio_venta"
                                                       type="number"
                                                       step="0.01"
                                                       x-model.number="product.precio_venta"
                                                       @keydown.enter="saveItem(product, 'inline')"
                                                       @blur="saveItem(product, 'inline')"
                                                       :autofocus="product.editMode.precio_venta"
                                                       class="editable-input">
                                            </td>

                                            <!-- Botones de Acción -->
                                            <td class="px-3 py-2 text-center">
                                                <div class="btn-group" role="group">
                                                    <button
                                                        @click="openModal(product)"
                                                        class="btn btn-sm btn-outline-primary"
                                                        title="Editar todos los campos">
                                                        <i class="mdi mdi-pencil"></i> <!-- Usando MDI si tu tema lo tiene -->
                                                    </button>
                                                    <button
                                                        @click="openDeleteDialog(product)"
                                                        class="btn btn-sm btn-outline-danger"
                                                        title="Eliminar artículo">
                                                        <i class="mdi mdi-delete"></i> <!-- Usando MDI si tu tema lo tiene -->
                                                    </button>
                                                </div>
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

        <!-- Alerta de Notificación (estilo Bootstrap) -->
        <div x-show="message" x-transition.opacity x-cloak
             class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100;">
            <div class="alert alert-success shadow-lg" role="alert" x-text="message"></div>
        </div>

    </div>

</div>

<!-- MODAL DE EDICIÓN COMPLETA (Usamos x-teleport para moverlo fuera del flujo normal del DOM) -->
<template x-teleport="body">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
         x-show="isModalOpen" x-cloak
         x-trap="isModalOpen"
         @click.self="closeModal()"
         :class="{ 'show': isModalOpen }" :style="{ 'display': isModalOpen ? 'block' : 'none' }">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editModalLabel" x-text="'Editar Artículo: ' + (modalProduct.nombre || '')"></h5>
                    <button type="button" class="btn-close btn-close-white" @click="closeModal()" aria-label="Close"></button>
                </div>
                <form @submit.prevent="saveModalChanges()">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="modal-codigo" class="form-label">Código</label>
                            <input id="modal-codigo" type="text" x-model="modalProduct.codigo" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="modal-nombre" class="form-label">Nombre</label>
                            <input id="modal-nombre" type="text" x-model="modalProduct.nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="modal-cantidad" class="form-label">Cantidad</label>
                            <input id="modal-cantidad" type="number" x-model.number="modalProduct.cantidad" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="modal-costo" class="form-label">Costo Unitario ($)</label>
                            <input id="modal-costo" type="number" step="0.01" x-model.number="modalProduct.costo_unitario" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="modal-precio" class="form-label">Precio Venta ($)</label>
                            <input id="modal-precio" type="number" step="0.01" x-model.number="modalProduct.precio_venta" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="modal-unidad" class="form-label">Unidad de Medida</label>
                            <select id="modal-unidad" x-model="modalProduct.unidad_medida" class="form-select">
                                <option value="unidad">unidad</option>
                                <option value="juego">juego</option>
                                <option value="par">par</option>
                                <option value="rollo">rollo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="closeModal()">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<!-- MODAL DE CONFIRMACIÓN DE ELIMINACIÓN -->
<template x-teleport="body">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true"
         x-show="isDeleteDialogOpen" x-cloak
         x-trap="isDeleteDialogOpen"
         @click.self="closeDeleteDialog()"
         :class="{ 'show': isDeleteDialogOpen }" :style="{ 'display': isDeleteDialogOpen ? 'block' : 'none' }">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close btn-close-white" @click="closeDeleteDialog()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Está **seguro** de eliminar el artículo
                       <span class="fw-bold text-danger" x-text="dialogProduct.nombre"></span>
                       (Cód: <span x-text="dialogProduct.codigo"></span>)?</p>
                    <p class="mt-2 text-muted small">Esta acción es irreversible y requiere confirmación.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeDeleteDialog()">Cancelar</button>
                    <button type="button" class="btn btn-danger" @click="confirmDelete()">Sí, Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</template>

@endsection

@section('scripts')
@vite(['resources/js/nexus/ferreteria.js'])
@endsection