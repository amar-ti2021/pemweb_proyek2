<?php
require_once "components/header.php";
require_once "components/navbar.php";
require_once "components/main_sidebar.php";
require_once "classes/BMI.php";
require_once "classes/BMIPasien.php";
require_once "classes/Pasien.php";

$data = [
  [
    "id" => 1,
    "kode" => "P001",
    "tgl_periksa" => "2022-01-10",
    "nama" => "Ahmad",
    "tmp_lahir" => "Jakarta",
    "tgl_lahir" => "2000-01-01",
    "email" => "ahmad@mail.com",
    "gender" => "L",
    "berat" => 69.8,
    "tinggi" => 169,
  ],
  [
    "id" => 2,
    "kode" => "P002",
    "tgl_periksa" => "2022-01-10",
    "nama" => "Rina",
    "tmp_lahir" => "Jakarta",
    "tgl_lahir" => "2000-01-01",
    "email" => "rina@mail.com",
    "gender" => "P",
    "berat" => 55.3,
    "tinggi" => 165,
  ],
  [
    "id" => 3,
    "kode" => "P003",
    "tgl_periksa" => "2022-01-11",
    "nama" => "Lutfi",
    "tmp_lahir" => "Jakarta",
    "tgl_lahir" => "2000-01-01",
    "email" => "lutfi@mail.com",
    "gender" => "L",
    "berat" => 45.2,
    "tinggi" => 171,
  ]
];

$data_bmi = [];
foreach ($data as $d) {
  // $id, $kode, $nama, $tmp_lahir, $tgl_lahir, $email, $gender;
  $pasien = new Pasien($d["id"], $d["kode"], $d["nama"], $d["tmp_lahir"], $d["tgl_lahir"], $d["email"], $d["gender"],);
  // $berat, $tinggi
  $bmi = new BMI($d["berat"], $d["tinggi"]);
  //$id, BMI $bmi, $tanggal, Pasien $pasien
  $data_bmi[] = new BMIPasien($d["id"], $bmi, $d["tgl_periksa"], $pasien);
}
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Proyek 2 (BMI)</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Proyek 2 (BMI)</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-8 col-lg-8">

          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Horizontal Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck2">
                      <label class="form-check-label" for="exampleCheck2">Remember me</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Sign in</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>

        </div>
        <div class="col-12 col-md-4 col-lg-4">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Horizontal Form</h3>
            </div>
            <div class="card-body">
              <div class="text-center">
                <input type="text" class="knob" value="0" data-angleArc="250" data-angleOffset="-125" data-width="120" data-height="120" data-fgColor="green" readonly>

                <div class="knob-label">text</div>
                <div class="knob-label">text</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Riwayat Pasien</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Tanggal Periksa</th>
                    <th>Kode Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Gender</th>
                    <th>Berat(kg)</th>
                    <th>Tinggi(cm)</th>
                    <th>Nilai BMI</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($data_bmi as $d) {
                    echo
                    "<tr>
                      <td>
                        {$d->id}
                      </td>
                      <td>
                        {$d->tanggal}
                      </td>
                      <td>
                        {$d->pasien->kode}
                      </td>
                      <td>
                        {$d->pasien->nama}
                      </td>
                      <td>
                        {$d->pasien->gender}
                      </td>
                      <td>
                        {$d->bmi->berat}
                      </td>
                      <td>
                        {$d->bmi->tinggi}
                      </td>
                      <td>
                        {$d->bmi->nilaiBMI()}
                      </td>
                      <td>
                        {$d->bmi->statusBMI()}
                      </td>
                    </tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php
require_once "components/footer.php";
require_once "components/control_sidebar.php";
require_once "components/main_footer.php";
?>