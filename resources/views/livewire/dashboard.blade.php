<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <div class="p-2"></div>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset(Auth::user()->photo == null ? '/img/avatar' . rand(2, 5) . '.png' : Auth::user()->photo) }}"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div>
                                    <h4 class="text-center">Hallo <span
                                            class="text-capitalize text-bold">{{ Auth::user()->name }}</span>
                                    </h4>
                                    {{-- Ajuan --}}
                                    <div class="p-2 rounded shadow-sm sticky-top">
                                        @if (Auth::user()->role == 'karyawan')
                                            <h5>Daftar ajuan pada divisi anda</h5>
                                        @else
                                            <h5>Daftar ajuan yang aktif</h5>
                                        @endif
                                        <div class="list-group list-group-flush">
                                            @foreach ($cuti as $item)
                                                <div class="list-group-item">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="px-3">
                                                            <i class="bi bi-chevron-right"></i>
                                                        </div>
                                                        <div class="ms-3">
                                                            <div>
                                                                <div class="text-primary    ">
                                                                    <div>
                                                                        {{ $item->waktu_mulai }} -
                                                                        {{ $item->waktu_selesai }}
                                                                    </div>
                                                                </div>
                                                                @if ($item->status == 'pending')
                                                                    <span
                                                                        class="badge bg-warning">{{ $item->status }}</span>
                                                                @endif

                                                                @if ($item->status == 'diterima')
                                                                    <span
                                                                        class="badge bg-success">{{ $item->status }}</span>
                                                                @endif

                                                                @if ($item->status == 'ditolak')
                                                                    <span
                                                                        class="badge bg-danger">{{ $item->status }}</span>
                                                                @endif

                                                                <div>
                                                                    <span
                                                                        class="badge bg-primary">{{ $item->pengaju->email }}</span>
                                                                    <span
                                                                        class="badge bg-primary">{{ $item->pengaju->name }}</span>
                                                                    <span
                                                                        class="badge bg-primary">{{ $item->pengaju->datadivisi->nama }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="row">
                            <div class="col-md">
                                <div class="shadow-sm" id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const cuti = @json($dataCalender);
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'multiMonthYear,dayGridMonth'
                },
                initialView: 'dayGridMonth',
                events: cuti
            });
            calendar.setOption('locale', 'id');
            calendar.render();
        });
    </script>
</div>
