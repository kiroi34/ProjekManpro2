ALTER TABLE inputkegiatan
ADD pendaftaran BIT;
ALTER TABLE inputkegiatan
ADD biayapendaftaran INT;
UPDATE inputkegiatan
SET pendaftaran = 0,
biayapendaftaran = 0
WHERE id < 100;
CREATE TABLE pendaftarankegiatan (
    idpk int(11) NOT NULL PRIMARY KEY,
    idkegiatan int(11) NOT NULL,
    idpeserta int(11) NOT NULL,
    statuspembayaran BIT NOT NULL
);
ALTER TABLE pendaftarankegiatan
  	MODIFY idpk int(11) NOT NULL AUTO_INCREMENT;
CREATE TABLE jemaat (
    iduser INT(11) NOT NULL PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    jeniskelamin VARCHAR (10) NOT NULL, 
    nomortelepon VARCHAR(13) NOT NULL,
    email VARCHAR (50) NOT NULL,
    kota VARCHAR (50) NOT NULL,
    tanggallahir date NOT NULL,
    alamat VARCHAR (100) NOT NULL
);
ALTER TABLE jemaat
  	MODIFY iduser int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE jemaat
ADD waktudaftar TIMESTAMP;
INSERT INTO `jemaat`(`iduser`, `nama`, `jeniskelamin`, `nomortelepon`, `email`, `kota`, `tanggallahir`, `alamat`) VALUES (1,'Jemaat 1','Perempuan','089518068400','blabla@gmail.com','Surabaya','2001-08-08','Jl. Mawar no. 5'),
(2, 'Jemaat 2', 'Laki-laki', '089567890109', 'lalalala@yahoo.co.id', 'Makassar', '1999-07-02', 'Jl. Siwalankerto no. 5'),
(3, 'Jemaat 3', 'Laki-laki', '081657987666', 'tes123@yahoo.com', 'Jakarta', '2000-05-09', 'Jl. Bebek no. 8')

ALTER TABLE inputkegiatan
ADD kuota INT(6) NOT NULL;
ALTER TABLE inputkegiatan
ADD gender BIT(2) NOT NULL;
ALTER TABLE inputkegiatan
ADD usiamin int(3) NOT NULL;
ALTER TABLE inputkegiatan
ADD usiamax INT(3) NOT NULL;
UPDATE inputkegiatan
SET kuota = 0,
gender = 0,
usiamin = 0,
usiamax = 0
WHERE id < 100;

ALTER TABLE pendaftarankegiatan
ADD waktudaftar TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE pendaftarankegiatan
ADD waktukonfirmasi TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE pendaftarankegiatan
ADD buktipembayaran VARCHAR(100);

INSERT INTO `pendaftarankegiatan`(`idkegiatan`, `idpeserta`, `statuspembayaran`, `buktipembayaran`) VALUES (36,1,0,'retreat gereja.png'), (36,2,0,'retreat gereja.png'), (36,3,0,'retreat gereja.png')

CREATE TABLE keuangankegiatan (
    idkk INT(11) NOT NULL PRIMARY KEY,
    idkegiatan INT(11) NOT NULL,
    nama VARCHAR (100) NOT NULL, 
    penanggungjawab VARCHAR(50) NOT NULL,
    tipekeuangan BIT NOT NULL,
    bukti VARCHAR (100) NOT NULL
);
ALTER TABLE keuangankegiatan
  	MODIFY idkk int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE keuangankegiatan ADD tanggal DATE NOT NULL DEFAULT CURRENT_DATE;
ALTER TABLE keuangankegiatan ADD keterangan VARCHAR(1000);
ALTER TABLE keuangankegiatan ADD jumlah INT(11) NOT NULL DEFAULT 0;

CREATE TABLE jadwalpendeta (
    idjadwal INT(11) PRIMARY KEY,
    tema VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL,
    pendeta INT(11) NOT NULL,
    deskripsi VARCHAR(500)
);
ALTER TABLE jadwalpendeta
  	MODIFY idjadwal int(11) NOT NULL AUTO_INCREMENT;