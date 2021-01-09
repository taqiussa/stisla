<div>
    <x-data-tableku :data="$data" :model="$pemasukans">
        <x-slot name="head">
            <tr>
                <th>#</th>
                <th><a wire:click.prevent="sortBy('tanggalpemasukan')" role="button" href="#">
                    Tanggal
                    @include('components.sort-icon', ['field' => 'tanggalpemasukan'])</th>
                <th><a wire:click.prevent="sortBy('namapegawai')" role="button" href="#">
                    Nama
                    @include('components.sort-icon', ['field' => 'namapegawai'])</th>
                <th><a wire:click.prevent="sortBy('keterangan')" role="button" href="#">
                    Keterangan
                    @include('components.sort-icon', ['field' => 'keterangan'])</th>
                <th><a wire:click.prevent="sortBy('jumlahpemasukan')" role="button" href="#">
                    Jumlah
                    @include('components.sort-icon', ['field' => 'jumlahpemasukan'])</th>
                <th><a wire:click.prevent="sortBy('komentarpemasukan')" role="button" href="#">
                    Komentar
                    @include('components.sort-icon', ['field' => 'komentarpemasukan'])</th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pemasukans as $key => $p)
                <tr x-data="window.__controller.dataTableController({{ $p->id }})">
                    <td>{{ $pemasukans->firstItem() + $key }}</td>
                    <td>{{ $p->tanggalpemasukan }}</td>
                    <td>{{ $p->namapegawai }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>Rp. {{ number_format($p->jumlahpemasukan, 0, ".", ".") . ",-" }}</td>
                    <td>{{ $p->komentarpemasukan }}</td>
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
