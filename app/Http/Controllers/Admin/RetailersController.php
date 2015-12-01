<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('admin/retailers/create', compact('page_title'));
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
            'name' => 'required'
        ]);

        Retailer::create($request->all());

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

        return view('admin/retailers/edit', compact('page_title', 'retailer'));
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
            'name' => 'required'
        ]);

        $retailer->fill($request->all())->save();

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
        $retailer->delete();

        Session::flash('message', 'Successfully delete retailer!');
        return redirect()->to('admin/retailers');
    }
}
