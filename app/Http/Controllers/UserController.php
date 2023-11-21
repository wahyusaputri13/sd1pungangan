<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Role;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('id', '>', '2')->where('id', '!=', auth()->user()->id)->with('role');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('user.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> edit</a>
                        <a href="' . route('user.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.a.pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Bidang::orderBy('name', 'asc')->pluck('name', 'id');
        return view('back.a.pages.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed']
            ]
        );
        $data = [
            'name' => $request->name,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'bidang_id' => $request->bidang_id,
            'user_phone' => $request->user_phone,
            'password' => Hash::make($request->password),
            'role_id' => '2'
        ];
        User::create($data);
        return redirect(route('user.index'))->with(['success' => 'Data added successfully!']);
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
    public function edit($id)
    {
        $role = Bidang::orderBy('name', 'asc')->pluck('name', 'id');
        $data = User::find($id);
        return view('back.a.pages.user.edit', compact('data', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jem = User::find($id);
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => 'required|email|unique:users,email,' . $id . ',id',
                'bidang_id' => ['required']
            ]
        );
        if ($request->filled('current_password') || $request->filled('new_password') || $request->filled('new_confirm_password')) {
            $request->validate([
                'current_password' => ['required', Hash::check($request->password, $jem->password)],
                'new_password' => ['required', 'min:8'],
                'new_confirm_password' => ['same:new_password'],
            ]);
            $data = ($request->except('_method', '_token', 'current_password', 'new_password', 'new_confirm_password') + ['password' => Hash::make($request->new_password)]);
        } else {
            $data = ($request->except('_method', '_token', 'current_password', 'new_password', 'new_confirm_password'));
        }
        User::find($id)->update($data);
        return redirect(route('user.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::destroy($id);
        return $data;
    }
}
