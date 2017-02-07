-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Lut 2017, 12:42
-- Wersja serwera: 10.1.19-MariaDB
-- Wersja PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bazaint`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pictures`
--

CREATE TABLE `pictures` (
  `id_picture` int(11) NOT NULL,
  `picture_url` varchar(200) NOT NULL,
  `author_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `pictures`
--

INSERT INTO `pictures` (`id_picture`, `picture_url`, `author_picture`) VALUES
(9, 'https://pbs.twimg.com/profile_images/819834192968171520/Lepll1oc_reasonably_small.jpg', 1),
(10, 'http://board.4players.pl/uploads/monthly_2016_10/grafika.png.0f536dd43df623e145b4f7f4914ad704.png', 10),
(11, 'https://www.google.pl/images/branding/googleg/1x/googleg_standard_color_128dp.png', 12),
(12, 'https://image.freepik.com/darmowe-ikony/rosn?co-grafika-biznesu_318-75176.jpg', 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `text_post` varchar(2000) NOT NULL,
  `author_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id_post`, `text_post`, `author_post`) VALUES
(4, 'sdadas', 1),
(7, 'ciek', 10),
(10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mi mi, feugiat eu viverra id, facilisis sed erat. Vivamus vel mi odio. Suspendisse justo libero, pretium ac diam nec, luctus efficitur ligula. Cras dolor risus, suscipit at lorem in, lobortis elementum lacus. Curabitur lectus mauris, dignissim in finibus quis, vulputate quis diam. Duis ut odio augue. Aenean nec eros lobortis diam egestas fermentum. Pellentesque eu nisi sed lorem tincidunt semper. In id felis eget nisl pharetra pellentesque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse hendrerit lobortis sapien, vel volutpat mauris ornare ut. Nunc auctor nulla ac velit sodales, nec dictum sem tristique. Nunc mollis, justo nec elementum tempus, massa tellus consectetur elit, at auctor sapien lectus vel nisl. Morbi facilisis ornare pharetra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;', 1),
(11, 'Morbi rhoncus vel ipsum at sagittis. Proin ut sem vitae justo commodo tincidunt. Phasellus ac dignissim neque. Integer vulputate finibus ante id porttitor. Duis auctor tempus justo eget sollicitudin. Praesent arcu arcu, viverra a velit id, ullamcorper semper lacus. Curabitur semper aliquet tortor at ultricies. In nec ante viverra ex aliquet dapibus. Integer id pretium ligula. Cras tempus accumsan justo. Aliquam a erat ex. Duis tincidunt imperdiet nulla, non efficitur nisi volutpat sed. Praesent ut rhoncus turpis. Integer tincidunt bibendum aliquam. Vivamus eget porttitor nisi. Cras scelerisque viverra nisl.', 1),
(12, 'Duis eu nibh pharetra, suscipit dui nec, consectetur velit. Nulla sed diam elit. Aliquam et ligula pharetra, tristique ligula sit amet, finibus risus. Pellentesque ullamcorper rhoncus accumsan. Vivamus molestie ipsum ac arcu faucibus hendrerit. Curabitur ut sagittis massa, et fermentum elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam interdum neque a sagittis tristique. Proin mollis a lacus non lacinia.', 1),
(13, 'ciekawostka1', 12),
(14, 'ciekawostka2', 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `email`, `admin`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'mail@admin.pl', 1),
(10, 'user2', '6025d18fe48abd45168528f18a82e265dd98d421a7084aa09f61b341703901a3', 'mail@mail.pl', 0),
(12, 'milo', '13adffea089b50908ce4d41d4ee483ea99cc375350fd664461ee979263fae45b', 'mail@mail.pl', 0),
(13, 'user5', '5a39bead318f306939acb1d016647be2e38c6501c58367fdb3e9f52542aa2442', 'mail@mail.pl', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id_picture`),
  ADD KEY `author_picture` (`author_picture`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `author_id` (`author_post`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`author_picture`) REFERENCES `user` (`id_user`);

--
-- Ograniczenia dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_post`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
