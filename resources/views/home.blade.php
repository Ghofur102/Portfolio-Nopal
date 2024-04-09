<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MyPortfolio</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style>
        .nav-link {
            font-size: 17px;
            font-weight: bold;
            color: black;
        }

        .nav-link:hover {
            color: #3F51B5 !important;
        }
    </style>
</head>

<body class="d-flex flex-column h-100 w-100" style="position:static">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light my-3 py-3 shadow"
            style="background-color: #DEDEFF;position:fixed;width:100%;z-index:999;">
            <div class="container px-5">
                <a class="navbar-brand" href="/login"><span class="fw-bolder"
                        style="font-size: 28px; color:#3F51B5;">MyPortfolio</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#resume">Resume</a></li>
                        <li class="nav-item"><a class="nav-link" href="#project">Project</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="py-5 mt-5" id="home">
            <div class="container mt-5 px-5 pb-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-xxl-5">
                        <!-- Header text content-->
                        <div class="text-center text-xxl-start">
                            <div class="badge text-white mb-4 p-2" style="background-color:#3F51B5;border-radius:25px;">
                                <div class="text-uppercase">Fresh Graduate SMA</div>
                            </div>
                            <div class="fs-3 fw-light" style="color: #757DE8;font-size:24px;"> <b>I can help you</b>
                            </div>
                            <h1 class="display-3 fw-bolder mb-5"><span class="text-black d-inline">Get online and
                                    grow fast</span></h1>
                            <div
                                class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                <a class="btn btn-primary btn-lg px-4 py-3 fs-6 fw-bolder"
                                    style="background-color: #3F51B5" href="#resume">Resume</a>
                                <a class="btn btn-outline-dark btn-lg px-4 py-3 fs-6 text-white fw-bolder"
                                    style="background-color: #757DE8" href="#project">Projects</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7">
                        <!-- Header profile picture-->
                        <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                            <div class="profile" style="background-color:#757DE8">
                                <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                                <!-- Watch a tutorial on how to do this on YouTube (link)-->
                                <img class="profile-img" src="assets/profile.png" alt="..." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- About Section-->
        <section class=" py-5" style="background-color: #DEDEFF" id="about">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xxl-8">
                        <div class="text-center my-5">
                            <h2 class="display-5 fw-bolder"><span class="d-inline" style="color: #3F51B5;">About
                                    Me</span></h2>
                            <p class=" mb-4" style="color: #757DE8;font-weight:400;font-size:20px;">My name
                                {{ $about->full_name }}.</p>
                            <p class="text-black">{{ $about->about }}</p>
                            <div class="d-flex justify-content-center fs-2 gap-4">
                                <a class="text-black" href="{{ $about->link_linkedin }}"><i
                                        class="bi bi-linkedin"></i></a>
                                <a class="text-black" href="{{ $about->link_github }}"><i
                                        class="bi bi-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Content-->
        <div class="my-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-0" id="resume"><span class="text-black d-inline">Resume</span>
                </h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-11 col-xxl-11 col-sm-11 col-md-11">
                    <!-- Experience Section-->
                    <section>
                        <div class="d-flex align-items-center justify-content-start mb-4">
                            <h3 class="text-black fw-bolder mb-0">Experience</h3>
                        </div>
                        <!-- Experience Card 1-->
                        @foreach ($experiences as $experience)
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div
                                            class="col-lg-3 col-md-4 col-sm-12 text-center text-lg-start mb-4 mb-lg-0">
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
                                </div>
                            </div>
                        @endforeach
                        @if ($experiences->count() == 0)
                        <div class="mb-4">
                            <p>Tidak ada pengalaman kerja</p>
                        </div>
                        @endif
                    </section>
                    <!-- Education Section-->
                    <section>
                        <h3 class="text-black fw-bolder mb-4">Education</h3>
                        <!-- Education Card 1-->
                        @foreach ($educations as $edu)
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div
                                            class="col-lg-3 col-md-4 col-sm-12 text-center text-lg-start mb-4 mb-lg-0">
                                            <div class=" py-4 px-2 text-center text-white rounded-4"
                                                style="background-color:#757DE8;">
                                                <div class="fw-bolder mb-2">{{ $edu->tahun_awal }} -
                                                    {{ $edu->tahun_akhir }}
                                                </div>
                                                <div class="small">{{ $edu->jurusan }}</div>
                                                <div class="mt-1">{{ $edu->nama_sekolah }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-12">
                                            <div>{{ $edu->detail_yang_dipelajari }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($educations->count() == 0)
                        <div class="">
                            <p>Tidak ada riwayat pendidikan</p>
                        </div>
                        @endif
                    </section>

                </div>
            </div>
        </div>
        <!-- Projects Section-->
        <section class="py-5">
            <div class="container px-1 mb-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0" id="project"><span
                            class="text-black d-inline">Project</span></h1>
                </div>
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
                                        <img src="{{ asset('storage/' . $project->photo_project) }}"
                                            class="img-fluid" style="width:100%;height:200px;object-fit:cover;"
                                            alt="...">
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if ($projects->count() == 0)
                    <div class="text-center">
                        <p>Tidak ada project</p>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- Page content-->
        <section class="py-5" id="contact">
            <div class="container px-1">
                <!-- Contact form-->
                <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                    <div class="text-center mb-5">
                        <div class="feature  rounded-3 mb-3" style="background-color:#DEDEFF;"><i
                                class="bi bi-envelope" style="color:#3F51B5;font-weight:600;"></i></div>
                        <h1 class="fw-bolder">Get in touch</h1>
                        <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
                        @if (session('success'))
                        <div class="alert alert-success mt-2 alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6 col-sm-12 col-md-12">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <form id="contactForm" action="{{ route('send.message') }}" method="POST"
                                data-sb-form-api-token="API_TOKEN">
                                <!-- Name input-->
                                @csrf
                                <div class="form-floating mb-3">
                                    <input
                                        class="form-control @error('full_name')
                                    is-invalid
                                    @enderror"
                                        id="name" type="text" name="full_name"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Full name</label>
                                    @error('full_name')
                                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                            {{ $message }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                                <!-- Email address input-->
                                <div class="form-floating mb-3">
                                    <input
                                        class="form-control @error('email')
                                    is-invalid
                                    @enderror"
                                        id="email" type="email" name="email" placeholder="name@example.com"
                                        data-sb-validations="required,email" />
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                                            {{ $message }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @enderror
                                </div>
                                <!-- Phone number input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control @error('phone')
                                        is-invalid
                                    @enderror" id="phone" type="tel" name="phone"
                                        placeholder="(123) 456-7890" data-sb-validations="required" />
                                    <label for="phone">Phone number</label>
                                    @error('phone')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @enderror
                                </div>
                                <!-- Message input-->
                                <div class="form-floating mb-3">
                                    <textarea class="form-control @error('message')
                                    is-invalid
                                    @enderror" id="message" type="text" name="message"
                                        placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                    <label for="message">Message</label>
                                    @error('message')
                        <div class="alert alert-danger mt-2 alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @enderror
                                </div>
                                <!-- Submit success message-->
                                <!---->
                                <!-- This is what your users will see when the form-->
                                <!-- has successfully submitted-->
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Form submission successful!</div>
                                        To activate this form, sign up at
                                        <br />
                                        <a
                                            href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                    </div>
                                </div>
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is-->
                                <!-- an error submitting the form-->
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3">Error sending message!</div>
                                </div>
                                <!-- Submit Button-->
                                <div class="d-grid"><button class="btn btn-primary border-white btn-lg"
                                        style="background-color:#757DE8;" id="submitButton"
                                        type="submit">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class=" py-4 text-white mt-auto" style="background-color: #757DE8;">
        <div class="container px-2">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0" style="font-size:18px;">Copyright &copy; Your Website 2024</div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
