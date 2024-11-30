<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $relations = [
            "pengaju",
            "pengaju.dataDivisi",
        ];
        $cuti = Cuti::with($relations);
        if (Auth::user()->role == "karyawan") {
            $relations = [
                "pengaju",
                "pengaju.dataDivisi"
            ];
            $cuti = $cuti->whereHas("pengaju", function ($query) {
                $query->where("divisi", Auth::user()->divisi);
            });
        }
        $cuti = $cuti->get();
        $dataCalender = [];
        foreach ($cuti as $row) {
            $badgeColor = User::with("dataDivisi")->where("id", Auth::user()->id)->first();
            $dataCalender[] = [
                "start" => Carbon::parse($row->waktu_mulai),
                "end" => Carbon::parse($row->waktu_selesai),
                "title" => $row->pengaju->name . " : " . $row->alasan,
                "color" => $row->pengaju->dataDivisi->badge_color
            ];
        }
        return view('livewire.dashboard', compact("cuti", "dataCalender"));
    }
}
