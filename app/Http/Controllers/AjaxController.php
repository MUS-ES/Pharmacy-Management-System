<?php


namespace App\Http\Controllers;

use App\Models\Customer;
use App\View\Components\popup\CustomerNewEntry;
use App\View\Components\popup\MedicineNewEntry;
use App\View\Components\popup\StockNewEntry;
use App\View\Components\Feedback;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;
use App\View\Components\popup\SupplierNewEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use App\View\Components\popup\Confirm;

class AjaxController extends Controller
{
    public function getFeedbackComponent(Request $request)
    {

        $feedback = new Feedback($request->msg);
        return $feedback->render()->with($feedback->data());
    }
    public function getCustomerNewEntryComponent(Request $request)
    {

        $customer = new CustomerNewEntry();
        return $customer->render()->with($customer->data());
    }
    public function getStockNewEntryComponent(Request $request)
    {

        $StockNewEntry = new StockNewEntry();
        return $StockNewEntry->render()->with($StockNewEntry->data());
    }
    public function getMedicineNewEntryComponent(Request $request)
    {

        $MedicineNewEntry = new MedicineNewEntry();
        return $MedicineNewEntry->render()->with($MedicineNewEntry->data());
    }
    public function getSupplierNewEntryComponent(Request $request)
    {

        $SupplierNewEntry = new SupplierNewEntry();
        return $SupplierNewEntry->render()->with($SupplierNewEntry->data());
    }
    public function getConfirmComponent(Request $request)
    {

        $Confirm = new Confirm($request->msg);
        return $Confirm->render()->with($Confirm->data());
    }

    public function getChartData(Request $request)
    {
        $user = Auth::user();
        $offest = $request->offest;
        $invoices = DB::table('invoices')->selectRaw("sum(total) as y,created_at as x")->where("user_id", "=", Auth::user()->id)->groupBy("created_at")->take($offest)->get();
        $purchases  = DB::table('purchases')->selectRaw("sum(total) as y,created_at as x")->where("user_id", "=", Auth::user()->id)->groupBy("created_at")->take($offest)->get();
        return response()->json(["invoices" => $invoices, "purchases" => $purchases], 200);
    }
    public function getSupplierSuggestions(Request $request)
    {
        $suggestions = [];
        if ($request->filled("term"))
        {

            $suggestions = Supplier::where("user_id", Auth::user()->id)->where("name", "like", '%' . $request->term . "%")->take(5)->get("name");
        }
        return response()->json(["success" => true, "suggestions" => $suggestions], 200);
    }
    public function getMedicineSuggestions(Request $request)
    {
        $suggestions = [];
        if ($request->filled("term"))
        {

            $suggestions = Medicine::where("user_id", Auth::user()->id)->where("name", "like", '%' . $request->term . "%")->take(5)->get("name");
        }
        return response()->json(["success" => true, "suggestions" => $suggestions], 200);
    }
    public function getCustomerSuggestions(Request $request)
    {
        $suggestions = [];
        if ($request->filled("term"))
        {

            $suggestions = Customer::where("user_id", Auth::user()->id)->where("name", "like", '%' . $request->term . "%")->take(5)->get("name");
        }
        return response()->json(["success" => true, "suggestions" => $suggestions], 200);
    }
}
