<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the user dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function homepage()
    {
        // Kullanıcı kontrol panelini göster
        return view('user.userhome');
    }

    // Diğer kullanıcı sayfaları ve işlemleri burada olacak
}
