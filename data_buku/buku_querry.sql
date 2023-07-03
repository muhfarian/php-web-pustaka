/*Create Table BUKU dan KATEGORI*/
CREATE TABLE `buku` (
   `id` INT(5) NOT NULL,
   `kode_buku` VARCHAR(12) NOT NULL UNIQUE,
   `judul` VARCHAR(50) NOT NULL,
   `pengarang` VARCHAR(50) NOT NULL,
   `penerbit` VARCHAR(50) NOT NULL,
   `tahun` INT(4) NOT NULL,
   `harga` INT NOT NULL,
   `file_cover` BLOB,
   `kategori_kode` VARCHAR(16) NOT NULL
);


CREATE TABLE `kategori` (
   `id` INT(5) NOT NULL,
   `kode_kategori` VARCHAR(12) NOT NULL UNIQUE,
   `kategori` VARCHAR(50) NOT NULL
);


/*Add Primary Key kode BUKU dan KATEGORI*/
ALTER TABLE `buku` 
   ADD PRIMARY KEY (`id`);
    
ALTER TABLE `kategori` 
   ADD PRIMARY KEY (`id`);

/*Auto Increment id BUKU dan KATEGORI*/
ALTER TABLE `buku`
   MODIFY `id` INT(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `kategori` 
   MODIFY `id` INT(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

/*Add Constraint Foreign Key Buku dan Kategori*/
ALTER TABLE `buku`
   ADD CONSTRAINT `kategori` FOREIGN KEY (`kategori_kode`) REFERENCES `kategori` (`kode_kategori`);
