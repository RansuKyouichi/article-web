
@extends('web._layouts.main')

@section('content')

<section class="article-detail">
    <div class="container">
        <div class="article-detail-container">
            <a href="{{ route('web.articles') }}" class="back-articles">
                &larr; Back to Articles
            </a>

            <div class="mt-5">
                <span class="article-category">
                    {{ $article['category'] }}
                </span>

                <h1 class="article-detail-title mt-3">
                    {{ $article['title'] }}
                </h1>

                <p class="article-detail-meta mt-3">
                    By {{ $article['author'] }}
                    ·
                    {{ $article['date'] }}
                </p>

                @if($article['image'])
                    <img
                        src="{{ $article['image'] }}"
                        alt="{{ $article['title'] }}"
                        class="article-detail-image"
                    >
                @endif

                <div class="article-detail-content">
                    {!! $article['content'] !!}
                </div>
            </div>

            <hr class="my-5">

            <a href="{{ route('web.articles') }}" class="back-articles">
                &larr; Explore More Articles
            </a>
        </div>
    </div>
</section>

@endsection

@section('page-styles')
<style>
.article-detail-container {
    max-width: 850px;
    margin: auto;
}

.article-detail-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.5rem, 5vw, 3.8rem);
    line-height: 1.2;
    color: var(--primary-color);
}

.article-detail-meta {
    color: var(--muted-color);
    font-size: 0.85rem;
}

.article-detail-image {
    width: 100%;
    height: 450px;
    object-fit: cover;
    border-radius: 8px;
    margin: 35px 0;
}

.article-detail-content {
    color: var(--primary-color);
    font-size: 1.05rem;
    line-height: 2;
    overflow-wrap: break-word;
}

.article-detail-content h1,
.article-detail-content h2,
.article-detail-content h3,
.article-detail-content h4 {
    line-height: 1.4;
    margin: 1.5rem 0 1rem;
}

.article-detail-content p {
    margin-bottom: 25px;
}

.article-detail-content ul,
.article-detail-content ol {
    padding-left: 2rem;
    margin-bottom: 1.5rem;
}

.article-detail-content img {
    max-width: 100%;
    height: auto;
}

.article-detail-content table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 1.5rem;
}

.article-detail-content th,
.article-detail-content td {
    border: 1px solid #dee2e6;
    padding: 0.75rem;
}

.back-articles {
    color: var(--accent-color);
    font-weight: 600;
    text-decoration: none;
}

@media (max-width: 576px) {
    .article-detail-image {
        height: 280px;
    }
}
</style>
@endsection
