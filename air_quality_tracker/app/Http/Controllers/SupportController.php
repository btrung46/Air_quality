<?php

namespace App\Http\Controllers;


use App\Models\Support_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function supportForm()  {
        $user = auth()->user();
        return view('Support_form',[
            'user' => $user
        ]);    
    }
    public function store(){
        $validate = request()->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^0[0-9]{9}$/'],
            'address' => 'required|string|max:255',
            'issue' => 'required|string|min:10',
        ]);
        $support = new Support_request();
        $support->user_id = auth()->id();
        $support->phone = $validate['phone'];
        $support->address = $validate['address'];
        $support->issue = $validate['issue'];
        $support->save();
        return redirect()->route('support.show')->with('success', 'Support request submitted successfully.');
    }
    public function show(Request $request){
        $user_id = Auth::id();
        $query = Support_request::where('user_id',$user_id );
        if ($request->has('status') && $request->status !== '' && $request->status !== 'all'){
            $query->where('status', $request->status);
        } 
        $requests = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('support_request', compact('requests'));
    }
    public function edit(Support_request $support_request){
        if($support_request->status !== 'pending'){
            abort(403);
        }
        return view('support_form_edit',compact('support_request'));
    }
    public function update(Support_request $support_request){
         if($support_request->status !== 'pending'){
            abort(403);
        }
        $validate = request()->validate([
            'phone' => ['required', 'regex:/^0[0-9]{9}$/'],
            'address' => 'required|string|max:255',
            'issue' => 'required|string|min:10',
        ]);
        $support_request->phone = $validate['phone'];
        $support_request->address = $validate['address'];
        $support_request->issue = $validate['issue'];
        $support_request->save();
        return redirect()->route('support.show')->with('success', 'Support request updated successfully.'); 
    }
    public function destroy(Support_request $support_request){
        if($support_request->status !== 'pending'){
            abort(403);
        }
        $support_request->delete();
         return redirect()->route('support.show')->with('success', 'Support request deleted successfully.');

    }
}
