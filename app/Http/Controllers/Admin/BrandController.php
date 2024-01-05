<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\View\View;


class BrandController extends Controller
{
    /**
     * Undocumented function
     *
     * @return View
     */
    public function index(): View
    {
        $brands = Brand::paginate(5);
        return view('pages.admin.brand.index', compact('brands'));
    }

    /**
     * Undocumented function
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.admin.brand.create');
    }

    /**
     * @param BrandRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BrandRequest $request)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image/brands'), $imageName);
        }
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->image = $imageName;
        $brand->description = $request->description;
        $brand->status = $request->status == true ? '1' : '0';
        $brand->save();
        return redirect()->route('admin.brands.index')->with('success', 'Thêm thương hiệu thành công');
    }

    /**
     * @param $brand
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($brand)
    {
        $brands = Brand::findOrFail($brand);
        return view('pages.admin.brand.edit', compact('brands'));
    }

    /**
     * @param Request $request
     * @param Brand $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Brand $brand)
    {
        if ($brand->image) {
            $oldImagePath = public_path('image/brands/') . $brand->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $imageName = $brand->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image/brands'), $imageName);
        }
        $brand->name = $request->input('name');
        $brand->slug = $request->input('slug');
        $brand->image = $imageName;
        $brand->description = $request->input('description');
        $brand->status = $request->has('status') ? true : false;
        $brand->update();
        return redirect()->route('admin.brands.index')->with('success', 'Cập nhật thương hiệu thành công');
    }

    /**
     * @param Brand $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Brand $brand)
    {
        if ($brand->image) {
            $imagePath = public_path('image/brands/') . $brand->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Xoá thương hiệu thành công');
    }
}
