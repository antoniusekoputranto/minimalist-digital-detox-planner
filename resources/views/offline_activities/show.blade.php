@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $offlineActivity->activity_name }}</h1>
    <p><strong>Deskripsi:</strong> {{ $offlineActivity->description }}</p>
    <p><strong>Jadwal:</strong> {{ $offlineActivity->scheduled_at }}</p>
    <a href="{{ route('offline-activities.edit', $offlineActivity) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('offline-activities.destroy', $offlineActivity) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
</div>
@endsection
