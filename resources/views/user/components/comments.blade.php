@if($comment->parent === 0 || $isChild )
    <div class="comment-block {{!$isChild ? 'post' : ''}}">
        <div class="user-block">
            <img class="img-circle img-bordered-sm"
                 src="/assets/dist/img/avatar-comment.png"
                 style="object-fit: cover;"
                 alt="user image">
            <span class="username"><a href="#">{{$comment->author}}</a></span>
        </div>
        <p>
            {{ $comment->content }}
        </p>
        <p>
            <a href="#" class="link-black text-sm mr-2 reply-comment"><i class="fas fa-share mr-1"></i> Reply</a>
        </p>
        <div style="margin-left: 75px;">
            <form class="form-comment" action="{{ route('api.comment.add') }}" method="POST">
                {!!  csrf_field() !!}
                <div class="reply-section" style="display: none;">
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="/assets/dist/img/avatar-comment.png"
                                 style="object-fit: cover;"
                                 alt="user image">
                            <span class="username">
                            <input class=" w-25 form-control form-control-sm" type="text" name="author"
                                   placeholder="Type a Name and Surname">
                            </span>
                            <span class="author-error error invalid-feedback">test</span>
                        </div>

                        <p>
                        <div class="input-group input-group-sm mb-0">
                            <textarea class="form-control form-control-sm" type="text" name="content"
                                      placeholder="Type Comment"></textarea>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                            <span class="content-error error invalid-feedback">test</span>
                        </div>
                        </p>
                    </div>
                </div>
            </form>
            <?php $child_comments = $comments->where('parent', $comment->id);?>

            @if($child_comments->count())
                @foreach($child_comments as $child_comment)
                    <x-user.comments :comments="$comments" :comment="$child_comment"
                                     :isChild="true"></x-user.comments>
                @endforeach
            @endif

        </div>
    </div>
@endif
