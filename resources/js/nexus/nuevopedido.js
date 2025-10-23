
jQuery = window.$;

$(document).ready(function () {
  //console.log('Módulo de pedidos cargado');


  // Asegúrate de que la lista de productos esté cargada
  var productosDisponibles = window.productosDisponibles || [];
  if (productosDisponibles.length === 0) {
      console.warn("La lista de productos está vacía. Asegúrate de que 'window.productosDisponibles' tenga datos.");
  }

  // Referencias a los elementos HTML
  var productosContainer = document.getElementById('productos-container');
  var totalInput = document.getElementById('total');
  var agregarProductoBtn = document.getElementById('agregar-producto');
  var total = 0;

  // Agregar evento al botón para añadir productos
  if (agregarProductoBtn) {
      agregarProductoBtn.addEventListener('click', function() {
          agregarProducto();
      });
  }

  function agregarProducto() {
      // Crear un nuevo div para el producto con clases de Bootstrap
      let productoDiv = document.createElement('div');
      productoDiv.classList.add('producto', 'row', 'mb-3');

      // Select para elegir el producto
      let productoSelectDiv = document.createElement('div');
      productoSelectDiv.classList.add('col-md-4');
      let productoSelectLabel = document.createElement('label');
      productoSelectLabel.innerText = 'Producto';
      let productoSelect = document.createElement('select');
      productoSelect.name = 'producto[]';
      productoSelect.classList.add('form-control');
      productoSelect.required = true;

      // Agregar opciones al select
      productosDisponibles.forEach(function(producto) {
          let option = document.createElement('option');
          option.value = producto.id;
          option.setAttribute('data-precio', producto.precio); // Guardar el precio en un atributo
          option.innerText = producto.nombre; // Mostrar el nombre del producto
          productoSelect.appendChild(option);
      });

      productoSelectDiv.appendChild(productoSelectLabel);
      productoSelectDiv.appendChild(productoSelect);
      productoDiv.appendChild(productoSelectDiv);

      // Input para cantidad
      let cantidadDiv = document.createElement('div');
      cantidadDiv.classList.add('col-md-2');
      let cantidadLabel = document.createElement('label');
      cantidadLabel.innerText = 'Cantidad';
      let cantidadInput = document.createElement('input');
      cantidadInput.type = 'number';
      cantidadInput.name = 'cantidad[]';
      cantidadInput.classList.add('form-control');
      cantidadInput.value = 1;
      cantidadInput.min = 1;
      cantidadDiv.appendChild(cantidadLabel);
      cantidadDiv.appendChild(cantidadInput);
      productoDiv.appendChild(cantidadDiv);

      // Input para precio
      let precioDiv = document.createElement('div');
      precioDiv.classList.add('col-md-3');
      let precioLabel = document.createElement('label');
      precioLabel.innerText = 'Costo';
      let precioInput = document.createElement('input');
      precioInput.type = 'number';
      precioInput.step = '0.01';
      precioInput.name = 'precio[]';
      precioInput.classList.add('form-control');
      precioInput.value = productoSelect.options[productoSelect.selectedIndex]?.getAttribute('data-precio') || 0;
      precioInput.min = 0;
      precioDiv.appendChild(precioLabel);
      precioDiv.appendChild(precioInput);
      productoDiv.appendChild(precioDiv);

      // Input para descuento
      let descuentoDiv = document.createElement('div');
      descuentoDiv.classList.add('col-md-2');
      let descuentoLabel = document.createElement('label');
      descuentoLabel.innerText = 'Descuento';
      let descuentoInput = document.createElement('input');
      descuentoInput.type = 'number';
      descuentoInput.name = 'descuento[]';
      descuentoInput.classList.add('form-control');
      descuentoInput.value = 0;
      descuentoInput.min = 0;
      descuentoDiv.appendChild(descuentoLabel);
      descuentoDiv.appendChild(descuentoInput);
      productoDiv.appendChild(descuentoDiv);

      // Botón para eliminar el producto
      let eliminarDiv = document.createElement('div');
      eliminarDiv.classList.add('col-md-1', 'd-flex', 'align-items-end');
      let eliminarBtn = document.createElement('button');
      eliminarBtn.type = 'button';
      eliminarBtn.classList.add('btn', 'btn-danger');
      eliminarBtn.innerHTML = "<i class='fas fa-trash-alt'></i>";
      eliminarDiv.appendChild(eliminarBtn);
      productoDiv.appendChild(eliminarDiv);

      // Añadir el producto al contenedor
      productosContainer.appendChild(productoDiv);

      // Eventos para actualizar el total
      productoSelect.addEventListener('change', function() {
          actualizarPrecio(productoSelect, precioInput);
      });
      cantidadInput.addEventListener('input', recalcularTotal);
      precioInput.addEventListener('input', recalcularTotal);
      descuentoInput.addEventListener('input', recalcularTotal);
      eliminarBtn.addEventListener('click', function() {
          productosContainer.removeChild(productoDiv);
          recalcularTotal();
      });

      recalcularTotal();
  }

  // Función para actualizar el precio al cambiar el producto seleccionado
  function actualizarPrecio(select, precioInput) {
      let precio = select.options[select.selectedIndex]?.getAttribute('data-precio') || 0;
      precioInput.value = parseFloat(precio).toFixed(2);
      recalcularTotal();
  }

  // Función para recalcular el total
  function recalcularTotal() {
      total = 0;
      productosContainer.querySelectorAll('.producto').forEach(function(productoDiv) {
          let cantidad = parseInt(productoDiv.querySelector('input[name="cantidad[]"]').value) || 0;
          let precio = parseFloat(productoDiv.querySelector('input[name="precio[]"]').value) || 0;
          let descuento = parseFloat(productoDiv.querySelector('input[name="descuento[]"]').value) || 0;
          total += (cantidad * precio) - descuento;
      });
      totalInput.value = total.toFixed(2);
  }

      $(document).ready(function() {
      $('.editPagoBtn').click(function() {
        let id = $(this).data('id');
        let editUrl = route('pagos.update', id);
        console.log(editUrl);
        $('#editPagoForm').attr('action', editUrl);
          $('#editFecha').val($(this).data('fecha'));
          $('#editMetodo').val($(this).data('metodo'));
          $('#editBanco').val($(this).data('banco'));
          $('#editMonto').val($(this).data('monto'));
      });

      $('.deletePagoBtn').click(function(e) {
          e.preventDefault();
          if (confirm('¿Estás seguro de eliminar este pago? Esta acción no se puede deshacer.')) {
              $(this).closest('form').submit();
          }
      });
  });
});

