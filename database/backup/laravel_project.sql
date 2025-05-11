-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/05/2025 às 18:48
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laravel_project`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acervos`
--

CREATE TABLE `acervos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_acervo` varchar(100) NOT NULL,
  `status_acervo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `acervos`
--

INSERT INTO `acervos` (`id`, `nome_acervo`, `status_acervo`, `created_at`, `updated_at`) VALUES
(1, 'CRTCB-LD-66A', 1, '2025-05-10 13:27:38', '2025-05-10 13:27:38'),
(2, 'CRTCB-LD-66B', 1, '2025-05-10 13:27:38', '2025-05-11 07:44:09'),
(3, 'CRTCB-LD-66C', 1, '2025-05-10 13:27:38', '2025-05-10 18:24:59'),
(4, 'CRTCB-LD-66D', 1, '2025-05-10 13:27:38', '2025-05-10 13:27:38'),
(5, 'CRTCB-LD-66E', 1, '2025-05-10 13:27:38', '2025-05-10 13:27:38'),
(6, 'CRTCB-LD-66F', 0, '2025-05-10 13:27:38', '2025-05-10 13:27:38'),
(7, 'CRTCB-LD-66G', 1, '2025-05-10 13:27:38', '2025-05-10 13:27:38'),
(8, 'CRTCB-LD-66H', 1, '2025-05-10 13:27:38', '2025-05-10 13:27:38'),
(9, 'CRTCB-LD-66X', 0, '2025-05-10 17:15:49', '2025-05-10 18:25:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `autores`
--

CREATE TABLE `autores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_autor` varchar(100) NOT NULL,
  `status_autor` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `autores`
--

INSERT INTO `autores` (`id`, `nome_autor`, `status_autor`, `created_at`, `updated_at`) VALUES
(1, 'Lis Soares', 1, '2025-04-08 19:30:53', '2025-05-07 06:06:54'),
(2, 'Clarice Lispector', 1, '2025-04-08 19:30:53', '2025-04-08 19:30:53'),
(3, 'Jorge Amado', 1, '2025-04-08 19:30:53', '2025-04-08 19:30:53'),
(4, 'Cecília Meireles', 1, '2025-04-08 19:30:53', '2025-04-08 19:30:53'),
(5, 'Tiago Soares', 1, '2025-04-24 01:01:50', '2025-04-26 00:09:04'),
(6, 'Daniel Silva', 1, '2025-04-24 01:02:34', '2025-05-07 06:06:33'),
(7, 'Agnel Soares', 1, '2025-04-25 18:15:38', '2025-04-25 18:50:42'),
(11, 'Maria rita', 1, '2025-04-26 00:09:17', '2025-04-26 00:09:17'),
(12, 'Jucy Soares', 1, '2025-04-27 17:24:32', '2025-05-10 18:15:24'),
(13, 'Iza Soares', 0, '2025-04-27 17:39:55', '2025-05-07 06:13:23'),
(14, 'Marcos silva', 1, '2025-05-06 00:23:44', '2025-05-10 18:18:38'),
(15, 'Lidia Silva', 0, '2025-05-07 05:30:46', '2025-05-10 18:15:36'),
(16, 'Julião Brito', 1, '2025-05-10 18:19:13', '2025-05-10 18:24:00'),
(17, 'Ana Reis', 1, '2025-05-10 18:31:03', '2025-05-11 07:28:13'),
(18, 'Rebeca Oliveira', 1, '2025-05-11 07:28:50', '2025-05-11 07:28:50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('3d354e836ac568c4e2d2e8516c1377b6', 'i:1;', 1746974161),
('3d354e836ac568c4e2d2e8516c1377b6:timer', 'i:1746974161;', 1746974161),
('c6cb8c25011f7b27bc892dd90e835ac6', 'i:2;', 1745589987),
('c6cb8c25011f7b27bc892dd90e835ac6:timer', 'i:1745589987;', 1745589987),
('tiago.soares@gmail.com|127.0.0.1', 'i:2;', 1745589987),
('tiago.soares@gmail.com|127.0.0.1:timer', 'i:1745589987;', 1745589987);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `editoras`
--

CREATE TABLE `editoras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_editora` varchar(100) NOT NULL,
  `cidade_editora` varchar(70) NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `status_editora` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `editoras`
--

INSERT INTO `editoras` (`id`, `nome_editora`, `cidade_editora`, `estado_id`, `status_editora`, `created_at`, `updated_at`) VALUES
(29, 'Palavra de Ouro', 'Maceió', 2, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(30, 'Editora do Sol', 'Macapá', 3, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(31, 'Cultura Amazônica', 'Manaus', 4, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(32, 'Bahia Cultura', 'Salvador', 5, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(33, 'Escrita Viva', 'Fortaleza', 6, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(34, 'Editora Centro Oeste', 'Brasília', 7, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(35, 'Capixaba Books', 'Vitória', 8, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(36, 'Goiás Saber', 'Goiânia', 9, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(37, 'Nordeste Letras', 'São Luís', 10, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(38, 'Mato Letras', 'Cuiabá', 11, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(39, 'Pantanal Books', 'Campo Grande', 12, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(40, 'Minas Publicações', 'Belo Horizonte', 13, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(41, 'Literarte Pará', 'Belém', 14, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(42, 'Paraíba Editora', 'João Pessoa', 15, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(43, 'Saber Paranaense', 'Curitiba', 16, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(44, 'Pernambuco Letras', 'Recife', 17, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(45, 'Sabedoria Piauí', 'Teresina', 18, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(46, 'Carioca Editora', 'Rio de Janeiro', 19, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(47, 'Letra Livre', 'Natal', 20, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(48, 'Sul Livros', 'Porto Alegre', 21, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(49, 'Editora Rondônia', 'Porto Velho', 22, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(50, 'Palavra Rara', 'Boa Vista', 23, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(51, 'Catarina Letras', 'Florianópolis', 24, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(52, 'Paulista Editora', 'São Paulo', 25, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(53, 'Sergipe Livros', 'Aracaju', 26, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(54, 'Editora Tocantins', 'Palmas', 27, 1, '2025-05-11 16:04:20', '2025-05-11 16:04:20'),
(56, 'Saberes do Norte', 'Rio Branco', 1, 1, '2025-05-11 19:23:44', '2025-05-11 19:45:37'),
(57, 'Editora A', 'São paualo', 25, 0, '2025-05-11 19:46:25', '2025-05-11 19:46:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_estado` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `estados`
--

