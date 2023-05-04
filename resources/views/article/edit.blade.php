@extends('base')

@section('title', 'Editace článku' . $article->title)
@section('description', 'Editor pro úpravu článku.')

@section('content')
    <h1>Editace článku</h1>

    <form action="{{ route('article.update', ['article' => $article]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Nadpis</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ?: $article->title }}" required minlength="3" maxlength="80" />
        </div>

        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ old('url') ?: $article->url }}" required minlength="3" maxlength="80" />
        </div>

        <div class="form-group">
            <label for="description">Popisek článku</label>
            <textarea name="description" id="description" rows="4" class="form-control" required minlength="25" maxlength="255">{{ old('description') ?: $article->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="content">Obsah článku</label>
            <textarea name="content" id="content" class="form-control" rows="8">{{ old('content') ?: $article->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Uložit článek</button>
    </form>
@endsection

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/et243de45kdjlsiipbaewtkzbfam9atzbe01psnwj0ivow8s/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#content',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            entities: '160,nbsp',
            entity_encoding: 'raw',
        });
    </script>
@endpush
