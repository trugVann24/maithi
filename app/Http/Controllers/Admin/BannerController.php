<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::paginate(10);
        return view('pages.admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image/banners'), $imageName);
        }
        $brand = new Banner();
        $brand->title = $request->title;
        $brand->image = $imageName;
        $brand->status = $request->status == true ? '1' : '0';
        $brand->save();
        return redirect()->route('admin.banners.index')->with('success', 'Thêm banner thành công');
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
         $banners = Banner::findOrFail($id);
        return view('pages.admin.banners.edit', compact('banners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->title = $request->input('title');
        $banner->status = $request->has('status') ? true : false;
        $banner->update();
        return redirect()->route('admin.banners.index')->with('success', 'Cập nhật banner thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            $imagePath = public_path('image/banners/') . $banner->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $banner->delete();
        return redirect()->route('pages.admin.banners.index')->with('success', 'Xoá banners thành công');
    }
}
