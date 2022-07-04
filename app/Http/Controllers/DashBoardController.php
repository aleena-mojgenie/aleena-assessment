<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{

    public function home()
    {
        // $userId = Auth::id();
        // dd($userId);

        DB::table('users')->get();
        return view('banking.home');
    }

    public static function findBalance()
    {
        $userHasTransactions = User::has('transactions')->find(Auth::user()->id);
        if ($userHasTransactions == null) {
            return 0;
        }

        $userId = Auth::id();
        $count = DB::table('transactions')->where('user_id', $userId)->latest('id')->first();
        return $count->balance;
    }
}
