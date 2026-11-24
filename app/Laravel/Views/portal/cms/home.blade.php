@extends('portal._layouts.main')

@section('contents')

<div class="home-container p-5">

<h1>Home CMS</h1>

<div class="ckeditor-container">
    <div id="editor" class="container editor">
        <textarea class="form-control editor" name="answer"></textarea>
    </div>
</div>


</div>


@endsection

@section('page-scripts')

<script src="{{ asset('assets/libs/ckeditor5/build/ckeditor.js') }}"></script>

<script>
ClassicEditor.create(document.querySelector('.editor'), {
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
}).catch(error => console.error(error));
</script>
    
@stop

@section('page-styles')
<style>


</style>   
@endsection