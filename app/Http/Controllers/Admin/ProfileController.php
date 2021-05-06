<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\EditRequest;
use App\Http\Requests\Admin\Profile\SaveRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('admin.profile.update', ['user' => Auth::user()]);
    }

    public function update(EditRequest $request)
    {
        $user = Auth::user();
        $password = $request->post('password');
        if (!empty($password)) {
            $user->password = \Hash::make($password);
        }
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->save();
        return redirect()->route('admin::profile::show');
    }

    public function create()
    {

        return view('admin.profile.createUser');
    }

    public function save(SaveRequest $request)
    {
        $user = new User();
        $password = $request->post('password');
        if (!empty($password)) {
            $user->password = \Hash::make($password);
        }
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->is_admin = $request->post('is_admin');
        $user->save();
        return redirect()->route('admin::profile::create')
            ->with('success', "Данные сохранены");
    }
}