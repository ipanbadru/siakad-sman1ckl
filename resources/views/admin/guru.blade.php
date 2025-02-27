<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Halaman Data Guru</span>
    </div>

    <div class="bg-white shadow-xl rounded-xl py-4 px-7 border border-gray-100">
        @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 mb-3 rounded relative" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1 1 0 01-1.415 1.414l-3.536-3.536-3.536 3.536a1 1 0 11-1.414-1.414l3.536-3.536-3.536-3.536a1 1 0 111.414-1.414l3.536 3.536 3.536-3.536a1 1 0 111.414 1.414l-3.536 3.536 3.536 3.536z"/>
                </svg>
            </button>
        </div>
        @endif
        <div class="pb-6">
            <x-blue-button href="{{ route('guru.create') }}">Tambah Data Guru</x-blue-button>
        </div>
        <div>
            <table id="datatable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">NIP</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">No HP</th>
                        <th scope="col" class="px-6 py-3">Mengajar</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $data )
                        <tr class="bg-white hover:bg-gray-100">
                            <td class="text-center">{{$data->nip}}</td>
                            <td class="text-center">{{$data->nama_guru}}</td>
                            <td class="text-center">{{$data->jenis_kelamin}}</td>
                            <td class="text-center">{{$data->alamat}}</td>
                            <td class="text-center">{{$data->email}}</td>
                            <td class="text-center">{{$data->no_hp}}</td>
                            <td class="text-center">{{$data->pelajaran->nama_pelajaran}}</td>
                            <td class="text-center">
                                <x-success-button href="{{ route('guru.edit', $data->id) }}">Ubah</x-success-button>
                                <form action="{{ route('guru.destroy', $data->id) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit" onclick="return confirm('yakin?')">Hapus</x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
