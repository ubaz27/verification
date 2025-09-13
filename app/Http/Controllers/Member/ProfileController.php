<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Member;
use App\Models\State;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Log;
use File;

class ProfileController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth:member');
    }

    public function showProfile()
    {
        $states = State::all();
        $countries = Country::all();
        // dd($countries);
        $phone = Auth::guard('member')->user()->phone;
        $first_name = Auth::guard('member')->user()->first_name;
        $middle_name = Auth::guard('member')->user()->middle_name;
        // dd($first_name);
        $last_name =  Auth::guard('member')->user()->last_name;
        $fullname = $first_name . ' ' .  $middle_name . ' ' . $last_name;
        // dd($fullname);
        $dob = Auth::guard('member')->user()->dob;
        $email = Auth::guard('member')->user()->email;
        $gender = Auth::guard('member')->user()->gender;
        $address = Auth::guard('member')->user()->address;
        $officeaddress = Auth::guard('member')->user()->officeaddress;
        $state = Auth::guard('member')->user()->state;
        $photo = Auth::guard('member')->user()->avater;
        $regno = Auth::guard('member')->user()->regno;
        $country = Auth::guard('member')->user()->country;
        $state = Auth::guard('member')->user()->state;
        $year_graduation = Auth::guard('member')->user()->year_graduation;
        // dd($regno);
        return view('member.profile.profile', compact('officeaddress', 'dob', 'year_graduation', 'regno', 'address', 'photo', 'phone', 'fullname', 'email', 'gender', 'state', 'country', 'countries', 'states'));
    }


    public function saveProfile(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'state' => 'required',
            'regno' => 'required',
        ]);

        $id = Auth::guard('member')->user()->id;
        $profile = Student::find($id);
        $profile->email = $request->email;
        $profile->gender = $request->gender;
        $profile->address = $request->address;
        $profile->state = $request->state;
        $profile->country = $request->nationality;
        $profile->officeaddress  = $request->officeaddress;
        $profile->dob = $request->dob;
        $profile->year_graduation = $request->yog;
        $profile->save();
        return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Profile Updated Successfully.']);
    }

    public function fetchState(Request $request)
    {
        $country = $request->nationality;
        // $state_id = State::where('state', $state)->get('id');


        $countries = Country::where('nationality', $country)->first();
        $country_id =  $countries->id;

        if ($country_id > 1) {
            $country_id  = 2;
        }
        $state = State::where('country_id', $country_id)->get();
        return response()->json(['state' => $state]);
        // return response()->json(['lgas' => $local_governments]);
        //
    }
    public function showPassport()
    {
        $id = Auth::guard('member')->user()->id;

        $regno = Auth::guard('member')->user()->regno;
        $passport =  Auth::guard('member')->user()->passport;
        $signature =  Auth::guard('member')->user()->signature;
        // dd($signature);
        return view('member.profile.passport', compact('passport', 'signature'));
    }

    public function uploadPassport(Request $request)
    {
        $id = Auth::guard('member')->user()->id;
        $regno = Auth::guard('member')->user()->regno;
        $existingPassport = Auth::guard('member')->user()->passport;
        $request->validate([
            'passport' => 'required',
        ]);

        if ($request->hasFile('passport')) {
            $extension = File::extension($request->passport->getClientOriginalName());
            $filesize = $request->passport->getSize();
            // dd($filesize);
            if ($filesize <= 100000)  //100KB
            {
                if ($extension == "jpg" or $extension == 'jpeg') {

                    $filepath = "img\\passport\\" . $existingPassport;

                    if (file_exists($filepath) and $existingPassport <> 'user.png') {

                        unlink(public_path($filepath));
                    }
                    $original_file_name = $request->passport->getClientOriginalName();

                    $passport =  str_replace('/', '_', $regno) . '.' . $extension;
                    $request->passport->move(public_path('img/passport'), $passport);
                    // $request->passport->move('./img/passport/', $passport);

                    try {
                        DB::beginTransaction();
                        $member =   Student::find($id);
                        // dd($passport);
                        $member->passport = $passport;
                        $member->save();
                        DB::commit();
                        return back()->with('message', 'Passport Uploaded Successfully');
                    } catch (Throwable $e) {

                        DB::rollback();
                        Log::error($e);
                        if (env('APP_ENV') == 'local')
                            return back()->with('error', $e->getMessage());
                        // return back()->with('error', ['type' => 'danger', 'icon' => 'ban', 'message' => $e->getMessage()]);
                        // return back()->with('error', 'Passport Not Uploaded. Check the size, type and try again');

                        return back()->with('error', 'Passport Not Uploaded. Check the size, type and try again');
                        // return back()->with('error', ['type' => 'error', 'icon' => 'check', 'message' => 'Account for ' . $request->userPhone . ' Not Created. Try again']);
                        // }
                    }
                } else {
                    return back()->with('error', 'Passport Not Uploaded. Wrong image type. Only JPEG or JPG are allowed');
                }
            } else {
                return back()->with('error', 'Passport Not Uploaded. File size must be less than 100KB');
            }
        }
    }

    public function showSignature()
    {
        $signature =  Auth::guard('member')->user()->signature;
        // dd($signature);
        return view('member.profile.signature', compact('signature'));
    }

    public function uploadSignature(Request $request)
    {
        $id = Auth::guard('member')->user()->id;
        $regno = Auth::guard('member')->user()->regno;
        $existingPassport = Auth::guard('member')->user()->passport;
        $request->validate([
            'signature' => 'required',
        ]);

        if ($request->hasFile('signature')) {
            $extension = File::extension($request->signature->getClientOriginalName());
            $filesize = $request->signature->getSize();
            // dd($filesize);
            if ($filesize <= 100000)  //100KB
            {
                if ($extension == "jpg" or $extension == 'jpeg' or $extension == 'png') {

                    $filepath = "img\\signature\\" . $existingPassport;

                    if (file_exists($filepath) and $existingPassport <> 'signature.png') {

                        unlink(public_path($filepath));
                    }
                    $original_file_name = $request->signature->getClientOriginalName();

                    $signature =  str_replace('/', '_', $regno) . '.' . $extension;
                    $request->signature->move(public_path('img/signature'), $signature);
                    // $request->passport->move('./img/passport/', $passport);

                    try {
                        DB::beginTransaction();
                        $member =   Student::find($id);
                        // dd($passport);
                        $member->signature = $signature;
                        $member->save();
                        DB::commit();
                        return back()->with('message', 'Signature Uploaded Successfully');
                    } catch (Throwable $e) {

                        DB::rollback();
                        Log::error($e);
                        if (env('APP_ENV') == 'local')
                            return back()->with('error', $e->getMessage());
                        // return back()->with('error', ['type' => 'danger', 'icon' => 'ban', 'message' => $e->getMessage()]);
                        // return back()->with('error', 'Passport Not Uploaded. Check the size, type and try again');

                        return back()->with('error', 'Signature Not Uploaded. Check the size, type and try again');
                        // return back()->with('error', ['type' => 'error', 'icon' => 'check', 'message' => 'Account for ' . $request->userPhone . ' Not Created. Try again']);
                        // }
                    }
                } else {
                    return back()->with('error', 'Signature Not Uploaded. Wrong image type. Only JPEG or JPG are allowed');
                }
            } else {
                return back()->with('error', 'Signature Not Uploaded. File size must be less than 100KB');
            }
        }
    }
}
