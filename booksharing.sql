-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 28, 2020 alle 18:43
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ebook`
--

CREATE TABLE `ebook` (
  `titolo` varchar(30) NOT NULL,
  `autore` varchar(30) NOT NULL,
  `editore` varchar(30) NOT NULL,
  `genere` varchar(20) NOT NULL,
  `anno` smallint(6) NOT NULL,
  `prezzo_punti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ebook`
--

INSERT INTO `ebook` (`titolo`, `autore`, `editore`, `genere`, `anno`, `prezzo_punti`) VALUES
('Il processo', 'Kafka', 'Adelphi', 'Romanzo', 2014, 10),
('Moby Dick', 'Herman Melville ', 'Mondadori', 'Romanzo', 2019, 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `indirizzo`
--

CREATE TABLE `indirizzo` (
  `via` varchar(40) NOT NULL,
  `civico` varchar(5) NOT NULL,
  `cap` varchar(6) NOT NULL,
  `comune` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `indirizzo`
--

INSERT INTO `indirizzo` (`via`, `civico`, `cap`, `comune`, `provincia`) VALUES
('Genova', '21', '65015', 'Montesilvano', 'PE'),
('Mologa', '21', '65015', 'Montesilvano', 'PE'),
('Mologa', '4', '65015', 'Montesilvano', 'PE');

-- --------------------------------------------------------

--
-- Struttura della tabella `libro_cartaceo`
--

CREATE TABLE `libro_cartaceo` (
  `titolo` varchar(30) NOT NULL,
  `autore` varchar(30) NOT NULL,
  `editore` varchar(30) NOT NULL,
  `genere` varchar(20) NOT NULL,
  `anno` smallint(6) NOT NULL,
  `condizione` varchar(40) NOT NULL,
  `user` varchar(20) NOT NULL,
  `esaurito` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `libro_cartaceo`
--

INSERT INTO `libro_cartaceo` (`titolo`, `autore`, `editore`, `genere`, `anno`, `condizione`, `user`, `esaurito`) VALUES
('Cento anni di solitudine', 'Gabriel García Márquez  ', 'Mondadori', 'Romanzo', 1965, 'Nuovo', 'marco', 0),
('Il sentiero dei nidi di ragno', 'Primo Levi', 'Mondadori', 'Storico', 1900, 'Pessime', 'mario', 0),
('Se questo è un uomo', 'Italo Calvino', 'Einaudi', 'Biografia', 2014, 'Pessime', 'mario', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `proposta`
--

CREATE TABLE `proposta` (
  `id` int(20) NOT NULL,
  `proponente` varchar(20) NOT NULL,
  `ricevente` varchar(20) NOT NULL,
  `titolo_libro` varchar(30) NOT NULL,
  `autore_libro` varchar(30) NOT NULL,
  `titolo_prop` varchar(30) NOT NULL,
  `autore_prop` varchar(30) NOT NULL,
  `stato` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `proposta`
--

INSERT INTO `proposta` (`id`, `proponente`, `ricevente`, `titolo_libro`, `autore_libro`, `titolo_prop`, `autore_prop`, `stato`) VALUES
(12, 'marco', 'mario', 'Il sentiero dei nidi di ragno', 'Primo Levi', 'Cento anni di solitudine', 'Gabriel García Márquez  ', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `registrato`
--

CREATE TABLE `registrato` (
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `cognome` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `via` varchar(40) NOT NULL,
  `civico` varchar(5) NOT NULL,
  `cap` varchar(6) NOT NULL,
  `saldo` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `registrato`
--

INSERT INTO `registrato` (`user`, `password`, `nome`, `cognome`, `email`, `via`, `civico`, `cap`, `saldo`) VALUES
('admin', 'password', 'admin', 'admin', 'admin@gmail.com', 'Genova', '21', '65015', 0),
('marco', 'password', 'marco', 'Rossi', 'federicopaolonefederico@gmail.com', 'Mologa', '4', '65015', 0),
('mario', 'password', 'mario', 'Rossi', 'federicopaolonefederico@gmail.com', 'Genova', '21', '65015', 880);

-- --------------------------------------------------------

--
-- Struttura della tabella `valutazione`
--

CREATE TABLE `valutazione` (
  `id` smallint(5) NOT NULL,
  `commento` varchar(100) NOT NULL,
  `voto` smallint(6) NOT NULL,
  `valutante` varchar(20) NOT NULL,
  `valutato` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`titolo`,`autore`);

--
-- Indici per le tabelle `indirizzo`
--
ALTER TABLE `indirizzo`
  ADD PRIMARY KEY (`via`,`civico`,`cap`);

--
-- Indici per le tabelle `libro_cartaceo`
--
ALTER TABLE `libro_cartaceo`
  ADD PRIMARY KEY (`titolo`,`autore`,`user`),
  ADD KEY `user` (`user`);

--
-- Indici per le tabelle `proposta`
--
ALTER TABLE `proposta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titolo_libro` (`titolo_libro`,`autore_libro`,`ricevente`),
  ADD KEY `titolo_prop` (`titolo_prop`,`autore_prop`,`proponente`);

--
-- Indici per le tabelle `registrato`
--
ALTER TABLE `registrato`
  ADD PRIMARY KEY (`user`),
  ADD KEY `via` (`via`,`civico`,`cap`);

--
-- Indici per le tabelle `valutazione`
--
ALTER TABLE `valutazione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `valutante` (`valutante`),
  ADD KEY `valutato` (`valutato`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `proposta`
--
ALTER TABLE `proposta`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `valutazione`
--
ALTER TABLE `valutazione`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `libro_cartaceo`
--
ALTER TABLE `libro_cartaceo`
  ADD CONSTRAINT `libro_cartaceo_ibfk_1` FOREIGN KEY (`user`) REFERENCES `registrato` (`user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `proposta`
--
ALTER TABLE `proposta`
  ADD CONSTRAINT `proposta_ibfk_1` FOREIGN KEY (`titolo_libro`,`autore_libro`,`ricevente`) REFERENCES `libro_cartaceo` (`titolo`, `autore`, `user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proposta_ibfk_2` FOREIGN KEY (`titolo_prop`,`autore_prop`,`proponente`) REFERENCES `libro_cartaceo` (`titolo`, `autore`, `user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `registrato`
--
ALTER TABLE `registrato`
  ADD CONSTRAINT `registrato_ibfk_1` FOREIGN KEY (`via`,`civico`,`cap`) REFERENCES `indirizzo` (`via`, `civico`, `cap`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `valutazione`
--
ALTER TABLE `valutazione`
  ADD CONSTRAINT `valutazione_ibfk_1` FOREIGN KEY (`valutante`) REFERENCES `registrato` (`user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valutazione_ibfk_2` FOREIGN KEY (`valutato`) REFERENCES `registrato` (`user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
