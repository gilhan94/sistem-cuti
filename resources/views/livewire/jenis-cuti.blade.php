<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jenis Cuti</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                        <i class="bi bi-plus"></i>
                        <span>Tambah Data</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-hover">
                    <table class="table">
                        <thead>
                            <th style="width: 80px;">NO</th>
                            <th>NAMA</th>
                            <th>HARI</th>
                            <th style="width: 50px;" class="text-center">AKSI</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td><span class="badge bg-warning">{{ $item->waktu }} Hari</span></td>
                                    <td class="text-center">
                                        <button wire:click="remove('{{ $item['id'] }}')"
                                            class="dropdown-item drop-permohonan" wire:confirm="Apakah Anda yakin?"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit="insert">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="divisi">Jenis Cuti</label>
                            <input wire:model="nama" type="text" class="form-control" id="divisi"
                                placeholder="Enter Jenis Cuti">
                        </div>
                        <div class="form-group">
                            <label for="hari">Waktu Cuti (hari)</label>
                            <input wire:model="waktu" min="0" max="999" type="number" class="form-control"
                                id="hari" placeholder="Enter Waktu">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
