<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Pemasukan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pemasukan') }}">Pemasukan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablepemasukan name="pemasukan" :model="$pemasukan" /> 
        {{-- Name user merupakan Case switch di tablepegawai.php --}}
        {{-- Model user merupakan tempat pengisian nama model di tablepegawai.php --}}
    </div>
</x-app-layout>
