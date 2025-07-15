<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Panduan Sederhana Mematikan Notifikasi
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card shadow-sm">
                <div class="card-body">
                    @forelse ($notificationGuides as $guide)
                        <div class="mb-4">
                            <h5 class="card-title">{{ $guide->title }}</h5>
                            <p class="card-text">{!! nl2br(e($guide->content)) !!}</p>
                            <hr>
                        </div>
                    @empty
                        <p>Belum ada panduan notifikasi yang tersedia.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>