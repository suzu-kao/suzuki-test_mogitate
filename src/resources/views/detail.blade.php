@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection


@section('content')
<div class="detail-form_container">

    <div class="page-info">
        <a href="/products" class="back-to-products">商品一覧</a>
        <span class="page-info__span">></span>
        <p>{{ $product->name }}</p>
    </div>
    <form class="detail-info__form" action="/products/{{ $product->id }}/update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="detail-item__container">
            <div class="detail-info__flex">
                <div class="detail-img__container">
                    <img class="detail-img" src="{{ asset('storage/' . $product->image) }}">
                    <label class="file-label">
                        ファイルを選択
                        <input type="file" name="image" hidden>
                    </label>
                </div>
                <div class="error-message">
                    @foreach ($errors->get('image') as $message)
                    <p class="error-message">{{ $message }}</p>
                    @endforeach
                </div>

                <div class="detail-info_item">
                    <div class="detail-info">
                        <div class="form-item">
                            <label for="">商品名</label>
                            <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name', $product->name) }}">
                        </div>
                        <div class="name--error_container">
                            <div class="error-message">
                                @foreach ($errors->get('name') as $message)
                                <p class="error-message">{{ $message }}</p>
                                @endforeach
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
                                @foreach ($errors->get('price') as $message)
                                <p class="error-message">{{ $message }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="detail-info">
                        <label for="">季節</label>
                        <div class="checkbox-group">
                            @foreach ($seasons as $season)
                            <div class="checkbox-item">
                                <input type="checkbox" name="seasons[]"
                                    class="checbox-input"
                                    id="season-{{ $season->id }}" value="{{ $season->id }}" {{ in_array($season->id, old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
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
            </div>

            <div class="detail-lower">
                <div class="detail-info_description">
                    <div class="item_description">
                        <label class="column-name">商品説明</label>
                        <textarea name="description"
                            class="item_description_textarea"
                            id="description" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
                    </div>
                    <div class="error-message">
                        @foreach ($errors->get('description') as $message)
                        <p class="error-message">{{ $message }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="btn-continer">
                    <button class="toFix" type="button" onclick="history.back()">戻る</button>
                    <button class="toModifi" type="submit">変更を保存</button>
    </form>
    <form action="/products/{{$product->id}}/delete" method="post">
        @csrf
        <button type="submit"><i class="fa-solid fa-trash"></i></button>
    </form>
</div>
</div>
</div>
@endsection