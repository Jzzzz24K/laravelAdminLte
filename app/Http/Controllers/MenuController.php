<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuCreateRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Model\Menu;
use App\Model\Role;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $fields = [
        'name' => '',
        'icon' => '#',
        'pid' => 0,
        'level' => '',
        'url' => '',
        'status' => 1
    ];

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pmenus = Menu::with('role')->where('level', 1)->get();
        $roles = Role::all();
        return view('menu.index', ['fields' => $this->fields, 'pmenus' => $pmenus, 'roles' => $roles]);
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
    public function store(MenuCreateRequest $request)
    {
        $menu = new Menu();
        foreach ($this->fields as $field => $default) {
            $menu->{$field} = $request->{$field} ?? $default;
        }
        //如果父级id不为0，说明是二级分类
        $menu->level = $request->pid == 0 ? 1 : 2;
        $res = $menu->save();
        if ($res) {
            $menu->role()->attach($request->role);
            return back()->with('success', '创建菜单成功');
        } else {
            return back()->withErrors(['创建菜单失败']);
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
    public function update(MenuUpdateRequest $request, $id)
    {
        //
        $data = $request->input();
        $menu = Menu::find($id);
        foreach ($this->fields as $field => $default) {
            $menu->{$field} = $data[$field] ?? $default;
        }
        $menu->level = $request->pid == 0 ? 1 : 2;
        $res = $menu->save();
        if ($res) {
            $menu->role()->sync($request->role);
            return back()->with('success', '修改菜单成功');
        } else {
            return back()->withErrors(['修改菜单失败']);
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
        $menu = Menu::find($id);
        if ($menu->children->toArray()) {
            return back()->withErrors(['该菜单有子菜单，删除失败']);
        }
        $res = $menu->delete();
        if ($res) {
            $menu->role()->detach();
            return back()->with('success', '删除菜单成功');
        } else {
            return back()->withErrors(['删除菜单失败']);
        }
    }
}
