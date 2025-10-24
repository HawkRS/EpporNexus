<?php




use Illuminate\Support\Facades\Route;
// Asegúrate de importar todos los Controladores que usas
// Nota: La cantidad de '..' dependerá de la estructura de carpetas si no usas un RouteServiceProvider
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ImssController;
use App\Http\Controllers\DeclaracionController;
use App\Http\Controllers\IsnController;
use App\Http\Controllers\MovimientoCajaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\PagosController;

/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
|
| Laravel 11 usa la sintaxis [Controller::class, 'method'] en lugar de 'Controller@method'
|
*/

// Rutas de Autenticación - Auth::routes() sigue siendo válido para Laravel UI (o usa Breeze/Jetstream)
require __DIR__ . '/auth.php';

// =========================================================================
// RUTAS PÚBLICAS (ACCESIBLES SIN LOGIN)
// =========================================================================

Route::get('/', [HomeController::class, 'index'])->name('public.home');

Route::get('/industrial', [HomeController::class, 'industrial'])->name('public.industrial');
Route::get('/cocina', [HomeController::class, 'cocina'])->name('public.cocina');
Route::get('/mobiliario-urbano', [HomeController::class, 'mobiliario'])->name('public.urbano');

Route::get('/aviso-de-privacidad', [HomeController::class, 'aviso'])->name('public.aviso');
Route::post('/Contacto-mail', [HomeController::class, 'ContactoSend'])->name('public.mail.contact');
Route::post('/comederos', [HomeController::class, 'ContactoSend'])->name('public.contact'); // Duplicado, revisar si es intencional


Route::prefix('agropecuario')->group(function () {
    Route::get('/', [HomeController::class, 'agropecuario'])->name('public.agropecuario');
    Route::get('/comederos', [HomeController::class, 'comederos'])->name('public.comederos');
    Route::get('/implementos', [HomeController::class, 'implementos'])->name('public.implementos');
    Route::get('/jaulas', [HomeController::class, 'jaulas'])->name('public.jaulas');
    Route::get('/piso-porcicola', [HomeController::class, 'mallas'])->name('public.mallas');
    Route::get('/piso-plastico', [HomeController::class, 'slats'])->name('public.slats');
});

