<?php 
  include "php/koneksi.php";
  $query = $koneksi->query("SELECT NIM, pendaftar.nama, nilai_ujian, penilaian_seleksi.jurusan, status, tgl_lulus FROM penilaian_seleksi, pendaftar WHERE penilaian_seleksi.id_pendaftar = pendaftar.id_pendaftar");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSS Plugin -->
  <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/css/font-awesome.css">
  <link rel="stylesheet" href="vendor/css/animate.css">
  <link rel="stylesheet" href="vendor/css/toastr.min.css">
  <link rel="stylesheet" href="vendor/css/jquery.gritter.css">
  <link rel="stylesheet" href="vendor/css/theme.css">

  <!-- Data Table -->
  <link rel="stylesheet" href="vendor/css/datatables.min.css">

  <title>Kelulusan Otomatis</title>

</head>

<body class="pace-done boxed-layout">
  <div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar-default navbar-static-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
          <li class="nav-header">
            <div class="dropdown profile-element">
              <img alt="image" class="rounded-circle" width="50px" src="img/uin.png" />
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="block m-t-xs font-bold">Kukuh Rahmadani</span>
                <span class="text-muted text-xs block">Web Developer <b class="caret"></b></span>
              </a>
              <ul class="dropdown-menu animated fadeInRight m-t-xs">
                <li><a class="dropdown-item" href="https://www.instagram.com/kukuhkkh/?hl=id">Profile</a></li>
                <li><a class="dropdown-item" href="https://api.whatsapp.com/send?phone=6283845257534&text=Halo%20Admin%20Saya%20tanya">Contacts</a></li>
                <li><a class="dropdown-item" href="">Mailbox</a></li>
                <li class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="">Logout</a></li>
              </ul>
            </div>
            <div class="logo-element">
              KKH
            </div>
          </li>
          <li>
            <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span
                class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li><a href="index.php">Halaman Utama</a></li>
            </ul>
          </li>
          <li class="active">
            <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Manajemen Data</span><span
                class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
              <li><a href="data-mahasiswa.php">Data Mahasiswa</a></li>
              <li class="active"><a href="kelulusan.php">Tabel Kelulusan</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </nav>
    <!-- Akhir Sidebar -->

    <!-- Kontent -->
    <div id="page-wrapper" class="gray-bg dashbard-1">
      <div class="row border-bottom">
        <!-- Navbar -->
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
              <div class="form-group">
                <input type="text" placeholder="Search for something..." class="form-control" name="top-search"
                  id="top-search">
              </div>
            </form>
          </div>
          <ul class="nav navbar-top-links navbar-right">
            <li>
              <a href="login.html">
                <i class="fa fa-sign-out"></i> Log out
              </a>
            </li>
          </ul>
        </nav>
        <!-- Akhir Navbar -->
      </div>
      <!-- Row Pertama -->
      <div class="row  border-bottom white-bg dashboard-header">
        <h3>Daftar Kelulusan Mahasiswa</h3>
      </div>
      <!-- Akhir Row Pertama -->
      <div class="wrapper wrapper-content">
        <!-- Row Kedua -->
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox ">
              <div class="ibox-title">
                <h5>Daftar Mahasiswa Lulus</h5>
                <div class="ibox-tools">
                  <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                  </a>
                  <a class="close-link">
                    <i class="fa fa-times"></i>
                  </a>
                </div>
              </div>
              <div class="ibox-content">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="table-daftar-mhs">
                    <thead>
                      <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Nilai</th>
                        <th>Jurusan</th>
                        <th>Tanggal Lulus</th>
                        <th>Status</th>
                        <th width="20%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($result = $query->fetch_assoc()) { ?>
                        <tr>
                          <td><?= $result['NIM'] ?></td>
                          <td><?= $result['nama'] ?></td>
                          <td><?= $result['nilai_ujian'] ?></td>
                          <td><?= $result['jurusan'] ?></td>
                          <td><?= $result['tgl_lulus'] ?></td>
                          <td><?= $result['status'] ?></td>
                          <td>
                            <a href="" data-toggle="modal" data-target="#ModalUpdateNilai" onclick="getUpdate(<?= $result['NIM'] ?>)" class="btn btn-success">Edit</a>
                             <a href="php/HapusDaftarMhsLulus.php?nim=<?= $result['NIM'] ?>" onclick="return confirm('Apakah anda yakin ?');" class="btn btn-danger">Hapus</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Akhir Row Kedua -->
      </div>

      <div class="footer">
        <div>
          <strong>Copyright</strong> UIN Maulana Malik Ibrahim Malang 2019 - 2020
        </div>
      </div>
    </div>
    <!-- Akhir Kontent -->
  </div>

  <!-- Modal -->

  <div class="modal inmodal" id="ModalUpdateNilai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content animated flipInY">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
              class="sr-only">Close</span></button>
          <h4 class="modal-title">Update Nilai Mahasiswa</h4>
          <small class="font-bold">Update nilai mahasiswa yang telah Lulus.</small>
        </div>
        <div class="modal-body">
          <form action="php/update.php" method="post">
            <div class="form-group  row">
              <div class="col-sm-10"><input id="idmhs12" type="hidden" name="id12" class="form-control"></div>
            </div>
            <div class="form-group  row">
              <label class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10"><input type="text" name="nama" disabled class="form-control"></div>
            </div>
            <div class="form-group  row">
              <label class="col-sm-2 col-form-label">Nilai</label>
              <div class="col-sm-10"><input type="number" name="nilai" min="1" max="100" autofocus class="form-control"></div>
            </div>
          <!-- </form> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Akhir Modal -->


  <!-- JS Plugin -->
  <script src="vendor/js/jquery-3.1.1.min.js"></script>
  <script src="vendor/js/popper.min.js"></script>
  <script src="vendor/js/bootstrap.min.js"></script>
  <script src="vendor/js/jquery.metisMenu.js"></script>
  <script src="vendor/js/jquery.slimscroll.min.js"></script>

  <!-- Data Table -->
  <script src="vendor/js/datatables/datatables.min.js"></script>
  <script src="vendor/js/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- JS Flot -->
  <script src="vendor/js/flot/jquery.flot.js"></script>
  <script src="vendor/js/flot/jquery.flot.tooltip.min.js"></script>
  <script src="vendor/js/flot/jquery.flot.spline.js"></script>
  <script src="vendor/js/flot/jquery.flot.resize.js"></script>
  <script src="vendor/js/flot/jquery.flot.pie.js"></script>

  <!-- Peiti -->
  <script src="vendor/js/peity/jquery.peity.min.js"></script>
  <script src="vendor/js/peity/peity-demo.js"></script>

  <!-- Custom and plugin javascript -->
  <script src="vendor/js/custom/inspinia.js"></script>
  <script src="vendor/js/custom/pace.min.js"></script>

  <script src="vendor/js/jquery-ui/jquery-ui.min.js"></script>

  <!-- Gritter -->
  <script src="vendor/js/gritter/jquery.gritter.min.js"></script>

  <!-- Sparkline -->
  <script src="vendor/js/jquery.sparkline.min.js"></script>

  <!-- Sparkline demo data  -->
  <script src="vendor/js/sparkline-demo.js"></script>

  <!-- ChartJS-->
  <script src="vendor/js/Chart.min.js"></script>

  <!-- Toastr -->
  <script src="vendor/js/toastr.min.js"></script>


  <script>
    $(document).ready(function () {
      $('#table-daftar-mhs').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [{
            extend: 'copy'
          },
          {
            extend: 'csv'
          },
          {
            extend: 'excel',
            title: 'ExampleFile'
          },
          {
            extend: 'pdf',
            title: 'ExampleFile'
          },

          {
            extend: 'print',
            customize: function (win) {
              $(win.document.body).addClass('white-bg');
              $(win.document.body).css('font-size', '10px');
              $(win.document.body).find('table')
                .addClass('compact')
                .css('font-size', 'inherit');
            }
          }
        ]

      });

    });
  </script>

  <script>
    function getUpdate(nim_mhs) {
      var nim = nim_mhs;
      $.ajax({
        type: "POST",
        data: {
          nim: nim
        },
        url: "php/getmhs.php",
        success: function (result) {
          var hasil = JSON.parse(result);
          $.each(hasil, function (key, val) {
            $("[name='id12']").val(nim);
            $("[name='nama']").val(val.nama);
            $("[name='nilai']").val(val.nilai_ujian);
          });
        }
      });
    }
  </script>

</body>

</html>