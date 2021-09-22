<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(UserRole $userRole)
    {
        //
    }

    public function edit(UserRole $userRole)
    {
        //
    }


    public function update(Request $request, UserRole $userRole)
    {
        //
    }

 
    public function destroy(UserRole $userRole)
    {
        //
    }
}
