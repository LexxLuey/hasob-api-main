<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Events\UserCreated;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
 
        return response()->json([
            "success" => true,
            "message" => "User List",
            "data" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            "success" => true,
            "message" => "User creation route working... are you surprised?",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        
        $user = new User();
        $user->first_name = $validated['first_name'];
        $user->middle_name = $request->middle_name;
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];
        $user->password = \Hash::make($validated['password']);
        $user->save();

        // Fire event
        UserCreated::dispatch($user->first_name, $user->email);

        // return response()->json([
        //     'data' => $validated
        // ]);

        return response()->json([
            "success" => true,
            "message" => "User created successfully",
            "data" => $users
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        
        if (is_null($user)) {
            return $this->sendError('User not found.');
        }
        
        return response()->json([
            "success" => true,
            "message" => "User retrieved successfully.",
            "data" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json([
            "success" => true,
            "message" => "User editing route working... don't you be surprised.",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->first_name = $validated['first_name'];
        $user->middle_name = $request->middle_name;
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];
        $user->password = \Hash::make($validated['password']);
        $user->save();

        return response()->json([
            "success" => true,
            "message" => "User updated successfully.",
            "data" => $user
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            "success" => true,
            "message" => "User deleted successfully.",
            "data" => $user
        ]);
    }

}
