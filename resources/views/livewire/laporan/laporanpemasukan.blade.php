<div class="card card-body">
    <div class="mb-2 -mx-3 md:flex">
        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                Bulan
                </label>
                <select wire:model="bulan" class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value="">Pilih Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
        </div>
        <div class="px-3 md:w-1/2">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                Tahun
                </label>
                <select wire:model="tahun" class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value="">Tahun</option>
                    @for ($i = 2020; $i <= $now; $i++)
                    <option value="{{ $i }}">{{ $i}}</option>
                    @endfor
                </select>
        </div>
        <div class="px-3 md:w-1/2">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
            Nama Pegawai
            </label>
            <select wire:model="pegawai_id" class="w-full px-2 py-2 border rounded shadow appearance-non">
                <option value="">Pilih Pegawai</option>
                @foreach ($pegawai as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="px-3 md:w-1/2">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
            Keterangan
            </label>
            <select wire:model="keterangan_id" class="w-full px-2 py-2 border rounded shadow appearance-non">
                <option value="">Pilih Keterangan</option>
                @foreach ($ket as $p)
                    <option value="{{ $p->id }}">{{ $p->namaket }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <!-- component -->
    <div class="flex items-center">
        <div class="w-full py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col w-full mb-2 space-y-2 lg:flex-row lg:space-x-2 lg:space-y-0 lg:mb-4">
                <div class="w-full lg:w-1/4">
                    <div class="w-full p-4 bg-white border border-gray-100 rounded-lg shadow widget dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs font-light text-gray-500 uppercase">
                                    {{ $nama }}
                                </div>
                                <div class="text-xl font-bold">
                                    {{ $jumlah }}
                                </div>
                            </div>
                            <svg class="text-gray-500 stroke-current" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                                </path>
                                <circle cx="9" cy="7" r="4">
                                </circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87">
                                </path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/4">
                    <div class="w-full p-4 bg-white border border-gray-100 rounded-lg shadow widget dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs font-light text-gray-500 uppercase">
                                    PREVIEWS
                                </div>
                                <div class="text-xl font-bold">
                                    45
                                </div>
                            </div>
                            <svg class="text-gray-500 stroke-current" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12">
                                </polyline>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/4">
                    <div class="w-full p-4 bg-white border border-gray-100 rounded-lg shadow-warning widget dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs font-light text-gray-500 uppercase">
                                    Links
                                </div>
                                <div class="text-xl font-bold">
                                    4078
                                </div>
                            </div>
                            <svg class="text-gray-500 stroke-current" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                                </path>
                                <polyline points="15 3 21 3 21 9">
                                </polyline>
                                <line x1="10" x2="21" y1="14" y2="3">
                                </line>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/4">
                    <div class="w-full p-4 bg-white border border-gray-100 rounded-lg shadow-success widget dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs font-light text-gray-500 uppercase">
                                    Watch Time
                                </div>
                                <div class="text-xl font-bold">
                                    31h 2m
                                </div>
                            </div>
                            <svg class="text-gray-500 stroke-current" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10">
                                </circle>
                                <polyline points="12 6 12 12 16 14">
                                </polyline>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
