@extends('templates.admin.page')

@section('headerJS')
    <link rel="stylesheet" href="{{ asset('sceditor/themes/default.min.css') }}"/>
    <script src="{{ asset('sceditor/sceditor.min.js') }}"></script>
    <script src="{{ asset('sceditor/formats/bbcode.js') }}"></script>
@endsection

@section('footerJS')
    <script>
        var textarea = document.getElementById('artContent');
        sceditor.create(textarea, {
            format: 'bbcode',
            plugins: 'undo,plaintext',
            width: '100%',
            bbcodeTrim: false,
            toolbar: "bold,italic,underline,strike|left,center,right,justify|size,color,removeformat|bulletlist,orderedlist|code,quote,horizontalrule|image,link,unlink,youtube|emoticon,source",
            resizeWidth: false,
            emoticonsEnabled: true,
            emoticonsRoot: "{{ asset('sceditor') . '/' }}",
            style: "{{ asset('sceditor/themes/content/default.min.css') }}",
        });
    </script>
@endsection

@section('content')
    <form action="{{ route('admin.article.update', $article->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="upload-group">
            <label for="artImage">Article Cover</label>
            <img src="{{ asset('assets/public/article/thumb/'. $article->image) }}" alt="Article Cover" class="rounded-md border-2">
            <input type="file" name="artImage" id="artImage">
        </div>
        <div>
            <label for="artTitle">Article Title</label>
            <input type="text" name="artTitle" id="artTitle" placeholder="Title" value="{{ old('title') ?? $article->title }}">
        </div>
        <div>
            <label for="artContent">Article Content</label>
            <textarea name="artContent" id="artContent" rows="25">{{ old('content') ?? $article->content }}</textarea>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Save Article</button>
        </div>
    </form>
@endsection
