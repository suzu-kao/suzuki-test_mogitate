<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;


class ProductController extends Controller
{
    //一覧
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    // 詳細
    public function show($productId)
    {
        $product = Product::find($productId);
        return view('products.detail', compact('product'));
    }

    // 登録画面表示
    public function create()
    {
        $seasons = Season::all();
        return view('products.register', compact('seasons'));
    }

    // 登録処理
    public function store(StoreProductRequest $request)
    {
        $data = $request->only([
            'name',
            'price',
            'description',
        ]);

        // 画像保存
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        // 商品保存
        $product = Product::create($data);


        // 中間テーブルに保存
        if ($request->has('seasons')) {
            $product->seasons()->attach($request->seasons);
        }

        return redirect('/products');
    }


    // 更新処理
    public function update(UpdateProductRequest $request, $productId)
    {
        $product = Product::find($productId);
        $product ->update($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        $product->update($data);

        if ($request->has('seasons')) {
            $product->seasons()->sync($request->seasons);
        }

        return redirect('/products');
    }

    // 削除
    public function destroy($productId)
    {
        $product = Product::find($productId);
        $product->delete();

        return redirect('/products');
    }
}
