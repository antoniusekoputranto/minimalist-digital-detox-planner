@extends('layouts.app')

@section('content')
<h1>Edit Panduan Notifikasi</h1>
<form method="POST" action="{{ route('notification-guides.update', $notificationGuide) }}">
    @csrf
    @method('PUT')
    <label>Judul:</label>
    <input type="text" name="title" value="{{ $notificationGuide->title }}" required>
    <label>Konten:</label>
    <textarea name="content" required>{{ $notificationGuide->content }}</textarea>
    <button type="submit">Update</button>
</form>
@endsection
