<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .btn-primary {
            color: #fff;
            background-color: #757DE8;
            border-color: #3F51B5;
        }

        .btn-primary.active,
        .btn-primary.focus,
        .btn-primary:active,
        .btn-primary:focus,
        .btn-primary:hover {
            color: #fff;
            background-color: #3F51B5;
            border-color: #757DE8;
        }

        .navbar-brand {
            color: #3F51B5;
            font-weight: 600;
            font-size: 18px;
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 1px #757DE8;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #3F51B5;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgb(54, 56, 58);
        }
    </style>

</head>

<body>
    <!-- Navbar Admin -->
    <nav class="navbar fixed-top" style="background-color:#DEDEFF;">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="/dashboard">Dashboard admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <nav class="mt-5 pt-5 mx-5">
        @if (request()->session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ request()->session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex" style="overflow-x:scroll;" id="nav-tab" role="tablist">
            <button class="btn btn-primary active mb-2" id="nav-home-tab" data-bs-toggle="tab"
                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                aria-selected="true">About</button>
            <button class="btn btn-primary mx-2 mb-2" id="nav-profile-tab" data-bs-toggle="tab"
                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                aria-selected="false">Resume</button>
            <button class="btn btn-primary mx-2 mb-2" id="nav-contact-tab" data-bs-toggle="tab"
                data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                aria-selected="false">Project</button>
            <button class="btn btn-primary mx-2 mb-2" id="nav-message-tab" data-bs-toggle="tab"
                data-bs-target="#nav-message" type="button" role="tab" aria-controls="nav-message"
                aria-selected="false">Message</button>
        </div>
    </nav>
    <div class="tab-content mx-5 pt-4" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
            tabindex="0">
            <!-- Form About -->
            <form action="{{ route('update.about') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="full_name" id="full_name"
                        class="form-control @error('full_name') is-invalid @enderror" value="{{ $about->full_name }}"
                        placeholder="Full Name">
                    @error('full_name')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="link_github" id="link_github" value="{{ $about->link_github }}"
                        class="form-control @error('link_github') is-invalid @enderror" placeholder="Link Github">
                    @error('link_github')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="link_linkedin" id="link_linkedin"
                        value="{{ $about->link_linkedin }}"
                        class="form-control @error('link_linkedin') is-invalid @enderror" placeholder="Link Linkedin">
                    @error('link_linkedin')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <textarea name="about" id="about" cols="30" rows="3" placeholder="About"
                        class="form-control @error('about') is-invalid @enderror">{{ $about->about }}</textarea>
                    @error('about')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
            tabindex="0">

            <div class="mb-3" id="accordionResume">
                <div class="">
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Add Experience
                    </button>
                    <div id="collapseOne"
                        class="{{ session('error_tahun_akhir') != null ? 'show accordion-collapse collapse' : 'accordion-collapse collapse' }}"
                        data-bs-parent="#accordionResume">
                        <form action="{{ route('store.experience') }}" class="border rounded p-3 mt-2"
                            method="POST">
                            @csrf
                            <h5>Tambah Pengalaman Bekerja</h5>
                            <div class="mb-3">
                                <input type="number" name="tahun_awal" placeholder="Tahun awal bekerja"
                                    min="1900" max="2900"
                                    class="form-control  @error('tahun_awal') is-invalid @enderror" step="1">
                                @error('tahun_awal')
                                    <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="number" name="tahun_akhir"
                                    placeholder="Tahun berakhir bekerja (kosongkan jika masih bekerja)" min="1900"
                                    max="2900" class="form-control " step="1">
                                @if (session('error_tahun_akhir'))
                                    <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                        {{ session('error_tahun_akhir') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="text" name="posisi_pekerjaan" placeholder="Posisi pekerjaan"
                                    id="posisi_pekerjaan"
                                    class="form-control  @error('posisi_pekerjaan') is-invalid @enderror">
                                @error('posisi_pekerjaan')
                                    <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="nama_perusahaan" placeholder="Nama perusahaan"
                                    id="nama_perusahaan"
                                    class="form-control  @error('nama_perusahaan') is-invalid @enderror">
                                @error('nama_perusahaan')
                                    <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <textarea name="detail_pengalaman" id="detail_pengalaman" placeholder="Detail pengalaman"
                                    class="form-control @error('detail_pengalaman') is-invalid @enderror" cols="30" rows="3"></textarea>
                                @error('detail_pengalaman')
                                    <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @foreach ($experiences as $experience)
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col-lg-3 col-md-4 col-sm-12 text-center text-lg-start mb-4 mb-lg-0">
                                <div class=" py-4 px-2 text-center text-white rounded-4"
                                    style="background-color:#757DE8;">
                                    <div class="fw-bolder mb-2">{{ $experience->tahun_awal }} -
                                        {{ $experience->tahun_akhir }}</div>
                                    <div class="small">{{ $experience->posisi_pekerjaan }}</div>
                                    <div class="mt-1">{{ $experience->nama_perusahaan }}</div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-12">
                                <div>{{ $experience->detail_pengalaman }}</div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalHapusExperience{{ $experience->id }}">Hapus</button>
                            <div class="modal fade" id="modalHapusExperience{{ $experience->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal konfirmasi
                                                hapus</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Yakin mau menghapus data ini?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <form action="{{ route('destroy.experience', $experience->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Ya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="mb-3" id="accordionEducation">
                <div class="">
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Add
                        Education</button>
                </div>
                <div id="collapseTwo"
                    class="{{ session('error_tahun_akhir_edukasi') != null ? 'show accordion-collapse collapse' : 'accordion-collapse collapse' }}"
                    data-bs-parent="#accordionEducation">
                    <form action="{{ route('store.education') }}" class="border rounded p-3 mt-2" method="POST">
                        @csrf
                        <h5>Tambah Riwayat Edukasi</h5>
                        <div class="mb-3">
                            <input type="number" name="tahun_awal_edukasi" placeholder="Tahun awal edukasi"
                                min="1900" max="2900"
                                class="form-control  @error('tahun_awal_edukasi') is-invalid @enderror"
                                step="1">
                            @error('tahun_awal_edukasi')
                                <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="number" name="tahun_akhir_edukasi"
                                placeholder="Tahun berakhir edukasi (kosongkan jika masih sekolah)" min="1900"
                                max="2900" class="form-control " step="1">
                            @if (session('error_tahun_akhir_edukasi'))
                                <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                    {{ session('error_tahun_akhir_edukasi') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="text" name="jurusan" placeholder="Jurusan sekolah" id="jurusan"
                                class="form-control  @error('jurusan') is-invalid @enderror">
                            @error('jurusan')
                                <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" name="nama_sekolah" placeholder="Nama asal sekolah"
                                id="nama_sekolah" class="form-control  @error('nama_sekolah') is-invalid @enderror">
                            @error('nama_sekolah')
                                <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="detail_yang_dipelajari" id="detail_yang_dipelajari" placeholder="Detail pengalaman sekolah"
                                class="form-control @error('detail_yang_dipelajari') is-invalid @enderror" cols="30" rows="3"></textarea>
                            @error('detail_yang_dipelajari')
                                <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            @foreach ($educations as $edu)
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col-lg-3 col-md-4 col-sm-12 text-center text-lg-start mb-4 mb-lg-0">
                                <div class=" py-4 px-2 text-center text-white rounded-4"
                                    style="background-color:#757DE8;">
                                    <div class="fw-bolder mb-2">{{ $edu->tahun_awal }} - {{ $edu->tahun_akhir }}
                                    </div>
                                    <div class="small">{{ $edu->jurusan }}</div>
                                    <div class="mt-1">{{ $edu->nama_sekolah }}</div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-12">
                                <div>{{ $edu->detail_yang_dipelajari }}</div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalHapusEducation{{ $edu->id }}">Hapus</button>
                            <div class="modal fade" id="modalHapusEducation{{ $edu->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal konfirmasi
                                                hapus</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Yakin mau menghapus data ini?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <form action="{{ route('destroy.education', $edu->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Ya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
            tabindex="0">
            <form action="{{ route('store.project') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="text" name="title_project" placeholder="Title Project"
                        class="form-control @error('title_project') is-invalid @enderror">
                    @error('title_project')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="file" name="photo_project" id="photo_project"
                        class="form-control @error('photo_project') is-invalid @enderror">
                    @error('photo_project')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <textarea name="description_jobdesck" class="@error('description_jobdesck') is-invalid @enderror form-control"
                        id="description_jobdesck" placeholder="Description Jobdesck" cols="30" rows="5"></textarea>
                    @error('description_jobdesck')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-12">
                        <div class="card mb-3 mx-5" style="">
                            <div class="row g-0">

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $project->title_project }}</h5>
                                        <p class="card-text">
                                            {{ $project->description_jobdesck }}
                                        </p>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $project->photo_project) }}" class="img-fluid"
                                        style="width:100%;height:200px;object-fit:cover;" alt="...">
                                </div>

                            </div>

                        </div>
                        <div class="mt-3 mx-5 mb-5">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalHapusProject{{ $project->id }}">Hapus</button>
                            <div class="modal fade" id="modalHapusProject{{ $project->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal konfirmasi
                                                hapus</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Yakin mau menghapus data ini?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <form action="{{ route('destroy.project', $project->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Ya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="nav-message" role="tabpanel" aria-labelledby="nav-message-tab"
            tabindex="0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Message</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($messages as $num => $message)
                            <tr>
                                <th scope="row">{{ $num += 1 }}</th>
                                <td>{{ $message->full_name }}</td>
                                <td>{{ Str::limit($message->message, 40, '...') }}</td>
                                <td>
                                    <button class="btn btn-info text-white" data-bs-toggle="modal"
                                        data-bs-target="#modalDetail{{ $num }}"
                                        type="button">Detail</button>
                                    <div class="modal fade" id="modalDetail{{ $num }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal detail
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="">
                                                        <div class="mb-3">
                                                            <input value="{{ $message->full_name }}"
                                                                class="form-control" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input value="{{ $message->email }}" class="form-control"
                                                                disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input value="{{ $message->phone }}" class="form-control"
                                                                disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <textarea rows="3" class="form-control" disabled>{{ $message->message }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="button">Balas</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const pathname = new URLSearchParams(window.location.search).get('active');
        if (pathname == 'resume' || pathname == 'education') {
            document.getElementById("nav-profile-tab").click();
        } else if (pathname == 'project') {
            document.getElementById('nav-contact-tab').click();
        } else if (pathname == 'message') {
            document.getElementById("nav-message-tab").click();
        }
    </script>
</body>

</html>
