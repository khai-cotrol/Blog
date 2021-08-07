@extends('layout.master')
@section('content')

    <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('storage/' . $post->user->img)}}" alt="">
                        <span class="username">
                            <a href="#">{{$post->user->name}}</a>
                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">{{$post->created_at}}</span>
                    </div>
                    <!-- /.user-block -->
                    <label for="">{{$post->title}}</label>
                    <p>
                        {{$post->post}}
                    </p>

                    <p>
                        <a href="#" class="link-black text-sm mr-2"><i
                                class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i
                                class="far fa-thumbs-up mr-1"></i>
                            Like</a>
                        <span class="float-right">
                                        <a href="#" class="link-black text-sm">
{{--                                            <input type="hidden" value="{{$comment = \App\Models\Comment::where('post_id', $post->id)->get()}}">--}}
                                            {{--                                        <i class="far fa-comments mr-1"></i> Comments ({{count($comment)}})--}}
                                        </a>
                                        </span>
                    </p>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="post">
                                    <div class="user-block">
                                        @foreach($comments as $comment)
                                            <img class="img-circle img-bordered-sm" style="width: 30px"
                                                 src="{{asset('storage/' . $comment->user->img)}}"
                                                 alt="">
                                            <span class="username">
                            <a href="#">{{$comment->user->name}}</a>
                                                @can('crud')
                                                    <a href="{{route('comment.destroy', $comment->id)}}"
                                                       class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                @endcan
                                            </span>
                                            <span class="description">
                                                {{$comment->created_at}}
                                            </span>
                                            <!-- /.user-block -->
                                            {{--                                            <label for="">Comment</label>--}}
                                            <p>
                                                {{$comment->comment}}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('status.comment')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="comment" class="form-control"
                                   style="background-color: white;color: black" placeholder="Comment">
                            <input type="text" hidden name="user_id"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                            <input type="text" hidden name="post_id" value="{{$post->id}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <button type="submit" class="far fa-comment-dots"></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- /.tab-content -->
    </div>
@endsection
