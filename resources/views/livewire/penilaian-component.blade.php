<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10 col-sm-12">
            <div class="text-center mb-4">
                <h2 class="page-title fw-bold text-primary">Penilaian Kontestan</h2>
            </div>

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-trophy-fill me-2 fs-4"></i>
                        <h4 class="mb-0">Form Penilaian</h4>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- Alert Messages -->
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

                    <!-- Contestant Information -->
                    <div class="contestant-info mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-person-badge fs-4 me-2 text-primary"></i>
                            <h5 class="mb-0">Detail Kontestan</h5>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <span class="fw-bold me-2">Nama Kontestan:</span>
                            <span class="badge badge-contestant">{{ $kelompok->nama_kontestan }}</span>
                        </div>
                    </div>

                    <!-- Scoring Form -->
                    <form wire:submit.prevent="submitPenilaian">
                        <div class="mb-4">
                            <label for="skor" class="form-label fw-bold d-flex align-items-center">
                                <i class="bi bi-star-fill text-warning me-2"></i>
                                Skor Penilaian:
                            </label>
                            <div class="score-input-container">
                                <input type="number" class="form-control form-control-lg text-center fw-bold"
                                    id="skor" wire:model="skor" placeholder="0-100" min="0" max="100"
                                    required>
                            </div>
                            <div class="score-range mt-2">
                                <span>Minimum: 0</span>
                                <span>Maximum: 100</span>
                            </div>
                            <div class="progress mt-2" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar"
                                    style="width: {{ $skor ?? 0 }}%"></div>
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
        </div>
    </div>
</div>
