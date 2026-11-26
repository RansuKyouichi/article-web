
@extends('portal._layouts.main')

@section('contents')

<div class="cms-container p-5">

    <h1>Article CMS</h1>

    <form method="POST" action="" id="cms-form">

        @csrf

        <input type="hidden" name="code" value="articles">
        <input type="hidden" name="title" value="Article Page">

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
    ]
})
.then(editor => {

    editorInstance = editor;

    editorInstance.setData(@json($page->content ?? ''));

    const form = document.querySelector('#cms-form');

    form.addEventListener('submit', function (event) {

        const content = editorInstance.getData();

        document.querySelector('#editor-content').value = content;

        console.log('Form submitted!');
        console.log('Content:', content);
        console.log('Content length:', content.length);

    });

})
.catch(error => {
    console.error('CKEditor initialization failed:', error);
});
</script>

@endsection
