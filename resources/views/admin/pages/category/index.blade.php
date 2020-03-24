@extends('admin.app')

@section('content')
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-size: 1.9rem">Posts List</h3>


                            <div class="card-tools">
                                <a href="{{route('admin.category.create')}}" class="btn btn-success margin">Create</a>
                                {{--<div class="input-group input-group-sm" style="width: 150px;">--}}

                                    {{--<input type="text" name="table_search" class="form-control float-right"--}}
                                           {{--placeholder="Search">--}}

                                    {{--<div class="input-group-append">--}}
                                        {{--<button type="submit" class="btn btn-default"><i class="fas fa-search"></i>--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                    {{----}}

                                {{--</div>--}}
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Comments Count</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->comments->count()}}</td>
                                        <td>
                                            <x-operation-buttons :model="$item" folder="category" />
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>


        </div>
    </section>
@endsection