// =========================================================================
// RUTAS PROTEGIDAS (REQUIERE MIDDLEWARE 'auth')
// =========================================================================

Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard Admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // Contabilidad
    Route::prefix('contabilidad')->group(function () {
        Route::get('/balances', [ContaController::class, 'index'])->name('conta.index');
        Route::get('/{rfc}/', [ContaController::class, 'years'])->name('conta.years');
        Route::get('/{rfc}/{year}', [ContaController::class, 'show'])->name('conta.show');
        Route::post('/{rfc}/agregar-egreso', [ContaController::class, 'addegreso'])->name('conta.add.egreso');
        Route::get('/{rfc}/egresos/{id}/editar', [ContaController::class, 'editegreso'])->name('conta.edit.egreso');
        Route::post('/{rfc}/egresos/{id}/actualizar', [ContaController::class, 'updateegreso'])->name('conta.update.egreso');
        Route::post('/{rfc}/agregar-ingreso', [ContaController::class, 'addingreso'])->name('conta.add.ingreso');
        Route::get('/{rfc}/ingresos/{id}/editar', [ContaController::class, 'editingreso'])->name('conta.edit.ingreso');
        Route::post('/{rfc}/ingresos/{id}/actualizar', [ContaController::class, 'updateingreso'])->name('conta.update.ingreso');
        Route::get('/{rfc}/{year}/{month}', [ContaController::class, 'detail'])->name('conta.detail');
    });

    // Tareas
    Route::prefix('tareas')->group(function () {
        Route::get('/', [TareasController::class, 'index'])->name('tareas.index');
        Route::get('/crear', [TareasController::class, 'create'])->name('tareas.create');
        Route::post('/crear-guardar', [TareasController::class, 'store'])->name('tareas.store');
        Route::get('/detalle/{id}', [TareasController::class, 'show'])->name('tareas.show');
        Route::get('/editar/{id}', [TareasController::class, 'edit'])->name('tareas.edit');
        Route::post('/editar-guardar/{id}', [TareasController::class, 'update'])->name('tareas.update');
        Route::get('/completar/{id}', [TareasController::class, 'clear'])->name('tareas.clear');
    });

    // Productos
    Route::prefix('productos')->group(function () {
        Route::get('/', [ProductosController::class, 'index'])->name('product.list');
        Route::get('/detalle/{id}', [ProductosController::class, 'show'])->name('product.show');
        Route::get('alta', [ProductosController::class, 'create'])->name('product.create');
        Route::post('guardar', [ProductosController::class, 'store'])->name('product.store');
        Route::get('editar/{id}', [ProductosController::class, 'edit'])->name('product.edit');
        Route::post('actualizar/{id}', [ProductosController::class, 'update'])->name('product.update');
    });

    // Proveedores
    Route::prefix('proveedor')->group(function () {
        Route::get('/', [ProveedoresController::class, 'index'])->name('provee.index');
        Route::get('/alta', [ProveedoresController::class, 'create'])->name('provee.create');
        Route::get('/detalle/{id}', [ProveedoresController::class, 'show'])->name('provee.show');
        Route::post('/guardar', [ProveedoresController::class, 'store'])->name('provee.store');
        Route::get('/editar/{id}', [ProveedoresController::class, 'edit'])->name('provee.edit');
        Route::post('/actualizar/{id}', [ProveedoresController::class, 'update'])->name('provee.update');
    });

    // Persona (Controlador 'ProveedoresController' usado aquí, revisar si es correcto)
    Route::prefix('persona')->group(function () {
        Route::get('alta', [ProveedoresController::class, 'create'])->name('persona.create');
        Route::post('guardar', [ProveedoresController::class, 'store'])->name('persona.store');
        Route::get('editar/{id}', [ProveedoresController::class, 'editpersona'])->name('persona.edit');
        Route::post('actualizar/{id}', [ProveedoresController::class, 'updatepersona'])->name('persona.update');
    });

    // Clientes
    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClientesController::class, 'index'])->name('cliente.index');
        Route::get('/alta', [ClientesController::class, 'create'])->name('cliente.create');
        Route::get('/detalle/{id}', [ClientesController::class, 'show'])->name('cliente.show');
        Route::post('/guardar', [ClientesController::class, 'store'])->name('cliente.store');
        Route::get('/editar/{id}', [ClientesController::class, 'edit'])->name('cliente.edit');
        Route::post('/actualizar/{id}', [ClientesController::class, 'update'])->name('cliente.update');
    });

    // Empleados
    Route::prefix('empleados')->group(function () {
        Route::get('/lista', [EmpleadoController::class, 'list'])->name('employees.list');
        Route::post('crear', [EmpleadoController::class, 'store'])->name('employees.store');
        // REVISAR: Dos rutas con el mismo path '/detalle/{id}' y diferente método, solo una puede ser GET
        Route::get('/editar/{id}', [EmpleadoController::class, 'show'])->name('employees.show');
        Route::get('/detalle/{id}', [EmpleadoController::class, 'edit'])->name('employees.edit');
        // REVISAR: Esta ruta usa GET para una acción que suena a PUT/PATCH, y comparte path
        Route::get('/detalle/{id}', [EmpleadoController::class, 'update'])->name('employees.update');
        Route::get('/eliminar/{id}', [EmpleadoController::class, 'delete'])->name('employees.delete');
    });

    // IMSS
    Route::prefix('imss')->group(function () {
        Route::get('/lista', [ImssController::class, 'index'])->name('imss.index');
        Route::get('/alta', [ImssController::class, 'create'])->name('imss.create');
        Route::post('/guardar', [ImssController::class, 'store'])->name('imss.store');
        Route::get('/detalle/{id}', [ImssController::class, 'show'])->name('imss.show');
        Route::get('/editar/{id}', [ImssController::class, 'edit'])->name('imss.edit');
        Route::put('/actualizar/{id}', [ImssController::class, 'update'])->name('imss.update'); // PUT
        Route::post('/eliminar/{id}', [ImssController::class, 'delete'])->name('imss.delete');
    });

    // Declaraciones
    Route::prefix('declaraciones')->group(function () {
        Route::get('/lista', [DeclaracionController::class, 'index'])->name('declaracion.index');
        Route::get('/alta', [DeclaracionController::class, 'create'])->name('declaracion.create');
        Route::post('/guardar', [DeclaracionController::class, 'store'])->name('declaracion.store');
        Route::get('/detalle/{id}', [DeclaracionController::class, 'show'])->name('declaracion.show');
        Route::get('/editar/{id}', [DeclaracionController::class, 'edit'])->name('declaracion.edit');
        Route::put('/actualizar/{id}', [DeclaracionController::class, 'update'])->name('declaracion.update'); // PUT
        Route::post('/eliminar/{id}', [DeclaracionController::class, 'delete'])->name('declaracion.delete');
    });

    // ISN
    Route::prefix('isn')->group(function () {
        Route::get('/lista', [IsnController::class, 'index'])->name('isn.index');
        Route::get('/alta', [IsnController::class, 'create'])->name('isn.create');
        Route::post('/guardar', [IsnController::class, 'store'])->name('isn.store');
        Route::get('/detalle/{id}', [IsnController::class, 'show'])->name('isn.show');
        Route::get('/editar/{id}', [IsnController::class, 'edit'])->name('isn.edit');
        Route::put('/actualizar/{id}', [IsnController::class, 'update'])->name('isn.update'); // PUT
        Route::post('/eliminar/{id}', [IsnController::class, 'delete'])->name('isn.delete');
    });

    // Caja Chica
    Route::prefix('caja-chica')->group(function () {
        Route::get('/', [MovimientoCajaController::class, 'detalle'])->name('movimientos.index');
        Route::get('/alta', [MovimientoCajaController::class, 'create'])->name('movimientos.create');
        Route::post('/guardar', [MovimientoCajaController::class, 'store'])->name('movimientos.store');
        Route::get('/detalle/{id}', [MovimientoCajaController::class, 'show'])->name('movimientos.show');
        Route::get('/editar/{id}', [MovimientoCajaController::class, 'edit'])->name('movimientos.edit');
        Route::put('/actualizar/{id}', [MovimientoCajaController::class, 'update'])->name('movimientos.update'); // PUT
        Route::post('/eliminar/{id}', [MovimientoCajaController::class, 'delete'])->name('movimientos.delete');
    });

    // Pedidos
    Route::prefix('pedidos')->group(function () {
        Route::get('/', [PedidoController::class, 'index'])->name('pedidos.index');
        Route::get('/alta', [PedidoController::class, 'create'])->name('pedidos.create');
        Route::post('/guardar', [PedidoController::class, 'store'])->name('pedidos.store');
        Route::get('/detalle/{id}', [PedidoController::class, 'show'])->name('pedidos.show');
        Route::get('/editar/{id}', [PedidoController::class, 'edit'])->name('pedidos.edit');
        Route::put('/actualizar/{id}', [PedidoController::class, 'update'])->name('pedidos.update'); // PUT
        Route::post('/eliminar/{id}', [PedidoController::class, 'delete'])->name('pedidos.delete');
        Route::post('/{id}/pdf', [PedidoController::class, 'generarPDF'])->name('pedidos.pdf');
        Route::post('/{id}/agregar-guia', [PedidoController::class, 'addGuia'])->name('pedidos.addguia');
        Route::get('/{id}/editar-fecha', [PedidoController::class, 'editdate'])->name('pedidos.editdate');
        Route::post('/{id}/guardar_fecha', [PedidoController::class, 'storedate'])->name('pedidos.storedate');
        Route::post('/{id}/actualizar-estatus', [PedidoController::class, 'updatestatus'])->name('pedidos.updatestatus');
        Route::post('/{id}/pdfpaqueteria', [PedidoController::class, 'generarPDFPaqueteria'])->name('pedidos.pdfpaqueteria');
    });

    // Cotizaciones
    Route::prefix('cotizaciones')->group(function () {
        Route::get('/', [CotizacionesController::class, 'index'])->name('cotizacion.index');
        Route::get('/alta', [CotizacionesController::class, 'create'])->name('cotizacion.create');
        Route::post('/guardar', [CotizacionesController::class, 'store'])->name('cotizacion.store');
        Route::get('/detalle/{id}', [CotizacionesController::class, 'show'])->name('cotizacion.show');
        Route::get('/editar/{id}', [CotizacionesController::class, 'edit'])->name('cotizacion.edit');
        Route::put('/actualizar/{id}', [CotizacionesController::class, 'update'])->name('cotizacion.update'); // PUT
        Route::post('/eliminar/{id}', [CotizacionesController::class, 'delete'])->name('cotizacion.delete');
        Route::post('/{id}/pdf', [CotizacionesController::class, 'generarPDF'])->name('cotizacion.pdf');
        Route::post('/{id}/pedido', [CotizacionesController::class, 'generarPedido'])->name('cotizacion.pedido');
    });

    // Pagos
    Route::prefix('pagos')->group(function () {
        Route::post('/guardar', [PagosController::class, 'store'])->name('pagos.store');
        Route::put('/actualizar/{pagos}', [PagosController::class, 'update'])->name('pagos.update'); // PUT
        Route::post('/eliminar/{pagos}', [PagosController::class, 'delete'])->name('pagos.delete');
        Route::get('/{id}/pdf', [PagosController::class, 'generarPDF'])->name('pagos.pdf');
    });
}); //END ADMIN GROUP




/*
|--------------------------------------------------------------------------
| Rutas Protegidas (Requiere 'auth' middleware)
|--------------------------------------------------------------------------
| Un usuario debe haber iniciado sesión para acceder a cualquiera de estas rutas.
| Aquí quedan tus rutas dinámicas "catch-all".
*/
