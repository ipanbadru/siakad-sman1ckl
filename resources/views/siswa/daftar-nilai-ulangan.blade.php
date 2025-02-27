<x-siswa-layout>
  <div class="pb-6 pt-1">
      <span class="font-bold text-4xl">Halaman Data Daftar Ulangan</span>
  </div>

  <div class="bg-white shadow-xl rounded-xl py-4 px-7 border border-gray-100">
      <div>
          <table id="datatable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
              <thead class="bg-gray-100">
                  <tr>
                      <th scope="col" class="px-6 py-3">No</th>
                      <th scope="col" class="px-6 py-3">Nama Pelajaran</th>
                      <th scope="col" class="px-6 py-3">Tugas</th>
                      <th scope="col" class="px-6 py-3">Ulangan</th>
                      <th scope="col" class="px-6 py-3">UTS</th>
                      <th scope="col" class="px-6 py-3">UAS</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($nilaiUlangan as $data)
                      <tr class="bg-white hover:bg-gray-100">
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td class="text-center">{{ $data->nama_pelajaran }}</td>
                          <td class="text-center">{{ $data->tugas ?? '0' }}</td>
                          <td class="text-center">{{ $data->ulangan ?? '0' }}</td>
                          <td class="text-center">{{ $data->uts ?? '0' }}</td>
                          <td class="text-center">{{ $data->uas ?? '0' }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
</x-siswa-layout>
