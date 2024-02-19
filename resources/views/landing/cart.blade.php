@extends('landing.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif


    <div class="bg-white shadow max-w-7xl rounded-lg my-12 mx-auto flex flex-col items-center py-8 px-8">
        <p class="font-bold text-3xl mb-10 text-center">Tiket Yang Dipesan</p>
        @foreach ($keranjangs as $key => $keranjang)
            <div class=" flex flex-wrap items-center justify-center md:justify-between w-full px-12 border rounded-lg py-8 gap-4 mb-6">

                <div class="flex flex-col items-center gap-3">
                    <p class="font-bold text-sm">{{ $keranjang->maskapai }}</p>
                    <div class="flex items-center text-2xl font-bold">
                        <p class="">{{ $keranjang->Kota_asal }}</p>
                        <svg width="48" height="10" viewBox="0 0 48 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M36.5634 5.3871C36.7772 5.17331 36.7772 4.82669 36.5634 4.6129L33.0795 1.12904C32.8657 0.915257 32.5191 0.915257 32.3053 1.12904C32.0915 1.34283 32.0915 1.68945 32.3053 1.90323L35.4021 5L32.3053 8.09677C32.0915 8.31055 32.0915 8.65717 32.3053 8.87096C32.5191 9.08474 32.8657 9.08474 33.0795 8.87096L36.5634 5.3871ZM11.0737 5.54744H12.6426V4.45256H11.0737V5.54744ZM15.7804 5.54744H18.9183V4.45256H15.7804V5.54744ZM22.0561 5.54744H25.1939V4.45256H22.0561V5.54744ZM28.3317 5.54744H31.4696V4.45256H28.3317V5.54744ZM34.6074 5.54744H36.1763V4.45256H34.6074V5.54744Z"
                                fill="black" />
                        </svg>
                        <p class="">{{$keranjang->Kota_Tujuan}}</p>
                    </div>
                    <p class="font-bold">{{explode(" ",$keranjang->created_at)[0]}}</p>
                </div>

                <div class="flex flex-col items-center justify-center">
                    <p class="text-sm">Berangkat</p>
                    <p class="font-bold text-2xl mb-8">{{ $keranjang->jam_berangkat }}</p>
                    <p class="text-sm">Sampai</p>
                    <p class="font-bold text-2xl">{{ $keranjang->jam_tiba }}</p>
                </div>

                <div class="flex flex-col items-center justify-center">
                    <p class="text-sm text-center">Status Pesanan</p>
                    <p class="font-bold text-2xl mb-8">{{ $keranjang->status }}</p>
                    <p class="text-sm">Penumpang</p>
                    <p class="font-bold text-2xl">{{ count(explode(",",$keranjang->penumpang)) }} Orang</p>
                </div>

                <div class="flex flex-col items-center">
                    <a href="route('landing.detail', ['id' => $result['id']])" class="btn btn-primary px-4 bg-themeBlue">Cek Detail</a>
                </div>

            </div>
        @endforeach
    </div>
@stop
