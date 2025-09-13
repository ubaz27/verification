<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class SocialController extends Controller
{
    //
    public function showSocial()
    {
        $regno = Auth::guard('member')->user()->regno;

        $facebook = Social::where('regno', $regno)->where('type', 'facebook')->first()->item ?? '';
        $twitter = Social::where('regno', $regno)->where('type', 'twitter')->first()->item ?? '';
        $linkedin = Social::where('regno', $regno)->where('type', 'linkedin')->first()->item ?? '';
        $youtube = Social::where('regno', $regno)->where('type', 'youtube')->first()->item ?? '';
        $instagram = Social::where('regno', $regno)->where('type', 'instagram')->first()->item ?? '';

        return view('member.social.social', compact('facebook', 'twitter', 'linkedin', 'youtube', 'instagram'));
    }


    public function saveSocial(Request $request)
    {
        $regno = Auth::guard('member')->user()->regno;
        //save social link
        function saveq($name, $type, $regno)
        {
            Social::where('regno', $regno)
                ->where('type', $type)->delete();
            try {
                Social::Create([
                    'regno' => $regno,
                    'item' => $name,
                    'type' => $type,
                ]);
            } catch (Throwable $e) {
            }
        }

        $name = $request->facebook;
        saveq($name, 'facebook', $regno);

        $name = $request->twitter;
        saveq($name, 'twitter', $regno);

        $name = $request->linkedin;
        saveq($name, 'linkedin', $regno);


        $name = $request->youtube;
        saveq($name, 'youtube', $regno);

        $name = $request->instagram;
        saveq($name, 'instagram', $regno);


        return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Social Links Save Successfully.']);
    }
}
