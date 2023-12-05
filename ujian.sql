-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 02:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'iamadmin');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `isi_konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `penulis`, `tanggal`, `gambar`, `isi_konten`) VALUES
(1, 'Pengenalan Singkat HTML (HyperText Markup Language)', 'Admin 1', '2023-11-28', 'images/html-system-websites-concept.jpg', '<h3 style=\"color: rgb(0, 0, 0); margin: 0.3em 0px 0px; padding-top: 0.5em; padding-bottom: 0px; overflow: hidden; font-size: 1.2em; line-height: 1.6; font-weight: bold;\"><span class=\"mw-headline\" id=\"Head\"><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px; font-weight: 400;\"><b>Hypertext Markup Language</b>&nbsp;(<b>HTML</b>) adalah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Bahasa_markah\" title=\"Bahasa markah\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">bahasa markah</a>&nbsp;standar untuk dokumen yang dirancang untuk ditampilkan di&nbsp;<a href=\"https://id.wikipedia.org/wiki/Browser\" class=\"mw-redirect\" title=\"Browser\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">peramban internet</a>. Ini dapat dibantu oleh teknologi seperti&nbsp;<a href=\"https://id.wikipedia.org/wiki/Cascading_Style_Sheets\" title=\"Cascading Style Sheets\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">Cascading Style Sheets</a>&nbsp;(CSS) dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Bahasa_skrip\" title=\"Bahasa skrip\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">bahasa skrip</a>&nbsp;lainnya seperti&nbsp;<a href=\"https://id.wikipedia.org/wiki/JavaScript\" title=\"JavaScript\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">JavaScript</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/VBScript\" title=\"VBScript\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">VBScript</a>, dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/PHP\" title=\"PHP\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">PHP</a>.</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px; font-weight: 400;\"><a href=\"https://id.wikipedia.org/wiki/Browser\" class=\"mw-redirect\" title=\"Browser\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">Peramban internet</a>&nbsp;menerima dokumen HTML dari&nbsp;<a href=\"https://id.wikipedia.org/wiki/Server_web\" class=\"mw-redirect\" title=\"Server web\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">server web</a>&nbsp;atau dari penyimpanan lokal dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Mesin_peramban\" title=\"Mesin peramban\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">membuat</a>&nbsp;dokumen menjadi halaman web multimedia. HTML menggambarkan struktur&nbsp;<a href=\"https://id.wikipedia.org/wiki/Halaman_web\" class=\"mw-redirect\" title=\"Halaman web\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">halaman web</a>&nbsp;secara&nbsp;<a href=\"https://id.wikipedia.org/wiki/Web_semantik\" title=\"Web semantik\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">semantik</a>&nbsp;dan isyarat awal yang disertakan untuk penampilan dokumen.</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px; font-weight: 400;\">Elemen HTML digambarkan oleh&nbsp;<i>tag</i>, ditulis menggunakan tanda&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tanda_kurung#tanda_kurung_siku\" title=\"Tanda kurung\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">kurung siku</a>. Tag seperti&nbsp;<code class=\"mw-highlight mw-highlight-lang-html mw-content-ltr\" id=\"\" dir=\"ltr\" style=\"font-family: monospace, monospace; background: rgb(248, 248, 248); color: rgb(0, 0, 0); border: 1px solid rgb(234, 236, 240); border-radius: 2px; padding: 1px 4px; unicode-bidi: embed;\"><span class=\"p\">&lt;</span><span class=\"nt\" style=\"color: rgb(0, 128, 0); font-weight: bold;\">img</span>&nbsp;<span class=\"p\">/&gt;</span></code>&nbsp;dan&nbsp;<code class=\"mw-highlight mw-highlight-lang-html mw-content-ltr\" id=\"\" dir=\"ltr\" style=\"font-family: monospace, monospace; background: rgb(248, 248, 248); color: rgb(0, 0, 0); border: 1px solid rgb(234, 236, 240); border-radius: 2px; padding: 1px 4px; unicode-bidi: embed;\"><span class=\"p\">&lt;</span><span class=\"nt\" style=\"color: rgb(0, 128, 0); font-weight: bold;\">input</span>&nbsp;<span class=\"p\">/&gt;</span></code>&nbsp;langsung perkenalkan konten ke dalam halaman. Tag lain seperti&nbsp;<code class=\"mw-highlight mw-highlight-lang-html mw-content-ltr\" id=\"\" dir=\"ltr\" style=\"font-family: monospace, monospace; background: rgb(248, 248, 248); color: rgb(0, 0, 0); border: 1px solid rgb(234, 236, 240); border-radius: 2px; padding: 1px 4px; unicode-bidi: embed;\"><span class=\"p\">&lt;</span><span class=\"nt\" style=\"color: rgb(0, 128, 0); font-weight: bold;\">p</span><span class=\"p\">&gt;</span></code>&nbsp;mengelilingi dan memberikan informasi tentang teks dokumen dan mungkin menyertakan tag lain sebagai sub-elemen. Peramban tidak menampilkan tag HTML, tetapi menggunakannya untuk menafsirkan konten halaman.</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px; font-weight: 400;\">HTML dapat menyematkan program yang ditulis dalam&nbsp;<a href=\"https://id.wikipedia.org/wiki/Bahasa_skrip\" title=\"Bahasa skrip\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">bahasa skrip</a>&nbsp;seperti&nbsp;<a href=\"https://id.wikipedia.org/wiki/JavaScript\" title=\"JavaScript\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">JavaScript</a>, yang memengaruhi perilaku dan konten halaman web. Dimasukkannya CSS mendefinisikan tampilan dan tata letak konten.&nbsp;<a href=\"https://id.wikipedia.org/wiki/World_Wide_Web_Consortium\" class=\"mw-redirect\" title=\"World Wide Web Consortium\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">World Wide Web Consortium</a>&nbsp;(W3C), mantan pengelola HTML dan pemelihara standar CSS saat ini, telah mendorong penggunaan CSS pada HTML presentasi eksplisit sejak 1997.</p></span></h3><h3 style=\"color: rgb(0, 0, 0); margin: 0.3em 0px 0px; padding-top: 0.5em; padding-bottom: 0px; overflow: hidden; font-size: 1.2em; line-height: 1.6; font-weight: bold;\"><span class=\"mw-headline\" id=\"Head\">Head</span></h3><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px;\">Dokumen HTML diapit oleh tag&nbsp;<code style=\"font-family: monospace, monospace; background-color: rgb(248, 249, 250); color: rgb(0, 0, 0); border: 1px solid rgb(234, 236, 240); border-radius: 2px; padding: 1px 4px;\">&lt;head&gt;</code>. Di dalam bagian ini biasanya dimuat tag&nbsp;<code style=\"font-family: monospace, monospace; background-color: rgb(248, 249, 250); color: rgb(0, 0, 0); border: 1px solid rgb(234, 236, 240); border-radius: 2px; padding: 1px 4px;\">&lt;title&gt;</code>&nbsp;yang menampilkan judul halaman pada titlenya browser. Selain itu&nbsp;<i>bookmark</i>&nbsp;juga menggunakan tag&nbsp;<code style=\"font-family: monospace, monospace; background-color: rgb(248, 249, 250); color: rgb(0, 0, 0); border: 1px solid rgb(234, 236, 240); border-radius: 2px; padding: 1px 4px;\">&lt;title&gt;</code>&nbsp;untuk memberi mark suatu web site. Browser menyimpan “title” sebagai&nbsp;<i>bookmark</i>&nbsp;dan juga untuk keperluan pencarian (<i>searching</i>) biasanya title digunakan sebagai&nbsp;<i>keyword</i>. Header juga memuat tag&nbsp;<a href=\"https://id.wikipedia.org/wiki/Meta\" class=\"mw-disambig\" title=\"Meta\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">META</a>&nbsp;yang biasanya dapat digunakan untuk menentukan informasi tertentu mengenai dokumen HTML. Pengguna bisa menentukan author name, keywords, dan lainnya pada tag META.</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px;\">Contoh:</p><div class=\"mw-highlight mw-content-ltr\" dir=\"ltr\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; unicode-bidi: embed; color: rgb(32, 33, 34); font-size: 14px;\"><pre style=\"line-height: 1.3; font-family: monospace, monospace; background-color: rgb(248, 249, 250); color: rgb(0, 0, 0); border: 1px solid rgb(234, 236, 240); padding: 1em; text-wrap: wrap; overflow-x: hidden; overflow-wrap: break-word; tab-size: 4; position: relative;\">&lt;meta name=\"author\" content=\"ubuntu-online\"&gt;</pre></div><h3 style=\"color: rgb(0, 0, 0); margin: 0.3em 0px 0px; padding-top: 0.5em; padding-bottom: 0px; overflow: hidden; font-size: 1.2em; line-height: 1.6; font-weight: bold;\"><span class=\"mw-headline\" id=\"Body\">Body</span></h3><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px;\">Bagian \"body\", yang dinyatakan dengan tag&nbsp;<code style=\"font-family: monospace, monospace; background-color: rgb(248, 249, 250); color: rgb(0, 0, 0); border: 1px solid rgb(234, 236, 240); border-radius: 2px; padding: 1px 4px;\">&lt;body&gt;</code>, merupakan tubuh atau isi dari dokumen HTML di mana pengguna meletakkan informasi yang akan ditampilkan pada browser.</p><h3 style=\"color: rgb(0, 0, 0); margin: 0.3em 0px 0px; padding-top: 0.5em; padding-bottom: 0px; overflow: hidden; font-size: 1.2em; line-height: 1.6; font-weight: bold;\"><span class=\"mw-headline\" id=\"Tag\">Tag</span></h3><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px;\">HTML tidak membedakan penggunaan huruf besar ataupun huruf kecil dari suatu elemen. Suatu elemen HTML terdiri dari tag-tag beserta teks yang ada dalam tag-tag tersebut. Tag ini dinyatakan dengan tanda kurung sudut (&lt; dan &gt;).</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px;\">Tag biasanya merupakan suatu pasangan yang disebut dengan:</p><ul style=\"list-style-image: url(&quot;/w/skins/Vector/resources/skins.vector.styles/images/bullet-icon.svg?d4515&quot;); margin: 0.3em 0px 0px 1.6em; padding: 0px; color: rgb(32, 33, 34); font-size: 14px;\"><li style=\"margin-bottom: 0.1em;\">Tag awal, dinyatakan dalam bentuk &lt;nama tag&gt;</li><li style=\"margin-bottom: 0.1em;\">Tag akhir, dinyatakan dalam bentuk &lt;/nama tag&gt;</li></ul><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px;\">Formatnya: &lt;nama tag&gt; teks yang ditampilkan &lt;/nama tag&gt;.</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px;\">Contoh: untuk menampilkan teks dalam format teks miring&nbsp;<i>Teks ini terlihat miring di browser anda</i>&nbsp;dengan perintah HTML&nbsp;<code style=\"font-family: monospace, monospace; background-color: rgb(248, 249, 250); color: rgb(0, 0, 0); border: 1px solid rgb(234, 236, 240); border-radius: 2px; padding: 1px 4px;\">&lt;i&gt;Teks ini terlihat miring di browser Anda&lt;/i&gt;</code></p><h3 style=\"color: rgb(0, 0, 0); margin: 0.3em 0px 0px; padding-top: 0.5em; padding-bottom: 0px; overflow: hidden; font-size: 1.2em; line-height: 1.6; font-weight: bold;\"><span class=\"mw-headline\" id=\"Atribut\">Atribut</span></h3><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-size: 14px;\">Tag awal bisa memiliki beberapa buah atribut yang menyatakan karakteristik dari tag tersebut. Misalnya,&nbsp;<code style=\"font-family: monospace, monospace; background-color: rgb(248, 249, 250); color: rgb(0, 0, 0); border: 1px solid rgb(234, 236, 240); border-radius: 2px; padding: 1px 4px;\">&lt;p style=\"text-align:left;\"&gt;</code>&nbsp;digunakan untuk membuat rata kiri suatu paragraf. Tag yang digunakan adalah&nbsp;<code style=\"font-family: monospace, monospace; background-color: rgb(248, 249, 250); color: rgb(0, 0, 0); border: 1px solid rgb(234, 236, 240); border-radius: 2px; padding: 1px 4px;\">&lt;p&gt;</code>&nbsp;dan atribut yang menyertainya adalah \"style\" dengan nilai \"text-align:left\". Nilai atribut \"style\" ditulis dalam&nbsp;<a href=\"https://id.wikipedia.org/wiki/Cascading_Style_Sheets\" title=\"Cascading Style Sheets\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; overflow-wrap: break-word;\">CSS</a>.</p>'),
(2, 'Manfaat Matematika dalam Dunia Programming', 'Admin 2', '2023-11-28', 'images/10594781_4498903.jpg', '    <p>Matematika memainkan peran krusial dalam dunia programming, memberikan dasar yang kuat untuk pengembangan perangkat lunak. Dalam artikel ini, kita akan mengeksplorasi beberapa manfaat kunci matematika dalam programming dan bagaimana penerapannya dapat meningkatkan kualitas dan efisiensi kode.</p>\r\n\r\n    <h4>1. Algoritma dan Struktur Data</h4>\r\n\r\n    <p>Algoritma dan struktur data adalah elemen inti dalam pembuatan perangkat lunak. Kemampuan untuk merancang algoritma yang efisien memerlukan pemahaman mendalam tentang logika matematika. Konsep-konsep seperti logika proposisional dan predikat membantu programmer merancang algoritma yang akurat dan efektif.</p>\r\n\r\n    <h4>2. Analisis Kompleksitas Waktu dan Ruang</h4>\r\n\r\n    <p>Pemahaman matematika sangat penting ketika kita berbicara tentang analisis kompleksitas waktu dan ruang dari suatu algoritma. Notasi matematika, seperti \"O Big-Oh,\" membantu programmer mengevaluasi sejauh mana performa suatu algoritma, memastikan bahwa aplikasi berjalan secara efisien dan tidak memakan banyak sumber daya.</p>\r\n\r\n    <h4>3. Geometri dalam Grafika Komputer</h4>\r\n\r\n    <p>Dalam pengembangan game dan aplikasi grafis, konsep geometri matematika sangat diperlukan. Transformasi geometris, matriks, dan vektor digunakan untuk mengatur dan memanipulasi objek dalam ruang 3D. Pemahaman yang baik tentang matematika geometris sangat penting untuk menciptakan visualisasi yang menarik dan realistis.</p>\r\n\r\n <h4>4. Kriptografi dan Teori Bilangan</h4>\r\n\r\n    <p>Dalam keamanan informasi, matematika memiliki peran penting dalam kriptografi dan teori bilangan. Algoritma enkripsi, seperti RSA, bergantung pada prinsip-prinsip matematika untuk menjaga keamanan data. Pemahaman tentang teori bilangan juga dapat membantu dalam pengembangan algoritma keamanan yang kuat.</p>\r\n\r\n    <h4>5. Pengolahan Sinyal dalam Multimedia</h4>\r\n\r\n    <p>Dalam pengembangan multimedia, matematika digunakan dalam pengolahan sinyal. Transformasi Fourier, misalnya, memungkinkan pengkodean dan dekode audio. Pemahaman matematika di sini membantu programmer mengimplementasikan teknologi multimedia dengan akurat dan efisien.</p>\r\n\r\n    <h4>6. Machine Learning dan Statistik</h4>\r\n\r\n    <p>Dalam era kecerdasan buatan, matematika memegang peran penting dalam machine learning dan statistik. Algoritma pembelajaran mesin, seperti regresi dan clustering, bergantung pada konsep statistik dan optimisasi matematika untuk memberikan prediksi yang akurat.</p>\r\n\r\n    <h4>7. Optimisasi dan Pemodelan</h4>\r\n\r\n    <p>Matematika membantu dalam pemodelan dan optimisasi, memungkinkan programmer untuk merancang solusi yang efisien untuk permasalahan kompleks. Metode optimisasi matematis, seperti program linier, memberikan alat untuk merancang keputusan yang optimal dalam situasi tertentu.</p>\r\n\r\n    <h4>8. Logika dan Pengujian</h4>\r\n\r\n    <p>Pemahaman logika matematika sangat penting dalam pengembangan perangkat lunak. Ini membantu dalam merancang dan mengimplementasikan unit tes serta mengidentifikasi bug dalam kode.</p>'),
(3, 'Cara Menjadi Seorang Web Developer, Simak Tips Berikut!', 'Admin Magang', '2023-11-28', 'images/12063795_4884785.jpg', ' <p>Seorang web developer adalah seorang profesional yang bertanggung jawab untuk merancang, mengembangkan, dan memelihara situs web. Mereka memiliki peran penting dalam menciptakan pengalaman pengguna yang baik melalui kombinasi keterampilan pemrograman, desain, dan pengelolaan basis data.</p>\r\n\r\n    <h4>1. Pahami Dasar-dasar HTML, CSS, dan JavaScript</h4>\r\n\r\n    <p>Langkah pertama dalam perjalanan menjadi seorang web developer adalah memahami dasar-dasar pengembangan web. HTML untuk struktur halaman web, CSS untuk desain dan tata letak, dan JavaScript untuk interaktivitas. Kuasai konsep-konsep dasar ini sebelum melangkah ke langkah berikutnya.</p>\r\n\r\n    <h4>2. Pelajari Framework dan Library Populer</h4>\r\n\r\n    <p>Framework seperti React, Angular, atau Vue.js dan library seperti jQuery dapat mempercepat pengembangan web. Pilih salah satu atau lebih yang sesuai dengan preferensi Anda dan pelajari secara mendalam.</p>\r\n\r\n    <h4>3. Kuasai Keterampilan Responsif dan Desain Adaptif</h4>\r\n\r\n    <p>Dengan penggunaan perangkat seluler yang semakin meningkat, penting untuk dapat membuat situs web yang responsif dan dapat diakses dengan baik di berbagai perangkat. Pelajari keterampilan desain responsif dan adaptif untuk meningkatkan pengalaman pengguna.</p>\r\n\r\n    <h4>4. Memahami Konsep Basis Data dan Server</h4>\r\n\r\n    <p>Seorang web developer juga perlu memahami cara berinteraksi dengan basis data dan server. Pelajari SQL untuk manipulasi data dan pahami cara server bekerja untuk meningkatkan fungsionalitas situs web Anda.</p>\r\n\r\n    <h4>5. Praktekkan Pengembangan Berbasis Proyek</h4>\r\n\r\n    <p>Langkah terbaik untuk memahami pengembangan web adalah dengan praktek langsung. Terapkan pengetahuan Anda pada proyek-proyek kecil dan bertahap tingkatkan kompleksitasnya. Ini tidak hanya memperkuat pemahaman Anda tetapi juga membangun portofolio yang kuat.</p>\r\n\r\n    <h4>6. Ikuti Perkembangan Terbaru</h4>\r\n\r\n    <p>Dunia pengembangan web terus berkembang. Ikuti berita dan tren terbaru, dan terus perbarui keterampilan Anda sesuai kebutuhan pasar. Pesatnya perubahan teknologi menuntut seorang web developer untuk selalu siap belajar hal baru.</p>\r\n\r\n    <h4>7. Bangun Portofolio yang Kuat</h4>\r\n\r\n    <p>Potensi klien atau perekrut sangat tertarik dengan proyek-proyek yang sudah Anda kerjakan. Bangun portofolio online yang mencerminkan berbagai kemampuan dan proyek yang telah Anda selesaikan.</p>\r\n\r\n    <h4>8. Terlibat dalam Komunitas Pengembang</h4>\r\n\r\n    <p>Bergabung dengan komunitas pengembang web dapat memberikan Anda peluang untuk belajar dari sesama profesional. Diskusikan ide, tanyakan pertanyaan, dan terus tingkatkan jaringan Anda dalam industri.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujian`
--

