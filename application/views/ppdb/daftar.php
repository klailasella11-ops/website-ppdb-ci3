<!-- =========================
     HALAMAN PENDAFTARAN PPDB
========================= -->

<style>
:root{
    --primary:#0b3d91;
    --secondary:#1e88e5;
    --gold:#f5b400;
    --light:#f4f7fb;
    --dark:#1b1b1b;
    --white:#ffffff;
    --shadow:0 10px 30px rgba(0,0,0,0.08);
}

body{
    background: #eef3f9;
    font-family: 'Poppins', sans-serif;
}

/* HERO */
.ppdb-hero{
    position: relative;
    background:
        linear-gradient(rgba(11,61,145,.85), rgba(11,61,145,.88)),
        url('<?= base_url("assets/img/sekolah.jpg") ?>');
    background-size: cover;
    background-position: center;
    padding: 90px 20px;
    text-align: center;
    color: white;
    overflow: hidden;
}

.ppdb-hero h1{
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 10px;
}

.ppdb-hero p{
    font-size: 18px;
    opacity: .95;
}

.hero-badge{
    display: inline-block;
    background: rgba(255,255,255,.15);
    padding: 10px 22px;
    border-radius: 50px;
    margin-bottom: 20px;
    backdrop-filter: blur(10px);
    font-weight: 600;
    border: 1px solid rgba(255,255,255,.2);
}

/* CONTAINER */
.ppdb-wrapper{
    max-width: 1200px;
    margin: -60px auto 60px;
    position: relative;
    z-index: 5;
    padding: 0 20px;
}

/* CARD */
.ppdb-card{
    background: white;
    border-radius: 25px;
    box-shadow: var(--shadow);
    overflow: hidden;
}

/* HEADER */
.ppdb-header{
    background: linear-gradient(135deg, #0b3d91, #1565c0);
    padding: 35px;
    color: white;
}

.ppdb-header h2{
    font-size: 30px;
    font-weight: 700;
    margin-bottom: 10px;
}

.ppdb-header p{
    opacity: .9;
    margin: 0;
}

/* FORM */
.ppdb-body{
    padding: 40px;
}

.form-section{
    margin-bottom: 40px;
}

.form-section h3{
    font-size: 22px;
    color: var(--primary);
    margin-bottom: 25px;
    font-weight: 700;
    border-left: 5px solid var(--gold);
    padding-left: 15px;
}

.form-grid{
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(260px,1fr));
    gap: 22px;
}

.form-group{
    display: flex;
    flex-direction: column;
}

.form-group.full{
    grid-column: 1 / -1;
}

.form-group label{
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

.form-control{
    border: 1px solid #dbe3ef;
    border-radius: 14px;
    padding: 14px 16px;
    font-size: 15px;
    transition: .3s;
    background: #f8fbff;
}

.form-control:focus{
    outline: none;
    border-color: #1565c0;
    box-shadow: 0 0 0 4px rgba(21,101,192,.1);
    background: white;
}

textarea.form-control{
    min-height: 120px;
    resize: none;
}

/* FILE */
.file-box{
    border: 2px dashed #c7d7ea;
    border-radius: 18px;
    padding: 18px;
    background: #f8fbff;
}

/* BUTTON */
.btn-daftar{
    background: linear-gradient(135deg,#f5b400,#ff9800);
    color: white;
    border: none;
    padding: 16px 35px;
    border-radius: 15px;
    font-size: 17px;
    font-weight: 700;
    transition: .3s;
    box-shadow: 0 10px 20px rgba(245,180,0,.3);
}

.btn-daftar:hover{
    transform: translateY(-3px);
    box-shadow: 0 14px 30px rgba(245,180,0,.4);
}

/* ALERT */
.alert{
    padding: 15px 20px;
    border-radius: 12px;
    margin-bottom: 25px;
    font-weight: 500;
}

.alert-success{
    background: #d4edda;
    color: #155724;
}

.alert-danger{
    background: #f8d7da;
    color: #721c24;
}

/* RESPONSIVE */
@media(max-width:768px){

    .ppdb-hero h1{
        font-size: 32px;
    }

    .ppdb-body{
        padding: 25px;
    }

    .ppdb-header{
        padding: 25px;
    }

}
</style>

<!-- HERO -->
<section class="ppdb-hero">

    <div class="hero-badge">
        🎓 PENERIMAAN PESERTA DIDIK BARU
    </div>

    <h1>PPDB ONLINE 2026/2027</h1>

    <p>
        SMP Negeri 100 Maluku Tengah
    </p>

</section>

<!-- WRAPPER -->
<div class="ppdb-wrapper">

    <div class="ppdb-card">

        <!-- HEADER -->
        <div class="ppdb-header">
            <h2>Formulir Pendaftaran</h2>
            <p>
                Silakan lengkapi data calon peserta didik dengan benar dan lengkap.
            </p>
        </div>

        <!-- BODY -->
        <div class="ppdb-body">

            <?php if($success): ?>
                <div class="alert alert-success">
                    <?= $success ?>
                </div>
            <?php endif; ?>

            <?php if($error): ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('ppdb/simpan') ?>" method="POST" enctype="multipart/form-data">

                <!-- DATA SISWA -->
                <div class="form-section">

                    <h3>Data Calon Peserta Didik</h3>

                    <div class="form-grid">

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>NISN</label>
                            <input type="number" name="nisn" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="number" name="nik" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Agama</label>
                            <select name="agama" class="form-control">
                                <option>Islam</option>
                                <option>Kristen</option>
                                <option>Katolik</option>
                                <option>Hindu</option>
                                <option>Buddha</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control">
                        </div>

                        <div class="form-group full">
                            <label>Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>

                    </div>

                </div>

                <!-- DATA ORANG TUA -->
                <div class="form-section">

                    <h3>Data Orang Tua</h3>

                    <div class="form-grid">

                        <div class="form-group">
                            <label>Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>No HP</label>
                            <input type="number" name="no_hp" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Penghasilan Orang Tua</label>
                            <select name="penghasilan" class="form-control">
                                <option value="<1jt">< 1 Juta</option>
                                <option value="1-3jt">1 - 3 Juta</option>
                                <option value="3-5jt">3 - 5 Juta</option>
                                <option value=">5jt">> 5 Juta</option>
                            </select>
                        </div>

                    </div>

                </div>

                <!-- BERKAS -->
                <div class="form-section">

                    <h3>Upload Berkas</h3>

                    <div class="form-grid">

                        <div class="form-group">
                            <label>Upload KK</label>
                            <div class="file-box">
                                <input type="file" name="berkas_kk" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Upload Akta</label>
                            <div class="file-box">
                                <input type="file" name="berkas_akta" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Upload Foto</label>
                            <div class="file-box">
                                <input type="file" name="berkas_foto" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Upload Raport</label>
                            <div class="file-box">
                                <input type="file" name="berkas_rapor" class="form-control">
                            </div>
                        </div>

                    </div>

                </div>

                <button type="submit" class="btn-daftar">
                    🚀 Kirim Pendaftaran
                </button>

            </form>

        </div>

    </div>

</div>