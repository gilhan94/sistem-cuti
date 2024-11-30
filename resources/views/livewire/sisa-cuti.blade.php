<div class="container-fluid">
    <div class="p-2"></div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h3>Sisa Cuti</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>JENIS CUTI</th>
                                <th>WAKTU CUTI</th>
                                <th>DIAMBIL</th>
                                <th>SISA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenisCuti as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['waktu'] }} hari</td>
                                    <td>{{ $item['diambil'] }} hari</td>
                                    <td>{{ $item['sisa'] }} hari</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
