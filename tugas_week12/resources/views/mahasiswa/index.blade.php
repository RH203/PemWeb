{{-- {{ session()->get('pesan')}} --}}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Data Mahasiswa</title>
</head>

<body>


  <div class="container mt-3">
    <div class="row">
      <div class="col-12">


        <div class="py-4 d-flex justify-content-between align-items-center">
          <h2>Tabel Mahasiswa</h2>
          <a href="{{ route('mahasiswas.create') }}" class="btn btn-primary">
            Tambah Mahasiswa
          </a>
        </div>


        @if (session()->has('pesan'))
          <div class="alert alert-success">
            {{ session()->get('pesan') }}
          </div>
        @endif


        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nim</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Jurusan</th>
              <th>Alamat</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($mahasiswas as $mahasiswa)
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td><a href="{{ route('mahasiswas.show', ['mahasiswa' => $mahasiswa->id]) }}">{{ $mahasiswa->nim }}</a>
                </td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                <td>{{ $mahasiswa->jurusan }}</td>
                <td>{{ $mahasiswa->alamat == '' ? 'N/A' : $mahasiswa->alamat }}</td>
              </tr>
            @empty
              <td colspan="6" class="text-center">Tidak ada data...</td>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
