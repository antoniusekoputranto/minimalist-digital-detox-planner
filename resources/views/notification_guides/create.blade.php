@extends('layouts.app')

@section('content')
<h1>Buat Panduan Notifikasi Baru</h1>
<form method="POST" action="{{ route('notification-guides.store') }}">
    @csrf
    <label>Judul:</label>
    <input type="text" name="title" required>
    <label>Konten:</label>
    <textarea name="content" required></textarea>
    <button type="submit">Simpan</button>
</form>
@endsection
