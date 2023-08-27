<x-admin-layout>
    <div class="pb-6 pt-1">
        <p class="font-bold md:text-5xl text-2xl">Halaman Data Kelas Belajar</p>
        <p class="text-gray-500 py-1 text-xs md:text-lg">Silahkan Masukan Data Kelas Belajar Sesuai dengan Gurunya</p>
    </div>

    <div class="bg-white shadow-xl rounded-xl py-4 px-7 border border-gray-100">
        @if (session('success'))
            <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 mb-3 rounded relative"
                role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <button class="absolute top-0 bottom-0 right-0 px-4 py-3"
                    onclick="this.parentElement.style.display='none'">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1 1 0 01-1.415 1.414l-3.536-3.536-3.536 3.536a1 1 0 11-1.414-1.414l3.536-3.536-3.536-3.536a1 1 0 111.414-1.414l3.536 3.536 3.536-3.536a1 1 0 111.414 1.414l-3.536 3.536 3.536 3.536z" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="pb-6">
            <a href="{{ route('belajar.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Tambah
                Data Belajar</a>
        </div>
        <div>
            <table id="datatable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Kelas</th>
                        <th scope="col" class="px-6 py-3">Pelajaran</th>
                        <th scope="col" class="px-6 py-3">Total Pelajaran</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $data)
                        <tr class="bg-white hover:bg-gray-100">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $data->nama_kelas }}</td>
                            <td class="text-center">
                                @foreach ($data->pelajaran as $item)
                                    @if ($loop->iteration < 3)
                                        {{ $item->nama_pelajaran }},
                                    @endif
                                @endforeach
                                {{ $data->pelajaran_count > 2 ? '....' : '' }}
                            </td>
                            <td class="text-center">{{ $data->pelajaran_count }}</td>
                            <td class="text-center">
                                <x-success-button href="{{ route('belajar.edit', $data->id) }}">Ubah</x-success-button>
                                <form action="{{ route('belajar.destroy', $data->id) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit"
                                        onclick="return confirm('Yakin?')">Hapus</x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
