@extends('user.app')

@section('content')
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <h4 class="p-3">{{$post->name}}</h4>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                @if(isset($post->file))
                                    @if($post->file->type === 'img')
                                        <p><img class="img-fluid" style="  display: block;margin-left: auto; margin-right: auto;
                                        width: 50%; max-height: 450px; object-fit: cover" src="{{$post->file->path}}"
                                                alt="Photo"></p>
                                    @else
                                        <p><a style="font-size: large;"
                                              href="{{$post->file->path}}"><b>File: {{$post->file->name}}</b></a></p>
                                    @endif

                                @endif
                                <div class="tab-pane active">
                                    <div class="row mt-4">
                                        <nav class="w-100">
                                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="product-desc-tab"
                                                   data-toggle="tab" href="#product-desc" role="tab"
                                                   aria-controls="product-desc" aria-selected="true">Content</a>
                                                @if(isset($post->category))
                                                    <a class="nav-item nav-link" id="product-comments-tab"
                                                       data-toggle="tab"
                                                       href="#product-comments" role="tab"
                                                       aria-controls="product-comments"
                                                       aria-selected="false">{{$post->category->name}}</a>
                                                @endif
                                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                                   href="#product-rating" role="tab" aria-controls="product-rating"
                                                   aria-selected="false">Comments</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content p-3 w-100"  id="nav-tabContent">
                                            <div class="tab-pane fade active show" id="product-desc" role="tabpanel"
                                                 aria-labelledby="product-desc-tab"> {!! $post->content !!}
                                            </div>
                                            @if(isset($post->category))
                                                <div class="tab-pane fade" id="product-comments" role="tabpanel"
                                                     aria-labelledby="product-comments-tab"> {!! $post->category->description !!}
                                                </div>
                                            @endif
                                            <div class="tab-pane fade" id="product-rating" role="tabpanel"
                                                 aria-labelledby="product-rating-tab">
                                                <x-user.comments-section :comments="$post->comments"></x-user.comments-section>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>
            </div>
        </div>
    </section>
@endsection
