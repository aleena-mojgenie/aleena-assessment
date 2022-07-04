<?php

namespace App\Http\Controllers;

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    public function home()
    {
        return view('banking.withdraw');
    }

    public function insertform()
    {
        return view('banking.withdraw');
    }

    public function getBalance()
    {
        $count = DB::table('transactions')->latest('id')->first();
        return $count->balance;
    }

    public function insert(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $amount = $request->input('amount');
        $oldBalance = $this->getBalance();
        $withdrawAmount = $amount;
        if ($oldBalance >= $amount) {
            $updatedBalance = $oldBalance - $withdrawAmount;
            $userId = Auth::id();
            $type = $request->input('type');
            $details = $request->input('details');
            $created_at = Carbon::now();
            $updated_at = Carbon::now();
            $data = array('transaction_amount' => $amount, "type" => $type, "user_id" => $userId, "balance" => $updatedBalance, "details" =>$details, "created_at" => $created_at, "updated_at" => $updated_at);
            DB::table('transactions')->insert($data);
            echo "Record inserted successfully.<br/>";
            echo '<a href = "/insert-withdrawform">Click Here</a> to go back.';
        }

        if ($oldBalance < $amount)
        {
            echo "You Don't have Sufficient Amount to Withdraw.<br/>";
            echo '<a href = "/insert-withdrawform">Click Here</a> to go back.';
        }
    }
}
