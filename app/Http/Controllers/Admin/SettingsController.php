<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class SettingsController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth:admin');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'batch_no' => 'required|string',
            'closing_date' => 'required|date',
            'active' => 'required|string',
        ]);
    }

    public function _toInt($str)
    {
        return (int)preg_replace("/([^0-9\\.])/i", "", $str);
    }
    public function showCharges()
    {
        $charges = Charge::first();
        // dd($charges);
        return view('admin.settings.charges', compact('charges'));
    }
    public function saveCharges(Request $request)
    {
        $request->validate([
            'charges' => ['required'],
        ]);

        try {
            DB::beginTransaction();

            $amount = $this->_toInt($request->charges);
            $charges = Charge::where('id', 1)
                ->update(['charges' => $amount]);

            DB::commit();
            return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Charges Updated successfully.']);
        } catch (Throwable $e) {

            DB::rollback();
            Log::error($e);
            if (env('APP_ENV') == 'local')
                return back()->with('error', $e->getMessage());

            return back()->with('error', 'Charges Not Updated');
        }
    }
}
