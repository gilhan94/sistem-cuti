<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="text-capitalize">{{ $user->name }}</h4>
                <span class="badge bg-primary">{{ $user->email }}</span>
            </div>
            <div class="card-body">
                <form wire:submit="update">
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <img src="{{ asset($user->photo) }}" class="img-thumbnail">
                            </div>
                            @if (Auth::user()->role == 'admin')
                                <div class="form-group">
                                    <div class="mb-3">
                                        <input wire:model="photo" class="form-control p-1" type="file">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md">
                            <div class="table-responsive">
                                <h4>Data {{ $user->name }}</h4>
                                <table class="table table-striped">
                                    <tr>
                                        <th style="width: 130px;">NAMA</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 130px;">EMAIL</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    @if (Auth::user()->role == 'admin')
                                        <tr>
                                            <th style="width: 130px;">New Password</th>
                                            <td>
                                                <div class="form-group">
                                                    <input wire:model="password" type="password"
                                                        placeholder="Enter New Password"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 130px;">Change Role</th>
                                            <td>
                                                <select wire:model="role" class="form-control form-control-sm">
                                                    <option value="{{ $user->role }}">-- {{ $user->role }}
                                                    </option>
                                                    <option value="admin">Admin</option>
                                                    <option value="supervisor">Supervisor</option>
                                                    <option value="karyawan">Karyawan</option>
                                                </select>
                                            </td>
                                        </tr>
                                        @if ($user->role == 'karyawan')
                                            <tr>
                                                <th style="width: 130px;">Change Divisi</th>
                                                <td>
                                                    <select wire:model="divisi" class="form-control form-control-sm">
                                                        @if ($user->dataDivisi !== null)
                                                            <option value="{{ $user->dataDivisi->id }}">--
                                                                {{ $user->dataDivisi->nama }}</option>
                                                        @else
                                                            <option>-- Pilih Divisi</option>
                                                        @endif
                                                        @foreach ($divisis as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td colspan="2">
                                                <button type="submit" class="btn btn-primary btn-sm">UPDATE</button>
                                            </td>
                                        </tr>
                                    @endif
                                </table>

                                <h4>Data Cuti</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>NAMA</th>
                                                <th>WAKTU</th>
                                                <th>DIAMBIL</th>
                                                <th>SISA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jenisCuti as $item)
                                                <tr>
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
                </form>
            </div>
        </div>
    </div>
</div>
