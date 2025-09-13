<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class EventController extends Controller
{
    //

    public function showEvents()
    {
        return view('admin.events.event');
    }

    public function saveEvents(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'date' => 'required',
            'time' => 'required',
            'type' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $fileName = '';
            if (!blank($request->image)) {
                $originalFileName = $request->image->getClientOriginalName();
                $fileName = time() . '_' . $originalFileName;
                $request->image->move('./events', $fileName);
            }

            Event::Create([
                'title' => $request->title,
                'details' => $request->details,
                'location' => $request->location,
                'date' => $request->date,
                'time' => $request->time,
                'image' => $fileName,
                'type' => $request->type,
            ]);


            DB::commit();
            return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Event upload was successful.']);
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e);
            if (env('APP_ENV') == 'local')
                return back()->with('error',  $e->getMessage());

            return back()->with('mssg',  'Record Not Added');
        }
    }
}
