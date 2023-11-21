<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Menu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('role.show', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">accessibility</i> accessibility</a>
                        <a href="' . route('role.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> edit</a>
                        <a href="' . route('role.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.a.pages.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.a.pages.role.create');
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
                'role' => 'required',
            ],
        );
        Role::create($request->except('_token'));
        return redirect(route('role.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $data  = Menu::with(['roleaccess', 'punyaRole' => function ($q) use ($id) {
                $q->where('role_id', $id);
            }]);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'access',
                    function ($data) {
                        if ($data->punyaRole) {
                            $actionBtn = '<center><div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked onclick="centang('  . $data->id . ')">
                                                    <span class="toggle"></span>
                                                </label>
                                            </div></center>';
                        } else {
                            $actionBtn = '<center><div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" onclick="centang('  . $data->id . ')">
                                                    <span class="toggle"></span>
                                                </label>
                                            </div></center>';
                        }
                        return $actionBtn;
                    }
                )
                ->rawColumns(['access'])
                ->make(true);
        }
        return view('back.a.pages.role.access');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Role::find($id);
        return view('back.a.pages.role.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Role::find($id)->update(
            $request->except(['_token']),
        );
        return redirect(route('role.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Role::destroy($id);
        return $data;
    }

    public function changeAccess(Request $request)
    {
        $data = [
            'role_id' => $request->roleId,
            'menu_id' => $request->menuId
        ];
        $result = DB::table('user_access_menus')->where($data)->count();
        if ($result < 1) {
            DB::table('user_access_menus')->insert($data);
        } else {
            DB::table('user_access_menus')->where($data)->delete();
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Data has been successfully changed!'
            ]
        );
    }
}
