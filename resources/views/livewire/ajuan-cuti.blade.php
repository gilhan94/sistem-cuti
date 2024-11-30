<div class="container-fluid">
    <div class="p-2"></div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h3>Ajukan Cuti</h3>
            </div>
            <div class="card-body">
                <form wire:submit="insert">
                    <div class="row">
                        {{-- Jenis Cuti --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jenis-cuti">Jenis Cuti</label>
                                <select wire:model="jenis_cuti" class="form-control" id="jenis-cuti">
                                    <option>-- Pilih Jenis Cuti</option>
                                    @foreach ($jenisCuti as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Waktu --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waktu_mulai">Waktu Mulai</label>
                                <input wire:model="waktu_mulai" type="date" min="0" max="90"
                                    class="form-control" id="waktu_mulai" placeholder="Masukan Waktu">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waktu_selesai">Waktu Selesai</label>
                                <input wire:model="waktu_selesai" type="date" min="0" max="90"
                                    class="form-control" id="waktu_selesai" placeholder="Masukan Waktu">
                            </div>
                        </div>

                        {{-- Alasan --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alasan">Alasan Cuti</label>
                                <textarea wire:model="alasan" class="form-control" id="alasan" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">KIRIM PENGAJUAN CUTI</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
