
@extends('portal._layouts.main')

@section('contents')

<div class="cms-container p-5">

    <h1>Contact CMS</h1>

    <form method="POST" action="" id="cms-form">

        @csrf

        <input type="hidden" name="code" value="contact">
        <input type="hidden" name="title" value="Contact Page">

        <textarea name="content" id="editor-content" hidden></textarea>

        <div class="ckeditor-container">
            <div id="editor" class="editor"></div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Save Changes
        </button>

    </form>

</div>

@endsection

@section('page-scripts')

<script src="{{ asset('assets/libs/ckeditor5/build/ckeditor.js') }}"></script>

<script>
let editorInstance;

ClassicEditor.create(document.querySelector('#editor'), {
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
    editorInstance = editor;

    editorInstance.setData(@json($page->content ?? ''));

    document.querySelector('#cms-form').addEventListener('submit', function () {
        document.querySelector('#editor-content').value = editorInstance.getData();
    });
})
.catch(error => {
    console.error(error);
});
</script>

@endsection
