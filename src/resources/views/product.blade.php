@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="title">
        <h2>商品一覧</h2>
        <a href="/products/register" class="add-product_btn">+ 商品を追加</a>
    </div>
    <div class="item-container">
        <aside class="aside-bar">
            <form action="/products/search" method="get" class="products-form">
                @csrf
                <input type="text" name="keyword" placeholder="商品名で検索" value="{{ request('keyword') }}" class="search-window">
                <button type="submit" class="search-btn">検索</button>
                <p>価格順で表示</p>
                <select name="sort" id="" class="option-modal">
                    <option value="">価格で並べ替え</option>
                    <option value="high" {{ request('sort') == 'high' ? 'selected' : '' }}>高い順に表示</option>
                    <option value="low" {{ request('sort') == 'low' ? 'selected' : '' }}>低い順に表示</option>
                </select>
                
                @if (request('sort') === 'high')
                <div class="sort-tag">
                    <span>高い順に表示</span>
                    <a href="{{ request('keyword') ? '/products/search?keyword=' . request('keyword') : '/products' }}" class="sort-tag__remove">×</a>
                </div>
                @endif

                @if (request('sort') === 'low')
                <div class="sort-tag">
                    <span>低い順に表示</span>
                    <a href="{{ request('keyword') ? '/products/search?keyword=' . request('keyword') : '/products' }}" class="sort-tag__remove">×</a>
                </div>
                @endif

            </form>
        </aside>

        <main>
            <div class="product--list">
                @foreach($products as $product)
                <a href="/products/detail/{{ $product->id }}" class="products--card_link">
                    <div class="products--card">
                        <div class="product--img">
                            <img src="{{ asset('storage/' . $product->image) }}" width="100%">
                        </div>
                        <div class="product--info">
                            <p class="product--name">{{ $product->name }}</p>
                            <p class="product--price">¥{{ number_format($product->price)}}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            <!-- ページネーション -->
            <div class="pagination">
                @if ($products->onFirstPage())
                <span class="page-arrow disabled">&lt;</span>
                @else
                <a href="{{ $products->previousPageUrl() }}" class="page-arrow">&lt;</a>
                @endif

                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    @if ($i == $products->currentPage())
                    <span class="page-number active">{{ $i }}</span>
                    @else
                    <a href="{{ $products->url($i) }}" class="page-number">{{ $i }}</a>
                    @endif
                    @endfor

                    @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="page-arrow">&gt;</a>
                    @else
                    <span class="page-arrow disabled">&gt;</span>
                    @endif
            </div>
        </main>
    </div>
</div>
@endsection