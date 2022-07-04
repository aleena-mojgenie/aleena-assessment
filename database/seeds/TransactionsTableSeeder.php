<?php

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id' => 1,
            'user_id' => 1,
            'balance' => 0,
            'transaction_amount' => 500,
            'type' => "debited",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        Transaction::insert($data);
    }
}
