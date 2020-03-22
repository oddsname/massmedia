<div class="form-group">
    <label for="{{$name}}">{{$text}}</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" name="{{$name}}" class="custom-file-input" id="{{$name}}">
            <label class="custom-file-label" for="{{$name}}">{{$file_name}}</label>
        </div>
        <div class="input-group-append">
            <a href="{{$file_path}}"><span class="input-group-text" id="">Show</span></a>
        </div>
    </div>
    @error($name)
        <span id="{{$name.'-error'}}" style="display: block" class="error invalid-feedback">{{$message}}</span>
    @enderror
</div>
