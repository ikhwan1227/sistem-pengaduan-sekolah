@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div style="padding: 20px;">
    <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Dashboard Siswa</h1>
    
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 30px;">
        <div style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <p style="color: gray; font-size: 12px;">Total</p>
            <p style="font-size: 24px; font-weight: bold;">{{ $totalPengaduan ?? 0 }}</p>
        </div>
        <div style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <p style="color: gray; font-size: 12px;">Bulan Ini</p>
            <p style="font-size: 24px; font-weight: bold;">{{ $totalBulanIni ?? 0 }}</p>
        </div>
        <div style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <p style="color: gray; font-size: 12px;">Diproses</p>
            <p style="font-size: 24px; font-weight: bold;">{{ $diproses ?? 0 }}</p>
        </div>
        <div style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <p style="color: gray; font-size: 12px;">Selesai</p>
            <p style="font-size: 24px; font-weight: bold;">{{ $selesai ?? 0 }}</p>
        </div>
        <div style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <p style="color: gray; font-size: 12px;">Ditolak</p>
            <p style="font-size: 24px; font-weight: bold;">{{ $ditolak ?? 0 }}</p>
        </div>
        <div style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <p style="color: gray; font-size: 12px;">Draft</p>
            <p style="font-size: 24px; font-weight: bold;">{{ $draft ?? 0 }}</p>
        </div>
    </div>
    
    <div style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <h2 style="font-weight: bold; margin-bottom: 10px;">Pengaduan Terbaru</h2>
        @forelse($pengaduanTerbaru ?? [] as $item)
            <p style="font-size: 14px;">{{ $loop->iteration }}. {{ $item->judul }} - {{ $item->status }}</p>
        @empty
            <p style="color: gray;">Belum ada pengaduan</p>
        @endforelse
    </div>
</div>
@endsection