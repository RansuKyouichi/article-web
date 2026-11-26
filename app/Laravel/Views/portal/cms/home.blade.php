
@extends('portal._layouts.main')

@section('contents')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Home CMS</h1>
            <p class="text-muted mb-0">
                Manage the content displayed on your homepage.
            </p>
        </div>
    </div>

    <form method="POST" action="" id="cms-form">

        @csrf

        <input type="hidden" name="code" value="home">
        <input type="hidden" name="title" value="Home Page">

        <textarea name="content" id="editor-content" hidden></textarea>

        <div class="card shadow-sm mb-4">

            <div class="card-header bg-white">
                <h5 class="mb-0">Hero / Welcome Section</h5>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Welcome Label</label>
                    <div class="editor" id="hero-label"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Main Heading</label>
                    <div class="editor" id="hero-title"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Accent Heading</label>
                    <div class="editor" id="hero-accent"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <div class="editor" id="hero-description"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bottom Note</label>
                    <div class="editor" id="hero-note"></div>
                </div>

            </div>
        </div>

        <div class="card shadow-sm mb-4">

            <div class="card-header bg-white">
                <h5 class="mb-0">Featured Story Section</h5>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Section Label</label>
                    <div class="editor" id="featured-label"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Section Heading</label>
                    <div class="editor" id="featured-title"></div>
                </div>

            </div>
        </div>

        <div class="card shadow-sm mb-4">

            <div class="card-header bg-white">
                <h5 class="mb-0">Latest Stories Section</h5>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Section Label</label>
                    <div class="editor" id="latest-label"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Section Heading</label>
                    <div class="editor" id="latest-title"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <div class="editor" id="latest-description"></div>
                </div>

            </div>
        </div>


        <div class="card shadow-sm mb-4">

            <div class="card-header bg-white">
                <h5 class="mb-0">Newsletter / Call-to-Action Section</h5>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Section Label</label>
                    <div class="editor" id="newsletter-label"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Section Heading</label>
                    <div class="editor" id="newsletter-title"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <div class="editor" id="newsletter-description"></div>
                </div>

            </div>
        </div>


        <div class="d-flex justify-content-end mb-4">

            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-save me-1"></i>
                Save Homepage Content
            </button>

        </div>

    </form>

</div>

@endsection


@section('page-scripts')

<script src="{{ asset('assets/libs/ckeditor5/build/ckeditor.js') }}"></script>

<script>
    const settings = @json($settings);

    const editorFields = {
        'hero-label': 'hero.label',
        'hero-title': 'hero.title',
        'hero-accent': 'hero.accent',
        'hero-description': 'hero.description',
        'hero-note': 'hero.note',

        'featured-label': 'featured.label',
        'featured-title': 'featured.title',

        'latest-label': 'latest.label',
        'latest-title': 'latest.title',
        'latest-description': 'latest.description',

        'newsletter-label': 'newsletter.label',
        'newsletter-title': 'newsletter.title',
        'newsletter-description': 'newsletter.description'
    };

    const editors = {};

    function getSetting(path) {
        return path.split('.').reduce((value, key) => {
            return value ? value[key] : '';
        }, settings);
    }

    function setSetting(path, value) {
        const keys = path.split('.');
        let target = settings;

        keys.forEach((key, index) => {
            if (index === keys.length - 1) {
                target[key] = value;
            } else {
                target[key] = target[key] || {};
                target = target[key];
            }
        });
    }

    Object.keys(editorFields).forEach(id => {

        ClassicEditor.create(document.querySelector('#' + id), {
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'underline', '|',
                'bulletedList', 'numberedList', 'link', '|',
                'fontColor', 'fontBackgroundColor', '|',
                'undo', 'redo'
            ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                ]
            }
        })
        .then(editor => {

            editors[id] = editor;

            editor.setData(getSetting(editorFields[id]) || '');

        })
        .catch(error => {
            console.error(error);
        });

    });


    document.querySelectorAll('[data-setting]').forEach(input => {

        const path = input.dataset.setting;

        input.value = getSetting(path) || '';

    });


    document.querySelector('#cms-form').addEventListener('submit', async function(event) {

        event.preventDefault();

        for (const id in editors) {

            const path = editorFields[id];

            setSetting(path, editors[id].getData());

        }

        document.querySelectorAll('[data-setting]').forEach(input => {

            setSetting(input.dataset.setting, input.value);

        });

        document.querySelector('#editor-content').value = JSON.stringify(settings);

        this.submit();

    });
</script>

@endsection
