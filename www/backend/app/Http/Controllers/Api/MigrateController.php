<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MigrateController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        $status = Artisan::call('migrate:status');
        $arrayOutput = explode("\n", Artisan::output());
        return [
            'status' => $status,
            'output' => $arrayOutput,
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function migrate(Request $request): array
    {
        return [
            'success' => Artisan::call('migrate'),
            'output' => Artisan::output(),
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function rollback(Request $request): array
    {
        return [
            'success' => Artisan::call('migrate:rollback'),
            'output' => Artisan::output(),
        ];
    }
}
