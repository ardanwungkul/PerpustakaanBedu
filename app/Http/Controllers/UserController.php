<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('isAdmin', false)->get();
        return view('master.user.index', compact('user'));
    }
    public function profileCreate()
    {
        return view('master.profile.create');
    }
    public function profileStore(Request $request)
    {
        $request->validate([
            'nis' => 'unique:profiles'
        ]);
        $profile = new Profile();
        $profile->nis = $request->nis;
        $profile->class = $request->class;
        $profile->generation = $request->generation;
        $profile->address = $request->address;
        $profile->phone_number = $request->phone_number;
        $profile->user_id = Auth::user()->id;
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $nama_logo = date('y-m-d') . $file->getClientOriginalName();
            $file->move(public_path('storage/images/profile/'), $nama_logo);
            $profile->profile_photo = $nama_logo;
        }
        $profile->save();

        return redirect()->route('dashboard');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus Data']);
    }
}
