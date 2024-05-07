<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $type
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type)
    {
        if (!Auth::check()) {
            // If the user is not logged in, redirect to the login page.
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Check if the user has the specified type. Adjust this logic based on your application's needs.
        if ($user->type !== $type) {
            // Optionally, return a 403 Forbidden response or redirect to a different page.
            abort(403, 'You do not have access to this page.');
        }

        return $next($request);
    }
}
