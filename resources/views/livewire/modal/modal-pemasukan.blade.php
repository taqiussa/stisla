<div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>  
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="text-lg text-right">
                <a role="button" wire:click="hideModal()" class="mr-1">
                    <i class="fa fa-window-close"></i>
                </a>
            </div>
            <form>
                <div class="px-3 pt-1 pb-3 bg-white sm:p-6 sm:pb-4">
                    <div class="mb-3 text-lg text-center">
                        <h4>
                            Transaksi Pemasukan
                        </h4>
                    </div>
                    <div>
                        <div class="px-1 py-2">
                            <input wire:model="idpemasukan" type="hidden" class="w-full px-2 py-2 border rounded shadow appearance-non" id="idpemasukan" >
                            <input wire:model.defer="tanggal" type="date" class="w-1/3 px-2 py-2 ml-4 border rounded shadow appearance-non" id="tanggal" autocomplete="off">
                            @error('tanggal')
                            <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                            <select wire:model.defer="pegawai_id" class="w-1/2 px-2 py-2 border rounded shadow appearance-non">
                                <option value="">Pilih Pegawai</option>
                                @foreach ($pegawai as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="py-2">
                            <select wire:model="keterangan_id" class="w-1/3 px-2 py-2 ml-4 border rounded shadow appearance-non">
                                <option value="">Pilih Keterangan</option>
                                @foreach ($ket as $k)
                                <option value="{{ $k->id }}" >{{ $k->namaket }}</option>
                                @endforeach
                            </select>
                            <input wire:model.defer="harga" type="text" class="w-1/2 px-2 py-2 border rounded shadow appearance-non" id="harga" autocomplete="off" placeholder="Harga" readonly>
                            @error('harga')
                            <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                        </div>
                        <div class="py-2">
                            <input wire:model="jumlah" type="text" class="w-1/3 px-2 py-2 ml-4 border rounded shadow appearance-non" id="jumlah" autocomplete="off" placeholder="Jumlah">
                            @error('jumlah')
                            <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                            <input wire:model.defer="total" type="text" class="w-1/2 px-2 py-2 border rounded shadow appearance-non" id="total" readonly placeholder="Total">
                            @error('total')
                            <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                        </div>
                        <div class="py-2">
                            <input wire:model.defer="komentar" type="text" class="w-10/12 px-2 py-2 ml-4 border rounded shadow appearance-non" id="komentar" autocomplete="off" placeholder="Komentar">
                            @error('komentar')
                            <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-white bg-green-600 border border-gray-300 rounded-md shadow-sm hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Simpan
                    </button>
                    <button wire:click="hideModal()" type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
