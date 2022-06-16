<?php

namespace App\Console\Commands;

use App\Models\Safe;
use App\Models\Chest;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DailyChestPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chest:payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'At the of the day chest will transfer his money to safe';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user)
        {
            $chest = Chest::where("user_id", $user->id)->first();
            $safe = Safe::where("user_id", $user->id)->first();
            Voucher::create(["user_id" => $user->id, "date" => Carbon::now()->format("Y-m-d"), "type" => "Payment", "amount" => (float)$chest->total, "description" => "The Daily Payment To Safe"]);
            $safe->increment("total", $chest->total);
            $chest->total = 0;
            $chest->save();
        }
    }
}
