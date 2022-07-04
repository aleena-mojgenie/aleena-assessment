<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    public function home()
    {
        return view('banking.transfer');
    }

    public function insertform()
    {
        return view('banking.transfer');
    }

    public function getBalance()
    {
        $count = DB::table('transactions')->latest('id')->latest()->first();
        return $count->balance;
    }

    public function insert(Request $request)
     {

        $email = $request->input('emails');
        $amount =$request->input('amount');
        $oldBalance = $this->getBalance();
        $withdrawAmount = $amount;
        if ($oldBalance >= $amount) {
            $updatedBalance = $oldBalance - $withdrawAmount;
            $userId = Auth::id();
            //$type = $request->input('type');
            $detailsCredit = 'transfer from ' . Auth::user()->email;
            $detailsDebit = 'transfer to '. $email;
            $created_at = Carbon::now();
            $updated_at = Carbon::now();

            $receiverDetails = DB::table('users')->where('email', '=', $email)->first();
            $receiverId = $receiverDetails->id;
            
            $receiverBalanceDetails = DB::table('transactions')->where('user_id', '=', $receiverId)->latest()->first();
            if($receiverBalanceDetails == null){
                $updatedReceiverBalance = $amount;
                $oldBalanceReceiver= 0;
            }
            else{
                $oldBalanceReceiver = $receiverBalanceDetails->balance;

            }

            $updatedReceiverBalance = $oldBalanceReceiver + $amount;
            
            $data = array('transaction_amount' => $amount, "type" => "Debit", "user_id" => $userId, "balance" => $updatedBalance, "details" =>$detailsDebit, "created_at" => $created_at, "updated_at" => $updated_at);
            DB::table('transactions')->insert($data);

            $data = array('transaction_amount' => $amount, "type" => "Credit", "user_id" => $receiverId, "balance" => $updatedReceiverBalance, "details" =>$detailsCredit, "created_at" => $created_at, "updated_at" => $updated_at);
            DB::table('transactions')->insert($data);

            echo "Record inserted successfully.<br/>";
            echo '<a href = "/insert-withdrawform">Click Here</a> to go back.';
        }

        if ($oldBalance < $amount) {
            echo "You Don't have Sufficient Amount to Transfer.<br/>";
            echo '<a href = "/insert-withdrawform">Click Here</a> to go back.';
        }
    }
}
