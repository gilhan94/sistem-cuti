<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\JenisCuti;
use App\Services\PageService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AjuanCuti extends Component
{
    public $user;
    #[Validate("required")]
    public $jenis_cuti = "";
    #[Validate("required")]
    public $waktu_mulai = "";
    #[Validate("required")]
    public $waktu_selesai = "";
    #[Validate("required")]
    public $alasan = "";
    public $alamat = "";
    public function insert()
    {
        try {
            $this->user = Auth::user()->id;
            $cutiData = Cuti::with("pengaju.dataDivisi")
                ->whereHas("pengaju", function ($query) {
                    $query->where("divisi", Auth::user()->divisi);
                })
                ->get(); // Mengambil semua data cuti dalam divisi yang sama

            // Data cuti yang diajukan
            $waktuMulaiBaru = Carbon::parse($this->waktu_mulai);
            $waktuSelesaiBaru = Carbon::parse($this->waktu_selesai);

            // Periksa tumpang tindih cuti
            $tumpangTindih = false;

            foreach ($cutiData as $cuti) {
                $waktuMulai = Carbon::parse($cuti->waktu_mulai);
                $waktuSelesai = Carbon::parse($cuti->waktu_selesai);

                if (
                    $waktuMulaiBaru->between($waktuMulai, $waktuSelesai) || $waktuSelesaiBaru->between($waktuMulai, $waktuSelesai) ||
                    ($waktuMulaiBaru->lte($waktuMulai) && $waktuSelesaiBaru->gte($waktuSelesai))
                ) {
                    $tumpangTindih = true;
                    break;
                }
            }
            if ($tumpangTindih) {
                return redirect(route("pengajuan-cuti"))->with("danger", "Ada cuti lain dalam divisi pada tanggal yang sama.");
            }

            Cuti::create($this->all());
            return redirect(route("dashboard"))->with("success", "Cuti berhasil di ajukan!");
        } catch (Exception $e) {
            return redirect(route("pengajuan-cuti"))->with("danger", $e->getMessage());
        }
    }
    public function render()
    {
        PageService::pageFor("karyawan");

        $jenisCuti = JenisCuti::all();
        return view('livewire.ajuan-cuti', compact("jenisCuti"));
    }
}
