@extends('admin.layouts.templates')

@section('content')
    <div class="shadow p-3">
        <h3 class="text-center mb-4">FORM TAMBAH DATA SISWA</h3>
        <P class="lead">Silahkan isi data dalam form di bawah ini dengan benar :</P>
        <form action="{{ route('admin.tambah-siswa') }}" method="POST">
            @csrf
            <div class="form-group row mb-3 align-items-center">
                <label for="" class="form-label col-3">Nama</label>
                <div class="col-9">
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Siswa ...">
                    @error('nama')
                       <div class="invalid-feedback">
                           {{ $message }}
                       </div>
                    @enderror
                </div>
            </div>
                <div class="form-group row mb-3 align-items-center">
                    <label for="" class="form-label col-3">Email</label>
                    <div class="col-9">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email ...">
                        @error('email')
                           <div class="invalid-feedback">
                               {{ $message }}
                           </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3 align-items-center">
                    <label for="" class="form-label col-3">NIS</label>
                    <div class="col-9">
                        <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" placeholder="Nomor Induk Siswa ...">
                        @error('nis')
                           <div class="invalid-feedback">
                               {{ $message }}
                           </div>
                        @enderror
                    </div>
                </div>
                    <div class="form-group row mb-3 align-items-center">
                        <label for="kelas" class="form-label col-3">Kelas</label>
                        <div class="col-9">
                            <select name="kelas" class="form-control  @error('kelas') is-invalid @enderror">
                                <option value="">Pilih Kelas</option>
                                <option value="12 RPL">12 RPL</option>
                                <option value="11 RPL">11 RPL</option>
                                <option value="10 RPL">10 RPL</option>
                                <option value="12 RPL">12 AKL</option>
                                <option value="11 RPL">11 AKL</option>
                                <option value="10 RPL">10 AKL</option>
                                <option value="12 RPL">12 BR</option>
                                <option value="11 RPL">11 BR</option>
                                <option value="10 RPL">10 BR</option>
                                <option value="12 RPL">12 UPW</option>
                                <option value="11 RPL">11 UPW</option>
                                <option value="10 RPL">10 UPW</option>
                                <option value="12 RPL">12 MP</option>
                                <option value="11 RPL">11 MP</option>
                                <option value="10 RPL">10 MP</option>
                            </select>
                             @error('kelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                             @enderror
                        </div>
                    </div>
                <div class="form-group row mb-3 align-items-center">
                    <label for="jurusan" class="form-label col-3">Jurusan</label>
                    <div class="col-9">
                        <select name="jurusan" class="form-control @error('jurusan') is-invalid @enderror">
                            <option value="">Pilih Jurusan</option>
                            <option value="12 RPL">RPL</option>
                            <option value="11 RPL">AKL</option>
                            <option value="10 RPL">BR</option>
                            <option value="12 RPL">MP</option>
                            <option value="11 RPL">ULP</option>
                        </select>
                         @error('jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                         @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-success px-5" type="submit">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.siswa') }}" class="btn btn-secondary px-4">
                        <i class="fas fa-undo"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection