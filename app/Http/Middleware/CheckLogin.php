<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }else
        if (Auth::check()) {
            // Lấy ID của người dùng hiện tại
            $userId = Auth::id();
            
            // Tạo session ID duy nhất dựa trên ID của người dùng
            $sessionId = 'user_' . $userId;

            // Thiết lập session ID
            session_id($sessionId);
            return $next($request);
        }
        
    }
}
