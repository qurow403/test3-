@extends('layouts.app')

@section('title', '商品一覧')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<h2>商品一覧</h2>

    <div>
    <!-- 商品追加ボタン -->
    <a href="{{ route('products.register') }}" class="btn btn-success mb-3">+ 商品を追加</a>
    </div>

    <!-- 検索フォーム -->
    <form method="GET" action="{{ route('products.index') }}" class="mb-3">
        <input type="text" name="search" value="{{ request()->search }}" placeholder="商品名で検索" class="form-control d-inline-block w-25">

        <input type="hidden" name="sort" value="{{ request()->sort }}">  {{-- 並び替え条件保持のため追加 --}}
        <!-- 検索機能と並び替えを併用する場合、sort の値を検索フォームの input hidden に追加しないと、並び替えが消えてしまう可能性があるので追加 -->

        <button type="submit" class="btn btn-primary">検索</button>
    </form>

    <!-- 並び替えフォーム -->
    <form method="GET" action="{{ route('products.index') }}" class="mb-3">
        <input type="hidden" name="search" value="{{ request()->search }}">
        <select name="sort" class="form-control d-inline-block w-25">
            <option value="" selected>並び替え</option>
            <option value="price_desc" {{ request()->sort == 'price_desc' ? 'selected' : '' }}>高い順</option>
            <option value="price_asc" {{ request()->sort == 'price_asc' ? 'selected' : '' }}>低い順</option>
        </select>
        <button type="submit" class="btn btn-secondary">適用</button>
    </form>

    <!-- 並び替えタグ表示 -->
    @if(request()->sort)
        <span class="badge badge-info">
            @if(request()->sort == 'price_desc') 高い順
            @elseif(request()->sort == 'price_asc') 低い順
            @endif
            <a href="{{ route('products.index') }}" class="badge badge-danger">×</a>
        </span>
    @endif

    <!-- 商品一覧 -->
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>価格:</strong> ¥{{ number_format($product->price) }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">詳細</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- ページネーション -->
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection