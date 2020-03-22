@extends('admin.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category Edit</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <x-form :action="route('admin.category.update', ['category' => $data])" method="PUT">
                    <x-input.text name="name" :value="$data->name" text="Name" />
                    <x-input.text name="description" :value="$data->description" text="Description" />
                </x-form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
