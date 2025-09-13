<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SkillController extends Controller
{
    //
    public function showSkill()
    {
        $regno = Auth::guard('member')->user()->regno;
        $skills = Skill::where('regno', $regno)->get(['regno', 'skill']);
        // dd($skills);
        return view('member.skill.skill', compact('skills'));
    }

    public function saveSkill(Request $request)
    {
        $regno = Auth::guard('member')->user()->regno;
        $request->validate([
            'skill' => 'required',
        ]);

        try {
            DB::beginTransaction();
            Skill::Create([
                'regno' => $regno,
                'skill' => $request->skill,
            ]);
            DB::commit();
            return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Social Links Save Successfully.']);
        } catch (Throwable $e) {

            DB::rollback();
            Log::error($e);
            if (env('APP_ENV') == 'local')
                return back()->with('mssg', ['type' => 'danger', 'icon' => 'ban', 'message' => $e->getMessage()]);

            return back()->with('mssg', ['type' => 'error', 'icon' => 'check', 'message' => 'Skill data not save. Try again']);
        }
    }
}
