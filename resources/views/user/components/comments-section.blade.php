<div class="card-body">
    <div class="tab-content comment-block">

            <div class="active tab-pane sub-comments__content" id="activity">
                <!-- Post -->
                @if(isset($comments) && $comments->count())
                @foreach($comments as $comment)
                    <x-user.comments
                        :model_type="get_class($model)"
                        :model_id="$model->id"
                        :comments="$comments"
                        :comment="$comment"
                        :parent="0"
                    ></x-user.comments>
                @endforeach

                @endif
            </div>

        <form class="form-comment" action="{{route('api.comment.add')}}" method="POST">
            {!!  csrf_field() !!}
            <input type="hidden" name="model_type" value="{{get_class($model)}}">
            <input type="hidden" name="model_id" value="{{$model->id}}">
            <input type="hidden" name="parent" value="0">
            <div class="post">
                <div class="user-block">
                    <img class="img-circle img-bordered-sm"
                         src="/assets/dist/img/avatar-comment.png"
                         style="object-fit: cover;"
                         alt="user image">
                    <span class="username">
                            <input class=" w-25 form-control form-control-sm" name="author" type="text"
                                   placeholder="Type a Name and Surname">
                        </span>
                    <span class="author-error error invalid-feedback"></span>
                </div>
                <!-- /.user-block -->
                <p>
                <div class="input-group input-group-sm mb-0">
                        <textarea class="form-control form-control-sm" name="content" type="text"
                                  placeholder="Type Comment"></textarea>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                    <span class="content-error error invalid-feedback"></span>
                </div>
                </p>
            </div>
        </form>


        {{--<div class="active tab-pane" id="activity">--}}
            {{--<!-- Post -->--}}

            {{--<!-- /.post -->--}}
        {{--</div>--}}

        <!-- /.tab-pane -->

    </div>
    <!-- /.tab-content -->
</div>
