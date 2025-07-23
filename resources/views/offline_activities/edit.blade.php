@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Aktivitas Offline</h1>
    <form action="{{ route('offline-activities.update', $offlineActivity) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="activity_name" class="form-label">Nama Aktivitas</label>
            <input type="text" name="activity_name" class="form-control" value="{{ $offlineActivity->activity_name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control">{{ $offlineActivity->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="scheduled_at" class="form-label">Jadwal</label>
            <input type="datetime-local" name="scheduled_at" class="form-control" value="{{ \Carbon\Carbon::parse($offlineActivity->scheduled_at)->format('Y-m-d\TH:i') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
