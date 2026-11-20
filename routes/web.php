<?php

use Illuminate\Support\Facades\Route;

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