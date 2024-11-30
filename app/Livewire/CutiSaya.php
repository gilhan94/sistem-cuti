<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Services\PageService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CutiSaya extends Component
{
    public function remove(string $id)
    {
        try {
            $cuti = Cuti::where("id", $id)->first();
            $currentTime = Carbon::now();
            $cutiTime = new Carbon($cuti->waktu_mulai);
            if ($currentTime->diffInDays($cutiTime) <= 0) {
                throw new Exception("Maaf cuti sudah kadaluarsa!");
            }
            Cuti::destroy($id);
            return redirect(route("cuti-saya"))->with("success", "Cuti berhasil dihapus");
        } catch (Exception $e) {
            return redirect(route("cuti-saya"))->with("danger", $e->getMessage());
        }
    }
    public function render()
    {
        PageService::pageFor("karyawan");
        $cuti = Cuti::with("jenis_cuti")->where("user", Auth::user()->id)->get()->toArray();
        $dataCuti = [];
        foreach ($cuti as $row) {
            $waktuMulai = new Carbon($row['waktu_mulai']);
            $waktuSelesai = new Carbon($row['waktu_selesai']);
            $jumlah = $waktuMulai->diffInDays($waktuSelesai);
            $dataCuti[] = [
                "id" => $row['id'],
                "jenis_cuti" => $row['jenis_cuti']['nama'],
                "created_at" => $row['created_at'],
                "waktu_mulai" => $row['waktu_mulai'],
                "waktu_selesai" => $row['waktu_selesai'],
                "jumlah" => $jumlah
            ];
        }
        return view('livewire.cuti-saya', compact("dataCuti"));
    }
}
