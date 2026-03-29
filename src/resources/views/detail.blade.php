@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection


@section('content')
<div class="detail-form_container">

    <div class="page-info">
        <a href="/products">商品一覧</a>
        <p>> {{ $product->name }}</p>
    </div>
    <form class="detail-info__form" action="/products/{{ $product->id }}/update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="detail-item__container">

            <div class="detail-info__flex">
                <div class="detail-img__container">
                    <img src="{{ asset('storage/' . $product->image) }}">
                    <label class="file-label">
                        ファイルを選択
                        <input type="file" name="image" hidden>
                    </label>
                </div>
                <div class="error-message">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="detail-info__flex">
                <div class="detail-info">
                    <div class="form-item">
                        <label for="">商品名</label>
                        <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name', $product->name) }}">
                    </div>
                    <div class="name--error_container">
                        <div class="error-message">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="detail-info">
                    <div class="form-item">
                        <label for="">値段</label>
                        <input type="text" name="price" placeholder="値段を入力" value="{{ old('price', $product->price) }}">
                    </div>
                    <div class="name--error_container">
                        <div class="error-message">
                            @error('price')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="detail-info">
                    <label for="">季節</label>
                    <div class="checkbox-group">
                        @foreach ($seasons as $season)
                        <div class="checkbox-item">
                            <input type="checkbox" name="seasons[]" id="season-{{ $season->id }}" value="{{ $season->id }}" {{ in_array($season->id, old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label for="season-{{ $season->id }}">{{ $season->name }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="error-message">
                        @error('seasons')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="detail-lower">
                <div class="detail-info">
                    <div class="form-item">
                        <label class="column-name">商品説明</label>
                        <textarea name="description" id="description" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>

                <div class="btn-continer">
                    <button class="toFix" type="button" onclick="history.back()">戻る</button>
                    <button class="" type="submit">変更を保存</button>
                </div>
            </div>
        </div>
    </form>
    <form action="/products/{productId}/delete" method="post">
        @csrf
        <button type="submit">削除</button>
    </form>
</div>
@endsection