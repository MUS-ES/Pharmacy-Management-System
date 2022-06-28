<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItems;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $card = [
            "TotalInvoiceToday" =>  $user->invoices->sum("total"),
            "TotalCustomer" => $user->customers->count(),
            "TotalSuppliers" => $user->suppliers->count(),
            "TotalMedicines" => $user->stock->count(),
            "TotalSales" => $user->chest->first()->total,
            "ExpMed" => $user->stock->where("exp", "<=", date('Y-m-d'))->sum("qty"),
            "safe" => $user->safe->first()->total,
            "OutOfStock" => DB::table("medicines")->leftjoin("stocks", "medicines.id", "=", "stocks.medicine_id")->where("stocks.id", null)->where("medicines.user_id", Auth::user()->id)->count(),
            "TotalPurchasesToday" => $user->purchases->sum("total"),
        ];
        $RecentOrders = InvoiceItems::with("medicine", "invoice")->whereRelation("invoice", "user_id", Auth::user()->id)->orderBy("created_at", "desc")->limit(10)->get();
        return view("dashboard", compact("card", "RecentOrders"));
    }
}
