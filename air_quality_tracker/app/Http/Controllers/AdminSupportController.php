<?php

namespace App\Http\Controllers;

use App\Models\Support_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSupportController extends Controller
{
    public function show(Request $request){
        $query = Support_request::with('user');

        if ($request->has('status') && $request->status !== '' && $request->status !== 'all'){
            $query->where('status', $request->status);
        }
        $requests = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin_support', compact('requests'));
    }
    public function edit(Support_request $support_request)  {
        return view('edit_support',compact('support_request'));
    }
    public function update(Support_request $support_request)  {
        $valid = request()->validate([
            'status' => 'required|in:pending,in_progress,resolved',
        ]);
        $support_request->status = $valid['status'];
        $support_request->save();
        return redirect()->route('admin.support')->with('success','Support request updated successfully!!');;
    }
}
