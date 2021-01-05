<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Pegawai') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Pegawai</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pegawai') }}">Data Pegawai</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablepegawai name="pegawai" :model="$pegawai" /> 
        {{-- Name user merupakan Case switch di tablepegawai.php --}}
        {{-- Model user merupakan tempat pengisian nama model di tablepegawai.php --}}
    </div>
</x-app-layout>
