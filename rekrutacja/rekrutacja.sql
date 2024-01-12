-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Sty 2024, 22:23
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `rekrutacja`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bd_delegation_table`
--

CREATE TABLE `bd_delegation_table` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `departure_place` varchar(20) DEFAULT NULL,
  `arrival_place` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `bd_delegation_table`
--

INSERT INTO `bd_delegation_table` (`id`, `full_name`, `from_date`, `to_date`, `departure_place`, `arrival_place`) VALUES
(1, 'Łukasz Borchardt', '2023-11-02', '2023-11-04', 'Poznań', 'Bielsko-Biała'),
(2, 'Anna Kowalska', '2023-11-30', '2023-12-01', 'Szczecin', 'Warszawa'),
(3, 'Jan Kowalski', '2023-12-03', '2023-12-03', 'Warszawa', 'Poznań'),
(4, 'Paweł Nowak', '2023-12-05', '2023-12-06', 'Poznań', 'Berlin'),
(5, 'Łukasz Borchardt', '2023-12-20', '2023-12-23', 'Poznań', 'Paryż'),
(6, 'Kamil Nowak', '2024-01-02', '2024-01-05', 'Gdańsk', 'Zakopane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vat_invoice_table`
--

CREATE TABLE `vat_invoice_table` (
  `id` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `MPK` smallint(6) DEFAULT NULL,
  `net_amount` decimal(10,2) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `VAT` char(2) NOT NULL,
  `gross_amount` decimal(10,2) GENERATED ALWAYS AS (`VAT` / 100 * `net_amount` + `net_amount`) VIRTUAL,
  `net_value` decimal(10,2) GENERATED ALWAYS AS (`net_amount` * `quantity`) VIRTUAL,
  `gross_value` decimal(10,2) GENERATED ALWAYS AS (`gross_amount` * `quantity`) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `vat_invoice_table`
--

INSERT INTO `vat_invoice_table` (`id`, `description`, `MPK`, `net_amount`, `quantity`, `VAT`) VALUES
(1, 'Usługi IT', 1000, '1200.00', 1, '0'),
(2, 'Internet', 1006, '500.00', 2, 'ZW'),
(3, 'Samochody służbowe - zakup', 1923, '100000.00', 5, '23'),
(4, 'Samochody służbowe - serwis', 1852, '20000.00', 2, '8'),
(5, 'Wymiana sprzętu IT', 1333, '2345.00', 5, '8');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workers_table`
--

CREATE TABLE `workers_table` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `position` varchar(25) DEFAULT NULL,
  `employment_date` date DEFAULT NULL,
  `number_days_off` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `workers_table`
--

INSERT INTO `workers_table` (`id`, `first_name`, `last_name`, `position`, `employment_date`, `number_days_off`) VALUES
(1, 'Łukasz', 'Borchardt', 'Programista', '2024-02-01', 11),
(2, 'Jan', 'Kowalski', 'Specjalista', '2020-02-01', 20),
(3, 'Anna', 'Kowalska', 'Księgowa', '2010-10-01', 30),
(4, 'Paweł', 'Nowak', 'Doradca handlowy', '2021-12-01', 15),
(5, 'Kamil', 'Nowak', 'Pracownik Gospodarczy', '2011-01-01', 26);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bd_delegation_table`
--
ALTER TABLE `bd_delegation_table`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `vat_invoice_table`
--
ALTER TABLE `vat_invoice_table`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `workers_table`
--
ALTER TABLE `workers_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `bd_delegation_table`
--
ALTER TABLE `bd_delegation_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `vat_invoice_table`
--
ALTER TABLE `vat_invoice_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `workers_table`
--
ALTER TABLE `workers_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
