@extends('admin.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Post Edit</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <x-form :action="route('admin.post.update', ['post' => $data])" method="PUT" enctype="true">
                    <x-input.text name="name" text="Name" :value="$data->name" />
                    <x-input.select name="category_id" text="Category" :selectedKey="$data->category_id" :options="$categories" />
                    <x-input.wysiwyg name="content" text="Content" :value="$data->content" />
                    <x-input.file name="file" text="File" :model="$data->file" />
                </x-form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
