<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatementController extends Controller
{
    public function home()
    {
        return view('banking.statement');
    }

    public function index()
    {
         $UserId = Auth::id();
         $transactions = Transaction::where('user_id','=',$UserId)->get();
        return view('banking.statement',['transactions'=>$transactions]);
        
    }
}
