<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/ai', function () {
    return view('ai');
});

Route::get('/connection', function () {
    try {
        // 1. Check server & database connection
        DB::connection()->getPdo();
        DB::select('SELECT 1');

        // 2. Query all rows directly from the `users` table
        $users = DB::table('users')
            ->select([
                'id',
                'name',
                'email',
                'email_verified_at',
                'created_at',
                'updated_at',
            ])
            ->get();

        return response()->json([
            'status'    => 'ok',
            'server'    => [
                'php_version' => PHP_VERSION,
                'app_env'     => app()->environment(),
                'db_database' => DB::connection()->getDatabaseName(),
                'timestamp'   => now()->toIso8601String(),
            ],
            'count'     => $users->count(),
            'users'     => $users,
        ], 200);
    } catch (\Throwable $e) {
        return response()->json([
            'status'  => 'error',
            'message' => 'Failed to connect to server or query users table.',
            'error'   => config('app.debug') ? $e->getMessage() : 'Internal server error',
        ], 500);
    }
});

Route::post('/run-migrations', function (Request $request) {
    $expectedToken = config('services.deploy.migrate_token');
    $providedToken = $request->bearerToken();

    if (! is_string($expectedToken) || $expectedToken === '' || ! is_string($providedToken) || ! hash_equals($expectedToken, $providedToken)) {
        return response()->json([
            'status'  => 'unauthorized',
            'message' => 'Invalid or missing bearer token.',
        ], 401);
    }

    try {
        Artisan::call('config:clear');
        Artisan::call('migrate', ['--force' => true]);

        return response()->json([
            'status' => 'ok',
            'output' => Artisan::output(),
        ], 200);
    } catch (\Throwable $e) {
        return response()->json([
            'status'  => 'error',
            'message' => $e->getMessage(),
        ], 500);
    }
});