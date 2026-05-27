<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

Route::post('/__migrate', function (Request $request) {
    if ($request->input('token') !== 'dennyexpress_migrate_2026') {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $result = Artisan::call('migrate', ['--force' => true]);
    return response()->json([
        'exit_code' => $result,
        'output' => Artisan::output(),
    ]);
});

Route::post('/__seed', function (Request $request) {
    if ($request->input('token') !== 'dennyexpress_migrate_2026') {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $result = Artisan::call('db:seed', [
        '--force' => true,
        '--class' => 'ProductSeeder',
    ]);
    return response()->json([
        'exit_code' => $result,
        'output' => Artisan::output(),
    ]);
});
