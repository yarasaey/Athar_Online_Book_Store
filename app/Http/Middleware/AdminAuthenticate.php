<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // دي دالة بتناديها تلقائيًا لما حد مش مسجل دخول، وبتقول له: "روح على صفحة تسجيل الدخول".
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }
    }

    /**
     * دي أهم دالة، هي اللي بتتأكد إن المستخدم الأدمن بالفعل مسجل دخوله.
     * لو مش كده، ترجع له رسالة "أنت مش مسجل دخول" أو تحوّله.
     */
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('admin')->check()) {
            $this->auth->shouldUse('admin');
            return;
        }

        $this->unauthenticated($request, ['admin']);
    }
}


