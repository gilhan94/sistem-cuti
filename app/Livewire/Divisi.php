<?php

namespace App\Livewire;

use App\Models\Divisi as ModelsDivisi;
use App\Services\PageService;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Divisi extends Component
{

    #[Validate("required")]
    public $nama;
    #[Validate("required")]
    public $badge_color;

    public function insert()
    {
        try {
            ModelsDivisi::create($this->all());
            return redirect(route("divisi"))->with("success", "Data berhasil ditambahkan!");
        } catch (Exception $e) {
            return redirect(route("divisi"))->with("danger", $e->getMessage());
        }
    }
    public function remove(string $id)
    {
        try {
            ModelsDivisi::destroy($id);
            $this->redirect(route("divisi"), true);
        } catch (Exception $e) {
            return redirect(route("divisi"))->with("danger", $e->getMessage());
        }
    }
    public function render()
    {
        PageService::pageFor("admin");
        $divisi = ModelsDivisi::all();
        return view('livewire.divisi', compact(["divisi"]));
    }
}
