<x-landing-layout>

    <section class="content">
        <div class="container">
            <div class="row justify-content-center pt-md-5">
                <div class="col-md-8">
                    <div class="login-logo" style="background:#eee;opacity: 0.8">
                        <a href="#"><b>PORTAL</b></a>
                      </div>

                    <div class="card card-outline card-primary">
                        <div class="card-body bg-white">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-nip">NIP</label>
                                            <input type="text" 
                                            class="form-control @error('nip') is-invalid @enderror" 
                                            id="field-nip" 
                                            name="nip"
                                            value="{{ old('nip') }}"
                                            placeholder="Masukan NIP">
                                            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-nama">Nama Lengkap</label>
                                            <input type="text" 
                                            class="form-control @error('nama') is-invalid @enderror" 
                                            id="field-nama" 
                                            name="nama" 
                                            value="{{ old('nama') }}"
                                            placeholder="Masukan Nama">
                                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-email">Alamat Email</label>
                                            <input type="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            id="field-email" 
                                            name="email"
                                            value="{{ old('email') }}"
                                            placeholder="Masukan Email">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-hp">No Handphone</label>
                                            <input type="text" 
                                            class="form-control @error('hp') is-invalid @enderror" 
                                            id="field-hp" 
                                            name="hp" 
                                            value="{{ old('hp') }}"
                                            placeholder="Masukan No Handphone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-alamat">Alamat Lengkap</label>
                                            <input type="text" 
                                            class="form-control @error('alamat') is-invalid @enderror" 
                                            id="field-alamat" 
                                            name="alamat"
                                            value="{{ old('alamat') }}"
                                            placeholder="Masukan Alamat">
                                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="field-rt">RT</label>
                                            <input type="text" 
                                            class="form-control @error('rt') is-invalid @enderror" 
                                            id="field-rt" 
                                            name="rt" 
                                            value="{{ old('rt') }}"
                                            placeholder="RT">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="field-rw">RW</label>
                                            <input type="text" 
                                            class="form-control @error('rw') is-invalid @enderror" 
                                            id="field-rw" 
                                            name="rw" 
                                            value="{{ old('rw') }}"
                                            placeholder="RW">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-kelurahan">Kelurahan</label>
                                            <select class="form-control select2 @error('kelurahan') is-invalid @enderror" name="kelurahan" id="field-kelurahan" data-placeholder="Pilih Kelurahan">
                                                <option value="">Pilih</option>
                                                @foreach ($kelurahan as $t)
                                                    <option value="{{ $t->id_j_kelurahan }}" {{ old('kelurahan') == $t->id_j_kelurahan ? 'selected="selected"' : '' }}>{{ $t->nama_j_kelurahan }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('kelurahan')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-password">Password</label>
                                            <input type="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            id="field-password" 
                                            name="password" 
                                            placeholder="Masukan password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-landing-layout>