<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('user.pages.orders.index', compact('orders'));
    }
    public function view($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('user.pages.orders.view', compact('order'));
    }


    public function profile()
    {
        return view('user.pages.profile');
    }

    public function updateInfo(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name'=>['nullable', 'string'],
            'email' => ['nullable','email'],
            'phone' => ['nullable','string']
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        } else {
            $query = User::find(Auth::user()->id)->update([
            ]);

            if(!$query){
                return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
            } else {
                return response()->json(['status'=>0,'msg'=>'your profile info has been update successfully']);
            }
        }
    }

    public function uploadImage(Request $request)
    {
        $user = User::find(Auth::id());

        if ($request->hasFile('image')) {
            // Retrieve the old image filename
            $oldImage = $user->image;

            // Move the new image file to the 'uploads/users/' directory
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/users/', $filename);

            // Update user's image attribute with the new filename
            $user->image = $filename;
            $user->save();

            // Delete the old image file if it exists
            if ($oldImage) {
                $oldImagePath = public_path('uploads/users/') . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        return redirect()->route('profile');
    }




}
