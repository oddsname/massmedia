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
                            <h4 class="p-3">{{$category->name}}</h4>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-3 w-100" id="nav-tabContent">
                                <div>
                                    {!! $category->description !!}
                                </div>
                                <div >
                                    <x-user.comments-section :model="$category"
                                                             :comments="$category->comments"></x-user.comments-section>

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
