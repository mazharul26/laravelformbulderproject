<?php

namespace App\Http\Controllers;

use App\Models\PackageInfo;
use Illuminate\Http\Request;

class PackageInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.formbulder.formvalidation");
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
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageInfo  $packageInfo
     * @return \Illuminate\Http\Response
     */
    public function show(PackageInfo $packageInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageInfo  $packageInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageInfo $packageInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageInfo  $packageInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageInfo $packageInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageInfo  $packageInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageInfo $packageInfo)
    {
        //
    }
}
