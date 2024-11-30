<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Pengajuan Cuti</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>NO</th>
                            <th class="px-0">KARYAWAN</th>
                            <th class="px-0">CUTI</th>
                            <th>LAMA CUTI</th>
                            <th>PENERIMAAN</th>
                            <th>AKSI</th>
                        </thead>
                        <tbody>
                            @foreach ($dataCuti as $key => $item)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="p-0 m-0">
                                        <div>
                                            <table>
                                                <tr style="border: 0;">
                                                    <th class="p-1 m-0" style="border: 0">Nama</th>
                                                    <td class="p-1 m-0" style="border: 0">{{ $item['pengaju']['name'] }}
                                                    </td>
                                                </tr>
                                                <tr style="border: 0;">
                                                    <th class="p-1 m-0" style="border: 0">Email</th>
                                                    <td class="p-1 m-0" style="border: 0">
                                                        {{ $item['pengaju']['email'] }}</td>
                                                </tr>
                                                <tr style="border: 0;">
                                                    <th class="p-1 m-0" style="border: 0">Divisi</th>
                                                    <td class="p-1 m-0" style="border: 0">
                                                        {{ $item['pengaju']['data_divisi']['nama'] }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td class="p-0 m-0">
                                        <table>
                                            <tr style="border: 0;">
                                                <th class="p-1 m-0" style="border: 0">Request</th>
                                                <td class="p-1 m-0" style="border: 0">{{ $item['created_at'] }}</td>
                                            </tr>
                                            <tr style="border: 0;">
                                                <th class="p-1 m-0" style="border: 0">Mulai</th>
                                                <td class="p-1 m-0" style="border: 0">{{ $item['waktu_mulai'] }}</td>
                                            </tr>
                                            <tr style="border: 0;">
                                                <th class="p-1 m-0" style="border: 0">Selesai</th>
                                                <td class="p-1 m-0" style="border: 0">{{ $item['waktu_selesai'] }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>{{ $item['jumlah_cuti'] }} hari</td>
                                    <td>

                                        @if ($item['status'] == 'pending')
                                            <span
                                                class="badge d-block text-uppercase bg-warning">{{ $item['status'] }}</span>
                                        @endif

                                        @if ($item['status'] == 'diterima')
                                            <span
                                                class="badge d-block text-uppercase bg-success">{{ $item['status'] }}</span>
                                        @endif

                                        @if ($item['status'] == 'ditolak')
                                            <span
                                                class="badge d-block text-uppercase bg-danger">{{ $item['status'] }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-light" type="button" data-toggle="modal"
                                            data-target="#setting-{{ $item['id'] }}">
                                            <i class="bi bi-gear"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="setting-{{ $item['id'] }}" tabindex="-1"
                                            aria-labelledby="setting-{{ $item['id'] }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="setting-{{ $item['id'] }}Label">
                                                            <div>
                                                                <span
                                                                    class="badge bg-secondary">{{ $item['pengaju']['name'] }}</span>
                                                                <span
                                                                    class="badge bg-primary">{{ $item['pengaju']['email'] }}</span>
                                                            </div>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form wire:submit="update('{{ $item['id'] }}')">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="status">STATUS</label>
                                                                <select wire:model="status" class="form-control"
                                                                    id="status">
                                                                    <option>-- Pilih Status</option>
                                                                    <option value="diterima">Terima</option>
                                                                    <option value="ditolak">Tolak</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="alasan_sup">Keterangan</label>
                                                                <textarea class="form-control" id="alasan_sup" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
