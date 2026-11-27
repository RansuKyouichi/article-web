
@extends('portal._layouts.main')

@section('contents')

<div class="container-fluid p-4 p-lg-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="fw-bold mb-1">Articles CMS</h1>
            <p class="text-muted mb-0">Create and manage your articles.</p>
        </div>
    </div>


<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">
            {{ $editing_article ? 'Edit Article' : 'Create New Article' }}
        </h5>
    </div>

    <div class="card-body">
        <form
            method="POST"
            action="{{ $editing_article ? route('portal.cms.articles.update', $editing_article->id) : route('portal.cms.articles.store') }}"
            enctype="multipart/form-data"
            id="article-form"
        >
            @csrf

            <div class="mb-3">
                <label class="form-label">Article Title</label>
                <div id="article-title-editor"></div>
                <textarea name="name" id="article-name" hidden>{{ old('name', $editing_article->name ?? '') }}</textarea>
                @error('name')
                    <div class="text-danger small mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="article-image" class="form-label">Article Image</label>
                <input
                    type="file"
                    id="article-image"
                    name="image"
                    class="form-control"
                    accept=".jpg,.jpeg,.png"
                    {{ $editing_article ? '' : 'required' }}
                >
                @error('image')
                    <div class="text-danger small mt-2">{{ $message }}</div>
                @enderror
            </div>

            @if($editing_article && $editing_article->filename)
                <div class="mb-3">
                    <label class="form-label">Current Image</label>
                    <div>
                        <img
                            src="{{ rtrim($editing_article->directory, '/') }}/resized/{{ $editing_article->filename }}"
                            alt="{{ $editing_article->name }}"
                            class="img-fluid rounded"
                            style="max-width: 350px"
                        >
                    </div>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Article Content</label>
                <div id="article-content-editor"></div>
                <textarea name="description" id="article-content" hidden>{{ old('description', $editing_article->description ?? '') }}</textarea>
                @error('description')
                    <div class="text-danger small mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn btn-primary" id="article-submit-button">
                    {{ $editing_article ? 'Save Changes' : 'Create Article' }}
                </button>

                @if($editing_article)
                    <a href="{{ route('portal.cms.articles') }}" class="btn btn-outline-secondary">
                        Cancel Editing
                    </a>
                @else
                    <button type="button" class="btn btn-outline-secondary" id="clear-article-editor">
                        Clear Editor
                    </button>
                @endif
            </div>
        </form>
    </div>
</div>


    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <ul class="nav nav-tabs card-header-tabs" id="articleTabs">
                <li class="nav-item">
                    <button
                        class="nav-link active"
                        type="button"
                        data-bs-toggle="tab"
                        data-bs-target="#active-articles"
                    >
                        Active Articles ({{ $articles->count() }})
                    </button>
                </li>

                <li class="nav-item">
                    <button
                        class="nav-link"
                        type="button"
                        data-bs-toggle="tab"
                        data-bs-target="#deleted-articles"
                    >
                        Deleted Articles ({{ $deleted_articles->count() }})
                    </button>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content">

                <div class="tab-pane fade show active" id="active-articles">
                    @forelse($articles as $article)
                        <div class="border rounded p-3 mb-3">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-3">
                                    @if($article->filename)
                                        <img
                                            src="{{ rtrim($article->directory, '/') }}/resized/{{ $article->filename }}"
                                            class="img-fluid rounded"
                                            alt="{{ $article->name }}"
                                        >
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <h5 class="mb-2">{{ $article->name }}</h5>
                                    <p class="text-muted small mb-2">
                                        Created: {{ $article->created_at?->format('M d, Y') }}
                                    </p>
                                    <p class="text-muted small mb-0">
                                        Updated: {{ $article->updated_at?->format('M d, Y') }}
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <div class="d-flex flex-wrap gap-2">
                                        <a
                                            href="{{ route('portal.cms.articles.edit', $article->id) }}"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            method="POST"
                                            action="{{ route('portal.cms.articles.destroy', $article->id) }}"
                                            onsubmit="return confirm('Move this article to deleted articles?')"
                                        >
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <h5>No active articles</h5>
                            <p class="text-muted mb-0">Create your first article above.</p>
                        </div>
                    @endforelse
                </div>

                <div class="tab-pane fade" id="deleted-articles">
                    @forelse($deleted_articles as $article)
                        <div class="border rounded p-3 mb-3">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-3">
                                    @if($article->filename)
                                        <img
                                            src="{{ rtrim($article->directory, '/') }}/resized/{{ $article->filename }}"
                                            class="img-fluid rounded"
                                            alt="{{ $article->name }}"
                                        >
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <h5 class="mb-2">{{ $article->name }}</h5>
                                    <p class="text-muted small mb-0">
                                        Deleted: {{ $article->deleted_at?->format('M d, Y') }}
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <form
                                        method="POST"
                                        action=""
                                        onsubmit="return confirm('Restore this article?')"
                                    >
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">
                                            Restore
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <h5>No deleted articles</h5>
                            <p class="text-muted mb-0">Deleted articles will appear here.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('page-scripts')


<script src="{{ asset('assets/libs/ckeditor5/build/ckeditor.js') }}"></script>

<script>
let titleEditor;
let contentEditor;

const articleForm = document.querySelector('#article-form');
const titleField = document.querySelector('#article-name');
const contentField = document.querySelector('#article-content');

const initialTitle = @json(old('name', $editing_article->name ?? ''));
const initialContent = @json(old('description', $editing_article->description ?? ''));
const isEditing = @json((bool) $editing_article);

ClassicEditor.create(document.querySelector('#article-title-editor'), {
        toolbar: [
        'heading', '|',
        'bold', 'italic', 'underline', '|',
        'bulletedList', 'numberedList', '|',
        'link', 'blockQuote', '|',
        'insertTable', '|',
        'undo', 'redo'
    ]
})
.then(editor => {
    titleEditor = editor;
    editor.setData(initialTitle);
})
.catch(error => {
    console.error(error);
});

ClassicEditor.create(document.querySelector('#article-content-editor'), {
    toolbar: [
        'heading', '|',
        'bold', 'italic', 'underline', '|',
        'bulletedList', 'numberedList', '|',
        'link', 'blockQuote', '|',
        'insertTable', '|',
        'undo', 'redo'
    ]
})
.then(editor => {
    contentEditor = editor;
    editor.setData(initialContent);
})
.catch(error => {
    console.error(error);
});

articleForm.addEventListener('submit', function () {
    const titleHtml = titleEditor.getData();
    const titleText = new DOMParser()
        .parseFromString(titleHtml, 'text/html')
        .body.textContent
        .trim();

    titleField.value = titleText;
    contentField.value = contentEditor.getData();
});

if (!isEditing) {
    document.querySelector('#clear-article-editor').addEventListener('click', function () {
        titleEditor.setData('');
        contentEditor.setData('');
        titleField.value = '';
        contentField.value = '';
        document.querySelector('#article-image').value = '';
    });
}
</script>


@endsection
