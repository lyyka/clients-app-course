<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthenticationService;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function loginShow()
    {
        return view('auth.admin_login');
    }

    public function login(LoginRequest $request)
    {
        $service = new AuthenticationService();
        $success = $service->login(
            'admin',
            $request->input('email'),
            $request->input('password')
        );

        return $success ?
            redirect()->route('clients.index') :
            redirect()->back()->withErrors([
                'email' => 'Credentials not found',
            ]);
    }

    public function logout()
    {
        $service = new AuthenticationService();
        $service->logout('admin');

        return redirect()->route('admin.login.show');
    }
}
