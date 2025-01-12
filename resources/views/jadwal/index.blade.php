@extends('layouts.app')

@section('content')
    <div class="mb-6 flex flex-row justify-between">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Data Jadwal
        </h4>
        <a href="{{ route('jadwal.create') }}"
            class="px-4 py-2 text-sm font-medium leading-5 text-white duration-150 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none">
            Tambah Jadwal
        </a>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama Supir</th>
                        <th class="px-4 py-3">Merek Mobil</th>
                        <th class="px-4 py-3">Jenis Mobil</th>
                        <th class="px-4 py-3">Plat Nomor</th>
                        <th class="px-4 py-3">Lokasi Jemput</th>
                        <th class="px-4 py-3">Lokasi Tujuan</th>
                        <th class="px-4 py-3">Status Jadwal</th>
                        <th class="px-4 py-3">#</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($jadwal as $index => $d)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $d->supir->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $d->mobil->merk }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $d->mobil->jenis }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $d->mobil->kode_wilayah }} {{ $d->mobil->nomor_polisi }} {{ $d->mobil->kode_belakang }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $d->lokasi_jemput }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $d->lokasi_tujuan }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @if ($d->status == 0)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                        Sedang Berlangsung
                                    </span>
                                @elseif ($d->status == 1)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Selesai
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                        Dibatalkan
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('jadwal.edit', $d->id) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('jadwal.destroy', $d->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
