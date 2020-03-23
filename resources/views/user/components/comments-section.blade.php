<div class="card-body">
    <div class="tab-content">
        @if(isset($comments) && $comments->count())
            <div class="active tab-pane" id="activity">
                <!-- Post -->
                @foreach($comments as $comment)
                    <x-user.comments :comments="$comments" :comment="$comment"></x-user.comments>
                @endforeach
                <div class="post"></div>
                <!-- /.post -->
            </div>

        @endif

        <div class="active tab-pane" id="activity">
            <!-- Post -->
            <form class="form-comment" action="{{route('api.comment.add')}}" method="POST">
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
                    </div>
                    <!-- /.user-block -->
                    <p>


                    {!!  csrf_field() !!}
                    <div class="input-group input-group-sm mb-0">
                        <textarea class="form-control form-control-sm" name="content" type="text"
                                  placeholder="Type Comment"></textarea>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>

                    </p>
                </div>
            </form>
            <!-- /.post -->
        </div>

        <!-- /.tab-pane -->

    </div>
    <!-- /.tab-content -->
</div>
