<?php

use App\Http\Controllers\AnioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DescripcioneController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstadoVehiculoController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\VehiculoDetalleController;
use App\Http\Controllers\VehiculoPrecioController;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return  Redirect::route('login');
});
Route::get('/ajax/modelos/{marca}', [VehiculoController::class, 'getModelos'])->name('ajax.getModelos');
Route::get('/ajax/descripciones/{modelo}', [VehiculoController::class, 'getDescripciones'])->name('ajax.getDescripciones');
Route::get('/ajax/anios/{descripcion}', [VehiculoController::class, 'getAnios'])->name('ajax.getAnios');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    Auth::logout();
    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? Redirect::route('login')
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::post('/reset-password', function (Request $request) {


    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        return view('dashboard');
    })->name('dashboard');

    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('estado-vehiculos', EstadoVehiculoController::class);
    Route::resource('vehiculos', VehiculoController::class)->names('vehiculos');
    Route::get('vehiculos/estado/{vehiculo}', [VehiculoController::class, 'updateEstado'])->name('vehiculos.updateEstado');
    Route::get('vehiculos/precios/{vehiculo}', [VehiculoController::class, 'precio'])->name('vehiculos.precio');
    Route::get('vehiculos/avaluo/{vehiculo}', [VehiculoController::class, 'avaluo'])->name('vehiculos.avaluo');
    Route::get('vehiculos/oferta/{vehiculo}', [VehiculoController::class, 'oferta'])->name('vehiculos.oferta');
    Route::resource('vehiculo-detalles', VehiculoDetalleController::class);
    Route::post('/vehiculo-detalles/batch-update', [VehiculoDetalleController::class, 'batchUpdate'])->name('vehiculo-detalles.batchUpdate');
    Route::resource('vehiculo-precios', VehiculoPrecioController::class);
    Route::resource('clientes', ClienteController::class)->names('clientes');
    Route::resource('empresas', EmpresaController::class)->names('empresas');
    Route::resource('users', UserController::class);
    Route::resource('permisos', PermisoController::class);
    Route::resource('detalles', DetalleController::class);
    Route::resource('marcas', MarcaController::class);
    Route::resource('modelos', ModeloController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('descripciones', DescripcioneController::class);
    Route::resource('anios', AnioController::class);
});
