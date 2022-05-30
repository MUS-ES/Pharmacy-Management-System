<?php

namespace App\Http\Controllers;



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
            "TotalMedicines" => $user->stock->sum("qty"),
            "TotalSales" => $user->chest->sum("total"),
            "ExpMed" => $user->stock->where("exp", "<=", date('Y-m-d'))->sum("qty"),
            "safe" => $user->safe->sum("total"),
            "OutOfStock" => DB::table("medicines")->leftjoin("medicines_stocks", "medicines.id", "=", "medicines_stocks.medicine_id")->where("medicines_stocks.id", null)->where("medicines.user_id", Auth::user()->id)->count(),
            "TotalPurchasesToday" => $user->purchases->sum("total"),
        ];

        $RecentOrders = DB::table("invoices")->where("invoices.user_id", "=", $user->id)->join("invoices_items", "invoices.id", "=", "invoices_items.invoice_id")->join("payment_details", "payment_id", "=", "payment_details.id")->join("medicines", "medicine_id", "=", "medicines.id")->get()->take(10);
        return view("dashboard", compact("card", "RecentOrders"));
    }
}
