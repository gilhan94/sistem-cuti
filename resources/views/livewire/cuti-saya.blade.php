<div class="container-fluid">
    <div class="p-2"></div>
    <div class="card">
        <div class="card-header">
            <h4>Cuti <span class="text-capitalize">{{ Auth::user()->name }}</span></h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>JENIS CUTI</th>
                            <th>TANGGAL REQUEST</th>
                            <th>MULAI CUTI</th>
                            <th>JUMLAH</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataCuti as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['jenis_cuti'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                                <td>{{ $item['waktu_mulai'] }} - {{ $item['waktu_selesai'] }}</td>
                                <td>{{ $item['jumlah'] }} hari</td>
                                <td>
                                    <button wire:click="remove('{{ $item['id'] }}')" class="text-center btn btn-light"
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
