<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Detail Rencana: {{ $detoxPlan->plan_name }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    Informasi Rencana
                </div>
                <div class="card-body">
                    <p><strong>Nama Rencana:</strong> {{ $detoxPlan->plan_name }}</p>
                    <p><strong>Periode:</strong> {{ $detoxPlan->start_date->format('d M Y') }} - {{ $detoxPlan->end_date->format('d M Y') }}</p>
                    <p><strong>Catatan:</strong> {{ $detoxPlan->notes ?: '-' }}</p>
                    <a href="{{ route('detox-plans.edit', $detoxPlan) }}" class="btn btn-warning btn-sm">Edit Rencana</a>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Kembali ke Dashboard</a>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Aktivitas Offline
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addActivityModal">
                        Tambah Aktivitas
                    </button>
                </div>
                <div class="card-body">
                    @forelse ($detoxPlan->offlineActivities as $activity)
                        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                            <div>
                                <span class="{{ $activity->is_completed ? 'text-decoration-line-through text-muted' : '' }}">
                                    <strong>{{ $activity->activity_name }}</strong>
                                    @if ($activity->description)
                                        - <small>{{ $activity->description }}</small>
                                    @endif
                                </span>
                            </div>
                            <div>
                                <form action="{{ route('offline-activities.update', $activity) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="is_completed" value="{{ $activity->is_completed ? 0 : 1 }}">
                                    <button type="submit" class="btn btn-sm {{ $activity->is_completed ? 'btn-outline-secondary' : 'btn-outline-success' }}">
                                        {{ $activity->is_completed ? 'Batalkan Selesai' : 'Selesai' }}
                                    </button>
                                </form>
                                <form action="{{ route('offline-activities.destroy', $activity) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus aktivitas ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada aktivitas offline untuk rencana ini. Tambahkan beberapa!</p>
                    @endforelse
                </div>
            </div>

            <div class="modal fade" id="addActivityModal" tabindex="-1" aria-labelledby="addActivityModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addActivityModalLabel">Tambah Aktivitas Offline Baru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('offline-activities.store', $detoxPlan) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="activity_name" class="form-label">Nama Aktivitas</label>
                                    <input type="text" class="form-control" id="activity_name" name="activity_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi (Opsional)</label>
                                    <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah Aktivitas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>