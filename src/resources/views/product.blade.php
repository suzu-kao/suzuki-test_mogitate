@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection


@section('header')
<nav class="">
    <h2>商品一覧</h2>
    <a href="/products/register">+ 商品を追加</a>
</nav>

@endsection

@section('content')
<div class="container">
    <aside>
        <form action="/products/search" method="get">
            @csrf
            <input type="text" name="keyword" placeholder="商品名で検索" value="{{ request('keyword') }}">
            <button type="submit">検索</button>
            <p>価格順に表示</p>
            <select name="sort" id="">
                <option value="high" {{ request('sort') == 'high' ? 'selected' : '' }}>高い順に表示</option>
                <option value="low" {{ request('sort') == 'low' ? 'selected' : '' }}>低い順に表示</option>
            </select>
        </form>
    </aside>

    <main>
        <div class="product--list">
            @foreach($products as $product)
            <a href="/products/detail/{{ $product->id }}" class="products--card">
                <div class="products--card">
                    <div class="product--img">
                        <img src="{{ asset('storage/' . $product->image) }}" width="30%">
                    </div>
                    <div class="product--info">
                        <p class="product--name">{{ $product->name }}</p>
                        <p class="product--price">¥{{ number_format($product->price)}}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="pagination">
            {{ $products->links() }}
        </div>
    </main>
</div>
@endsection