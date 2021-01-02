<div>
    <x-data-tableku :data="$data" :model="$pegawais">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('nama')" role="button" href="#">
                    #
                </a></th>
                <th><a wire:click.prevent="sortBy('nama')" role="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'nama'])
                </a></th>
                <th><a wire:click.prevent="sortBy('tempat')" role="button" href="#">
                    Tempat
                    @include('components.sort-icon', ['field' => 'tempat'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pegawais as $key => $p)
                <tr x-data="window.__controller.dataTableController({{ $p->id }})">
                    <td>{{ $pegawais->firstItem() + $key }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->tempat }}</td>
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
    @include('livewire.modal-pegawai')
    @endif
</div>
