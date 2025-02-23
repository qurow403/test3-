@extends('layouts.app')

@section('title', '商品登録')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
    <h2>商品登録</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">商品名 <span style="color: red;">必須</span></label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="商品名を入力">
            @error('name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">値段 <span style="color: red;">必須</span></label>
            <input type="text" name="price" class="form-control" value="{{ old('price') }}" placeholder="値段を入力">
            @error('price')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">商品画像 <span style="color: red;">必須</span></label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">季節 <span style="color: red;">必須</span></label>
            <div>
                @foreach($seasons as $season)
                    <div class="form-check">
                        <input type="checkbox" name="seasons[]" value="{{ $season->id }}" id="season_{{ $season->id }}" class="form-check-input">
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
            <label class="form-label">商品説明 <span style="color: red;">必須</span></label>
            <textarea name="description" class="form-control" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
            @error('description')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">登録</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
    </form>
@endsection
