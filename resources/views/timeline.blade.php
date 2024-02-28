<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Galery Foto</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- AdminLTE css -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class=" navbar navbar-expand navbar-black navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" data-toggle="modal" data-target="#modalUpload" class="nav-link btn btn-primary">Upload Foto <i class="fa fa-upload"></i></a>
      </li>
    </ul>

    <div class="modal fade" id="modalUpload" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title">Upload Foto</h2>
          </div>
          <form action="galery" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control">
              </div>
              <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control">
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
           
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            
            <!-- Message End -->
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout">LogOut <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Galery Foto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Timeline</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          @foreach ($galerys as $galery )            
         
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red" name="tanggal">{{ $galery->tanggal }}</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-camera bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i></span>
                  <h3 class="timeline-header"><a href="#">{{ $galery->judul }}</a> Upload New Foto</h3>

                  <div class="timeline-body">
                    <p>{{ $galery->deskripsi }}</p>
                    <img width="300" height="300" class="img-fluid" src="{{ 'images/'.$galery->foto }}" alt="photo">
                  </div>
                  <div class="timeline-footer ">
                    <a href="#" data-toggle="modal" data-target="#modalEdit{{ $galery->id }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="" data-toggle="modal" data-target="#hapusfoto{{ $galery->id }}" class="btn btn-danger btn-sm">Delete</a>
                  </div>
                </div>

                <div class="modal fade" id="modalEdit{{ $galery->id }}" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title">Edit Galery</h2>
                      </div>
                        <form action="{{ route('galery.update',$galery->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf 
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="judul">Judul</label>
                              <input type="text" name="judul" value="{{ $galery->judul }}" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="deskripsi">Deskripsi</label>
                              <input type="text" name="deskripsi" value="{{ $galery->deskripsi }}" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="foto">Foto</label>
                              <input type="file" name="foto" class="form-control">
                              <img height="150" width="200" src="{{ 'images/'.$galery->foto }}" alt="">
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="submit">Simpan</button>
                              <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
                

                <div class="modal fade" id="hapusfoto{{ $galery->id }}" method="post">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title">Hapus Foto</h2>
                      </div>
                      <div class="modal-body">
                        <p>Yakin Ingin Menghapus?</p>
                        <div class="modal-footer">
                          <a href="{{ url('galery/'.$galery->id) }}" class="btn btn-primary" type="submit">Hapus</a>
                          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              
              <!-- END timeline item -->
              <!-- timeline item -->
              
              <!-- END timeline item -->
              <!-- timeline time label -->
             
              <!-- /.timeline-label -->
              <!-- timeline item -->
              
              <!-- END timeline item -->
              <!-- timeline item -->
              
              <!-- END timeline item -->
             
            </div>
          </div>
          <!-- /.col -->
          @endforeach
        </div>
      </div>
      <!-- /.timeline -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>
</html>
