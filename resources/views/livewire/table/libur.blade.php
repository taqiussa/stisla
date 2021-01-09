<div>
    <x-data-tableku :data="$data" :model="$liburs">
        <x-slot name="head">
            <tr>
                <th>#</th>
                <th><a wire:click.prevent="sortBy('tanggallibur')" role="button" href="#">
                    Tanggal
                    @include('components.sort-icon', ['field' => 'tanggallibur'])</th>
                <th><a wire:click.prevent="sortBy('nama')" role="button" href="#">
                    Nama
                    @include('components.sort-icon', ['field' => 'nama'])</th>
                <th><a wire:click.prevent="sortBy('keterangan')" role="button" href="#">
                    Keterangan
                    @include('components.sort-icon', ['field' => 'keterangan'])</th>
                <th><a wire:click.prevent="sortBy('jumlah')" role="button" href="#">
                    Jumlah
                    @include('components.sort-icon', ['field' => 'jumlah'])</th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($liburs as $key => $p)
                <tr x-data="window.__controller.dataTableController({{ $p->id }})">
                    <td>{{ $liburs->firstItem() + $key }}</td>
                    <td>{{ $p->tanggallibur }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>{{ $p->jumlah }}</td>
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
    @include('livewire.modal.modal-libur')
    @endif
</div>
