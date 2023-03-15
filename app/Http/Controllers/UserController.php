<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('category')->get();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $now  = Carbon::now();
        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->password = '$2y$10$KoWWGckZMgth1najXRFLcOLZRQh5rlOnHGu5zN8LdhjkfvCqUTWO.'; //123456789
        $user->created_at = $now;
        $user->category_id = $request->category_id;

        $user->save();

        return response()->json([
            'message' => 'User create successfully.',
            'data' => $user
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'dni' => 'required|numeric|max_digits:10|unique:users,dni,'.$user->id,
            'email' => 'required|email|max:150|unique:users,email,'.$user->id,
            'country' => 'required|string',
            'address' => 'required|string|max:180',
            'phone' => 'required|numeric|max_digits:10',
            'category_id' => 'required|exists:categories,id',
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->category_id = $request->category_id;

        $user->save();
        
        return response()->json([
            'message' => 'User updated successfully.',
            'data' => $user
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