CREATE TABLE `hasil_ujian` (
  `id_user` int(11) DEFAULT NULL,
  `id_ujian` int(11) DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `jawaban_salah` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_ujian`
--

INSERT INTO `hasil_ujian` (`id_user`, `id_ujian`, `jawaban`, `jawaban_salah`, `nilai`) VALUES
(1, 4, '13', 2, 87),
(1, 1, '9', 1, 90),
(3, 1, '10', 0, 100),
(2, 4, '12', 3, 80),
(2, 1, '1', 0, 100),
(4, 1, '3', 0, 100),
(5, 1, '7', 3, 70),
(3, 4, '13', 2, 87),
(6, 1, '5', 5, 50),
(5, 4, '11', 4, 73);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_user`
--

CREATE TABLE `jawaban_user` (
  `id_user` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `id_ujian` int(11) DEFAULT NULL,
  `jawaban_user` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawaban_user`
--

INSERT INTO `jawaban_user` (`id_user`, `id_soal`, `id_ujian`, `jawaban_user`) VALUES
(1, 11, 1, 'B'),
(1, 12, 1, 'C'),
(1, 13, 1, 'B'),
(1, 14, 1, 'C'),
(1, 15, 1, 'D'),
(1, 16, 1, 'A'),
(1, 17, 1, 'B'),
(1, 18, 1, 'B'),
(1, 19, 1, 'C'),
(1, 110, 1, 'B'),
(1, 41, 4, 'A'),
(1, 42, 4, 'C'),
(1, 43, 4, 'C'),
(1, 44, 4, 'A'),
(1, 45, 4, 'C'),
(1, 46, 4, 'B'),
(1, 47, 4, 'C'),
(1, 48, 4, 'A'),
(1, 49, 4, 'D'),
(1, 410, 4, 'D'),
(1, 411, 4, 'C'),
(1, 412, 4, 'A'),
(1, 413, 4, 'C'),
(1, 414, 4, 'A'),
(1, 415, 4, 'A'),
(3, 11, 1, 'B'),
(3, 12, 1, 'C'),
(3, 13, 1, 'B'),
(3, 14, 1, 'C'),
(3, 15, 1, 'D'),
(3, 16, 1, 'D'),
(3, 17, 1, 'B'),
(3, 18, 1, 'B'),
(3, 19, 1, 'C'),
(3, 110, 1, 'B'),
(2, 41, 4, 'A'),
(2, 42, 4, 'C'),
(2, 43, 4, 'C'),
(2, 44, 4, 'A'),
(2, 45, 4, 'C'),
(2, 46, 4, 'B'),
(2, 47, 4, 'C'),
(2, 48, 4, 'A'),
(2, 49, 4, 'D'),
(2, 410, 4, 'D'),
(2, 411, 4, 'B'),
(2, 412, 4, 'B'),
(2, 413, 4, 'C'),
(2, 414, 4, 'A'),
(2, 415, 4, 'A'),
(2, 11, 1, 'B'),
(4, 11, 1, 'B'),
(4, 12, 1, 'C'),
(4, 13, 1, 'B'),
(5, 11, 1, 'B'),
(5, 12, 1, 'C'),
(5, 13, 1, 'B'),
(5, 14, 1, 'B'),
(5, 15, 1, 'D'),
(5, 16, 1, 'D'),
(5, 17, 1, 'D'),
(5, 18, 1, 'C'),
(5, 19, 1, 'C'),
(5, 110, 1, 'B'),
(3, 41, 4, 'B'),
(3, 42, 4, 'C'),
(3, 43, 4, 'C'),
(3, 44, 4, 'A'),
(3, 45, 4, 'C'),
(3, 46, 4, 'B'),
(3, 47, 4, 'C'),
(3, 48, 4, 'A'),
(3, 49, 4, 'D'),
(3, 410, 4, 'D'),
(3, 411, 4, 'C'),
(3, 412, 4, 'B'),
(3, 413, 4, 'C'),
(3, 414, 4, 'B'),
(3, 415, 4, 'A'),
(6, 11, 1, 'B'),
(6, 12, 1, 'C'),
(6, 13, 1, 'B'),
(6, 14, 1, 'C'),
(6, 15, 1, 'D'),
(6, 16, 1, 'N'),
(6, 17, 1, 'N'),
(6, 18, 1, 'N'),
(6, 19, 1, 'N'),
(6, 110, 1, 'N'),
(5, 41, 4, 'A'),
(5, 42, 4, 'C'),
(5, 43, 4, 'C'),
(5, 44, 4, 'A'),
(5, 45, 4, 'C'),
(5, 46, 4, 'B'),
(5, 47, 4, 'C'),
(5, 48, 4, 'C'),
(5, 49, 4, 'D'),
(5, 410, 4, 'D'),
(5, 411, 4, 'B'),
(5, 412, 4, 'C'),
(5, 413, 4, 'C'),
(5, 414, 4, 'A'),
(5, 415, 4, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `pesan`) VALUES
(1, 'RIFQI NUR FAUZI', 'rifqin289@gmail.com', 'Contoh pesan'),
(2, 'Nadin Amizah', 'nadin.amizah@gmail.com', 'Halo kak! Semoga situs ini bisa semakin berkembang ke depannya ya'),
(3, 'Ifan Sidiq Maulana', 'muhammadifan@gmail.com', 'Ada beberapa bug yang mungkin masih perlu diperbaiki, semoga bisa disempurnakan untuk memastikan kemudahan pengguna'),
(4, 'Rifana Zulkhanisa', 'rifanazulkhanisa@gmail.com', 'Ini adalah pesan');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_ujian` int(11) DEFAULT NULL,
  `soal` text DEFAULT NULL,
  `opsi_a` varchar(255) DEFAULT NULL,
  `opsi_b` varchar(255) DEFAULT NULL,
  `opsi_c` varchar(255) DEFAULT NULL,
  `opsi_d` varchar(255) DEFAULT NULL,
  `jawaban` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_ujian`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `jawaban`) VALUES
(11, 1, 'Apa yang dimaksud dengan Machine Learning?', 'Proses untuk membuat mesin menjadi manusia', 'Sistem komputer yang dapat belajar dari pengalaman', 'Algoritma yang hanya dapat dijalankan dengan perintah dari manusia', 'Mesin yang dapat memberikan kemudahan akses untuk pembelajaran', 'B'),
(12, 1, 'Apa fungsi utama dari algoritma dalam bidang kecerdasan buatan?', 'Menentukan warna font pada sistem', 'Menetapkan prioritas tugas yang akan dikerjakan', 'Menentukan aturan dan langkah untuk menyelesaikan suatu masalah', 'Mengirim pesan kepada user sesuai dengan permintaan', 'C'),
(13, 1, 'Apa yang dimaksud dengan Neural Network atau Jaringan Syaraf Tiruan dalam konteks Kecerdasan Buatan?', 'Jaringan yang menghubungkan semua perangkat di seluruh dunia', 'Model matematis yang disusun berdasarkan konsep struktur otak manusia', 'Sistem keamanan yang berfungsi untuk melindungi data', 'Program komputer yang bertugas untuk memercepat kinerja suatu processor', 'B'),
(14, 1, 'Apa yang dimaksud dengan Deep Learning?', 'Suatu algoritma yang bertugas untuk memahami bagaimana pola pikir dari sebuah mesin', 'Pelajaran yang sangat sulit untuk diterapkan dan dipikirkan oleh mesin', 'Pembelajaran yang mendalam dan kompleks ', 'Menggunakan mesin untuk membersihkan data-data dalam program komputer', 'C'),
(15, 1, 'Chatbot adalah sebuah program komputer yang dirancang untuk berkomunikasi dengan manusia, di bawah ini adalah beberapa contoh chatbot kecuali ...', 'Siri', 'Chatgpt', 'Bing AI', 'Adobe Flash', 'D'),
(16, 1, 'Di bawah ini merupakan kelebihan utama dari penggunaan Kecerdasan Buatan dibandingkan alami, kecuali ...', 'Lebih murah dan mudah untuk didapatkan', 'Mampu menganalisis dengan lebih cepat dan juga akurat', 'Bersifat permanen', 'Tidak dapat berpikir di luar kotak', 'D'),
(17, 1, 'Apa yang dimaksud dengan Natural Language Processing atau NLP?', 'Program yang berfungsi untuk menguji kecerdasan manusia', 'Suatu prosedur bagi mesin untuk memproses dan memahami bahasa manusia', 'Menulis kode komputer menggunakan bahasa manusia tanpa harus di-compile', 'Menggunakan bahasa alami untuk bisa berkomunikasi dengan mesin', 'B'),
(18, 1, 'Apa perbedaan antara konsep Artificial Intelligence dengan Machine Learning?', 'Tidak ada perbedaan, kedua istilah dapat digunakan secara bergantian', ' Pembelajaran Mesin adalah bagian dari Kecerdasan Buatan', 'Kecerdasan Buatan adalah bagian dari Pembelajaran Mesin', 'Kecerdasan Buatan hanya mencakup robotik saja', 'B'),
(19, 1, 'Sistem yang berfungsi untuk menggantikan seorang professional di bidangnya disebut sebagai ...', 'Sistem informasi', 'Sistem komputasi', 'Sistem pakar', 'Kecerdasan duplikasi', 'C'),
(41, 4, 'HTML adalah singkatan dari ...', 'HyperText Markup Language', 'Hyperlink and Text Markup Language', 'High-Level Text Manipulation Language', 'Hyperlink Text and Main Loader', 'A'),
(42, 4, 'Untuk mendesain tata letak dan mengatur tampilan pada halaman web, maka diperlukan ...', 'PHP', 'Server', 'CSS', 'Host', 'C'),
(43, 4, 'Atribut yang digunakan untuk mengatur warna teks pada CSS adalah ...', 'color', 'bg-color', 'font-color', 'text-color', 'C'),
(44, 4, 'Di bawah ini merupakan tag yang digunakan untuk melakukan style terhadap sebagian dari konten atau elemen yang ada di HTML adalah ...', 'span', 'div', 'a href', 'section', 'A'),
(45, 4, 'Untuk menambahkan sebuah gambar ke dalam halaman html, maka dapat digunakan tag ...', 'picture', 'insert', 'img', 'images', 'C'),
(46, 4, 'Desain halaman web yang bisa menyesuaikan ukuran, baik dari tata letak atau style berdasarkan ukuran layar disebut ...', 'auto', 'responsive', 'grid-layout', 'sizing', 'B'),
(47, 4, 'Di bawah ini yang tidak termasuk dalam heading yang ada pada HTML adalah ...', 'h1', 'h2', 'h7', 'h6', 'C'),
(48, 4, 'Dalam sebuah halaman web, pengguna bisa berpindah dari satu halaman ke halaman selanjutnya dengan hyperlink yang dibuat menggunakan tag ...', 'a', 'hyperlink', 'link', 'rel', 'A'),
(49, 4, 'Dalam desain web, kita bisa menggunakan css untuk mengatur style halaman sesuai dengan yang kita mau. Berikut adalah cara penulisan css yang benar, kecuali ...', 'inline style', 'external link', 'internal ', 'identifier', 'D'),
(51, 5, 'Berapa hasil dari 10 log 10', '10', '1', '100', '1000', 'B'),
(110, 1, 'Apa fungsi utama dari Computer Vision dalam lingkup Kecerdasan Buatan?', 'Memprediksi cuaca selaman beberapa hari', 'Melakukan pengenalan terhadap gambar atau video', 'Menghitung dan mengkonversi jumlah kata serta huruf dalam suatu teks', 'Mengoptimalkan kinerja prosessor komputer', 'B'),
(410, 4, 'Pada css, kita bisa mengatur bagaimana letak elemen-elemen anak dari sebuah konten di HTML dengan menggunakan display, properti default display pada elemen div adalah ...', 'absolute', 'flex', 'grid', 'block', 'D'),
(411, 4, 'Untuk membuat sebuah formulir di halaman HTML, kita bisa menggunakan tag form. Tag yang digunakan untuk membuat dropdown adalah ...', 'input', 'textarea', 'select', 'dropdown', 'C'),
(412, 4, 'Untuk menghubungkan file CSS eksternal ke halaman HTML, maka dapat digunakan dengan menggunakan ...', 'Memanggil fungsinya', 'Menggunakan tag script', 'Menggunakan tag style', 'Menuliskan link css nya di bagian head', 'D'),
(413, 4, 'Untuk membuat sebuah paragraf di dalam dokumen HTML, maka dapat digunakan tag yang menggunakan simbol', 'par', 'para', 'p', 'paragraph', 'C'),
(414, 4, 'Untuk menyisipkan javascript di dalam dokumen HTML, maka bisa digunakan tag script yang dapat ditulis di bagian ...', 'head', 'body', 'footer', 'div', 'B'),
(415, 4, 'Untuk memberikan sebuah efek ketika mouse mengakses suatu elemen di halaman web, maka dapat digunakan css ...', 'hover', 'active', 'link', 'onmouse', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `nama_ujian` varchar(255) DEFAULT NULL,
  `jumlah_soal` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `nama_ujian`, `jumlah_soal`, `waktu`, `gambar`) VALUES
(1, 'Kecerdasan Buatan', 10, 10, 'images/ai.jpg'),
(4, 'Web Design', 15, 15, 'images/28480869_Tiny graphic designer drawing with big pen on computer screen.jpg'),
(5, 'Matematika Diskrit', 5, 15, 'images/24644996_Tiny students with huge sign pi flat vector illustration.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto_profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `foto_profil`) VALUES
(1, 'Rifqi Nur Fauzi', 'rifqifauu', 'rifqin289@gmail.com', 'rifqi123', ''),
(2, 'Ifan Sidiq Maulana', 'ifansidiq', 'muhammadifan@gmail.com', 'ifan123', ''),
(3, 'Nadin Amizah', 'cakecaine', 'nadinamizah@gmail.com', 'nadin123', ''),
(4, 'Naruto Uzumaki', 'naruto', 'narutouzumaki@gmail.com', 'naruto123', ''),
(5, 'Rifana Zulkhanisa', 'rifana', 'rifanazulkhanisa@gmail.com', 'rifana123', ''),
(6, 'Lee Ji Eun', 'dlwlrma', 'nama123@gmail.com', 'dlwlrma', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indexes for table `jawaban_user`
--
ALTER TABLE `jawaban_user`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_soal` (`id_soal`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD CONSTRAINT `hasil_ujian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `hasil_ujian_ibfk_2` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`);

--
-- Constraints for table `jawaban_user`
--
ALTER TABLE `jawaban_user`
  ADD CONSTRAINT `jawaban_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `jawaban_user_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`),
  ADD CONSTRAINT `jawaban_user_ibfk_3` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
