<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Pengeluaran') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Transaksi</a></div>
            <div class="breadcrumb-item"><a href="#">Pengeluaran</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pengeluaran') }}">Pengeluaran</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablepengeluaran name="pengeluaran" :model="$pengeluaran" /> 
        {{-- Name user merupakan Case switch di tablepegawai.php --}}
        {{-- Model user merupakan tempat pengisian nama model di tablepegawai.php --}}
    </div>
</x-app-layout>
