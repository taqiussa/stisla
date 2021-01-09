<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Laporan Keuangan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Laporan</a></div>
            <div class="breadcrumb-item"><a href="#">Keuangan</a></div>
            <div class="breadcrumb-item"><a href="{{ route('keterangan') }}">Laporan Keuangan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:laporankeuangan />
    </div>
</x-app-layout>
