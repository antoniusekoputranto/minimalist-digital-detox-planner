<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Dashboard
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Rencana Detoks Anda
                    <a href="{{ route('detox-plans.create') }}" class="btn btn-primary btn-sm">Buat Rencana Baru</a>
                </div>
                <div class="card-body">
                    @forelse ($detoxPlans as $plan)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $plan->plan_name }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Dari: {{ $plan->start_date->format('d M Y') }} sampai {{ $plan->end_date->format('d M Y') }}
                                    </small>
                                </p>
                                <a href="{{ route('detox-plans.show', $plan) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                                <a href="{{ route('detox-plans.edit', $plan) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('detox-plans.destroy', $plan) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus rencana ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p>Anda belum memiliki rencana detoks. Mulai buat satu sekarang!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>