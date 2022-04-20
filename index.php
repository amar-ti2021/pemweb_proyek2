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
              <h3 class="card-title">Form BMI</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="#" method="POST">
              <div class="card-body">
                <!-- $id, $kode, $nama, $tmp_lahir, $tgl_lahir, $email, $gender; -->
                <div class="form-group row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tmp_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" placeholder="Tempat Lahir">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="L">
                        <label class="form-check-label">Laki-laki</label>
                      </div>
                      <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="P">
                        <label class="form-check-label">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="berat" class="col-sm-2 col-form-label">Berat (kg)</label>
                  <div class="col-sm-10">
                    <input type="number" name="berat" class="form-control" id="berat" placeholder="Berat">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tinggi" class="col-sm-2 col-form-label">Tinggi (cm)</label>
                  <div class="col-sm-10">
                    <input type="number" name="tinggi" class="form-control" id="tinggi" placeholder="Tinggi">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-info">Submit</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
        </div>
        <?php
        if (isset($_POST['submit'])) {
          $id = end($data)["id"] + 1;
          $kode = "P00" . (end($data)["id"] + 1);
          $tgl_periksa = date("Y-m-d");
          $nama = $_POST["nama"];
          $tmp_lahir = $_POST["tmp_lahir"];
          $tgl_lahir = $_POST["tgl_lahir"];
          $email = $_POST["email"];
          $gender = $_POST["gender"];
          $berat = $_POST["berat"];
          $tinggi = $_POST["tinggi"];
          // $id, $kode, $nama, $tmp_lahir, $tgl_lahir, $email, $gender;
          $pasien = new Pasien($id, $kode, $nama, $tmp_lahir, $tgl_lahir, $email, $gender);
          // $berat, $tinggi
          $bmi = new BMI($berat, $tinggi);
          // $id, BMI $bmi, $tanggal, Pasien $pasien
          $data_bmi[] = new BMIPasien($id, $bmi, $tgl_periksa, $pasien);
          $nilai_bmi = $bmi->nilaiBMI();
          $status_bmi = $bmi->statusBMI();
        }
        ?>
        <div class="col-12 col-md-4 col-lg-4">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">BMI <?= $_POST['nama'] ?></h3>
            </div>
            <div class="card-body">
              <div class="text-center">
                <input type="text" class="knob" data-max="<?= ($nilai_bmi > 50) ? $nilai_bmi : 50; ?>" value="<?= number_format((float)$nilai_bmi, 1, '.', ''); ?>" data-angleArc="250" data-angleOffset="-125" data-width="100%" data-height="120" data-fgColor="#17a2b8" readonly>
                <div class="knob-label"><?= $status_bmi ? $status_bmi : "" ?></div>
              </div>
              <div class="text-left mt-5">
                <div class="row"><?= ($berat) ? "<div class='col-4'>Berat </div> <div class='col-8'> : " . $berat . " kg</div>" : "" ?></div>
                <div class="row"><?= ($tinggi) ? "<div class='col-4'>Tinggi </div> <div class='col-8'> : " . $tinggi . " cm </div>" : "" ?></div>
                <div class="row"><?= ($nilai_bmi) ? "<div class='col-4'>Nilai BMI</div> <div class='col-8'> : " . $nilai_bmi . " </div>" : "" ?></div>
                <div class="row"><?= ($status_bmi) ? "<div class='col-4'>Status BMI</div> <div class='col-8'> : " . $status_bmi . " </div>" : "" ?></div>
              </div>
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