<?php

namespace App\Livewire;

use App\Models\JenisCuti as ModelsJenisCuti;
use App\Services\PageService;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;

class JenisCuti extends Component
{

    #[Validate("required")]
    public $nama;
    #[Validate("required")]
    public $waktu;

    public function insert()
    {
        try {
            ModelsJenisCuti::create($this->all());
            return redirect(route("jenis-cuti"))->with("success", "Data berhasil ditambahkan!");
        } catch (Exception $e) {
            return redirect(route("jenis-cuti"))->with("danger", $e->getMessage());
        }
    }
    public function remove(string $id)
    {
        try {
            ModelsJenisCuti::destroy($id);
            $this->redirect(route("jenis-cuti"), true);
        } catch (Exception $e) {
            return redirect(route("jenis-cuti"))->with("danger", $e->getMessage());
        }
    }
    public function render()
    {
        PageService::pageFor("admin");
        $data = ModelsJenisCuti::all();
        return view('livewire.jenis-cuti', compact(["data"]));
    }
}
