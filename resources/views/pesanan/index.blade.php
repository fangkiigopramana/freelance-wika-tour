@extends('pesanan.layout')
@section('content')
    <h1 class="text-4xl font-bold mb-10">
        List Pesanan Tiket</h1>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif
    <div class="rounded-lg overflow-x-hidden overflow-y-scroll max-h-100 no-scrollbar mb-24 w-10/12 md:w-auto">
        <table id="pesananTable" class="w-full min-w-[600px] text-left h-full text-sm md:text-base">
            <thead class="bg-[#cdeaff] sticky top-0">
                <tr>
                    <th class="p-3">Id Pemesan</th>
                    <th class="p-3">Nama Pemesan</th>
                    <th class="p-3">Berangkat</th>
                    <th class="p-3">Tujuan</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($pesanans as $key => $pesanan)
                    <tr>
                        <td class="p-3 border-b">{{ $key + 1 }}</td>
                        {{-- <td class="p-3 border-b">{{ $user->id_user}}</td> --}}
                        <td class="p-3 border-b">{{ $pesanan->pemesan }}</td>
                        <td class="p-3 border-b">{{ $pesanan->Kota_asal }}</td>
                        <td class="p-3 border-b">{{ $pesanan->Kota_Tujuan }}</td>
                        <td class="p-3 border-b">
                            @if ($pesanan->status == 'proses')
                                <button type="button" class="">{{ $pesanan->status }}</button>
                            @elseif($pesanan->status == 'selesai')
                                <button type="button" class="">{{ $pesanan->status }}</button>
                            @elseif($pesanan->status == 'gagal')
                                <button type="button" class="">{{ $pesanan->status }}</button>
                            @endif
                        </td>
                        <td class="p-3 border-b">
                            <a href="{{ route('pesanan.edit', $pesanan->id_pesanan) }}" type="button"
                                class="bg-themeBlue/60 text-white px-4 py-2 rounded">Urus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#pesananTable').DataTable();            
        });
    </script>
@stop