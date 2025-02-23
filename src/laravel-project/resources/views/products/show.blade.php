@extends('layouts.app')

@section('title', '商品詳細')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">商品名</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" placeholder="商品名を入力">

            @error('name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">値段</label>
            <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}" placeholder="値段を入力">

            @error('price')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
        <label class="form-label">季節</label>
        <div>
            @foreach($seasons as $season)
                <div class="form-check">
                    <input type="checkbox" name="seasons[]" value="{{ $season->id }}" id="season_{{ $season->id }}" class="form-check-input" {{ in_array($season->id, $product->seasons->pluck('id')->toArray()) ? 'checked' : '' }}>
                    <label class="form-check-label" for="season_{{ $season->id }}">
                        {{ $season->name }}
                    </label>
                </div>
            @endforeach
        </div>

        @error('seasons')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

        <div class="mb-3">
            <label class="form-label">商品説明</label>
            <textarea name="description" class="form-control" placeholder="商品の説明を入力">
                {{ old('description', $product->description) }}
            </textarea>

            @error('description')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">商品画像</label>
            <input type="file" name="image" class="form-control">

            @error('image')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            @if ($product->image)
                <div>
                    <img src="{{ asset('storage/' . $product->image) }}" width="100">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">変更を保存</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>

        <!-- ゴミ箱ボタン -->
        <button type="button" class="btn btn-danger float-end" onclick="if(confirm('本当に削除しますか？')){document.getElementById('delete-form').submit()}">
            🗑 削除
        </button>
    </form>

    <form id="delete-form" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>
@endsection