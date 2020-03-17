
@extends('layout.main')

@section('title', 'karyawan')

@section('content')


{{-- @foreach ( hobiKaryawan() as $hobi)
    {{ dd($hobi) }}
@endforeach --}}




<div class="container mt-5">

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('status') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    @endif


    <a href="/data_karyawan/create" class="btn btn-primary text-capitalize mb-2">tambah karyawan</a>
    @foreach ($karyawan as $kyn)
    <ul class="list-group mb-1">
          <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $kyn->name }}
          @if( auth()->user()->role == 'admin')
            <a class="badge badge-primary badge-pill" href="/data_karyawan/{{ $kyn->id }}">detail</a>
          @endif
          </li>
        </ul>
        @endforeach
    <br><br>
    {{ $karyawan->links() }}
</div>
@endsection 