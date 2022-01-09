<?php

/* INTERFAZ DE KERNEL */
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

/* DEFINEIX CONSTANT QUE UTILITZA MES ENVANT */
define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

/* AQUI MIRA SI EL PROJECTE ESTA EN MANTENIMENT
En cas de que existesqui el fitxer maintenance.php l'inclou amb el require.
 */
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

/* AQUI ES FA EL REGISTRE DE L'AUTOLOAD.
AQUEST ARCHIU ES TROBA DINS EL DIRECTORI VENDOR I S'ANOMENA autoload.php
ES L'ENCARREGAT DE CARREGAR TOTES LES DEPENDENCIES. (AUTOCARREGA DE CLASSES)
*/
require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

/* S'EXECUTA L'APLICACIO */
/* Es defineix la variable app fent un requireonce de larchiu app.php i aixo seria l'instancia de la nostra aplicació. ($app) */
$app = require_once __DIR__.'/../bootstrap/app.php';

/* AQUI ES CREA EL KERNEL
ES CREA MITJANÇANT EL CONTRACTE KERNEL I DEPENENT SI ESTAM ATENEN UNA PETICIO HTTP O UNA DE CONSOLA (DOS KERNELS DIFERENTS) ES CREARA
UN KERNEL O UN ALTRE
 */
$kernel = $app->make(Kernel::class);

/* DESPRES DE OBTENIR EL KERNEL ENTRA UN REQUEST DINS LARAVEL I AQUEST REQUEST EL GESTIONA LARAVEL PER DESPRES GENERAR UNA RESPONSE
CAPTURA EL REQUEST I RETORNA UNA RESPONSE */
$response = $kernel->handle(
    $request = Request::capture()
)->send();

/* FINALMENT LARAVEL EL QUE HA DE FER UTILITZANT EL KERNEL ADEQUAT ES ACABAR LA PETICIO UTILITZANT EL REQUEST I RESPONSE */
$kernel->terminate($request, $response);
