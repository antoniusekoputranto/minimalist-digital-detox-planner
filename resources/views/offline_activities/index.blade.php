@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Aktivitas Offline</h1>
    <a href="{{ route('offline-activities.create') }}" class="btn btn-primary mb-3">Tambah Aktivitas</a>
    <ul class="list-group">
        @foreach ($activities as $activity)
            <li class="list-group-item">
                <a href="{{ route('offline-activities.show', $activity) }}">{{ $activity->activity_name }}</a>
                <span class="float-end">{{ $activity->scheduled_at }}</span>
            </li>
        @endforeach
    </ul>
</div>
@endsection
