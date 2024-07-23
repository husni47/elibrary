CREATE DATABASE perpustakaan;

USE perpustakaan;

CREATE TABLE Anggota (
    id_anggota INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    alamat TEXT,
    no_telepon VARCHAR(15)
);

CREATE TABLE Petugas (
    id_petugas INT AUTO_INCREMENT PRIMARY KEY,
    nama_petugas VARCHAR(100),
    jenis_kelamin ENUM('Laki-laki', 'Perempuan'),
    shift VARCHAR(50),
    alamat TEXT,
    jabatan VARCHAR(50)
);

CREATE TABLE Buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100),
    penerbit VARCHAR(100),
    tahun_terbit YEAR
);

CREATE TABLE Kategori (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100),
    jenis_kategori VARCHAR(50)
);

CREATE TABLE Penulis (
    id_penulis INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    asal_negara VARCHAR(50),
    jumlah_karya INT
);

CREATE TABLE Peminjaman (
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    id_anggota INT,
    id_petugas INT,
    tanggal_pinjam DATE,
    tanggal_kembali DATE,
    FOREIGN KEY (id_anggota) REFERENCES Anggota(id_anggota),
    FOREIGN KEY (id_petugas) REFERENCES Petugas(id_petugas)
);

CREATE TABLE Detail_Peminjaman (
    id_detail_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    id_peminjaman INT,
    id_buku INT,
    nama_buku VARCHAR(100),
    denda DECIMAL(10, 2),
    FOREIGN KEY (id_peminjaman) REFERENCES Peminjaman(id_peminjaman),
    FOREIGN KEY (id_buku) REFERENCES Buku(id_buku)
);

CREATE TABLE Relasi_Buku_Kategori (
    id_buku INT,
    id_kategori INT,
    PRIMARY KEY (id_buku, id_kategori),
    FOREIGN KEY (id_buku) REFERENCES Buku(id_buku),
    FOREIGN KEY (id_kategori) REFERENCES Kategori(id_kategori)
);

CREATE TABLE Relasi_Buku_Penulis (
    id_buku INT,
    id_penulis INT,
    PRIMARY KEY (id_buku, id_penulis),
    FOREIGN KEY (id_buku) REFERENCES Buku(id_buku),
    FOREIGN KEY (id_penulis) REFERENCES Penulis(id_penulis)
);
