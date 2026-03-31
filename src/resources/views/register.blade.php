@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection


@section('content')
<div class="register-form_container">
    <h2>商品登録</h2>
    <form class="detail-info__form" action="/products/register" method="post" enctype="multipart/form-data">
        @csrf
        <div class="register-form">
            <div class="detail-info">
                <div class="form-item">
                    <label for="">商品名
                        <span class="form-label__required">必須</span></label>
                    <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}">
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
                    <label for="">値段
                        <span class="form-label__required">必須</span></label>
                    <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}">
                </div>
                <div class="name--error_container">
                    <div class="error-message">
                        @foreach ($errors->get('price') as $message)
                        <p class="error-message">{{ $message }}</p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="detail-info__flex detail-info">
                <label for="">商品画像
                    <span class="form-label__required">必須</span></label>
                <div class="detail-img__container">
                    <img id="preview" src="" alt="画像プレビュー" style="display: none;" width="160px">

                    <label class="file-label">
                        ファイルを選択
                        <input type="file" name="image" id="imageInput" hidden>
                    </label>
                </div>
                <div class="error-message">
                    @foreach ($errors->get('image') as $message)
                    <p class="error-message">{{ $message }}</p>
                    @endforeach
                </div>
            </div>


            <div class="detail-info">
                <label for="">季節</label>
                <div class="checkbox-group">
                    @foreach ($seasons as $season)
                    <div class="checkbox-item">
                        <input type="checkbox" name="seasons[]"
                            class="chechbox-input"
                            id="season-{{ $season->id }}" value="{{ $season->id }}" >
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

            <div class="detail-info">
                <div class="form-item">
                    <label class="column-name">商品説明
                        <span class="form-label__required">必須</span>
                    </label>
                    <textarea class="detail-info_textarea" name="description" id="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                </div>
                <div class="error-message">
                    @foreach ($errors->get('description') as $message)
                    <p class="error-message">{{ $message }}</p>
                    @endforeach
                </div>
            </div>

            <div class="btn-continer">
                <button class="toFix" type="button" onclick="history.back()">戻る</button>
                <button class="" type="submit">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('preview');

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });
    })
</script>