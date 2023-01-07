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
    <form action="{{ route('admin.article.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="upload-group">
            <label for="artImage">Article Cover</label>
            <input type="file" name="artImage" id="artImage" @error('artImage') class="textbox-error" @enderror>
            @error('artImage')
            <span class="text-error">{{ $errors->first('artImage') }}</span>
            @enderror
        </div>
        <div>
            <label for="artTitle">Article Title</label>
            <input type="text" name="artTitle" id="artTitle" placeholder="Title" value="{{ old('artTitle') }}" @error('artTitle') class="textbox-error" @enderror>
            @error('artTitle')
            <span class="text-error">{{ $errors->first('artTitle') }}</span>
            @enderror
        </div>
        <div>
            <label for="artContent">Article Content</label>
            <textarea name="artContent" id="artContent" rows="25" @error('artContent') class="textbox-error" @enderror>{{ old('artContent') }}</textarea>
            @error('artContent')
            <span class="text-error">{{ $errors->first('artContent') }}</span>
            @enderror
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Create Article</button>
        </div>
    </form>
@endsection
