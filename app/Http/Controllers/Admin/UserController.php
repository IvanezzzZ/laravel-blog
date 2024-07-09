<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $roles = User::getRoles();

        return view('admin.users.create', compact('roles'));
    }
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.index');
    }
    public function edit(User $user)
    {
        $roles = User::getRoles();

        return view('admin.users.edit', compact('user', 'roles'));
    }
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $password = Str::random(10);
        $data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' => $data['email']], $data);

        Mail::to($data['email'])->send(new PasswordMail($password));
        event(new Registered($user));
        return redirect()->route('admin.user.index');
    }
    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return redirect()->route('admin.user.index');
    }
}
