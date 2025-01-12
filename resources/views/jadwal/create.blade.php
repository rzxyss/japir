@extends('layouts.app')

@section('content')
    <div class="mb-6 flex flex-row justify-between">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Tambah Jadwal
        </h4>
        <a href="{{ route('jadwal.index') }}"
            class="px-4 py-2 text-sm font-medium leading-5 text-white duration-150 bg-red-600 border border-transparent rounded-lg hover:bg-red-700 focus:outline-none">
            Kembali
        </a>
    </div>
    @if ($errors->any())
        <div class="mb-4 text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('jadwal.store') }}" method="post">
            @csrf

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Jalan</span>
                <input type="date" name="tgl"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Tanggal Jalan" />
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Jam Jemput</span>
                <input type="time" name="jam"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Jam Jemput" />
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Lokasi Jemput</span>
                <input type="text" name="lj"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Lokasi Jemput" />
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Lokasi Tujuan</span>
                <input type="text" name="lt"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Lokasi Tujuan" />
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Supir</span>
                <select name="supir"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input">
                    <option value="" selected disabled>Silahkan Pilih Supir</option>
                    @foreach ($supir as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Mobil</span>
                <select name="mobil"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input">
                    <option value="" selected disabled>Silahkan Pilih Mobil</option>
                    @foreach ($mobil as $m)
                        <option value="{{ $m->id }}">{{ $m->kode_wilayah }} {{ $m->nomor_polisi }}
                            {{ $m->kode_belakang }} - {{ $m->merk }} {{ $m->model }} {{ $m->warna }}</option>
                    @endforeach
                </select>
            </label>
            <button
                class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white duration-150 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none">
                Tambah
            </button>
        </form>
    </div>
@endsection
