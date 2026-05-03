//console.log('JS COTIshow');
jQuery = window.$;

const confirmModal = document.getElementById('confirmActionModal');

$(document).ready(function () {

  if (confirmModal) {
      confirmModal.addEventListener('show.bs.modal', function (event) {
          const button = event.relatedTarget; // Botón que activó el modal
          //console.log(event);
          //console.log(event.relatedTarget);
          // Extraer info de los atributos data-
          const nombre = button.getAttribute('data-nombre');
          const actionUrl = button.getAttribute('data-action-url'); // La ruta completa de Laravel
          const type = button.getAttribute('data-type');

          // Elementos del modal
          const form = document.getElementById('actionForm');
          const title = document.getElementById('actionTitle');
          const message = document.getElementById('actionMessage');
          const confirmBtn = document.getElementById('confirmActionBtn');
          const header = document.getElementById('modalHeaderColor');
          const methodPlaceholder = document.getElementById('methodPlaceholder');

          // Asignar la URL directamente (Laravel ya incluyó el localhost/proyecto/public)
          form.action = actionUrl;

          if (type === 'eliminar') {
              title.innerText = 'Eliminar Pedido';
              message.innerHTML = `¿Realmente deseas borrar permanentemente el <b>${nombre}</b>?`;
              header.className = 'modal-header bg-danger text-white';
              confirmBtn.className = 'btn btn-danger px-4';
              methodPlaceholder.innerHTML = ''; // Tu ruta es POST según lo que enviaste
          } else {
              title.innerText = 'Anular Pedido';
              message.innerHTML = `¿Marcar el <b>${nombre}</b> como anulado?`;
              header.className = 'modal-header bg-warning text-dark';
              confirmBtn.className = 'btn btn-warning px-4 text-dark';
              // Si la ruta de cancelar es PATCH o PUT, lo agregamos aquí:
              methodPlaceholder.innerHTML = '<input type="hidden" name="_method" value="post">';
          }
      });
  }

});
