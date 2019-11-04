<?php

namespace App\Http\Controllers;

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
        $result = Role::where('name', 'like', "%{$keyword}")->get();
        $fields = $this->fields;
        return view('role/index', compact('keyword', 'result', 'fields'));
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
    public function store(Request $request)
    {
        $data = $request->input();
        $role = new Role;
        foreach ($this->fields as $fields => $default) {
            $role->{$fields} = $data[$fields] ?: $default;
        }
        $res = $role->save();
        if ($res) {
            return back()->with('success','添加角色成功');
        }else{
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
    public function update(Request $request, $id)
    {
        //
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
    }
}
