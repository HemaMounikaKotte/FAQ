@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Questions
                        <a class="btn btn-primary float-right" href="{{ route('questions.create') }}">
                            Create a Question
                        </a>

                        <div class="card-body">

                            <div class="card-deck">
                                @forelse($questions as $question)
                                    <div class="col-sm-4 d-flex align-items-stretch">
                                        <div class="card mb-3 ">
                                            <div class="card-header">
                                                <small class="text-muted">
                                                    Updated: {{ $question->created_at->diffForHumans() }}
                                                    Answers: {{ $question->answers()->count() }}

                                                </small>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{$question->body}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text">

                                                    <a class="btn btn-primary float-right" href="{{ route('questions.show', ['id' => $question->id]) }}">
                                                        View
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    There are no questions to view, you can  create a question.
                                @endforelse


                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{ $questions->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Create a new Post</div>

                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if (session('errors'))
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    @foreach (session('errors')->all() as $error)
                                        <ul>
                                            <li>{{ $error }}</li>
                                        </ul>
                                    @endforeach
                                </div>
                            @endif

                            <form method="post" action="{{ url('/post/store') }}">
                                {{ csrf_field() }}
                                <input type="text" name="title" placeholder="title..." class="form-control" style="margin-bottom: 10px;">
                                <textarea name="content" rows="10" class="form-control" placeholder="content..." style="margin-bottom: 10px;"></textarea>
                                <input type="submit" value="Create a new Post" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">All Posts</div>

                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Craeted By</th>
                                <th>Created At</th>
                                <th></th>
                                </thead>
                                <tbody>

                              @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ substr(strip_tags($post->content), 0, 30) }}{{ strlen(strip_tags($post->content)) > 30 ? "....." : "" }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                                        <td><a href="{{ route('post.show', $post->id) }}" class="btn btn-primary btn-xs">Show Post</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                @if (count($posts) > 0)
                                    <tfoot>
                                    <tr>
                                        <td colspan="5">{{ $posts->links() }}</td>
                                    </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection