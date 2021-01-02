<?php

namespace App\Http\Livewire\Table;

use App\Models\Pegawai;
use Livewire\Component;
use Livewire\WithPagination;

class Tablepegawai extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $pegawai;
    public $idpegawai = '';
    public $nama = '';
    public $tempat = '';
    public $isOpen = 0;
    public $perPage = 10;
    public $sortField = "nama";
    public $sortAsc = false;
    public $search = '';
    public $action;
    public $button;

    protected $listeners = ["deleteItem" => "delete_item"];
    protected $rules = ['nama' => 'required', 'tempat' => 'required'];
    public function showModal()
    {
        $this->isOpen = true;
    }
    public function hideModal()
    {
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
            case 'pegawai':
                $pegawais = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => 'livewire.table.pegawai', //resource view
                    "pegawais" => $pegawais, //users dikirm ke user.blade ke data tabel
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => 'showModal()',
                            'create_new_text' => 'Tambah Pegawai',
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
        $this->idpegawai = '';
    }
    public function store()
    {

        $data = [
            'nama' => $this->nama,
            'tempat' => $this->tempat,
        ];
        $this->validate();
        Pegawai::updateOrCreate(['id' => $this->idpegawai], $data);
        $this->clearVar();
        $this->emit('saved'); /* Untuk Menampilkan Message Toast ke x-jet-nofity-message di modal */
        $this->hideModal();
    }
    public function edit($id)
    {
        $cari = Pegawai::findOrFail($id);
        $this->idpegawai = $id;
        $this->nama = $cari->nama;
        $this->tempat = $cari->tempat;
        $this->showModal();
    }
    public function mount()
    {
        $this->button = create_button($this->action, "Pegawai");
        // this button untuk menampilkan emit atau message toast 
    }
    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }
}
