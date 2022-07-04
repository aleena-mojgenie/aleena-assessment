<?php

namespace App\Http\Controllers;

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{
    public function home()
    {
        return view('banking.deposit');
    }

    public function insertform()
    {
        return view('banking.deposit');
    }

    public function sumOfOldBalance()
    {
        $userId = Auth::id();
        $countDeposit = Transaction::where('type', 'Credit')
            ->where('user_id', $userId)
            ->sum('transaction_amount');

        $countWithdraw = Transaction::where('type', 'Debit')
            ->where('user_id', $userId)
            ->sum('transaction_amount');

        return $count = $countDeposit - $countWithdraw;
    }

    public function insert(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $userId = Auth::id();
        $amount = $request->input('amount');
        $balance = $amount;
        $type = $request->input('type');
        $details = $request->input('details');
        $created_at = Carbon::now();
        $updated_at = Carbon::now();
        $oldBalance = $this->sumOfOldBalance();
        $updatedBalance = $oldBalance + $balance;
        $data = array('transaction_amount' => $amount, "type" => $type, "details" => $details, "user_id" => $userId, "balance" => $updatedBalance, "created_at" => $created_at, "updated_at" => $updated_at);
        DB::table('transactions')->insert($data);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
    }
}
