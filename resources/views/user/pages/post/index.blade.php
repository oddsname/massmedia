@extends('user.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item">
                            <a href="{{route('post.index')}}">All</a>
                        </li>
                        @foreach($categories as $category)
                            <li class="breadcrumb-item">
                                <a href="{{route('post.index', ['category' => $category->id])}}">{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-3 col-xs-6" data-id="{{$post->id}}">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{$post->name}}</h3>

                                <p>{{$post->category->name}}</p>
                            </div>
                            {{--<div class="icon">--}}
                            {{--<i class="ion ion-bag"></i>--}}
                            {{--</div>--}}
                            <a href="{{route('post.single', ['post' => $post])}}" class="small-box-footer">
                                More info
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>
    </section>
@endsection
