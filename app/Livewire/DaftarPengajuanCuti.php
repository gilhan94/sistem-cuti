<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Services\PageService;
use Carbon\Carbon;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DaftarPengajuanCuti extends Component
{
    #[Validate("required")]
    public $status;
    #[Validate("required")]
    public $alasan_sup;
    public function update(string $id)
    {
        try {
            $dataCuti = Cuti::where("id", $id)->first();
            $dataCuti->fill($this->all());
            $dataCuti->save();
            return redirect(route("daftar-pengajuan-cuti"))->with("success", "Data berhasil diubah!");
        } catch (Exception $e) {
            return redirect(route("daftar-pengajuan-cuti"))->with("danger", $e->getMessage());
        }
    }
    public function render()
    {
        PageService::pageForMultiple(['admin', 'supervisor']);
        $dataCuti = Cuti::with("pengaju.dataDivisi", "jenis_cuti")->get()->toArray();
        foreach ($dataCuti as $key => $row) {
            $mulai = new Carbon($row['waktu_mulai']);
            $selesai = new Carbon($row['waktu_selesai']);
            $dataCuti[$key]['jumlah_cuti'] = $mulai->diffInDays($selesai);
        }
        return view('livewire.daftar-pengajuan-cuti', compact("dataCuti"));
    }
}
