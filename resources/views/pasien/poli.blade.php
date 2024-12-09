@extends('layouts.pasien')

@section('title', 'Pasien Dashboard')

@section('content')
<div class="container">
    <div class="mt-4">
        <h3>Poli yang Tersedia</h3>
        
        <select id="poli_select" class="form-control">
            <option value="">Pilih Poli</option>
            @foreach ($poli as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        
        <div class="table-responsive">
            <table id="jadwal_table" class="table table-striped" style="display: none;">
                <thead>
                    <tr>
                        <th>Dokter</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- jadwal akan diisi oleh AJAX --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#poli_select').change(function() {
            var poliId = $(this).val();
            
            if (poliId) {
                $.ajax({
                    url: '{{ url('pasien/get-poli') }}/' + poliId,
                    method: 'GET',
                    success: function(response) {
                        var jadwalTable = $('#jadwal_table tbody');
                        jadwalTable.empty(); 
                        
                        if (response.length > 0) {
                            $('#jadwal_table').show();
                            $.each(response, function(index, jadwal) {
                                jadwalTable.append(
                                    '<tr>' +
                                        '<td>' + jadwal.dokter.name + '</td>' +
                                        '<td>' + jadwal.hari + '</td>' +
                                        '<td>' + jadwal.jam_mulai + '</td>' +
                                        '<td>' + jadwal.jam_selesai + '</td>' +
                                    '</tr>'
                                );
                            });
                        } else {
                            $('#jadwal_table').hide();
                            Swal.fire({
                                icon: 'info',
                                title: 'Tidak ada jadwal',
                                text: 'Tidak ada jadwal untuk poli ini.'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Gagal memuat jadwal.'
                        });
                    }
                });
            } else {
                $('#jadwal_table').hide(); 
            }
        });
    });
    </script>
@endsection
