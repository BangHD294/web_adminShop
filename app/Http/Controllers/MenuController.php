<?php

namespace App\Http\Controllers;
use App\Components\menuRecusive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    const pages = 10;
    public function __construct(menuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    public function index() {
        $menus = $this->menu->paginate(self::pages);
        return view('menus.index', compact('menus'));
    }
    public function create() {
        $selectOtion = $this->menuRecusive->menuRecusive();
        return view('menus.add', compact('selectOtion'));
    }

    public function store(Request $request) {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }

    public function edit($id, Request $request) {
        $dataMenu = $this->menu->find($id);
        $selectOtion = $this->menuRecusive->menuRecusiveEdit($dataMenu->parent_id);
        return view('menus.edit', compact('selectOtion', 'dataMenu'));
    }

    public function update($id, Request $request) {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function delete($id) {
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
