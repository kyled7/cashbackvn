<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Http\Controllers\AdminController;
use App\Models\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RetailersController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retailers = Retailer::paginate(20);

        return view('admin/retailers/index', compact('page_title', 'retailers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Admin - Create new retailer";
        $categories = Category::lists('name', 'id');
        return view('admin/retailers/create', compact('page_title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'image'
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '_' . $logo->getClientOriginalName();
            Storage::put('images/' . $filename, File::get($logo));
            $data['logo'] = $filename;
        }

        $retailer = Retailer::create($data);

        if ($request->input('category_list')) {
            $retailer->categories()->attach($request->input('category_list'));
        }

        Session::flash('message', 'Successfully created retailer!');
        return redirect()->to('admin/retailers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $retailer = Retailer::findOrFail($id);
        $page_title = "Admin - Retailer ". $retailer->name;

        return view('admin/retailers/show', compact('page_title', 'retailer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $retailer = Retailer::findOrFail($id);
        $page_title = "Admin - Edit retailer ". $retailer->name;
        $categories = Category::lists('name', 'id');

        return view('admin/retailers/edit', compact('page_title', 'retailer', 'categories'));
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
        $retailer = Retailer::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'logo' => 'image'
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            if (Storage::has('images/' . $retailer->logo)) {
                Storage::delete('images/' . $retailer->logo);
            }

            $logo = $request->file('logo');
            $filename = time() . '_' . $logo->getClientOriginalName();
            Storage::put('images/' . $filename, File::get($logo));
            $data['logo'] = $filename;
        }

        $retailer->fill($data)->save();

        if ($request->input('category_list')) {
            $retailer->categories()->sync($request->input('category_list'));
        }

        Session::flash('message', 'Successfully update retailer!');
        return redirect()->to('admin/retailers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $retailer = Retailer::findOrFail($id);
        if (Storage::has('images/' . $retailer->logo)) {
            Storage::delete('images/' . $retailer->logo);
        }
        $retailer->delete();

        Session::flash('message', 'Successfully delete retailer!');
        return redirect()->to('admin/retailers');
    }
}
