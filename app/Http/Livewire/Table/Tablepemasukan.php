<?php

namespace App\Http\Livewire\Table;

use App\Models\Pemasukan;
use Livewire\Component;
use Livewire\WithPagination;

class Tablepemasukan extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $pemasukan;
    public $idpemasukan = '';
    public $nama = '';
    public $tempat = '';
    public $isOpen = 0;
    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';
    public $action;
    public $button;
    protected $listeners = ["deleteItem" => "delete_item"];
    protected $rules = ['nama' => 'required', 'tempat' => 'required'];
    protected $messages = ['nama.required' => 'Nama tidak boleh kosong', 'tempat.required' => 'Tempat tidak boleh kosong'];
    public function showModal()
    {
        $this->isOpen = true;
    }
    public function hideModal()
    {
        $this->resetErrorBag();
        $this->clearVar();
        $this->isOpen = false;
    }
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function get_pagination_data()
    {
        switch ($this->name) {
            case 'pemasukan':
                $pemasukans = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => 'livewire.table.pemasukan', //resource view
                    "pemasukans" => $pemasukans, //users dikirm ke user.blade ke data tabel
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => 'showModal()',
                            'create_new_text' => 'Tambah pemasukan',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }

    public function delete_item($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menghapus data " . $this->name
            ]);
            return;
        }
        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil dihapus!"
        ]);
    }
    public function clearVar()
    {
        $this->nama = '';
        $this->tempat = '';
        $this->idpemasukan = '';
    }
    public function store()
    {

        $data = [
            'nama' => $this->nama,
            'tempat' => $this->tempat,
        ];
        $this->validate();
        $this->model::updateOrCreate(['id' => $this->idpemasukan], $data);
        $this->clearVar();
        $this->emit('saved'); /* Untuk Menampilkan Message Toast ke x-jet-nofity-message di modal */
        $this->hideModal();
    }
    public function edit($id)
    {
        $cari = $this->model::findOrFail($id);
        $this->idpemasukan = $id;
        $this->nama = $cari->nama;
        $this->tempat = $cari->tempat;
        $this->showModal();
    }
    public function mount()
    {
        $this->button = create_button($this->action, "pemasukan");
        // this button untuk menampilkan emit atau message toast 
    }
    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }
}
