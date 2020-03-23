@extends('user.app')

@section('content')
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($data as $item)
                    <div class="col-lg-3 col-xs-6" data-id="{{$item->id}}">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{$item->name}}</h3>

                                <p>{{$item->category->name}}</p>
                            </div>
                            {{--<div class="icon">--}}
                                {{--<i class="ion ion-bag"></i>--}}
                            {{--</div>--}}
                            <a href="{{route('post.single', ['post' => $item])}}" class="small-box-footer">
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
