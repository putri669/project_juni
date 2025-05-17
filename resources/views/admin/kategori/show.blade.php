@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Nama Kategori: {{ $kategori->nama }}</h1>
    <a href="{{ route('kategori.index') }}" class="btn btn-primary mb-3">Balik</a>
</div>
@endsection
