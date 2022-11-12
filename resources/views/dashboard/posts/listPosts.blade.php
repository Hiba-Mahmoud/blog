{{-- @extends('dashboard.layout')
@section('content')
<table class="table">


    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">العنوان</th>
        <th scope="col">بواسطة</th>
        <th scope="col">الحالة</th>
        <th scope="col">تاريخ الكتابة</th>
        <th scope="col">الاجراءات</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($posts as $post )
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            @if ($post->user)

            <td>{{$post->user->name}}</td>
            @endif
            <td>{{$post->status}}</td>
            <td>{{$post->created_at}}</td>
            <td>

                <a class="btn btn-primary"href="{{route('show-post',$post->id)}}" > التفاصيل</a>
                @if (auth()->user()->id ==$post->user_id)

                <a class="btn btn-primary"href="{{route('edit-post',$post->id)}}" > تعديل</a>
                @endif
                @if (auth()->user()->role == 'admin')

                <form action="{{route('delete-post',$post->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="حذف">
                </form>
                @endif
            </td>

          </tr>
        @endforeach

    </tbody>
</table>
<div class="row justify-content-center">
{!! $posts->links() !!}
</div>
@endsection --}}
@extends('dashboard.layout')

@section('content')

<table class="table">


{{-- dd($posts) --}}
<thead class="thead-dark">
  <tr>
    <th scope="col">#</th>
    <th scope="col">العنوان</th>
    <th scope="col">بواسطة</th>
    <th scope="col">الحالة</th>
    <th scope="col">تاريخ الكتابة</th>
    <th scope="col">الاجراءات</th>
  </tr>
</thead>
<tbody>

    @foreach ($posts as $post )
    <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->status}}</td>
        <td>{{$post->created_at}}</td>
        <td>
            <a class="btn btn-primary"href="{{route('show-post',$post->id)}}" > التفاصيل</a>
            @if (auth()->user()->id ==$post->user_id)

            <a class="btn btn-primary"href="{{route('edit-post',$post->id)}}" > تعديل</a>
            @endif
            @if (auth()->user()->role == 'admin')

            <form action="{{route('delete-post',$post->id)}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="حذف">
            </form>
            @endif
            {{-- <a class="btn btn-danger" > delete</a> --}}
            {{-- <a class="btn btn-primary" href="{{route('edit-post',$post->id)}}"> update</a> --}}
        </td>

      </tr>
    @endforeach

</tbody>

</table>
<div class="container">
<div class="row justify-content-center text-xs-center">
{!! $posts->links() !!}
</div>
</div>




@endsection
