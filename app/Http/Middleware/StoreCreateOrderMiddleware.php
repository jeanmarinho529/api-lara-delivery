<?php

namespace App\Http\Middleware;

use App\Models\Status;
use App\Models\Store\Store;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StoreCreateOrderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization');

        $store = Cache::rememberForever('store.api_key.' . $header, function () use ($header) {
            return Store::where('api_key', $header)->first();
        });

        if (is_null($header) || is_null($store)) {
            return response()->json(['message' => 'Unauthorized. Your Authorization is not valid.'], 401);
        }

        if ($store->status_id !== Status::ACTIVE) {
            return response()->json(['message' => 'Store is not authorized to perform this action.'], 403);
        }

        return $next($request);
    }
}
