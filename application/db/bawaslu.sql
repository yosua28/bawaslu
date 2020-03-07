/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.38-MariaDB : Database - bawaslu
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bawaslu` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bawaslu`;

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` text,
  `tempat` text,
  `penjelasan_kegiatan` text,
  `file_pendukung` text,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `dibaca` int(11) DEFAULT NULL,
  `link` text,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `agenda` */

/*Table structure for table `galeri` */

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text,
  `link` text,
  `foto` text COMMENT 'path foto',
  `keterangan_foto` text,
  `dibaca` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `galeri` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `is_upload` int(11) DEFAULT '0',
  `urutan` int(11) DEFAULT NULL COMMENT 'rencana untuk mengurutkan di list',
  `is_active` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`kategori`,`nama`,`is_upload`,`urutan`,`is_active`,`created_date`,`created_by`,`updated_date`,`updated_by`,`is_delete`) values (1,'ppid','PPID',1,1,1,'2019-12-07 04:32:22',1,NULL,NULL,0),(2,'publikasi','Publikasi',1,2,1,NULL,NULL,NULL,NULL,0),(3,'pengawasan','Pengawasan',1,3,1,NULL,NULL,NULL,NULL,0),(4,'putusan','Putusan',1,4,1,NULL,NULL,NULL,NULL,0),(5,'pengumuman','Pengumuman',1,5,1,NULL,NULL,NULL,NULL,0),(6,'seleksi-jpt-pratama','Seleksi JPT Pratama',1,6,1,NULL,NULL,NULL,NULL,0),(8,'berita-utama','Berita Utama',1,7,1,NULL,NULL,NULL,NULL,0);

/*Table structure for table `konten` */

DROP TABLE IF EXISTS `konten`;

CREATE TABLE `konten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL COMMENT 'id kategori',
  `judul` text,
  `link` text,
  `isi_konten` longtext,
  `foto_thumbnail` text COMMENT 'path foto untuk thumbnail',
  `file_pendukung` text COMMENT 'file pendukung',
  `is_active` int(11) DEFAULT '0' COMMENT '1 muncul didepan, 0 tidak muncul didepan',
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL COMMENT 'id user',
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL COMMENT 'id user',
  `is_delete` int(11) DEFAULT '0' COMMENT 'soft delete',
  `dibaca` int(11) DEFAULT '0',
  `is_timeline` int(11) DEFAULT NULL COMMENT 'muncul di slideshow baranda',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `konten` */

/*Table structure for table `profil` */

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `isi` mediumtext,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `profil` */

