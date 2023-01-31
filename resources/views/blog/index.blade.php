@extends('layouts.app')

@section('content')

<div class = "w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-100">
        <h1 class="text-6xl ">
            Blog Posts
        </h1>
    </div>
</div>

{{-- <div class="container">
   
    <div class="panel panel-primary">
      <div class="panel-heading"><h2>laravel 6 image upload example - ItSolutionStuff.com.com</h2></div>
      <div class="panel-body">
   
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
        @endif
  
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  
        <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
  
                <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                </div>
   
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
   
            </div>
        </form>
  
      </div>
    </div>
</div> --}}

@if(session()->has('message'))

    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 mx-4 test-gray-50 bg-green-500 rounded-2xl py-4">
            {{session()->get('message')}}
        </p>

    </div>

@endif



@if(Auth::check())

<div class="pt-15 w-4/5 m-auto">
    <a href="/blog/create"
    class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 rounded-3xl px-5">
        Create Post
    </a>
</div>

@endif

@forelse($posts as $post)

<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200 ">
    <div>
        <img src="{{url('/images/'.$post->image_path)}}" width="600" alt="">
    </div>
    <div>
        <h2 class="text-gray-700 font-bold text-5xl pb-4">
            {{$post->title}}
        </h2>
        <span class="text-gray-500 ">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('js M Y', strtotime($post->updated_at)) }}
        </span>
        <p class="text-xl text-gray-700 pt-8 pb-10 font-light leading-8">
            {{$post->description}}
        </p>
        <a href="/blog/{{$post->slug}}" class="bg-blue-500 text-gray-100 uppercase text-lg font-extrabold py-4 px-8 rounded-3xl">
            Keep Reading
        </a>

        @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id)

        <span class="float-right">
            <a href="/blog/{{$post->slug}}/edit"
            class="text-gray-700 italic hover:text-gray-900 pb-1 border b-2">
            Edit
            </a>
        </span>

        <span class="float-right">
            <form action="/blog/{{$post->slug}}"
            method="POST">
            
            @csrf
            @method('delete')
            
            <button type="submit"
            class="text-red-500 pr-3">
            Delete
            </button>
            
            </form>
        </span>
        @endif
        
    </div>
    
</div>
@empty
        <p class="text-xl text-gray-700 pt-8 pb-10 px-20 font-light leading-8">
            There are no posts to be shown
        </p>
@endforelse

@endsection