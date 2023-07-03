CREATE TABLE `peminjaman_master` (
   `id_peminjaman` INT(5) NOT NULL,
   `tanggal_peminjaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
   `nomor_anggota` INT(5) NOT NULL,
   `status_peminjaman` VARCHAR(50) NOT NULL,
   `tanggal_pengembalian` DATE NOT NULL,
   `durasi_keterlambatan` DATE NOT NULL
);

CREATE TABLE `peminjaman_detail` (
   `id` INT(5) NOT NULL,
   `id_peminjaman_master` INT(5) NOT NULL,
   `kode_buku` VARCHAR(12) NOT NULL
);

-- ALter Table
ALTER TABLE `peminjaman_master`
    ADD PRIMARY KEY (`id_peminjaman`);

ALTER TABLE `peminjaman_detail`
    ADD PRIMARY KEY (`id`);

-- Auto Increment
ALTER TABLE `peminjaman_master`
    MODIFY `id_peminjaman` INT(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `peminjaman_detail`
    MODIFY `id` INT(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `peminjaman_master`
    ADD FOREIGN KEY (`nomor_anggota`) REFERENCES `anggota` (`nomor`);

ALTER TABLE `peminjaman_detail`
    ADD FOREIGN KEY (`id_peminjaman_master`) REFERENCES `peminjaman_master` (`id_peminjaman`),
    ADD FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`);
    COMMIT;
