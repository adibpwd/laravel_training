@extends('layout.main')

@section('title', 'ubah data karyawan')

@section('content')
  <div class="container mt-5 mb-5">
      @foreach ($dataKaryawan as $dKyn)
  <form method="POST" action="/data_karyawan/{{ $dKyn->id }}">
      @method('patch')
      @csrf
          
      <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $dKyn->name }}">
          @error('name')
          <p class="text-danger"> {{ $message }} </p>
          @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $dKyn->email }}">
            @error('email')
            <p class="text-danger"> {{ $message }} </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $dKyn->alamat }}">
            @error('alamat')
            <p class="text-danger"> {{ $message }} </p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        @endforeach
    </form>
  </div>
@endsection