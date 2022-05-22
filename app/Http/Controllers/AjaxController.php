<?php


namespace App\Http\Controllers;

use App\View\Components\popup\CustomerNewEntry;
use App\View\Components\popup\MedicineNewEntry;
use App\View\Components\popup\StockNewEntry;
use App\View\Components\Feedback;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;
use App\View\Components\popup\SupplierNewEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function getAutoCompleteMedicine(Request $request)
    {
        $success = 0;
        $medicines = array();
        if ($request->has("term"))
        {
            $medicines = Medicine::where("user_id", "=", Auth::user()->id)->where('name', 'like', '%' . $request->term . "%")->take(10)->get("name");
            if (count($medicines) !== 0)
            {
                $success = 1;
            }
        }
        return response()->json(["success" => $success, "list" => $medicines]);
    }
    public function getChartData(Request $request)
    {
        $user = Auth::user();
        $offest = $request->offest;
        $invoices = DB::table('invoices')->selectRaw("sum(total) as y,created_at as x")->where("user_id", "=", Auth::user()->id)->groupBy("created_at")->take($offest)->get();
        $purchases  = DB::table('purchases')->selectRaw("sum(total) as y,created_at as x")->where("user_id", "=", Auth::user()->id)->groupBy("created_at")->take($offest)->get();
        return response()->json(["invoices" => $invoices, "purchases" => $purchases]);
    }
}
