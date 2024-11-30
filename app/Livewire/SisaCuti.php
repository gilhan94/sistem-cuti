<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\JenisCuti;
use App\Services\PageService;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SisaCuti extends Component
{
    public function render()
    {
        PageService::pageFor("karyawan");

        $jenis = JenisCuti::all();
        $cuti = Cuti::where("user", Auth::user()->id)->get();
        $jenisCuti = [];
        foreach ($jenis as $row) {
            $diffCut = 0;
            foreach ($cuti as $cut) {
                if ($cut->jenis_cuti == $row->id) {
                    $dt = new Carbon($cut->waktu_mulai);
                    $diffCut += $dt->diffInDays($cut->waktu_selesai);
                }
            }

            $jenisCuti[] = [
                "id" => $row->id,
                "nama" => $row->nama,
                "waktu" => $row->waktu,
                "diambil" => $diffCut,
                "sisa" => $row->waktu - $diffCut
            ];
        }

        return view('livewire.sisa-cuti', compact("jenisCuti"));
    }
}
