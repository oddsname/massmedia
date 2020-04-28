@extends('user.app')

@section('content')
    <section class="content-header"></section>
    <!-- Main content -->
    <section class="content">
        @foreach($categories as $category)
            <div class="card">

                <div class="card-header">
                    <a href="{{route('category.single', ['category' => $category])}}"><h2 class="card-title">{{$category->name}}</h2></a>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Comments: {{ isset($category->comments) ? $category->comments->count() : 0 }}
                </div>

                <!-- /.card-footer-->
            </div>
        @endforeach
    </section>
@endsection
