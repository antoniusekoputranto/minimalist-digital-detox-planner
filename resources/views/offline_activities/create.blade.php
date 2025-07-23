@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Aktivitas Offline</h1>
    <form action="{{ route('offline-activities.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="activity_name" class="form-label">Nama Aktivitas</label>
            <input type="text" name="activity_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="scheduled_at" class="form-label">Jadwal</label>
            <input type="datetime-local" name="scheduled_at" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
