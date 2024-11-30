<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Divisi</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form wire:submit="insert">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="divisi">Nama Divisi</label>
                                        <input wire:model="nama" type="text" class="form-control" id="divisi"
                                            placeholder="Enter Divisi">
                                    </div>
                                    <div class="form-group">
                                        <label for="badge_color">Badge Color</label>
                                        <input wire:model="badge_color" type="color"
                                            class="form-control form-control-color" id="badge_color">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <table id="table" class="table table-hover">
                            <thead>
                                <th style="width: 80px;">NO</th>
                                <th>NAMA</th>
                                <th>BADGE COLOR</th>
                                <th style="width: 50px;" class="text-center">AKSI</th>
                            </thead>
                            <tbody>
                                @foreach ($divisi as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="rounded p-3"
                                                    style="background-color: {{ $item->badge_color }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button wire:click="remove('{{ $item['id'] }}')"
                                                class="dropdown-item drop-permohonan"
                                                wire:confirm="Apakah Anda yakin?"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