insert  into `profil`(`id`,`kategori`,`nama`,`isi`,`created_date`,`created_by`,`updated_date`,`updated_by`) values (1,'wewenang-kewajiban','Tugas, Wewenang, dan Kewajiban',NULL,'2019-12-16 06:40:44',1,NULL,NULL),(2,'visi-misi','Visi dan Misi','<div class=\"views-row views-row-2 views-row-even\">\r\n                                    <div class=\"views-field views-field-body\">\r\n                                        <div class=\"field-content\">\r\n                                            <p><strong>Visi</strong></p>\r\n                                            <p>Terwujudnya Bawaslu sebagai Lembaga Pengawal Terpercaya dalam Penyelenggaraan Pemilu Demokratis, Bermartabat, dan Berkualitas.</p>\r\n                                            <p>&nbsp;</p>\r\n                                            <p><strong>Misi</strong></p>\r\n                                            <ol style=\"margin-left: 11px;\">\r\n                                                <li>Membangun aparatur dan kelembagaan pengawas pemilu yang kuat, mandiri dan solid;</li>\r\n                                                <li>Mengembangkan pola dan metode pengawasan yang efektif dan efisien;</li>\r\n                                                <li>Memperkuat sistem kontrol pengawasan yang terstruktur, sistematis, dan integratif berbasis teknologi;</li>\r\n                                                <li>Meningkatkan keterlibatan masyarakat dan peserta pemilu, serta meningkatkan sinergi kelembagaan dalam pengawasan pemilu partisipatif;</li>\r\n                                                <li>Meningkatkan kepercayaan publik atas kualitas kinerja pengawasan berupa pencegahan dan penindakan, serta penyelesaian sengketa secara cepat, akurat dan transparan;</li>\r\n                                                <li>Membangun Bawaslu sebagai pusat pembelajaran pengawasan pemilu.</li>\r\n                                            </ol>\r\n                                        </div>\r\n                                    </div>\r\n                                </div>','2019-12-16 06:40:44',1,NULL,NULL),(3,'lokasi','Alamat Kantor',NULL,NULL,NULL,NULL,NULL),(4,'struktur-organisasi','Struktur Organisasi',NULL,NULL,NULL,NULL,NULL),(5,'ketua-divisi-hukum-penanganan-pelanggaran-dan-sengketa','Ketua (Divisi Hukum, Penanganan Pelanggaran dan Sengketa)','<div class=\"views-row views-row-3 views-row-odd\">\r\n                                    <div class=\"views-field views-field-field-image-profil\">\r\n                                        <div class=\"field-content\"><img src=\"#BASE_URL#/assets/uploads/profile/ketua-divisi-hukum-penanganan-pelanggaran-dan-sengketa.jpg\" alt=\"\"></div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Profil</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <table border=\"0\">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td rowspan=\"9\">&nbsp;</td>\r\n                                                            <td>Nama Lengkap</td>\r\n                                                            <td style=\"padding-left: 10px; padding-right: 10px;\">:</td>\r\n                                                            <td><strong>MARTINUS KOLO, SE</strong></td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td>Tempat / Tanggal Lahir</td>\r\n                                                            <td style=\"padding-left: 10px; padding-right: 10px;\">:</td>\r\n                                                            <td>Timor Tengah Utara, 30 Juli 1981</td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td>Jabatan</td>\r\n                                                            <td style=\"padding-left: 10px; padding-right: 10px;\">:</td>\r\n                                                            <td>Ketua (Divisi Hukum, Penanganan Pelanggaran dan Sengketa)</td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Riwayat Pendidikan</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <li>SD Negeri Teflasi Banain</li>\r\n                                                <li>SMP Negeri 4 Dili</li>\r\n                                                <li>SMK Negeri 1 Atambua</li>\r\n                                                <li>S1 Universitas Timor-Kefamenanu</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Pengalaman Pekerjaan</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <li>Yayasan Amnaut Bife \"Kuan\" (YABIKU)</li>\r\n                                                <li>LSM PATTIRO</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Pengalaman Organisasi</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <li>Ketua HMJ Studi Manajemen FE Unimor</li>\r\n                                                <li>GMNI Cabang Kefamenanu</li>\r\n                                                <li>Fasilitator Pendidikan Pemilih</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Penghargaan</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                    <li><strong>Pencegahan Pelanggaran dan Pengawasan Partisipatif Terbaik</strong> Dalam Pengawasan Tahapan Pemilu Anggota DPR, DPD, DPRD Provinsi, DPRD Kabupaten/Kota serta Presiden & Wakil Presiden Tahun 2019 oleh Bawaslu Provinsi Nusa Tenggara Timur</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                </div>',NULL,NULL,NULL,NULL),(6,'anggota-divisi-sdm-organisasi-dan-data-informasi','Anggota (Divisi SDM, Organisasi dan Data Informasi)','<div class=\"views-row views-row-3 views-row-odd\">\r\n                                    <div class=\"views-field views-field-field-image-profil\">\r\n                                        <div class=\"field-content\"><img src=\"#BASE_URL#/assets/uploads/profile/anggota-divisi-sdm-organisasi-dan-data-informasi.jpg\" alt=\"\"></div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Profil</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <table border=\"0\">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td rowspan=\"9\">&nbsp;</td>\r\n                                                            <td>Nama Lengkap</td>\r\n                                                            <td style=\"padding-left: 10px; padding-right: 10px;\">:</td>\r\n                                                            <td><strong>ROSWITA HELEN PARKHURST TAUS, SE</strong></td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td>Tempat / Tanggal Lahir</td>\r\n                                                            <td style=\"padding-left: 10px; padding-right: 10px;\">:</td>\r\n                                                            <td>Kefamenanu, 26 Juni 1978</td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td>Jabatan</td>\r\n                                                            <td style=\"padding-left: 10px; padding-right: 10px;\">:</td>\r\n                                                            <td>Anggota (Divisi SDM, Organisasi dan Data Informasi)</td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Riwayat Pendidikan</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <li>SD Katholik Kefamenanu 3</li>\r\n                                                <li>SMPK St. Xaverius Putri Kefamenanu</li>\r\n                                                <li>SMAK Syuradikara Ende </li>\r\n                                                <li>S1 STIE Malangkucecwara Malang</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Pengalaman Pekerjaan</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <li>Staf marketing BRI Cabang Kupang</li>\r\n                                                <li>Dosen Universitas Widya Mandira</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Penghargaan</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                    <li><strong>Pencegahan Pelanggaran dan Pengawasan Partisipatif Terbaik<strong> Dalam Pengawasan Tahapan Pemilu Anggota DPR, DPD, DPRD Provinsi, DPRD Kabupaten/Kota serta Presiden & Wakil Presiden Tahun 2019 oleh Bawaslu Provinsi Nusa Tenggara Timur</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                </div>',NULL,NULL,NULL,NULL),(7,'anggota-divisi-pengawasan-humas-dan-hubungan-antar-lembaga','Anggota (Divisi Pengawasan, Humas dan Hubungan Antar Lembaga)','<div class=\"views-row views-row-3 views-row-odd\">\r\n                                    <div class=\"views-field views-field-field-image-profil\">\r\n                                        <div class=\"field-content\"></div>\r\n                                        <div style=\"text-align: justify;\">\r\n<p style=\"margin-top: 20px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;; font-size: 14px; text-align: center;\"><img alt=\"\" src=\"#BASE_URL#/assets/uploads/profile/anggota-divisi-pengawasan-humas-dan-hubungan-antar-lembaga.jpg\" style=\"height: 333px; width: 500px;\"></p></div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Profil</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <table border=\"0\">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td rowspan=\"9\">&nbsp;</td>\r\n                                                            <td>Nama Lengkap</td>\r\n                                                            <td style=\"padding-left: 10px; padding-right: 10px;\">:</td>\r\n                                                            <td><strong>NONATO DA P. SARMENTO, S.Si</strong></td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td>Jabatan</td>\r\n                                                            <td style=\"padding-left: 10px; padding-right: 10px;\">:</td>\r\n                                                            <td>Anggota (Divisi Pengawasan, Humas dan Hubungan Antar Lembaga)</td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Riwayat Pendidikan</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <li>SD Negeri 7 Dili Barat</li>\r\n                                                <li>SMP Negeri 1 Dili</li>\r\n                                                <li>SMA Negeri 1 Kupang</li>\r\n                                                <li>S1 Universitas Nusa Cendana Kupang</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Pengalaman Pekerjaan</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <li>Konselor pada Yayasan Selaras Warga (SANRAGA)</li>\r\n                                                <li>Fasilitator Kecamatan PNPM Mandiri Pedesaan</li>\r\n                                                <li>Pendamping Desa P3MD Kementerian Desa</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Pengalaman Organisasi</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <li>BEM Universitas Nusa Cendana</li>\r\n                                                <li>GMNI Cabang Kupang</li>\r\n                                                <li>Direktur Eksekutif KADIN Kabupaten TTU</li>\r\n                                                <li>Anggota Dekranasda Kabupaten TTU</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Penghargaan</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                    <li><strong>Pencegahan Pelanggaran dan Pengawasan Partisipatif Terbaik</strong> Dalam Pengawasan Tahapan Pemilu Anggota DPR, DPD, DPRD Provinsi, DPRD Kabupaten/Kota serta Presiden & Wakil Presiden Tahun 2019 oleh Bawaslu Provinsi Nusa Tenggara Timur</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                </div>',NULL,NULL,NULL,NULL),(8,'koordinator-sekretariat','KOORDINATOR SEKRETARIAT','<div class=\"views-row views-row-3 views-row-odd\">\r\n                                    <div class=\"views-field views-field-field-image-profil\">\r\n                                        <div class=\"field-content\"><img src=\"#BASE_URL#/assets/uploads/profile/koordinator-sekretariat.jpg\" alt=\"\"></div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Profil</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <table border=\"0\">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td rowspan=\"9\">&nbsp;</td>\r\n                                                            <td>Nama Lengkap</td>\r\n                                                            <td style=\"padding-left: 10px; padding-right: 10px;\">:</td>\r\n                                                            <td><strong>INOSENSIUS KEFI</strong></td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td>Tempat / Tanggal Lahir</td>\r\n                                                            <td style=\"padding-left: 10px; padding-right: 10px;\">:</td>\r\n                                                            <td>Timor Tengah Utara, 19 September 1975</td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td>Jabatan</td>\r\n                                                            <td style=\"padding-left: 10px; padding-right: 10px;\">:</td>\r\n                                                            <td>KOORDINATOR SEKRETARIAT BAWASLU KAB. TIMOR TENGAH UTARA</td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Riwayat Pendidikan</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <li>SDN MUTIS - HAUMENI</li>\r\n                                                <li>SMPK MIMBAR BUDHI MANUFUI</li>\r\n                                                <li>SMAK GIOVANNI KUPANG</li>\r\n                                                <li>S1 UNIVESITAS KATOLIK  WIDYA MANDIRA KUPANG</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Riwayat Pekerjaan</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                <li>CPNSD TAHUN 2002</li>\r\n                                                <li>KEPALA SEKSI PEMBANGUNAN DI KELURAHAN OELAMI</li>\r\n                                                <li>KEPALA SEKSI PEMBANGUAN DAN LINGKUNGAN HIDUP PADA KANTOR CAMAT MIOMAFFO TIMUR </li>\r\n                                                <li>LURAH BITEFA  </li>\r\n                                                <li>KEPALA SEKSI PENGELOLAAN KEUANGAN DAN ASET DESA PADA DINAS PEMBERDAYAAN MASYARAKAT DAN DESA KABUPATEN TTU </li>\r\n                                                <li>KOORDINATOR SEKRETARIAT BAWASLU KABUPATEN TTU</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                    <div class=\"views-row views-row-6 views-row-even\">\r\n                                        <div class=\"views-field views-field-title\"> <span class=\"field-content\">Riwayat Organisasi</span> </div>\r\n                                        <div class=\"views-field views-field-body\">\r\n                                            <div class=\"field-content\">\r\n                                                    <li>RESIMEN MAHASISWA MAHADANA UNWIRA KUPANG</li>\r\n                                            </div>\r\n                                        </div>\r\n                                    </div>\r\n                                </div>',NULL,NULL,NULL,NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `alamat` text,
  `role` enum('superadmin','admin') DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL COMMENT 'id user',
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL COMMENT 'id user',
  `is_active` int(11) DEFAULT '0',
  `is_delete` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`nama`,`email`,`no_hp`,`alamat`,`role`,`created_date`,`created_by`,`updated_date`,`updated_by`,`is_active`,`is_delete`) values (1,'superadmin','$2y$10$6j7XQbwk38kLJJDIAZBYReX/FvLS0FgdcK9tmWfoC2WwrMenF1igi','Admin','su@gmail.com','0817676868','Solo','superadmin','2019-12-07 04:30:26',1,NULL,NULL,1,0),(6,'admin','$2y$10$wwbdVx1K8L2wPF9xEuM98.uPNxsJBR./vXJQ8XKjGcHi3gANviYGu','Admin Pemulu','bbb@mmmm.nn','123456789','rrrrrrrrrrrrrrrrr','admin','2019-12-15 20:16:38',1,'2019-12-15 23:57:03',1,1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
