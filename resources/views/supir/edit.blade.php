@extends('layouts.app')

@section('content')
    <div class="mb-6 flex flex-row justify-between">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit Supir
        </h4>
        <a href="{{ route('supir.index') }}"
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
        <form action="{{ route('supir.update', $supir->id) }}" method="post">
            @csrf
            @method('PUT')
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Lengkap</span>
                <input type="text" name="name"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Nama Lengkap" value="{{ $supir->name }}" />
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input type="email" name="email"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Email" value="{{ $supir->email }}" />
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Username</span>
                <input type="text" name="username"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Username" value="{{ $supir->username }}" />
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Nomor Telepon</span>
                <input type="text" name="telp"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Nomor Telepon" value="{{ $supir->telp }}" />
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input type="password" name="pass"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:text-gray-300 form-input"
                    placeholder="Password" />
            </label>
            <button
                class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white duration-150 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none">
                Update
            </button>
        </form>
    </div>
@endsection
