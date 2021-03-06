@extends('admin.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Post Create</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <x-form :action="route('admin.post.store')" method="POST" enctype="true">
                    <x-input.text name="name" text="Name" />
                    <x-input.select name="category_id" text="Category" :options="$categories" />
                    <x-input.wysiwyg name="content" text="Content" />
                    <x-input.file name="file" text="File" />
                </x-form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
