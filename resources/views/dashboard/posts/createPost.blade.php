@extends('dashboard.layout')
@section('content')
    <form action="{{ route('store-post') }}" method="post" enctype="multipart/form-data" style='background:#fff;'>
        @csrf
        <div class="card">

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
                <select  id="category" name="category_id" class="">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                {{-- end categories  --}}

                {{-- status  --}}
                <label for="status" style="margin-right:20px;"> التصنيف</label>
                    <select type="file" id="status" name="status" class="">
                    <option value="active">نشر</option>
                    <option value="pending">مسودة</option>
                </select>
                @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                {{-- end status  --}}
            </div>

            {{-- title  --}}
            <div class="form-group">
                <label for="editor">العنوان</label>
                <textarea class="form control" id="editor" name="title"></textarea>
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- end title  --}}
            {{-- content  --}}
            <div class="form-group">
                <label for="content">المقال</label>
                <textarea class="form control" id="content" name="content"></textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- end content  --}}
            {{-- content  --}}
            <div class="form-group">
                <label for="tags">الوسوم</label>
                <textarea class="form control" id="tags" name="tags" cols="100%"></textarea>
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
