@php
    $selectedJk = old('jk', $penghuni->jk ?? '');
    $selectedKamar = old('kamar', $penghuni->kamar ?? '');
    $selectedStatus = old('status', $penghuni->status ?? 'Belum lunas');
    $defaultTglMasuk = isset($penghuni) && $penghuni->tgl_masuk
        ? \Carbon\Carbon::parse($penghuni->tgl_masuk)->format('Y-m-d')
        : date('Y-m-d');
@endphp

<div class="mb-3">
    <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
    <input type="text"
           class="form-control @error('nama') is-invalid @enderror"
           id="nama"
           name="nama"
           value="{{ old('nama', $penghuni->nama ?? '') }}"
           placeholder="Contoh: Siti Rahma"
           required>
    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row g-3 mb-3">
    <div class="col-md-7">
        <label for="nik" class="form-label">Nomor KTP / NIK <span class="text-danger">*</span></label>
        <input type="text"
               class="form-control @error('nik') is-invalid @enderror"
               id="nik"
               name="nik"
               value="{{ old('nik', $penghuni->nik ?? '') }}"
               placeholder="16 digit NIK sesuai KTP"
               required>
        @error('nik')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-5">
        <label class="form-label d-block">Jenis Kelamin <span class="text-danger">*</span></label>
        <div class="pt-2">
            <div class="form-check form-check-inline">
                <input class="form-check-input"
                       type="radio"
                       name="jk"
                       id="laki"
                       value="Laki-laki"
                       {{ $selectedJk === 'Laki-laki' || $selectedJk === 'Laki laki' ? 'checked' : '' }}
                       required>
                <label class="form-check-label" for="laki">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input"
                       type="radio"
                       name="jk"
                       id="perempuan"
                       value="Perempuan"
                       {{ $selectedJk === 'Perempuan' ? 'checked' : '' }}>
                <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
        </div>
        @error('jk')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label for="telepon" class="form-label">No. HP / WhatsApp <span class="text-danger">*</span></label>
        <input type="tel"
               class="form-control @error('telepon') is-invalid @enderror"
               id="telepon"
               name="telepon"
               value="{{ old('telepon', $penghuni->telepon ?? '') }}"
               placeholder="08xxxxxxxxxx"
               required>
        @error('telepon')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="pekerjaan" class="form-label">Pekerjaan / Instansi</label>
        <input type="text"
               class="form-control @error('pekerjaan') is-invalid @enderror"
               id="pekerjaan"
               name="pekerjaan"
               value="{{ old('pekerjaan', $penghuni->pekerjaan ?? '') }}"
               placeholder="Contoh: Mahasiswa UGM / Karyawan">
        @error('pekerjaan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<hr class="my-4 border-2 border-dark opacity-100">

<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label for="kamar" class="form-label">Pilih Kamar Kos <span class="text-danger">*</span></label>
        <select class="form-select @error('kamar') is-invalid @enderror" id="kamar" name="kamar" required>
            <option value="">-- Pilih Kamar Tersedia --</option>
            <option value="Kamar A-01 (Griya Harmoni)" {{ $selectedKamar === 'Kamar A-01 (Griya Harmoni)' ? 'selected' : '' }}>Kamar A-01 (Kos Griya Harmoni)</option>
            <option value="Kamar A-02 (Griya Harmoni)" {{ $selectedKamar === 'Kamar A-02 (Griya Harmoni)' ? 'selected' : '' }}>Kamar A-02 (Kos Griya Harmoni)</option>
            <option value="Kamar B-05 (Barokah Jaya)" {{ $selectedKamar === 'Kamar B-05 (Barokah Jaya)' ? 'selected' : '' }}>Kamar B-05 (Kos Barokah Jaya)</option>
            <option value="Kamar C-03 (Green Residence)" {{ $selectedKamar === 'Kamar C-03 (Green Residence)' ? 'selected' : '' }}>Kamar C-03 (Kos Green Residence)</option>
        </select>
        @error('kamar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="tgl_masuk" class="form-label">Tanggal Mulai Masuk <span class="text-danger">*</span></label>
        <input type="date"
               class="form-control @error('tgl_masuk') is-invalid @enderror"
               id="tgl_masuk"
               name="tgl_masuk"
               value="{{ old('tgl_masuk', $defaultTglMasuk) }}"
               required>
        @error('tgl_masuk')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label for="harga" class="form-label">Biaya Sewa per Bulan (Rp) <span class="text-danger">*</span></label>
        <div class="input-group has-validation">
            <span class="input-group-text">Rp</span>
            <input type="number"
                   class="form-control @error('harga') is-invalid @enderror"
                   id="harga"
                   name="harga"
                   value="{{ old('harga', $penghuni->harga ?? '1200000') }}"
                   placeholder="1200000"
                   min="0"
                   step="50000"
                   required>
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <label for="status" class="form-label">Status Pembayaran <span class="text-danger">*</span></label>
        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
            <option value="Belum lunas" {{ $selectedStatus === 'Belum lunas' ? 'selected' : '' }}>Belum lunas</option>
            <option value="Lunas" {{ $selectedStatus === 'Lunas' ? 'selected' : '' }}>Lunas</option>
            <option value="Nunggak" {{ $selectedStatus === 'Nunggak' ? 'selected' : '' }}>Nunggak</option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-4">
    <label for="kontak_darurat" class="form-label">Kontak Darurat (Nama &amp; No. HP) <span class="text-danger">*</span></label>
    <input type="text"
           class="form-control @error('kontak_darurat') is-invalid @enderror"
           id="kontak_darurat"
           name="kontak_darurat"
           value="{{ old('kontak_darurat', $penghuni->kontak_darurat ?? '') }}"
           placeholder="Contoh: Ibu Rahma (081298765432)"
           required>
    <div class="form-text">Dapat dihubungi jika terjadi keadaan mendesak terkait penghuni.</div>
    @error('kontak_darurat')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex gap-2 justify-content-end">
    <a href="{{ route('penghuni.index') }}" class="btn btn-secondary">
        <i class="bi bi-x-circle"></i>
        <span>Batal</span>
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-save"></i>
        <span>{{ $submitLabel }}</span>
    </button>
</div>

