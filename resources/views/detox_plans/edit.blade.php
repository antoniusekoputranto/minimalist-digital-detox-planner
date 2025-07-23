@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Rencana Detoks</h2>
    <form action="{{ route('detox-plans.update', $detoxPlan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="plan_name">Nama Rencana</label>
            <input type="text" name="plan_name" id="plan_name" class="form-control" value="{{ old('plan_name', $detoxPlan->plan_name) }}" required>
        </div>

        <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $detoxPlan->start_date) }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">Tanggal Selesai</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $detoxPlan->end_date) }}" required>
        </div>

        <div class="form-group">
            <label for="notes">Catatan</label>
            <textarea name="notes" id="notes" class="form-control">{{ old('notes', $detoxPlan->notes) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
