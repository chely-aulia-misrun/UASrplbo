<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sistem Informasi E-Raport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/logo.png">

    <!-- App css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 p-5">
                        <div class="mx-auto mb-5">
                            <center>
                                <img src="logo.png" alt="" />
                                <h3>MAN 3 Pekanbaru</h3>
                                @error('id_masuk')
                                <div class="alert alert-danger fade show" role="alert">
                                    Identitas masuk salah
                                </div>
                                @enderror
                            </center>
                        </div>

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#home" data-toggle="tab" aria-expanded="false"
                                   class="nav-link active">
                                    <span class="d-block d-sm-none"><i class="uil-home-alt"></i></span>
                                    <span class="d-none d-sm-block">Siswa</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" aria-expanded="true"
                                   class="nav-link">
                                    <span class="d-block d-sm-none"><i class="uil-user"></i></span>
                                    <span class="d-none d-sm-block">Guru</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#messages" data-toggle="tab" aria-expanded="false"
                                   class="nav-link">
                                    <span class="d-block d-sm-none"><i class="uil-envelope"></i></span>
                                    <span class="d-none d-sm-block">Admin</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane show active" id="home">
                                <form method="POST" action="{{ route('login') }}" class="authentication-form">
                                    @csrf
                                    <input hidden name="role" value="Siswa">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="user"></i>
                                                        </span>
                                            </div>
                                            <input type="text" name="id_masuk" class="form-control" id="email" placeholder="nis">
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                            </div>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="password">
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Masuk
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="profile">
                                <form method="POST" action="{{ route('login') }}" class="authentication-form">
                                    @csrf
                                    <input hidden name="role" value="Non-admin">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="user"></i>
                                                        </span>
                                            </div>
                                            <input type="text" name="id_masuk" class="form-control" id="email" placeholder="nip">
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                            </div>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="password">
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Masuk
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="messages">
                                <form method="POST" action="{{ route('login') }}" class="authentication-form">
                                    @csrf
                                    <input hidden name="role" value="Admin">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="user"></i>
                                                        </span>
                                            </div>
                                            <input type="text" name="id_masuk" class="form-control" id="email" placeholder="username">
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                            </div>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="password">
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Masuk
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="/assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="/assets/js/app.min.js"></script>

</body>
</html>
