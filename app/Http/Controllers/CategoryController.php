<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index() {
//        return view('category.index');
    }

    public function create() {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOptiont = $recusive->categoryRecusive();
        return view('category.add', compact('htmlOptiont'));
    }
}
