@extends('layout.admin')
@push('css')
<!-- Bootstrap CSS -->
<link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
            integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
@endpush
@section('content')

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pegawai</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <div class="container">
                <a href="/tambahpegawai" type="button" class="btn btn-success mb-2"
                    >Tambah+</a
                >
                <div class="row g-3 align-items-center mt-1 mb-4">
                    <div class="col-auto">
                        <form action="/pegawai" method="GET">
                        <input
                            type="search"
                            id="inputPassword6"
                            name="search"
                            class="form-control"
                            aria-describedby="passwordHelpInline"
                        />
                    </form>
                    </div>
                </div>
                <div class="row">
                    <!-- @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                    @endif -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">No telpon</th>
                                <th scope="col">Dibuat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp @foreach ($data as $index => $row)
                            <tr>
                                <th scope="row">
                                    {{ $index + $data->firstitem() }}
                                </th>
                                <td>{{ $row->nama}}</td>
                                <td>
                                    <div
                                        style="
                                            width: 80px;
                                            height: 80px;
                                            overflow: hidden;
                                            border-radius: 50%;
                                        "
                                    >
                                        <img
                                            src="{{asset('fotopegawai/'.$row->foto)}}"
                                            alt=""
                                            style="
                                                width: 100%;
                                                height: 100%;
                                                object-fit: cover;
                                                margin-bottom: 5px;
                                            "
                                        />
                                    </div>
                                </td>
                                <td>
                                    @if ($row->jeniskelamin == 'cowo') Laki-Laki
                                    @elseif ($row->jeniskelamin == 'cewe') Perempuan
                                    @else
                                    {{ $row->jeniskelamin }}
                                    @endif
                                </td>
                                <td>0{{ $row->notelpon}}</td>
                                <td>{{ $row->created_at->format('D M Y')}}</td>
                                <!-- <td>{{ $row->created_at->diffForHumans()}}</td> -->
                                <td>
                                    <a
                                        href="/tampilkandata/{{$row->id}}"
                                        class="btn btn-warning"
                                        >Edit</a
                                    >
                                    <a
                                        href="#"
                                        class="btn btn-danger delete"
                                        data-id="{{$row->id}}"
                                        data-nama="{{$row->nama}}"
                                        >Delete</a
                                    >
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
        </div>
    </div>

    
@endsection
    @push('scripts')
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
    ></script>
    
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"
    ></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    --></body>
    <script>
    $(".delete").click(function () {
        var pegawaiid = $(this).attr("data-id");
        var nama = $(this).attr("data-nama");
        swal({
            title: "Apa kamu yakin?",
            text:
                "Kamu akan menghapus data pegawai dengan nama " +
                nama +
                " ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "/delete/" + pegawaiid + "";
                swal("Data berhasil dihapus", {
                    icon: "success",
                });
            } else {
                swal("Data tidak jadi dihapus");
            }
        });
    });
    </script>
    
    <script>
    @if (Session::has('success'))
      toastr.success("{{Session::get('success')}}")
    @endif
    </script>

@endpush