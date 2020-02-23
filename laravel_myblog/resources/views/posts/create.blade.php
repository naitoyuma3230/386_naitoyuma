@extends('layouts.default')

@section('title', 'New Post')

@section('content')
	<h1>
      <a href="{{ url('/') }}" class="header-menu">Back</a>
      New Post
	</h1>
   <form action="{{ url('/posts') }}" method="post">
	{{ csrf_field() }}
   <p>
      <input type="text" name="title" placeholder="enter title" value="{{ old('title') }}">
      @if ($errors->has('title'))
      <span class="error">{{ $errors->first('title') }}</span>
      @endif
   </p>
	<p>
      <textarea name="body" placeholder="enter body" value="{{ old('body') }}"></textarea>
   </p>
   @if ($errors->has('body'))
      <span class="error">{{ $errors->first('body') }}</span>
   @endif
   <p>
      <input type="submit" value="add">
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