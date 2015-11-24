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
        $retailers = Retailer::paginate(10);

        return view('admin/retailers/index')
            ->with('retailers', $retailers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/retailers/create');
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

        return view('admin/retailers/show')->withRetailer($retailer);
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

        return view('admin/retailers/edit')->withRetailer($retailer);
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
