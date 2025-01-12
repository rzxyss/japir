@extends('layouts.app')

@section('content')
    <div class="mb-6 flex flex-row justify-between">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit Mobil
        </h4>
        <a href="{{ route('mobil.index') }}"
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
        <form action="{{ route('mobil.update', $mobil->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="flex flex-row justify-between gap-6">
                <label class="block text-sm w-full">
                    <span class="text-gray-700 dark:text-gray-400">Kode Wilayah</span>
                    <input type="text" name="kd_wil"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                        placeholder="Kode Wilayah" value="{{ $mobil->kode_wilayah }}" />
                </label>
                <label class="block text-sm w-full">
                    <span class="text-gray-700 dark:text-gray-400">Nomor Polisi</span>
                    <input type="text" name="nopol"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                        placeholder="Nomor Polisi" value="{{ $mobil->nomor_polisi }}" />
                </label>
                <label class="block text-sm w-full">
                    <span class="text-gray-700 dark:text-gray-400">Kode Belakang</span>
                    <input type="text" name="kd_blk"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                        placeholder="Kode Belakang" value="{{ $mobil->kode_belakang }}" />
                </label>

            </div>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Merk Kendaraan</span>
                <input type="text" name="merk"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Merk" value="{{ $mobil->merk }}" />
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Jenis Kendaraan</span>
                <input type="text" name="jenis"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Jenis" value="{{ $mobil->jenis }}" />
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Tahun Kendaraan</span>
                <input type="text" name="tahun"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Tahun" value="{{ $mobil->tahun }}" />
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Warna Kendaraan</span>
                <input type="text" name="warna"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Warna" value="{{ $mobil->warna }}" />
            </label>
            <button
                class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white duration-150 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none">
                Update
            </button>
        </form>
    </div>
@endsection
