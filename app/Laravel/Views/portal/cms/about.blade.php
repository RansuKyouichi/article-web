
@extends('portal._layouts.main')

@section('contents')

<div class="container-fluid p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">About CMS</h1>
            <p class="text-muted mb-0">Manage the content displayed on your About page.</p>
        </div>
    </div>

    <form method="POST" action="" id="cms-form">

        @csrf

        <input type="hidden" name="code" value="about">
        <input type="hidden" name="title" value="About Page">

        <textarea name="content" id="editor-content" hidden></textarea>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Hero Section</h5>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Section Label</label>
                    <div class="editor" id="hero-label"></div>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Main Title</label>
                            <div class="editor" id="hero-title"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Accent Title</label>
                            <div class="editor" id="hero-accent"></div>
                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <div class="editor" id="hero-description"></div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Our Story</h5>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Section Label</label>
                    <div class="editor" id="story-label"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Story Heading</label>
                    <div class="editor" id="story-title"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Paragraph 1</label>
                    <div class="editor" id="story-paragraph1"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Paragraph 2</label>
                    <div class="editor" id="story-paragraph2"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Paragraph 3</label>
                    <div class="editor" id="story-paragraph3"></div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Mission and Vision</h5>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Section Label</label>
                    <div class="editor" id="purpose-label"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Section Heading</label>
                    <div class="editor" id="purpose-title"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <div class="editor" id="purpose-description"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mission</label>
                    <div class="editor" id="purpose-mission"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Vision</label>
                    <div class="editor" id="purpose-vision"></div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Our Core Values</h5>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Section Heading</label>
                    <div class="editor" id="values-title"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Section Description</label>
                    <div class="editor" id="values-description"></div>
                </div>

                @for($i = 1; $i <= 4; $i++)
                    <div class="border rounded p-3 mb-3">
                        <h6 class="mb-3">Value {{ $i }}</h6>

                        <div class="mb-3">
                            <label class="form-label">Value Title</label>
                            <div class="editor" id="value-{{ $i }}-title"></div>
                        </div>

                        <div class="mb-0">
                            <label class="form-label">Value Description</label>
                            <div class="editor" id="value-{{ $i }}-description"></div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Call to Action</h5>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <div class="editor" id="cta-title"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <div class="editor" id="cta-description"></div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mb-4">
            <button type="submit" class="btn btn-primary px-4">
                Save Changes
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

        'story-label': 'story.label',
        'story-title': 'story.title',
        'story-paragraph1': 'story.paragraph1',
        'story-paragraph2': 'story.paragraph2',
        'story-paragraph3': 'story.paragraph3',

        'purpose-label': 'purpose.label',
        'purpose-title': 'purpose.title',
        'purpose-description': 'purpose.description',
        'purpose-mission': 'purpose.mission',
        'purpose-vision': 'purpose.vision',

        'values-title': 'values.title',
        'values-description': 'values.description',

        'value-1-title': 'values.items.0.title',
        'value-1-description': 'values.items.0.description',

        'value-2-title': 'values.items.1.title',
        'value-2-description': 'values.items.1.description',

        'value-3-title': 'values.items.2.title',
        'value-3-description': 'values.items.2.description',

        'value-4-title': 'values.items.3.title',
        'value-4-description': 'values.items.3.description',

        'cta-title': 'cta.title',
        'cta-description': 'cta.description'
    };

    const editors = {};
    const editorPromises = [];

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
        const path = editorFields[id];

        const editorPromise = ClassicEditor.create(document.querySelector('#' + id), {
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
        }).then(editor => {
            editors[id] = editor;
            editor.setData(getSetting(path) || '');
            return editor;
        }).catch(error => {
            console.error('CKEditor initialization failed:', error);
            throw error;
        });

        editorPromises.push(editorPromise);
    });

    document.querySelector('#cms-form').addEventListener('submit', async function(event) {
        event.preventDefault();

        await Promise.all(editorPromises);

        for (const id in editors) {
            setSetting(editorFields[id], editors[id].getData());
        }

        document.querySelector('#editor-content').value = JSON.stringify(settings);

        this.submit();
    });
</script>

@endsection

