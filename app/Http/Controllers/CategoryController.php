<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    const pages = 5;
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index() {
        $category = $this->category->latest()->paginate(self::pages);
        return view('category.index', compact('category'));
    }

    public function create() {
        $htmlOptiont = $this->getCategory($parentId = '');
        return view('category.add', compact('htmlOptiont'));
    }
    public function store(Request $request) {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }
    public function edit($id) {
        $category = $this->category->find($id);
        $htmlOptiont = $this->getCategory($category->parent_id);
        return view('category.edit', compact('category', 'htmlOptiont'));
    }
    public function update($id, Request $request) {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id) {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
    public function getCategory($parentId) {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOptiont = $recusive->categoryRecusive($parentId);
        return $htmlOptiont;
    }
}
