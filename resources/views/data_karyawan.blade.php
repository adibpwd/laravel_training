
@extends('layout.main')

@section('title', 'data karyawan')

@section('content')

{{-- {{ dd( telepon()[0]['telepon'] ) }}  --}}

{{-- @foreach ( hobiKaryawan()->where('id', $id) as $hk)
 if( isset($hk['hobi'] ) ){ 
   @foreach ($hk['hobi'] as $hkh)
      {{  $hkh['name_hobi'] . ' |'  }}
   @endforeach 
} else {
  echo 'ok'; 
}
 @endforeach --}}
 

    @foreach (Karyawan()->where('id', $id) as $dataKyn)
        <div class="container mt-5 mb-5">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card" style="width: 100%;">
                <div class="card-body">
                <h5 class="card-title">Detail Karyawan</h5>
                <h6 class="card-subtitle mb-2 text-muted">nama : {{ $dataKyn->name }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">email : {{ $dataKyn->email }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">alamat : {{ $dataKyn->alamat }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">hobi : 
                    @foreach ( hobiKaryawan()->where('id', $id) as $hk)
                     {{-- @empty($hk['hobi'])
                       {{ 'ok'}}
                     @endempty --}}
                        @foreach ($hk['hobi'] as $hkh)
                            {{  $hkh['name_hobi'] . ' |'  }}
                        @endforeach
                    @endforeach
                </h6>
                <h6 class="card-subtitle mb-2 text-muted">nomor telepon : 
                    @foreach(telepon()->where('id', $id) as $teleponK )
                        @foreach ($teleponK['telepon'] as $tk)
                            {{ $tk['telepon'] . ' |' }}
                        @endforeach
                    @endforeach
                </h6>
                <br>
                <a href="/edit_karyawan/{{ $dataKyn->id }}" class="btn btn-primary mr-4">edit</a>
                <form action="/data_karyawan/{{ $dataKyn->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger mr-4">delete</button>
                </form>
                <a href="/karyawan" class="btn btn-secondary">back</a>
                </div>
            </div>
        </div>   
    @endforeach

@endsection