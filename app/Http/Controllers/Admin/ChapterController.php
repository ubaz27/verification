<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChapterAdmin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\URL;
use Throwable;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use App\Models\Position;

class ChapterController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function showAdmins()
    {
        // $users = Admin::all();
        $users = DB::table('admins')->join('positions', 'admins.position_id', 'positions.id')
            ->where('position_id', '>', 1)
            ->get(['admins.id', 'admins.name', 'admins.email', 'admins.phone', 'positions.position', 'admins.is_active']);

        $positions = Position::where('id', '>',  1)->get();


        return view('admin.chapter.admin-page', compact('users', 'positions'));
    }
    public function saveAdmin(Request $request)
    {
        $request->validate([
            // 'phone' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'position_id' => 'required',

        ]);

        ChapterAdmin::Create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'position_id' => $request->position_id,
        ]);

        return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Member Info. Inserted']);
    }

    public function editAdmin(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        // $users =  Admin::find($request->user_id);
        $positions = Position::where('id', '>',  1)->get();
        $users = ChapterAdmin::join('positions', 'admins.position_id', 'positions.id')
            ->where('admins.id', $request->user_id)->get(['admins.id', 'admins.name', 'admins.email', 'admins.phone', 'admins.position_id', 'positions.position', 'admins.is_active']);

        // dd($users);
        return view('admin.chapter.edit-admin', compact('users', 'positions'));
    }

    public function saveEditAdmin(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'email' => 'required',
            'fullname' => 'required',
            'is_active' => 'required',
            'position_id' => 'required',
        ]);

        $user = ChapterAdmin::find($request->user_id);
        $user->email = $request->email;
        $user->name = $request->fullname;
        $user->position_id = $request->position_id;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
            $user->reset_password = 1;
        }
        $user->is_active = $request->is_active;
        $user->save();
        // $users = DB::table('admins')
        //     ->where('position_id', '>', 1)
        //     ->get();

        $users = DB::table('admins')->join('positions', 'admins.position_id', 'positions.id')
            ->where('position_id', '>', 1)
            ->get(['admins.id', 'admins.name', 'admins.email', 'admins.phone', 'positions.position', 'admins.is_active']);

        $positions = Position::where('id', '>',  1)->get();
        return view('admin.chapter.admin-page', compact('users', 'positions'));
        // return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Member Info. Inserted']);
    }
}
