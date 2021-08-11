<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\UtilityFunctions;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('hasPermission','view_site_settings'),403);

        $siteSetting = SiteSetting::find(1);
        return view('admin.sitesetting.index',['sitesetting'=>$siteSetting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        abort_unless(Gate::allows('hasPermission','update_site_settings'),403);

        $this->validate($request,[
            'company_name'=>'required',
            'site_name'=>'required',
            'email'=>'required|email',
            'location'=>'required',
            'contact_number'=>'required'
        ]);
        try {
            $siteSetting = SiteSetting::find(1);
            if (!$siteSetting) {
                $siteSetting=new SiteSetting;
            }
            $siteSetting->company_name=$request->company_name;
            $siteSetting->site_name=$request->site_name;
            $siteSetting->email=$request->email;
            $siteSetting->location=$request->location;
            $siteSetting->contact_number=$request->contact_number;
            if ($siteSetting->save()) {
                UtilityFunctions::createHistory('Update Site Setting',0);
                return redirect()->route('admin.sitesettings.index')->with(['successMessage'=>'Success !! Site Settings Updated']);
            }
            else{
                return redirect()->back()->with(['errorMessage'=>'Error!! Site Settings not updated']);
            }
                } catch (Exception $e) {
                    return redirect()->back()->with(['errorMessage'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
