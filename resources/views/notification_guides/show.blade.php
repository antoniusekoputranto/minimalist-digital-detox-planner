@extends('layouts.app')

@section('content')
<h1>{{ $notificationGuide->title }}</h1>
<p>{{ $notificationGuide->content }}</p>
<a href="{{ route('notification-guides.edit', $notificationGuide) }}">Edit</a>
@endsection
