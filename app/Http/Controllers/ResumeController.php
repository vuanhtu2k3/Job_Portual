<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function show()
    {

        $userId = Auth::id();
        $resume = Resume::where('user_id', $userId)->latest('id')->get();
        return view('front.resumes.list', ['resumes' => $resume]);
    }
    public function create()
    {
        return view('front.resumes.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'summary' => 'required',
            'experience' => 'required',
            'education' => 'required',
            'skills' => 'required',
        ]);
        if ($validator->passes()) {
            $resume = new Resume();
            $resume->user_id = auth()->id();
            $resume->name = $request->name;
            $resume->email = $request->email;
            $resume->phone = $request->phone;
            $resume->summary = $request->summary;
            $resume->experience = $request->experience;
            $resume->education = $request->education;
            $resume->skills = $request->skills;
            $resume->save();
            Session::flash('success', 'Resume created successfully');
            return response()->json([
                'status' => true,
                'message' => 'Resume created successfully',
            ]);
        }
    }
}
