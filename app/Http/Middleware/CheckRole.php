<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('admin.login');
        }

        $currentRole = strtolower((string) $user->role);
        $allowedRoles = array_map('strtolower', $roles);

        if (in_array($currentRole, $allowedRoles, true)) {
            return $next($request);
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('error', 'Anda tidak memiliki izin untuk mengakses halaman tersebut.');
    }
}