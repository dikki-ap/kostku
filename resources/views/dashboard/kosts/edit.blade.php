@extends('dashboard.layouts.main')

@section('container')

    <div class="row" style="color: #15adcc">
        <div class="col">
            <h1>Edit Kost</h1>
        </div>
    </div>
        {{-- action akan otomatis ke /dashboard/kosts digabung dengan POST akan otomatis menjalankan store() di Resource Controller --}}
        <form action="/dashboard/kosts/{{ $kost->id }}" method="POST" class="mb-5">
            @method('put')
            @csrf
            <div class="row justify-content-evenly my-5">
                <div class="col-4">

                    {{-- Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" id="name" autofocus required value="{{ old('name', $kost->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Tipe</label>
                        <select class="form-select @error('category_id')
                        is-invalid
                    @enderror" name="category_id" required>
                    @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                    
                            @foreach ($categories as $category)

                            {{-- Kondisi untuk SELECT OPTION jika salah, dan otomatis terisi ke value sebelumnya --}}
                            @if (old('category_id', $kost->category_id) == $category->id)

                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>

                            @else

                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @endif
                            
                            @endforeach
                        </select>
                    </div>

                    {{-- Price --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" name="price" class="form-control @error('price')
                            is-invalid
                        @enderror" id="price" minlength="1" maxlength="4" required value="{{ old('price', $kost->price) }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Period Time --}}
                    <div class="mb-3">
                        <label for="period_time" class="form-label">Jangka Waktu</label>
                        <select class="form-select @error('period_time')
                        is-invalid
                    @enderror" name="period_time" required>
                    @error('period_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                    @if (old('period_time', $kost->period_time) == $kost->period_time)
                            @if (old('period_time', $kost->period_time) == 'Hari')
                                <option value="{{ $kost->period_time }}" selected>{{ $kost->period_time }}</option>
                                <option value="Bulan">Bulan</option>
                                <option value="Tahun">Tahun</option>
                            @elseif (old('period_time', $kost->period_time) == 'Bulan')
                                <option value="Hari">Hari</option>
                                <option value="{{ $kost->period_time }}" selected>{{ $kost->period_time }}</option>
                                <option value="Tahun">Tahun</option>
                            @else
                                <option value="Hari">Hari</option>
                                <option value="Bulan">Bulan</option>
                                <option value="{{ $kost->period_time }}" selected>{{ $kost->period_time }}</option>
                            @endif
                    @endif
                            
                        </select>
                    </div>

                    {{-- Rating --}}
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select @error('rating')
                        is-invalid
                    @enderror" name="rating" required>
                    @error('rating')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                    @if (old('rating', $kost->rating) == $kost->rating)
                            @if (old('rating', $kost->rating) == 1)
                                <option value="{{ $kost->rating }}" selected>{{ $kost->rating }}</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            @elseif (old('rating', $kost->rating) == 2)
                                <option value="1">1</option>
                                <option value="{{ $kost->rating }}" selected>{{ $kost->rating }}</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            @elseif (old('rating', $kost->rating) == 3)
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="{{ $kost->rating }}" selected>{{ $kost->rating }}</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            @elseif (old('rating', $kost->rating) == 4)
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="{{ $kost->rating }}" selected>{{ $kost->rating }}</option>
                                <option value="5">5</option>
                            @else
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="{{ $kost->rating }}" selected>{{ $kost->rating }}</option>
                            @endif
                    @endif
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    {{-- Districts --}}
                    <div class="mb-3">
                        <label for="districts" class="form-label">Kecamatan</label>
                        <input type="text" name="districts" class="form-control @error('districts')
                            is-invalid
                        @enderror" id="districts" required value="{{ old('districts', $kost->districts) }}">
                        @error('districts')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- City --}}
                    <div class="mb-3">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" name="city" class="form-control @error('city')
                            is-invalid
                        @enderror" id="city" required value="{{ old('city', $kost->city) }}">
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" name="address" class="form-control @error('address')
                            is-invalid
                        @enderror" id="address" required value="{{ old('address', $kost->address) }}">
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- URL Location --}}
                    <div class="mb-3">
                        <label for="url_location" class="form-label">Google Maps URL</label>
                        <input type="text" name="url_location" class="form-control @error('url_location')
                            is-invalid
                        @enderror" id="url_location" required value="{{ old('url_location', $kost->url_location) }}">
                        @error('url_location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Phone Number --}}
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomor Telepon Pemilik</label>
                        <input type="number" name="phone_number" class="form-control @error('phone_number')
                            is-invalid
                        @enderror" id="phone_number" minlength="11" maxlength="13" required value="{{ old('phone_number', $kost->phone_number) }}">
                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-2">                    
                        {{-- Bathroom --}}
                        <div class="mb-3">
                            <label for="bathroom" class="form-label">Kamar Mandi</label>
                            <select class="form-select @error('bathroom')
                            is-invalid
                        @enderror" name="bathroom" required>
                        @error('bathroom')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                        @enderror
                        @if (old('bathroom', $kost->bathroom) == $kost->bathroom)
                            @if (old('bathroom', $kost->bathroom) == 1)
                                <option value="{{ $kost->bathroom }}" selected>Tersedia</option>
                                <option value="0">Tidak Tersedia</option>
                            @else
                                <option value="1">Tersedia</option>
                                <option value="{{ $kost->bathroom }}" selected>Tidak Tersedia</option>
                            @endif
                        @endif
                            </select>
                        </div>

                        {{-- Bed --}}
                        <div class="mb-3">
                            <label for="bed" class="form-label">Kasur</label>
                            <select class="form-select @error('bed')
                            is-invalid
                        @enderror" name="bed" required>
                        @error('bed')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                        @enderror
                        @if (old('bed', $kost->bed) == $kost->bed)
                            @if (old('bed', $kost->bed) == 1)
                                <option value="{{ $kost->bed }}" selected>Tersedia</option>
                                <option value="0">Tidak Tersedia</option>
                            @else
                                <option value="1">Tersedia</option>
                                <option value="{{ $kost->bed }}" selected>Tidak Tersedia</option>
                            @endif
                        @endif
                            </select>
                        </div>

                        {{-- Wardrobe --}}
                        <div>
                            <label for="ac" class="form-label">AC</label>
                            <select class="form-select @error('ac')
                            is-invalid
                        @enderror" name="ac" required>
                        @error('ac')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                        @enderror
                        @if (old('ac', $kost->ac) == $kost->ac)
                            @if (old('ac', $kost->ac) == 1)
                                <option value="{{ $kost->ac }}" selected>Tersedia</option>
                                <option value="0">Tidak Tersedia</option>
                            @else
                                <option value="1">Tersedia</option>
                                <option value="{{ $kost->ac }}" selected>Tidak Tersedia</option>
                            @endif
                        @endif
                            </select>
                        </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    {{-- Button Create --}}
                    <button type="submit" class="btn btn-primary border-0" style="background-color: #15adcc"><span data-feather="edit"></span>&nbsp; Edit Kost</button>
                </div>
            </div>
        </form>

@endsection