<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionCreateRequest;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use App\Model\Permission;

class PermissionController extends Controller
{
    protected $service;
    protected $fields = [
        'name' => '',
        'routes' => ''
    ];

    public function __construct(PermissionService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = $this->service->InitRoutes();
        $permission = Permission::all();
        $fields = $this->fields;
        return view('permission/index',compact('permission','fields','routes'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionCreateRequest $request)
    {
        //
        $data = $request->input();
        $permission = new Permission();
        foreach($this->fields as $field=>$default){
            if($field == 'routes'){
                $permission->routes = implode(',',$data['routes']);
            }else{
                $permission->{$field} = $data[$field];
            }
        }
        $res = $permission->save();
        if($res){
            return back()->with('success','添加权限成功');
        }else{
            return back()->withErrors(['添加权限失败']);
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
