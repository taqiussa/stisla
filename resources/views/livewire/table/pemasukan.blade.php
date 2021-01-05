<div>
    <x-data-tableku :data="$data" :model="$pemasukans">
        <x-slot name="head">
            <tr>
                <th>#</th>
                <th><a wire:click.prevent="sortBy('tanggal')" role="button" href="#">
                    Tanggal
                    @include('components.sort-icon', ['field' => 'tanggal'])</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Komentar</th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pemasukans as $key => $p)
                <tr x-data="window.__controller.dataTableController({{ $p->id }})">
                    <td>{{ $pemasukans->firstItem() + $key }}</td>
                    <td>{{ date('D, d M y',$p->tanggal) }}</td>
                    <td>{{ $p->pegawai->nama }}</td>
                    <td>{{ $p->keterangan->namaket }}</td>
                    <td>{{ $p->jumlah }}</td>
                    <td>{{ $p->komentar }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" wire:click="edit({{ $p->id }})" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="text-red-500 fa fa-16px fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-tableku>
    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
    @if ($isOpen)
    @include('livewire.modal.modal-pemasukan')
    @endif
</div>
