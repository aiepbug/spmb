<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
function bulan($x)
{
	if($x=='January'){return 'Januari';}
	else if($x=='February'){return 'Februari';}
	else if($x=='March'){return 'Maret';}
	else if($x=='April'){return 'April';}
	else if($x=='May'){return 'Mei';}
	else if($x=='June'){return 'Juni';}
	else if($x=='July'){return 'Juli';}
	else if($x=='Augustus'){return 'Agustus';}
	else if($x=='September'){return 'September';}
	else if($x=='October'){return 'Oktober';}
	else if($x=='November'){return 'November';}
	else if($x=='December'){return 'Desember';}
	else {return $x;}
}
function hari($x)
{
	if($x=='Sunday'){return 'Minggu';}
	else if($x=='Monday'){return 'Senin';}
	else if($x=='Tuesday'){return 'Selasa';}
	else if($x=='Wednesday'){return 'Rabu';}
	else if($x=='Thursday'){return 'Kamis';}
	else if($x=='Friday'){return 'Jumat';}
	else if($x=='Saturday'){return 'Sabtu';}
	else {return $x;}
}
