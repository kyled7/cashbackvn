<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Deal;
use App\Retailer;
use App\Http\Requests;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;

class DealsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Admin - Deals";
        $deals = Deal::paginate(20);

        return view('admin/deals/index', compact('page_title', 'deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Admin - Create new deal";
        $retailers = Retailer::lists('name', 'id');

        return view('admin/deals/create', compact('page_title', 'retailers'));
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

        Deal::create($request->all());

        Session::flash('message', 'Successfully created deal!');
        return redirect()->to('admin/deals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deal = Deal::findOrFail($id);

        return view('admin/deals/show')->withDeal($deal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deal = Deal::findOrFail($id);
        $retailers = Retailer::lists('name', 'id');
        $page_title = 'Admin - edit deal '. $deal->name;

        return view('admin/deals/edit', compact('deal', 'retailers', 'page_title'));
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
        $deal = Deal::findOrFail($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $deal->fill($request->all())->save();

        Session::flash('message', 'Successfully update deal!');
        return redirect()->to('admin/deals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deal = Deal::findOrFail($id);
        $deal->delete();

        Session::flash('message', 'Successfully delete deal!');
        return redirect()->to('admin/deals');
    }
}
