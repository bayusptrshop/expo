<div class="container" style="margin-top: 23rem;">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10 col-sm-12">
            <div class="text-center mb-4">
                <h2 class="page-title fw-bold text-primary">Penilaian Kontestan</h2>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div>{{ session('error') }}</div>
                </div>
            @endif

            @forelse ($kelompok as $item)
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-trophy-fill me-2 fs-4"></i>
                            <h4 class="mb-0">Form Penilaian</h4>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div id="alert-container-{{ $item->id }}" class="mb-3">
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <span class="fw-bold me-2">Nama Kontestan:</span>
                            <span class="badge badge-contestant">{{ $kelompok->nama_kontestan ?? '-'}}</span>
                        </div>
                    </div>

                        <div class="contestant-info mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-person-badge fs-4 me-2 text-primary"></i>
                                <h5 class="mb-0">Detail Kontestan</h5>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <span class="fw-bold me-2">Nama Kontestan:</span>
                                <span class="badge badge-contestant">{{ $item->nama_kontestan }}</span>
                            </div>
                        </div>

                        {{-- Perhatikan bahwa wire:submit.prevent sekarang menerima $item->id --}}
                        <form wire:submit.prevent="submitPenilaian({{ $item->id }})">
                            {{-- hidden input kontestan_id tidak diperlukan lagi karena id dikirim sebagai argumen --}}
                            {{-- <input type="hidden" wire:model="kontestan_id" value="{{ $item->id }}"> --}}

                            <div class="mb-4">
                                <label for="skor-{{ $item->id }}" class="form-label fw-bold d-flex align-items-center">
                                    <i class="bi bi-star-fill text-warning me-2"></i>
                                    Skor Penilaian:
                                </label>
                                <div class="">
                                    {{-- wire:model.live digunakan untuk update skor secara real-time di frontend --}}
                                    <select class="form-select form-control-lg fw-bold"
                                        id="skor-{{ $item->id }}"
                                        wire:model.live="penilaians.{{ $item->id }}" {{-- Binding ke array penilaians --}}
                                        required>
                                        <option value="">-- Pilih Nilai --</option>
                                        <option value="100">Hijau (100)</option>
                                        <option value="75">Kuning (75)</option>
                                        <option value="40">Merah (40)</option>
                                    </select>
                                    @error('penilaians.' . $item->id) {{-- Error message untuk elemen array spesifik --}}
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="progress mt-3" style="height: 8px;">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        style="width: {{ $penilaians[$item->id] ?? 0 }}%"> {{-- Nilai dari array penilaians --}}
                                    </div>
                                </div>
                                <div class="score-range mt-2 text-muted small">
                                    <span>Nilai Terpilih: {{ $penilaians[$item->id] ?? 'N/A' }}</span>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-2"></i>Simpan Penilaian
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer bg-light text-center py-3">
                        <small class="text-muted">Pastikan penilaian sudah sesuai sebelum menyimpan</small>
                    </div>
                </div>
            @empty
                {{-- Tampilan jika tidak ada kontestan --}}
                <div class="text-center p-5 card shadow-sm">
                    <i class="bi bi-info-circle fs-1 text-info mb-3"></i>
                    <p class="lead">Saat ini tidak ada kontestan yang sedang tampil untuk dinilai.</p>
                    <p class="text-muted">Silakan tunggu pengumuman kontestan selanjutnya.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:initialized', () => { // Gunakan 'livewire:initialized' untuk Livewire 3
        // Listener untuk event 'showAlertInCard' dari Livewire component
        Livewire.on('showAlertInCard', (event) => {
            // Livewire 3 mengirim data dalam event.detail
            const type = event.type || event.detail.type;
            const message = event.message || event.detail.message;
            const kontestanId = event.kontestanId || event.detail.kontestanId;

            const alertContainer = document.getElementById(`alert-container-${kontestanId}`);

            if (alertContainer) {
                // Hapus alert sebelumnya di container ini (opsional, jika Anda hanya ingin satu alert per kartu)
                alertContainer.innerHTML = '';

                let alertClass = '';
                if (type === 'success') {
                    alertClass = 'alert-success';
                } else if (type === 'error') {
                    alertClass = 'alert-danger';
                } else if (type === 'info') {
                    alertClass = 'alert-info';
                } else if (type === 'warning') {
                    alertClass = 'alert-warning';
                }

                const alertHTML = `
                    <div class="alert ${alertClass} alert-dismissible fade show d-flex align-items-center" role="alert">
                        ${type === 'success' ? '<i class="bi bi-check-circle-fill me-2"></i>' : ''}
                        ${type === 'error' ? '<i class="bi bi-exclamation-triangle-fill me-2"></i>' : ''}
                        ${type === 'info' ? '<i class="bi bi-info-circle-fill me-2"></i>' : ''}
                        ${type === 'warning' ? '<i class="bi bi-exclamation-octagon-fill me-2"></i>' : ''}
                        <div>${message}</div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                alertContainer.innerHTML = alertHTML;

                // Opsional: Hilangkan alert setelah beberapa detik
                // setTimeout(() => {
                //     const alertElement = alertContainer.querySelector('.alert');
                //     if (alertElement) {
                //         const bsAlert = new bootstrap.Alert(alertElement);
                //         bsAlert.close();
                //     }
                // }, 5000); // Alert hilang setelah 5 detik
            }
        });
    });
</script>
