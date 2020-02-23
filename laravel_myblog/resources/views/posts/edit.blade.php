@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')
	<h1>
      <a href="{{ url('/') }}" class="header-menu">Back</a>
      Edit Post
	</h1>
   <form action="{{ url('/posts', $post->id) }}" method="post">
	{{ csrf_field() }}
   {{ method_field('patch') }}
   <p>
      <input type="text" name="title" placeholder="enter title" value="{{ old('title',$post->title) }}">
      @if ($errors->has('title'))
      <span class="error">{{ $errors->first('title') }}</span>
      @endif
   </p>
	<p>
      <textarea name="body" placeholder="enter body">{{ old('body', $post->body) }}</textarea>
   @if ($errors->has('body'))
      <span class="error">{{ $errors->first('body') }}</span>
   @endif
   </p>
   <p>
      <input type="submit" value="Appdate">
   </p>
   </form>
@endsection


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <div class="container">
      @yield('content')
  </div>
</body>
</html>