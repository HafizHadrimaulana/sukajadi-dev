@props(['type' => 'tahun', 'value'])

<select class="form-control select2" name="tahun" id="filter-tahun" data-placeholder="Pilih Tahun">
    <option></option>
    @foreach ($tahun as $t)
        @if($type == 'tahun')
            <option value="{{ $t->nama_j_tahun }}" {{ old('tahun') == $t->nama_j_tahun ? 'selected="selected"' : '' }}>{{ $t->nama_j_tahun }}</option>
        @else
            <option value="{{ $t->id_j_tahun }}" {{ old('tahun') == $t->id_j_tahun ? 'selected="selected"' : '' }}>{{ $t->nama_j_tahun }}</option>
        @endif
    @endforeach
</select>