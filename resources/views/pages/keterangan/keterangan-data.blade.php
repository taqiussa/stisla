<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Keterangan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Keterangan</a></div>
            <div class="breadcrumb-item"><a href="{{ route('keterangan') }}">Data Keterangan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tableketerangan name="keterangan" :model="$keterangan" /> 
        {{-- Name user merupakan Case switch di tableketerangan.php --}}
        {{-- Model user merupakan tempat pengisian nama model di tableketerangan.php --}}
    </div>
</x-app-layout>
