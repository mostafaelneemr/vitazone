<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($position)
    {
        return view('banners.create', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banner;
        $banner->photo_ar = $request->photo_en;
        $banner->photo_en = $request->photo_ar;
        $banner->url_en = $request->url_en;
        $banner->url_ar = $request->url_ar;
        $banner->url_mobile = $request->url_mobile;
        $banner->position = $request->position;
        $banner->save();
        flash(translate('Banner has been inserted successfully'))->success();
        return redirect()->route('home_settings.index');
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
        $banner = Banner::findOrFail($id);
        return view('banners.edit', compact('banner'));
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
        $banner = Banner::find($id);
        $banner->photo_en = $request->photo_en;
        $banner->photo_ar = $request->photo_ar;
        $banner->url_en = $request->url_en;
        $banner->url_ar = $request->url_ar;
        $banner->url_mobile = $request->url_mobile;
        $banner->save();
        flash(translate('Banner has been updated successfully'))->success();
        return redirect()->route('home_settings.index');
    }


    public function update_status(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->published = $request->status;
        if ($request->status == 1) {
            if (count(Banner::where('published', 1)->where('position', $banner->position)->get()) < 8) {
                if ($banner->save()) {
                    return '1';
                } else {
                    return '0';
                }
            }
        } else {
            if ($banner->save()) {
                return '1';
            } else {
                return '0';
            }
        }

        return '0';
    }

    public function update_banner_mobile(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->mobile_web = $request->mobile;
        if ($banner->save()) {
            return '1';
        } else {
            return '0';
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
        $banner = Banner::findOrFail($id);
        if (Banner::destroy($id)) {
            //unlink($banner->photo);
            flash(translate('Banner has been deleted successfully'))->success();
        } else {
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('home_settings.index');
    }
}