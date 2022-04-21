<?php

namespace App\Http\Controllers;

use App\Models\CategoryList;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = CategoryList::where('parent_id', null)->orderby('name', 'asc')->get();


        // dd($categories);
        if ($request->method() == 'GET') {
            // dd($categories);

            return view('sub_category_form', compact('categories'));
        }
        if ($request->method() == 'POST') {
            $validato = $request->validate([
                'name'      => 'required',
                'slug'      => 'required|unique:category_lists',
                'parent_id' => 'nullable|numeric'
            ]);

            CategoryList::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' => $request->parent_id
            ]);

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }

    public function getAllCat()
    {
        $categories = CategoryList::where('parent_id', null)->orderby('name', 'asc')->get();

        foreach ($categories as $category) {
            if ($category->slug == 'mens') {
                echo "<br>";
                echo "<li>" . $category->slug . "
              <ul>
              </li>";
                foreach ($category->subcategory as $subCat) {
                    echo "<li>";
                    echo $subCat->slug;
                    echo "</li>";
                }
                "<ul>";
            } else {

                echo $category->slug . "<br>";
            }
        }

        // return view('index',['parentCategories' => $categories]);

    }
}
