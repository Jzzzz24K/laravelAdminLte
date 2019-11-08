<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $fields = [
        'name' => '',
        'description' => ''
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $keyword = $request->input('keyword', '');
        $roles = Role::where('name', 'like', "%{$keyword}")->with('permission')->get();
        $result = $roles->toArray();
        $fields = $this->fields;
        $permissions = Permission::all();
        return view('role/index', compact('keyword', 'result', 'fields', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        $data = $request->input();
        $role = new Role;
        foreach ($this->fields as $fields => $default) {
            $role->{$fields} = $data[$fields] ?: $default;
        }
        $res = $role->save();
        if ($res) {
            $role->permission()->attach($data['permission_id']);
            return back()->with('success', '添加角色成功');
        } else {
            return back()->withErrors(['添加角色失败']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $role = Role::find($id);
        foreach($this->fields as $field=>$default){
            $role->{$field} = $request->{$field};
        }
        $role->save();
        $data = $role->permission()->sync($request->permission_id);
        if($data){
            return back()->with('success','修改角色成功');
        }else{
            return back()->withErrors(['修改角色失败']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $role = Role::find($id);
        $role->delete();
        $res = $role->permission()->detach();
        if($res){
            return back()->with('success','删除角色成功');
        }else{
            return back()->withErrors(['删除角色失败']);
        }
    }
}
