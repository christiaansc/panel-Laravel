<?php

namespace App\Http\Controllers\admin;

use App\dataTransferObjects\UserDto;
use App\Http\Controllers\Controller;
use App\Services\user\UserService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\user\UserRequest;
use App\Models\User;

class UserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if ($request->method() === 'POST') {
            $userCreated = $this->userService->insertUser(UserDto::validatedRequest($request));
            if (!$userCreated)  return redirect()->route('users.index')->with('toast_error', 'Error al crear el usuario');
            return redirect()->route('users.index')->with('toast_success', 'El usuario ha sido creado exitosamente');
        } else {
            return redirect()->route('users.index')->with('toast_error', 'Error al crear el usuario');
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $this->userService->update($request, $user);
        return redirect()->route('users.index')->with('toast_success', 'El usuario se ha editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $userDeleted = $this->userService->delete($user);
        if (!$userDeleted) return redirect()->route('users.index')->with('toast_error', 'Error el usuario no ha sido eliminado');
        return redirect()->route('users.index')->with('toast_success', 'Usuario Elimindo');
    }
}
