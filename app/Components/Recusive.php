<?php
namespace App\Components;

use App\Models\Category;

class Recusive {
    private $data;
    private $htmlSelect;
    function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecusive($id = 0, $text = '') {
        $data = Category::all();
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                $this->htmlSelect .= "<option>" . $text .$value['name'] . "</option>";
                $this->categoryRecusive($value['id'], $text.'*');
            }
        }
        return $this->htmlSelect;
    }
}