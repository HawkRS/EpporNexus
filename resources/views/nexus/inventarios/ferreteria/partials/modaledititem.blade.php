<div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 hidden z-50 transition-opacity duration-300">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white w-full max-w-lg mx-auto rounded-xl shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:p-6">

            <!-- Encabezado del Modal -->
            <div class="border-b pb-4 mb-4 flex justify-between items-center">
                <h3 id="modalTitle" class="text-xl font-bold text-indigo-700"></h3>
                <button type="button" id="closeModalBtn" class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Formulario de Edición -->
            <form id="editForm" method="POST" action="{{ route('ferreteria.update', ['ferreteria' => 'ID_PLACEHOLDER']) }}">
                @csrf
                <!-- IMPORTANTE: Spoofing del método para PATCH/PUT en Laravel -->
                @method('PUT')

                <input type="hidden" name="id" id="editId">

                <!-- Campo Nombre -->
                <div class="mb-4">
                    <label for="editNombre" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                    <input type="text" name="nombre" id="editNombre" required
                           class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Campo Stock -->
                <div class="mb-4">
                    <label for="editStock" class="block text-sm font-medium text-gray-700">Stock Actual</label>
                    <input type="number" name="stock" id="editStock" required
                           class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Campo Precio -->
                <div class="mb-6">
                    <label for="editPrecio" class="block text-sm font-medium text-gray-700">Precio Unitario</label>
                    <input type="number" name="precio" id="editPrecio" step="0.01" required
                           class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Botón de Envío -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-150 transform hover:scale-[1.01]">
                        Guardar Cambios
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
