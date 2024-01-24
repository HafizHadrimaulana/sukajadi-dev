<select class="form-control" name="filter-bulan" id="filter-bulan" disabled data-placeholder="Pilih Bulan">
    <option></option>
</select>

@push('scripts')
    
<script>
    $(document).ready(function() {
        

        $('#filter-bulan').select2({
            ajax: {
                url: "{{ route('json.bulan') }}",
                dataType: 'json',
                // data: function (params) {
                //     var tahun = $("#filter-tahun").val();

                //     var query = {
                //         search: params.term,
                //         tahun : tahun,
                //     }
                //     return query;
                // },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
    });
</script>
@endpush