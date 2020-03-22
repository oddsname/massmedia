<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-gray">
        <div class="card-header">
            <h3 class="card-title">Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{$action}}" method="{{$method}}" @if($enctype)enctype="multipart/form-data"@endif>
            <div class="card-body">
                @csrf
                {{ method_field($field_method) }}
                {{ $slot }}
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
