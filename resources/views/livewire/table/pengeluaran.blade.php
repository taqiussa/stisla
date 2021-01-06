<div>
    <x-data-tableku :data="$data" :model="$pengeluarans">
        <x-slot name="head">
            <tr>
                <th>#</th>
                <th><a wire:click.prevent="sortBy('tanggal')" role="button" href="#">
                    Tanggal
                    @include('components.sort-icon', ['field' => 'tanggal'])
                </a></th>
                <th><a wire:click.prevent="sortBy('keterangan')" role="button" href="#">
                    Keterangan
                    @include('components.sort-icon', ['field' => 'keterangan'])
                </a></th>
                <th><a wire:click.prevent="sortBy('total')" role="button" href="#">
                    Total
                    @include('components.sort-icon', ['field' => 'total'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pengeluarans as $key => $p)
                <tr x-data="window.__controller.dataTableController({{ $p->id }})">
                    <td>{{ $pengeluarans->firstItem() + $key }}</td>
                    <td>{{ date('D, d M y',$p->tanggal) }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>{{ number_format($p->total, 0, ".", ".") . ",-" }}</td>
                    <td>{{ $p->created_at }}</td>
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
    @include('livewire.modal.modal-pengeluaran')
    @endif
</div>
