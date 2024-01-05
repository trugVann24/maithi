<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::with('attributeOptions')->get();
        return view('pages.admin.attribute.index', compact('attributes'));
    }

    public function create()
    {
        return view('pages.admin.attribute.create');
    }

    public function store(AttributeRequest $request)
    {
        try {
            $attribute = Attribute::create([
                'name' => $request->input('name'),
            ]);

            foreach ($request->input('value') as $optionValue) {
                AttributeOption::create([
                    'attribute_id' => $attribute->id,
                    'value' => $optionValue,
                ]);
            }

            session()->flash('success', 'Thêm thuộc tính và lựa chọn thành công');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Đã xảy ra lỗi khi thêm thuộc tính và lựa chọn'], 500);
        }
    }


    public function edit($atrribute)
    {
        $attributes = Attribute::findOrFail($atrribute);
        return view('pages.admin.attribute.edit', compact('attributes'));
    }

    public function update(AttributeRequest $request,Attribute $attribute)
    {
        try {

            $attribute->update([
                'name' => $request['name'],
            ]);

            $options = $request['value'];
            $attribute->attributeOptions()->delete();

            foreach ($options as $option) {
                $attribute->attributeOptions()->create([
                    'value' => $option,
                ]);
            }
            session()->flash('success', 'Sửa thuộc tính và lựa chọn thành công');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Đã xảy ra lỗi khi sửa thuộc tính và lựa chọn'], 500);
        }
    }

    public function destroy($id)
    {

            $attribute = Attribute::findOrFail($id);
            $attribute->attributeOptions()->delete();
            $attribute->delete();
            return redirect()->route('admin.attributes.index')->with('success', 'Xoá thuộc tính và lựa chọn thành công');

    }
}