INSERT INTO `estados` (`id`, `nome_estado`, `created_at`, `updated_at`) VALUES
(1, 'Acre-AC', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(2, 'Alagoas-AL', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(3, 'Amapá-AP', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(4, 'Amazonas-AM', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(5, 'Bahia-BA', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(6, 'Ceará-CE', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(7, 'Distrito Federal-DF', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(8, 'Espírito Santo-ES', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(9, 'Goiás-GO', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(10, 'Maranhão-MA', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(11, 'Mato Grosso-MT', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(12, 'Mato Grosso do Sul-MS', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(13, 'Minas Gerais-MG', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(14, 'Pará-PA', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(15, 'Paraíba-PB', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(16, 'Paraná-PR', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(17, 'Pernambuco-PE', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(18, 'Piauí-PI', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(19, 'Rio de Janeiro-RJ', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(20, 'Rio Grande do Norte-RN', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(21, 'Rio Grande do Sul-RS', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(22, 'Rondônia-RO', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(23, 'Roraima-RR', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(24, 'Santa Catarina-SC', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(25, 'São Paulo-SP', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(26, 'Sergipe-SE', '2025-05-11 16:03:06', '2025-05-11 16:03:06'),
(27, 'Tocantins-TO', '2025-05-11 16:03:06', '2025-05-11 16:03:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `generos`
--

CREATE TABLE `generos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_genero` varchar(100) NOT NULL,
  `status_genero` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `generos`
--

INSERT INTO `generos` (`id`, `nome_genero`, `status_genero`, `created_at`, `updated_at`) VALUES
(11, 'História', 1, '2025-05-10 22:23:32', '2025-05-11 07:30:25'),
(12, 'Conto de Fadas', 1, '2025-05-10 22:23:32', '2025-05-10 22:23:32'),
(13, 'Fantasia', 1, '2025-05-10 22:23:32', '2025-05-10 22:23:32'),
(14, 'Fábula', 1, '2025-05-10 22:23:32', '2025-05-10 22:23:32'),
(15, 'Mistério', 1, '2025-05-10 22:23:32', '2025-05-10 22:23:32'),
(16, 'Humor', 1, '2025-05-10 22:23:32', '2025-05-10 22:23:32'),
(17, 'Poesia', 1, '2025-05-10 22:23:32', '2025-05-10 22:23:32'),
(18, 'Clássicos Infantis', 1, '2025-05-10 22:23:32', '2025-05-10 22:23:32'),
(19, 'Aventura', 1, '2025-05-10 22:23:32', '2025-05-11 07:29:31'),
(20, 'História em Quadrinhos', 1, '2025-05-10 22:23:32', '2025-05-10 22:23:32'),
(21, 'Sportes', 0, '2025-05-11 02:03:30', '2025-05-11 02:03:39');

-- --------------------------------------------------------

--
-- Estrutura para tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_28_154116_add_two_factor_columns_to_users_table', 1),
(5, '2025_03_28_154154_create_personal_access_tokens_table', 1),
(6, '2025_03_28_155626_create_products_table', 2),
(7, '2025_03_29_021544_add_category_to_products_table', 3),
(12, '2025_04_08_192925_create_autores_table', 4),
(13, '2025_05_10_130739_create_acervos_table', 4),
(14, '2025_05_10_221736_create_generos_table', 5),
(15, '2025_05_10_234618_create_editoras_table', 6),
(16, '2025_05_11_020611_create_editoras_table', 7),
(17, '2025_05_11_154406_create_estados_table', 8),
(18, '2025_05_11_154513_create_editora_table', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `obras`
--

CREATE TABLE `obras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `edicao` int(11) DEFAULT NULL,
  `ano` year(4) DEFAULT NULL,
  `copia` int(11) NOT NULL,
  `acervo` varchar(20) DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `editora` varchar(60) DEFAULT NULL,
  `situacao` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(42, 'Jantinha serve duas pessoas', 'Arroz, feijão tropeiro, mandioca, vinagrete', 'Jantinha', 45.00, 'images/products/ohJ8Y77GWeq3jBZh6Nq4YcuR1CxJ3x4nhlU1nR1U.jpg', 1, '2025-04-05 04:12:22', '2025-04-13 06:16:32'),
(58, 'Jantinha serve duas pessoas', 'Arroz, feijão tropeiro, vinagrete, mandioca', 'Jantinha', 45.00, 'images/products/D8NbQXbe2SgbaqlllnVlZh99Nl3US0hV59R04yxE.jpg', 1, '2025-04-07 21:30:04', '2025-04-07 21:30:04'),
(59, 'Picole', 'Picole dosinho', 'Jantinha', 1.00, NULL, 1, '2025-04-07 22:34:04', '2025-04-08 20:33:18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rzFbggMPOnNA6rBd1q6ZBdgR6mUJ3XQsSRMLbkbi', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTElRUVBIMFdPS1lFWENZZmJMMHNkcDRCanRGQ1RrYVJVWkdtODF2YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdXRvcmVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiQ5dXJtTmVEbmF3ei5wQS85NnlXcC9PQWVSN2lCc3dKLzlPOUw5NzRBSld6Y2tQS1dsUUxPNiI7fQ==', 1746982082);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Tiago Soares', 'tsgo.soares@gmail.com', NULL, '$2y$12$9urmNeDnawz.pA/96yWp/OAeR7iBswJ/9O9L974AJWzckPKWlQLO6', NULL, NULL, NULL, 'vKiyzkbu8PmwQzTKYhQDE2NY7kxee1U35KD9PISRNESDNRNI4Y24XRml0g14', NULL, NULL, '2025-03-28 18:44:48', '2025-03-28 19:14:32');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acervos`
--
ALTER TABLE `acervos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `editoras_unique_index` (`nome_editora`,`cidade_editora`,`estado_id`),
  ADD KEY `editora_estado_id_foreign` (`estado_id`);

--
-- Índices de tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices de tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acervos`
--
ALTER TABLE `acervos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `autores`
--
ALTER TABLE `autores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `editoras`
--
ALTER TABLE `editoras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `obras`
--
ALTER TABLE `obras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `editoras`
--
ALTER TABLE `editoras`
  ADD CONSTRAINT `editora_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
