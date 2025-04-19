<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


use App\Models\Product;
use App\Models\Maincategory;
use App\Models\Subcategory;
use App\Models\Brand;




class AdminProductController extends Controller
{
    public function __construct(private Product $product, private Maincategory $maincategory, private Subcategory $subcategory, private Brand $brand) {


    }

    /* *
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Product";
        $data = $this->product->latest()->get();   //new record first
        //  $data = $this->brand->all();   //oldest record first
        // return $data;
        return view("admin.product.index", compact("title", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create product";
        $maincategories = $this->maincategory->latest()->get();
        $subcategories = $this->subcategory->latest()->get();
        $brands = $this->brand->latest()->get();
        return view("admin.product.create", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            "name" => "required|min:3|max:30|unique:maincategories",
            "pic" => "required"

        ]);
        $pic = Storage::disk("public")->put("maincategories", $request->pic);

        $this->product->create([
            "name" => $request->name,
            "pic" => $pic,
            "active" => $request->active

        ]);
        return redirect()->route('admin-brand');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->product->find($id);
        $title = "Update Product";
        return view("admin.product.update", compact("title", 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->product->find($id);
        if ($data->name === $request->name)
            $request->validate([
                "name" => "required|min:3|max:30"
            ]);
        else
            $request->validate([
                "name" => "required|min:3|max:30|unique:maincategories"
            ]);

        if ($request->pic) {
            Storage::disk("public")->delete("maincateogories", $data->pic);
            $pic = Storage::disk("public")->put("maincategories", $request->pic);
        } else
            $pic = $data->pic;

        $data->update([
            "name" => $request->name,
            "pic" => $pic,
            "active" => $request->active

        ]);
        return redirect()->route('admin-brand');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->product->find($id);
        Storage::disk("public")->delete("maincateogories", $data->pic);
        $data->delete();
        return redirect()->route('admin-brand');
    }
}
