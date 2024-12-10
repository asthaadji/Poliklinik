@extends('layouts.pasien')

@section('title', 'Pasien Dashboard')

@section('content')
    <div class="container ">
        <div class="py-5">
            <div class="card">
                <div class="card-header">
                    <h2>poli yang tersedia</h2>
                </div>

                <div class="card-body">
                    <select id="poli_select" class="form-select">
                        <option value="">Pilih Poli</option>
                        @foreach ($poli as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                    <div class="table-responsive mt-4">
                        <table id="jadwal_table" class="table table-striped table-bordered" style="display: none;">
                            <thead class="table-dark">
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
                                        '<td> Dr.' + jadwal.dokter.name + '</td>' +
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
