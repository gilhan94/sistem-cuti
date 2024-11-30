<?php

namespace App\Livewire;

use App\Models\Divisi;
use App\Models\User;
use App\Services\PageService;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class SupUser extends Component
{
    use WithFileUploads;
    public $role = "supervisor";

    #[Validate("required")]
    public $email = "";
    #[Validate("required")]
    public $name = "";
    #[Validate("required")]
    public $password = "";

    #[Validate('required|image')]
    public $photo;
    public function insert()
    {
        try {
            $dataToInsert = [
                "role",
                "email",
                "name",
                "password",
                "divisi",
            ];
            if ($this->photo !== null) {
                $this->photo = $this->photo->store("photo");
                $dataToInsert = array_merge($dataToInsert, ["photo"]);
            }
            User::factory()->create($this->only($dataToInsert));
            return redirect(route("sup-user"))->with("success", "Supervisor berhasil ditambahkan !");
        } catch (Exception $e) {
            return redirect(route("sup-user"))->with("danger", $e->getMessage());
        }
    }
    public function remove(string $id)
    {
        try {
            User::destroy($id);
            return redirect(route("sup-user"))->with("success", "Supervisor berhasil dihapus !");
        } catch (Exception $e) {
            return redirect(route("sup-user"))->with("danger", $e->getMessage());
        }
    }
    public function render()
    {
        PageService::pageForMultiple(['supervisor', "admin"]);
        $user = User::with("dataDivisi")->where("role", "supervisor")->get();
        $title = "Supervisor User";
        $divisiData = Divisi::all();
        return view('livewire.user', compact(["user", "title", "divisiData"]));
    }
}
