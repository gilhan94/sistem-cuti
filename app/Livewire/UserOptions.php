<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\Divisi;
use App\Models\JenisCuti;
use App\Models\User;
use App\Services\PageService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UserOptions extends Component
{
    use WithFileUploads;

    #[Url()]
    public $id = '';

    #[Validate("required")]
    public $password = "";
    #[Validate("required")]
    public $role = "";
    #[Validate("required")]
    public $divisi = "";

    #[Validate('required|image')]
    public $photo;

    function update()
    {
        try {
            $user = User::find($this->id);
            if ($this->role !== "") {
                $user->role = $this->role;
            }
            if ($this->photo !== null) {
                $this->photo = $this->photo->store("photo");
                $user->photo = $this->photo;
            }
            if ($this->password !== "") {
                $user->password = $this->password;
            }
            if ($this->divisi !== "") {
                $user->divisi = $this->divisi;
            }
            $user->save();
            return redirect(route("user-options", $this->id))->with("success", "User berhasil diperbaharui !");
        } catch (Exception $e) {
            return redirect(route("user-options", $this->id))->with("danger", $e->getMessage());
        }
    }
    public function render()
    {
        PageService::pageForMultiple(['admin', "supervisor"]);
        $user = User::with("dataDivisi")->where("id", $this->id)->first();
        $divisis = Divisi::all();

        // cuti informasi
        $jenis = JenisCuti::all();
        $cuti = Cuti::where("user", $this->id)->get();
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
        return view('livewire.user-options', compact("user", "divisis", "jenisCuti"));
    }
}
