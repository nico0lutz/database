@extends('layouts.app')

<style>
    .form {
        margin: 0 auto;
        width: 35%;
    }

    .center-headline {
        margin: auto;
        text-align: center;
    }

    .myPosts {
        margin: auto;
        width: 35%;
    }

    td {
        padding-bottom: 50px;
    }

    .tableItemButton {
        padding-right: 10px;
    }
</style>

@section('content')
    <div class="center-headline">
        <h2>Create Post</h2>
    </div>
    <div class="form">
        <form action="{{ url('addPost') }}" method="POST">
            @csrf
            <input name="author" type="text" placeholder="Your Name">
            <input name="title" type="text" placeholder="Title"><br>
            <textarea name="content" cols="80" rows="10" placeholder="Content">
            </textarea><br>
            <input type="submit" value="Add Post">
        </form>
    
    </div>

    <div class="center-headline">
        <h2>All Posts</h2>
    </div>
    <div class="myPosts">
    <table>
        @foreach ($posts as $p)
            <tr>
            <td>
                <h5>{{ $p->author }}</h5>
                <h4><b>{{ $p->title }}</b></h4>
                <p>{{ $p->content }}</p>
                <p>{{ $p->updated_at }}</p>
                <a class="tableItemButton" href="deletePost/{{ $p->id }}">Delete</a>
                <a class="tableItemButton" href="editPost/{{ $p->id }}/{{ $p->title }}/{{ $p->content }}/{{ $p->author }}">Edit</a>
            </td>
            </tr>
        @endforeach
    </table>
    
    </div>

@endsection