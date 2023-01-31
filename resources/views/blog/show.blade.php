@extends('layouts.app')

@section('content')

<div class = "w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl ">
            {{$post->title}}
        </h1>
    </div>
</div>

@if($errors->any())

<div class="w-4/5 m-auto">
    <ul>
        @foreach($errors->all() as $error)
        <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>

@endif

<div class="w-4/5 m-auto pt-20">
    <span class="text-gray-500 ">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('js M Y', strtotime($post->updated_at)) }}
    </span>
    <p class="text-xl text-gray-700 pt-8 pb-10 font-light leading-8">
        {{$post->description}}
    </p>
</div>

@endsection