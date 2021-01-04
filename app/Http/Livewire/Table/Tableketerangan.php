<?php

namespace App\Http\Livewire\Table;

use App\Models\Keterangan;
use Livewire\Component;
use Livewire\WithPagination;

class Tableketerangan extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $keterangan;
    public $idketerangan = '';
    public $namaket = '';
    public $harga = '';
    public $jenis = '';
    public $isOpen = 0;
    public $perPage = 10;
    public $sortField = "namaket";
    public $sortAsc = false;
    public $search = '';
    public $action;
    public $button;
    protected $listeners = ["deleteItem" => "delete_item"];
    protected $rules = ['namaket' => 'required', 'harga' => 'required'];
    protected $messages = ['namaket.required' => 'Keterangan tidak boleh kosong', 'harga.required' => 'Harga tidak boleh kosong'];
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
            case 'keterangan':
                $keterangans = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => 'livewire.table.keterangan', //resource view
                    "keterangans" => $keterangans, //users dikirm ke user.blade ke data tabel
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => 'showModal()',
                            'create_new_text' => 'Tambah keterangan',
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
        $this->namaket = '';
        $this->harga = '';
        $this->jenis = '';
        $this->idketerangan = '';
    }
    public function store()
    {

        $data = [
            'namaket' => $this->namaket,
            'harga' => $this->harga,
            'jenis' => $this->jenis,
        ];
        $this->validate();
        $this->model::updateOrCreate(['id' => $this->idketerangan], $data);
        $this->clearVar();
        $this->emit('saved'); /* Untuk Menampilkan Message Toast ke x-jet-nofity-message di modal */
        $this->hideModal();
    }
    public function edit($id)
    {
        $cari = $this->model::findOrFail($id);
        $this->idketerangan = $id;
        $this->namaket = $cari->namaket;
        $this->harga = $cari->harga;
        $this->jenis = $cari->jenis;
        $this->showModal();
    }
    public function mount()
    {
        $this->button = create_button($this->action, "keterangan");
        // this button untuk menampilkan emit atau message toast 
    }
    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }
}
