@extends('dashboard.layout')
@section('content')
<div class="container pb50">
    <div class="row">
        <div class="col-md-9 mb40">
            <article>
                <img src="{{asset($postDetails[0]->image)}}" alt="" class="img-fluid mb30">
                <img src="{{asset('images/posts/'.$postDetails[0]->image)}}" alt="" class="img-fluid mb30">
                <div class="post-content">
                    <h3>{{$postDetails[0]->title}}</h3>
                    <ul class="post-meta list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-user-circle-o"></i> <a href="#">{{$postDetails[0]->user->name}}</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-calendar-o"></i> <a href="#">{{$postDetails[0]->created_at}}</a>
                        </li>
                    </ul>
                    <p>
                        {{$postDetails[0]->content}}
                    </p>
                    {{-- <ul class="list-inline share-buttons">
                        <li class="list-inline-item">Share Post:</li>
                        <li class="list-inline-item">
                            <a href="#" class="social-icon-sm si-dark si-colored-facebook si-gray-round">
                                <i class="fa fa-facebook"></i>
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="social-icon-sm si-dark si-colored-twitter si-gray-round">
                                <i class="fa fa-twitter"></i>
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="social-icon-sm si-dark si-colored-linkedin si-gray-round">
                                <i class="fa fa-linkedin"></i>
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul> --}}
                    <hr class="mb40">
                    <h4 class="mb40 text-uppercase font500"> Author</h4>
                    <div class="media mb40">
                        <i class="d-flex mr-3 fa fa-user-circle fa-5x text-primary"></i>
                        <div class="media-body">
                            <h5 class="mt-0 font700">{{$postDetails[0]->user->name}}</h5>
                        </div>
                    </div>
                    <hr class="mb40">

                    @foreach ( $postDetails[0]->comments as $comment )

                    <div class="media mb40">
                        <i class="d-flex mr-3 fa fa-user-circle-o fa-3x"></i>
                        <div class="media-body">
                            <h5 class="mt-0 font400 clearfix">
                                <a href="#" class="float-right">Reply</a>
                                {{$comment->name}}</h5>{{$comment->content}}
                            </div>
                        </div>
                        @endforeach


                    <hr class="mb40">
                    @if (!auth())

                    <h4 class="mb40 text-uppercase font500">Post a comment</h4>
                    <form role="form">
                        <div class="form-group">
                            <label>الاسم</label>
                            <input type="text" class="form-control" placeholder="الاسم">
                        </div>
                        <div class="form-group">
                            <label>الايميل</label>
                            <input type="email" class="form-control" placeholder="الايميل">
                        </div>
                        <div class="form-group">
                            <label>التعليق</label>
                            <textarea class="form-control" rows="5" placeholder="التعليق"></textarea>
                        </div>
                        <div class="clearfix float-right">
                            <button type="button" class="btn btn-primary btn-lg">ارسال</button>
                        </div>
                    </form>
                    @endif
                </div>
            </article>
            <!-- post article-->

        </div>
        <div class="col-md-3 mb40">

            <!--/col-->
            <div class="mb40">
                <h4 class="sidebar-title">Categories</h4>
                <ul class="list-unstyled categories">
                    @foreach ($categories as $category )

                    <li><a href="#">{{$category->name}}</a></li>
                    @endforeach

                </ul>
            </div>
            <!--/col-->
            {{-- <div>
                <h4 class="sidebar-title">Latest News</h4>
                <ul class="list-unstyled">
                    <li class="media">
                        <img class="d-flex mr-3 img-fluid" width="64" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="#">Lorem ipsum dolor sit amet</a></h5> April 05, 2017
                        </div>
                    </li>
                    <li class="media my-4">
                        <img class="d-flex mr-3 img-fluid" width="64" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="#">Lorem ipsum dolor sit amet</a></h5> Jan 05, 2017
                        </div>
                    </li>
                    <li class="media">
                        <img class="d-flex mr-3 img-fluid" width="64" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="#">Lorem ipsum dolor sit amet</a></h5> March 15, 2017
                        </div>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>

@endsection
