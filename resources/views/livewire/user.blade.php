<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @if (Auth::user()->role == 'admin')
                        <div class="col-md-6">
                            <div class="shadow-sm rounded p-3">
                                <h4>Tambah User</h4>
                                <form wire:submit="insert">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="mb-3">
                                                <label for="photo" class="form-label">Foto</label>
                                                <input wire:model="photo" class="form-control p-1" type="file"
                                                    id="photo">
                                                @error('photo')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="username">Username</label>
                                            <input wire:model="name" type="text" class="form-control" id="username"
                                                placeholder="Enter Username">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input wire:model="password" type="password" class="form-control"
                                                id="password" placeholder="Enter password">
                                        </div>

                                        @if ($divisiData !== null)
                                            <div class="form-group col-md-6">
                                                <label for="divisi">Divisi</label>
                                                <select wire:model.change="divisi" class="form-control">
                                                    <option>---</option>
                                                    @foreach ($divisiData as $div)
                                                        <option value="{{ $div->id }}">{{ $div->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        <div class="form-group col-md-12">
                                            <label for="email">Email</label>
                                            <input wire:model="email" type="email" class="form-control" id="email"
                                                placeholder="Enter Email">
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table id="table" class="table table-hover">
                                <thead>
                                    <th>FOTO</th>
                                    <th>DIVISI</th>
                                    <th>USERNAME</th>
                                    <th>EMAIL</th>
                                    <th style="width: 50px;" class="text-center"></th>
                                </thead>
                                <tbody>
                                    @foreach ($user as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($item->photo == null ? '/img/avatar' . rand(2, 5) . '.png' : $item->photo) }}"
                                                    class="img-fluid img-thumbnail rounded" width="40">
                                            </td>
                                            @if ($item->dataDivisi !== null)
                                                <td>{{ $item->dataDivisi->nama }}</td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('user-options', $item->id) }}"
                                                        class="dropdown-item drop-permohonan"><i
                                                            class="bi bi-gear"></i></a>
                                                    @if (Auth::user()->role == 'admin')
                                                        <button wire:click="remove('{{ $item['id'] }}')"
                                                            class="dropdown-item drop-permohonan"
                                                            wire:confirm="Apakah Anda yakin?"><i
                                                                class="bi bi-trash"></i></button>
                                                    @endif
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
    </section>

</div>
