<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('users.index');
    }
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
    }
    public function get_all(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('date', 'asc')->get();
            return response()->json($data, 200);
        }
        return response()->json([], 500);
    }
    public function get(Request $request)
    {
        if ($request->ajax()) {
            $user = User::find($request->id);
            return response()->json($user);
        }
    }
    public function add(Request $request)
    {
        if ($request->ajax()) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json($user);
        }
    }
    public function pass_update(Request $request)
    {
        if ($request->ajax()) {
            $user = User::where('id','=', $request->idPssUpdate)
            ->update(['password' => Hash::make($request->cambiarPassword)]);
            return response()->json($user);
        }
    }

    public function edit_update(Request $request)
    {
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->password = Hash::make($request->cambiarPassword);
            $user->save();
            return response()->json($user);
        }
    }

    public function save(Request $request)
    {
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->save();
            return response()->json($user);
        }
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->delete();
            return response()->json($user);
        }
    }
}
