<?php

namespace App\Http\Controllers;

use App\Models\Desing;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() : View {
        $designs = Desing::with('user')
        ->where('is_public', false)
        ->latest()->get();    
        
        return view('home', compact('designs'));
    }

    public function myDashboard() : View {
        $designs = Desing::where('user_id', Auth::id())->latest()->get();

        return view('dashboard', compact('designs'));
    }
}
