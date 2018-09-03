@extends('admin.master')
@section('content')

    @if(empty($commment))
    <h1 class="text-center">Manage Comments</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="main-table text-center table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>UserName</td>
                    <td>Product Name</td>
                    <td>Comment</td>
                    <td>Status</td>
                    <td>Added Date</td>
                    <td>Control</td>
                </tr>

                @foreach($comments as $comment)
                    <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->product->name }}</td>
                    <td>{{substr($comment->comment,0,20)}}</td>
                    <td>@if($comment->status == 1) Active @elseif($comment->status == 0) Disactive @endif</td>
                    <td>{{ $comment->created_at }}</td>
                    <td>

                        @if ($comment->status == 0)
                            <a href='comment/{{$comment->id}}/approve' class='btn btn-info activate'>Approve</a>
                        @elseif($comment->status == 1)
                            <a href='comment/{{$comment->id}}/close' class='btn btn-warning activate'>Close</a>

                        @endif

                                 <form class="form-horizontal" action="{{ route('comment.destroy', $comment->id) }}" method="POST" style="display: inline;">

                                     <input name="_method" type="hidden" value="DELETE">
                                     @csrf

                                    <input class="btn btn-danger btn  confirm" type="submit" value="Delete">
                                 </form>

                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@else
            <div class="container">
                <div class="nice-message">There\'s No Comments To Show</div>
            </div>
@endif
@endsection