@extends('dashboard.layout')
@section('content')
    {{-- {{ route('update-post') }} --}}
    <form action="{{ route('update-post', $post->id) }}" method="post" enctype="multipart/form-data" style='background:#fff;'>
        @csrf
        <div class="card">
            <div>
                <img src="{{ asset('images/posts/' . $post->image) }}">
            </div>

            <div class="form-group">
                <label for="image">اضف صورة</label>
                <input type="file" id="image" name="image" class="">
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- categories --}}
            <div class="form-group">
                <label for="category"> التصنيف</label>
                <select id="category" name="category_id" class="" value="{{ $post->category_id }}">

                    @foreach ($categories as $category)
                        @if ($category->id == $post->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                {{-- end categories  --}}

                {{-- status  --}}
                <label for="status" style="margin-right:20px;"> التصنيف</label>
                <select type="file" id="status" name="status" class="">
                    @if ($post->status == 'active')
                        <option value="active" selected>نشر</option>
                    @else
                        <option value="pending" selected>مسودة</option>
                    @endif
                </select>
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                {{-- end status  --}}
            </div>

            {{-- title  --}}
            <div class="form-group">
                <label for="editor">العنوان</label>
                <textarea class="form control" id="editor" name="title">{{ $post->title }}</textarea>
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- end title  --}}
            {{-- content  --}}
            <div class="form-group">
                <label for="content">المقال</label>
                <textarea class="form control" id="content" name="content">{{ $post->content }}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- end content  --}}
            {{-- content  --}}
            <div class="form-group">
                <label for="tags">الوسوم</label>
                <textarea class="form control" id="tags" name="tags" cols="100%">{{ $post->tags }}</textarea>
            </div>
            @error('tags')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- end content  --}}

            <input type="submit" class="btn btn-primary" value="Submit">

        </div>
    </form>
@endsection
@section('javascripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
