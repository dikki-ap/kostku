@extends('dashboard.layouts.main')

@section('container')

    <div class="row" style="color: #15adcc">
        <div class="col">
            <h1>Kost List</h1>
        </div>
    </div>

    <div class="table-responsive col-lg-12">

        {{-- Flash Message Post Added Success --}}
        @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <a href="/dashboard/kosts/create" class="btn btn-primary border-0 my-3" style="background-color: #15adcc"><span data-feather="file-plus"></span>&nbsp; Add New Kost</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tipe</th>
                <th scope="col">Harga</th>
                <th scope="col">Jangka Waktu</th>
                <th scope="col">Rating</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Kota / Kabupaten</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kosts as $kost)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kost->name }}</td>
                    <td>{{ $kost->category->name }}</td>
                    <td>Rp. {{ $kost->price }}K</td>
                    <td>{{ $kost->period_time }}</td>
                    <td>{{ $kost->rating }}/5</td>
                    <td>{{ $kost->districts }}</td>
                    <td>{{ $kost->city }}</td>
                    <td>
                        <a href="/dashboard/kosts/{{ $kost->id }}" class="badge bg-primary">
                            <span data-feather="eye"></span>
                        </a>
                        <a href="/dashboard/kosts/{{ $kost->id }}/edit" class="badge bg-success">
                            <span data-feather="edit"></span>
                        </a>
                        <form action="/dashboard/kosts/{{ $kost->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf

                            <button class="badge bg-danger border-0" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><span data-feather="x-circle"></span></button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection