@extends('dashboard.layouts.main')

@section('container')

    <div class="row" style="color: #15adcc">
        <div class="col">
            <h1>Gallery List</h1>
        </div>
    </div>

    <div class="table-responsive col-lg-12">

        {{-- Flash Message Post Added Success --}}
        @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
        @elseif (session()->has('failed'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session('failed') }}
        </div>
        @endif

        <a href="/dashboard/kosts/create" class="btn btn-primary border-0 my-3" style="background-color: #15adcc"><span data-feather="file-plus"></span>&nbsp; Add New Kost</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tipe</th>
                <th scope="col">Tambah Gambar</th>
                <th scope="col">Lihat Detail</th>
                <th scope="col">Ubah Gambar</th>
                <th scope="col">Hapus Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kosts as $kost)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kost->name }}</td>
                        <td>{{ $kost->category->name }}</td>
                        <td>

                            <!-- Button Add Image Modal -->
                            <button type="button" class="badge border-0" data-bs-toggle="modal" data-bs-target="#addImage-{{ $kost->id }}" style="background-color: #15adcc">
                                <span data-feather="file-plus"></span>
                            </button>

                            <!-- Add Image Modal -->
                            <div class="modal fade" id="addImage-{{ $kost->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Image to <span style="color: #15adcc">{{ $kost->name }}</span></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <form action="/dashboard/galleries" method="POST" enctype="multipart/form-data" class="mb-5">
                                                    @csrf
                                                    <input type="hidden" name="kost_id" id="kost_id" value="{{ $kost->id }}">

                                                    <div class="mb-3">
                                                        <label for="kost_name" class="form-label">Nama</label>
                                                        <input type="text" name="kost_name" class="form-control" id="kost_name" readonly value="{{ $kost->name }}">
                                                    </div>
                                                    {{-- url --}}
                                                    <div class="mb-3">
                                                        <label for="url" class="form-label">Gambar</label>

                                                        {{-- Buat Tag Untuk Preview url --}}
                                                        <img class="img-preview img-fluid mb-3 col-sm-5">

                                                        <input class="form-control @error('url')
                                                            is-invalid
                                                        @enderror" type="file" id="url" name="url" required>
                                                        @error('url')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class=" mt-3 text-center">
                                                        <button type="submit" class="btn btn-primary border-0" style="background-color: #15adcc"><span data-feather="file-plus"></span>&nbsp; Add New Image</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>

                            <a href="/dashboard/kosts/{{ $kost->id }}" class="badge bg-primary">
                                <span data-feather="eye"></span>
                            </a>

                            {{-- <form action="/dashboard/galleries/{{ $kost->id }}" method="GET">
                                @csrf

                                <input type="hidden" name="kost_id" id="kost_id" value="{{ $kost->id }}">
                                <!-- Button Add Image Modal -->
                                <button type="submit" class="badge bg-primary border-0">
                                    <span data-feather="eye"></span>
                                </button>
                            </form> --}}

                        </td>
                        <td>
                            <form action="/dashboard/galleries/{{ $kost->id }}/edit" method="GET">
                                @csrf

                                <input type="hidden" name="kost_id" id="kost_id" value="{{ $kost->id }}">
                                <!-- Button Add Image Modal -->
                                <button type="submit" class="badge bg-success border-0">
                                    <span data-feather="edit"></span>
                                </button>
                            </form>
                            {{-- <a href="/dashboard/galleries/{{ $kost->id }}/edit" class="badge bg-success">
                                <span data-feather="edit"></span>
                            </a> --}}
                        </td>
                        <td>
                            <form action="/dashboard/galleries/create" method="GET">
                                @csrf

                                <input type="hidden" name="kost_id" id="kost_id" value="{{ $kost->id }}">
                                <!-- Button Add Image Modal -->
                                <button type="submit" class="badge bg-danger border-0">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

@endsection