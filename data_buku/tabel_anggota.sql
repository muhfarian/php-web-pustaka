/*Create Table Anggota*/
CREATE TABLE `anggota` (
   `id` INT(5) NOT NULL,
   `nomor` INT(5) NOT NULL UNIQUE,
   `nama` VARCHAR(50) NOT NULL,
   `jenis_kelamin` CHAR NOT NULL,
   `alamat` TEXT NOT NULL,
   `no_hp` BIGINT(13) NOT NULL,
   `tanggal_terdaftar` TIMESTAMP NOT NULL
);

/*Add Primary Key id Anggota*/
ALTER TABLE `anggota` 
   ADD PRIMARY KEY (`id`);

/*Auto Increment id Anggota*/
ALTER TABLE `anggota`
   MODIFY `id` INT(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
