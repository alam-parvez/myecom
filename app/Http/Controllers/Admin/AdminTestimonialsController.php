<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\testimonial;
use Illuminate\Support\Facades\Storage;

class AdmintestimonialsController extends Controller


{
    public function __construct(private testimonial $testimonials) {}

    /* *
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "testimonials";
        $data = $this->testimonials->latest()->get();   //new record first
        
        return view("admin.testimonials.index", compact("title", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create testimonials";
        return view("admin.testimonials.create", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            "name" => "required|min:3|max:30|unique:testimonials",
            "message" => "required|min:50",
            "pic" => "required"

        ]);
        $pic = Storage::disk("public")->put("testimonials", $request->pic);

        $this->testimonials->create([
            "name" => $request->name,
            "pic" => $pic,
            "message" => $request->message,
            "active" => $request->active

        ]);
        return redirect()->route('admin-testimonials');
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
        $data = $this->testimonials->find($id);
        $title = "Update testimonials";
        return view("admin.testimonials.update", compact("title", 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->testimonials->find($id);
        if ($data->name === $request->name)
            $request->validate([
                "name" => "required|min:3|max:30|unique:testimonialss",
                "message" => "required|min:50",
            ]);

        if ($request->pic) {
            Storage::disk("public")->delete("testimonials", $data->pic);
            $pic = Storage::disk("public")->put("testimonials", $request->pic);
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
        $data = $this->testimonials->find($id);
        Storage::disk("public")->delete("testimonials", $data->pic);
        $data->delete();
        return redirect()->route('admin-testimonials');
    }
}
