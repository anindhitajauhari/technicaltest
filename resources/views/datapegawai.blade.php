<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DATA PEGAWAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4 mu-4">DATA PEGAWAI</h1>
    
    <div class="container">
        <a href="/tambahpegawai" class="btn btn-dark">Tambah Data</a>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Telpon</th>
                        <th scope="col">Gaji</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Jenis Kontrak</th>
                        <th scope="col">Action</th>      
                    </tr>
                </thead>
                <tbody>
                  @php
                  $no = 1;
                  @endphp
                  @foreach ($dataPegawai as $index => $row)
                      @php
                          $row2 = $dataJabatan[$index];
                          $row3 = $dataKontrak[$index];
                      @endphp                   
                      <tr>
                          <th scope="row">{{ $no++ }}</th>
                          <td>{{ $row->nama }}</td>
                          <td>{{ $row->jeniskelamin }}</td>
                          <td>0{{ $row->notelp }}</td>  
                          <td>{{ $row2->gaji }}</td>       
                          <td>{{ $row2->jenis }}</td> 
                          <td>{{ $row3->jeniskontrak }}</td>                
                          <td>
                              <a href="/delete/{{ $row->id }}" button type="button" class="btn btn-danger">Delete</a>                    
                              <a href="/tampilkandata/{{ $row->id }}" button type="button" class="btn btn-success">Edit</a>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
