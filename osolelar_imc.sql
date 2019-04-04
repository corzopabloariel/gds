-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-04-2019 a las 06:45:52
-- Versión del servidor: 10.2.22-MariaDB-cll-lve
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `osolelar_imc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documento` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`, `lugar`, `order`, `documento`, `created_at`, `updated_at`) VALUES
(2, '{\"esp\":\"CERTIFICADO\",\"ing\":\"CERTIFICATE\",\"ita\":\"CERTIFICATO\"}', 'calidad', 'aa', '{\"esp\":\"documents\\/1553788581.jpg\",\"ing\":\"documents\\/1554133406.jpg\",\"ita\":\"documents\\/1554133546.jpg\"}', '2019-03-18 02:07:22', '2019-04-01 18:45:46'),
(3, '{\"esp\":\"PLAN DE CALIDAD\",\"ing\":\"QUALITY PLAN\",\"ita\":\"PIANO DI QUALIT\\u00c0\"}', 'calidad', 'BB', '{\"esp\":\"documents\\/1553788594.jpg\",\"ing\":\"documents\\/1553788594.jpg\",\"ita\":\"documents\\/1554133606.jpg\"}', '2019-03-18 02:07:54', '2019-04-01 18:46:46'),
(4, '{\"esp\":\"DESCARGAR BROCHURE\",\"ing\":\"DOWNLOAD BROCHURE\",\"ita\":null}', 'prensa', 'aa', '{\"esp\":\"documents\\/1553870311.pdf\",\"ing\":\"documents\\/1553824669.jpg\",\"ita\":null}', '2019-03-18 02:11:16', '2019-03-29 17:38:31'),
(5, '{\"esp\":\"DESCARGAR CARPETA IMC\",\"ing\":\"DOWNLOAD IMC\",\"ita\":null}', 'prensa', 'BB', '{\"esp\":\"documents\\/1553824693.jpg\",\"ing\":\"documents\\/1553824693.jpg\",\"ita\":null}', '2019-03-18 02:11:48', '2019-03-29 04:58:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `order`, `image`, `created_at`, `updated_at`) VALUES
(1, 'FMC', 'aa', 'images/clientes/1552857488.png', '2019-03-17 20:23:25', '2019-03-18 00:18:08'),
(2, 'Toyota', 'bb', 'images/clientes/1552857522.png', '2019-03-18 00:18:42', '2019-03-18 00:18:42'),
(3, 'Esso', 'CC', 'images/clientes/1552857558.png', '2019-03-18 00:19:18', '2019-03-18 00:19:18'),
(4, 'Petrobras', 'DD', 'images/clientes/1552857659.png', '2019-03-18 00:20:59', '2019-03-18 00:20:59'),
(5, 'Grupo DEMA', 'ee', 'images/clientes/1552857735.png', '2019-03-18 00:22:15', '2019-03-18 00:22:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lugar` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`id`, `lugar`, `data`, `created_at`, `updated_at`) VALUES
(1, 'home', '{\"servicios_esp\":\"Servicio de Ingenier\\u00eda, Construcci\\u00f3n, Montajes Industriales, Montajes Civiles, Montajes El\\u00e9ctricos e instrumentos\",\"servicios_ing\":\"Service of Engineering, Construction, Industrial Assemblies, Civil Assemblies, Electrical Assemblies and instruments\",\"servicios_ita\":\"Servizio di ingegneria, costruzione, assemblee industriali, assemblee civili, assemblaggi e strumenti elettrici\",\"slogan_esp\":\"Una empresa destacada por su profesionalismo, seriedad y excelencia\",\"slogan_ing\":\"A company known for its professionalism, seriousness and excellence\",\"slogan_ita\":\"Una societ\\u00e0 nota per la sua professionalit\\u00e0, seriet\\u00e0 ed eccellenza\"}', '2019-03-16 04:51:15', '2019-04-01 18:06:34'),
(2, 'nosotros', '{\"nosotros_esp\":\"<p>IMC es una empresa involucrada en desarrollos de Ingenier&iacute;as, Construcciones, Montajes, Operaciones y Mantenimiento de Plantas Industriales, como as&iacute; tambien de Redes de Servicios; capaz de concretar los Objetivos propuestos por nuestros Clientes, llevando a cabo la Ejecuci&oacute;n de los Proyectos Asignados.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>Con el correr de los a&ntilde;os hemos consolidado y forjado una s&oacute;lida experiencia y trayectoria en materia de Seguridad, Salud y Medio Ambiente, Calidad y Responsabilidad; transitando el camino de la capacitaci&oacute;n, instrucci&oacute;n y verificaci&oacute;n de culturas y normas de trabajo asociadas a dichas &aacute;reas.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>Nuestra empresa est&aacute; capacitada para aforntar los distintos requerimientos propuestos por los usuarios; gestionando y actuando de forma responsable y eficaz, e involucrandose en sus objetivos de manera de hacerlos propios.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\",\"nosotros_ing\":\"<p>IMC is a company involved in the development of Engineering, Construction, Assembly, Operations and Maintenance of Industrial Plants, as well as Service Networks; capable of specifying the Objectives proposed by our Clients, carrying out the Execution of the Assigned Projects.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>Over the years we have consolidated and forged a solid experience and track record in the areas of Safety, Health and Environment, Quality and Responsibility; transiting the path of training, instruction and verification of cultures and work standards associated with these areas.<\\/p>\\r\\n\\r\\n<p><br \\/>\\r\\nOur company is qualified to meet the different requirements proposed by the users; managing and acting responsibly and effectively, and getting involved in their objectives in order to make them their own.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\",\"nosotros_ita\":\"<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>IMC &egrave; una societ&agrave; impegnata nello sviluppo di ingegneria, costruzione, montaggio, operazioni e manutenzione di impianti industriali, nonch&eacute; reti di servizi; in grado di specificare gli obiettivi proposti dai nostri clienti, eseguendo l&#39;esecuzione dei progetti assegnati.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>Nel corso degli anni abbiamo consolidato e forgiato una solida esperienza e track record nei settori della sicurezza, salute e ambiente, qualit&agrave; e responsabilit&agrave;; transitando nel percorso di formazione, istruzione e verifica delle culture e degli standard lavorativi associati a queste aree<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>La nostra azienda &egrave; addestrato per soddisfare le diverse esigenze proposte dagli utenti; gestendo e agendo responsabilmente ed efficacemente e coinvolgendoli nei loro obiettivi per farli propri.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\",\"mercado_esp\":\"<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\\r\\n\\t<tbody>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<td>\\r\\n\\t\\t\\t<ul>\\r\\n\\t\\t\\t\\t<li>Industria Aceitera<\\/li>\\r\\n\\t\\t\\t\\t<li>Industria Alimenticia<\\/li>\\r\\n\\t\\t\\t\\t<li>Industria Automotriz<\\/li>\\r\\n\\t\\t\\t\\t<li>Industria Cervecera<\\/li>\\r\\n\\t\\t\\t\\t<li>Industria de Bebidas<\\/li>\\r\\n\\t\\t\\t<\\/ul>\\r\\n\\t\\t\\t<\\/td>\\r\\n\\t\\t\\t<td>\\r\\n\\t\\t\\t<ul>\\r\\n\\t\\t\\t\\t<li>Industria Energ&eacute;tica<\\/li>\\r\\n\\t\\t\\t\\t<li>Industria Gas, Agua y<br \\/>\\r\\n\\t\\t\\t\\tElectricidad<\\/li>\\r\\n\\t\\t\\t\\t<li>Industria L&aacute;ctea<\\/li>\\r\\n\\t\\t\\t\\t<li>Industria Minera<\\/li>\\r\\n\\t\\t\\t<\\/ul>\\r\\n\\t\\t\\t<\\/td>\\r\\n\\t\\t\\t<td>\\r\\n\\t\\t\\t<ul>\\r\\n\\t\\t\\t\\t<li>Industria Nuclear<\\/li>\\r\\n\\t\\t\\t\\t<li>Industria Petrolera<\\/li>\\r\\n\\t\\t\\t\\t<li>Industrias Qu&iacute;micas<br \\/>\\r\\n\\t\\t\\t\\ty Petroqu&iacute;micas<\\/li>\\r\\n\\t\\t\\t\\t<li>Obras P&uacute;blicas<\\/li>\\r\\n\\t\\t\\t<\\/ul>\\r\\n\\t\\t\\t<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t<\\/tbody>\\r\\n<\\/table>\",\"mercado_ing\":\"<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\\r\\n\\t<tbody>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<td>\\r\\n\\t\\t\\t<ul>\\r\\n\\t\\t\\t\\t<li>Oil industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Food industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Automotive industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Brewing industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Beverage Industry<\\/li>\\r\\n\\t\\t\\t<\\/ul>\\r\\n\\t\\t\\t<\\/td>\\r\\n\\t\\t\\t<td>\\r\\n\\t\\t\\t<ul>\\r\\n\\t\\t\\t\\t<li>Energetic industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Gas industry, water and<\\/li>\\r\\n\\t\\t\\t\\t<li>Electricity<\\/li>\\r\\n\\t\\t\\t\\t<li>Dairy industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Mining industry<\\/li>\\r\\n\\t\\t\\t<\\/ul>\\r\\n\\t\\t\\t<\\/td>\\r\\n\\t\\t\\t<td>\\r\\n\\t\\t\\t<ul>\\r\\n\\t\\t\\t\\t<li>Nuclear Industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Oil industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Chemical Industries<br \\/>\\r\\n\\t\\t\\t\\tand Petrochemicals<\\/li>\\r\\n\\t\\t\\t\\t<li>Public Works<\\/li>\\r\\n\\t\\t\\t<\\/ul>\\r\\n\\t\\t\\t<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t<\\/tbody>\\r\\n<\\/table>\",\"mercado_ita\":\"<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\\r\\n\\t<tbody>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<td>\\r\\n\\t\\t\\t<ul>\\r\\n\\t\\t\\t\\t<li>Oil industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Food industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Automotive industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Brewing industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Beverage Industry<\\/li>\\r\\n\\t\\t\\t<\\/ul>\\r\\n\\t\\t\\t<\\/td>\\r\\n\\t\\t\\t<td>\\r\\n\\t\\t\\t<ul>\\r\\n\\t\\t\\t\\t<li>Energetic industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Gas industry, water and<\\/li>\\r\\n\\t\\t\\t\\t<li>Electricity<\\/li>\\r\\n\\t\\t\\t\\t<li>Dairy industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Mining industry<\\/li>\\r\\n\\t\\t\\t<\\/ul>\\r\\n\\t\\t\\t<\\/td>\\r\\n\\t\\t\\t<td>\\r\\n\\t\\t\\t<ul>\\r\\n\\t\\t\\t\\t<li>Nuclear Industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Oil industry<\\/li>\\r\\n\\t\\t\\t\\t<li>Chemical Industries<br \\/>\\r\\n\\t\\t\\t\\tand Petrochemicals<\\/li>\\r\\n\\t\\t\\t\\t<li>Public Works<\\/li>\\r\\n\\t\\t\\t<\\/ul>\\r\\n\\t\\t\\t<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t<\\/tbody>\\r\\n<\\/table>\"}', '2019-03-16 05:16:42', '2019-04-01 18:27:38'),
(3, 'calidad', '{\"calidad_esp\":\"IMC siempre tuvo como exigencia personal el control de calidad de nuestra empresa. Este control se aplica estrictamente tanto en proyectos llave en mano como en la realizaci\\u00f3n de proyectos m\\u00e1s complejos. Por este motivo en el a\\u00f1o 2015 buscamos certificar con la ISO 9001...\",\"calidad_ing\":\"IMC always had the quality control of our company as a personal requirement. This control is strictly applied both in turnkey projects and in the realization of more complex projects. For this reason in 2015 we seek to certify with ISO 9001 ...\",\"calidad_ita\":\"IMC always had the quality control of our company as a personal requirement. This control is strictly applied both in turnkey projects and in the realization of more complex projects. For this reason in 2015 we seek to certify with ISO 9001 ...\"}', '2019-03-17 05:36:11', '2019-03-22 04:27:31'),
(4, 'prensa', '{\"slogan_esp\":\"\\\"ENTENDEMOS QUE VUESTRO OBJETIVO ES EL NUESTRO\\\"\",\"slogan_ing\":\"\\\"WE UNDERSTAND THAT YOUR OBJECTIVE IS OURSELVES\\\"\",\"slogan_ita\":\"\\\"ABBIAMO CAPITO CHE IL TUO OBIETTIVO \\u00c8 STATO NOI\\\"\"}', '2019-03-17 19:23:49', '2019-04-01 21:21:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresacontactos`
--

CREATE TABLE `empresacontactos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto_ba` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto_nq` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresacontactos`
--

INSERT INTO `empresacontactos` (`id`, `email`, `contacto_ba`, `contacto_nq`, `created_at`, `updated_at`) VALUES
(1, '[\"info@imcarg.com\"]', '[\"011 4207 - 4921\",\"011 3534 - 0588\",\"011 3974 - 2958\"]', '[\"0299 15-413-8799\"]', '2019-03-18 20:55:10', '2019-03-25 14:13:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresaimagenes`
--

CREATE TABLE `empresaimagenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresaimagenes`
--

INSERT INTO `empresaimagenes` (`id`, `data`, `created_at`, `updated_at`) VALUES
(1, '{\"logo\":\"images\\/logos\\/logo.fw.png\",\"favicon\":null}', '2019-03-18 21:53:42', '2019-03-18 22:39:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio_ba` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio_nq` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `domicilio_ba`, `domicilio_nq`, `created_at`, `updated_at`) VALUES
(1, 'IMC', '{\"calle\":\"Boulevard de los Italianos\",\"altura\":\"555\",\"localidad\":\"Wilde\",\"cp\":\"B1874DGK\"}', '{\"calle\":\"Diagonal 25 de Mayo\",\"altura\":\"286\",\"localidad\":\"Capital\",\"cp\":\"Piso 3 - Oficina 13\"}', '2019-03-18 20:43:13', '2019-03-25 14:13:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `order`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'AA', '{\"esp\":\"MONTAJES Y DESMONTAJES\",\"ing\":\"ASSEMBLIES AND DISMANTLINGS\",\"ita\":\"MONTAGGI E SMANTELLAMENTI\"}', '2019-03-20 15:59:14', '2019-04-02 10:02:29'),
(2, 'BB', '{\"esp\":\"ADVISER, INGENIER\\u00cdA Y DIRECCI\\u00d3N\",\"ing\":\"ADVISER, ENGINEERING AND MANAGEMENT\",\"ita\":\"CONSIGLIERE, INGEGNERIA E INDIRIZZO\"}', '2019-03-20 15:59:58', '2019-04-02 10:03:13'),
(3, 'cc', '{\"esp\":\"OPERACIONES Y MANTENIMIENTO\",\"ing\":\"OPERATIONS AND MAINTENANCE\",\"ita\":\"OPERAZIONI E MANUTENZIONE\"}', '2019-03-20 16:09:05', '2019-04-02 10:03:32'),
(4, 'DD', '{\"esp\":\"PREFABRICADOS Y CONSTRUCCIONES\",\"ing\":\"PREFABRICATED AND CONSTRUCTIONS\",\"ita\":\"PREFABBRICATO E COSTRUZIONI\"}', '2019-03-20 16:09:32', '2019-04-02 10:03:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metadatos`
--

CREATE TABLE `metadatos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metas` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `metadatos`
--

INSERT INTO `metadatos` (`id`, `descripcion`, `metas`, `created_at`, `updated_at`) VALUES
(1, 'IMC', 'IMC', '2019-03-29 12:05:32', '2019-03-29 12:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_03_14_150906_create_contenido_table', 3),
(5, '2019_03_15_124037_create_empresa_table', 3),
(6, '2019_03_15_160516_create_empresacontacto_table', 3),
(7, '2019_03_17_025306_create_serivicios_table', 4),
(8, '2019_03_17_025306_create_servicios_table', 5),
(9, '2019_03_17_164907_create_clientes_table', 6),
(10, '2019_03_14_003935_create_slider_table', 7),
(12, '2019_03_17_212921_create_archivos_table', 8),
(13, '2019_03_18_184449_create_empresaimagens_table', 9),
(14, '2019_03_18_195531_create_rrhhs_table', 10),
(15, '2019_03_19_234710_create_familias_table', 10),
(16, '2019_03_22_114853_create_metadatos_table', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `idioma` varchar(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `idioma`, `created_at`, `updated_at`) VALUES
(6, 'diseno@osole.es', 'es', '2019-03-29 18:02:42', '2019-03-29 18:02:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rrhhs`
--

CREATE TABLE `rrhhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experiencia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rango` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orientacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rrhhs`
--

INSERT INTO `rrhhs` (`id`, `nombre`, `experiencia`, `rango`, `orientacion`, `provincia`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"esp\":\"Ingenierio\",\"ing\":\"Engineer\",\"ita\":\"Ingegnere\"}', '{\"esp\":\"2 a\\u00f1os en puesto similar\",\"ing\":\"2 years in a similar position\",\"ita\":\"2 anni in una posizione simile\"}', '{\"esp\":\"20 - 30 a\\u00f1os\",\"ing\":\"20 - 30 years\",\"ita\":\"20 - 30 anni\"}', '{\"esp\":\"Civil\",\"ing\":\"Civil\",\"ita\":\"Civile\"}', 'BA', 'AA', '2019-03-20 20:15:46', '2019-04-02 11:11:30'),
(3, '{\"esp\":\"R.R.H.H\",\"ing\":\"R.R.H.H\",\"ita\":\"R.R.H.H\"}', '{\"esp\":\"3 a\\u00f1os en puesto similar\",\"ing\":\"3 years in a similar position\",\"ita\":\"3 anni in una posizione simile\"}', '{\"esp\":\"20 - 40 A\\u00f1os\",\"ing\":\"20 - 40 Years\",\"ita\":\"20 - 40 anni\"}', '{\"esp\":\"Administraci\\u00f3n\",\"ing\":\"Administration\",\"ita\":\"Amministrazione\"}', 'BA', 'bb', '2019-03-21 16:07:46', '2019-04-02 11:12:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `titulo`, `descripcion`, `detalle`, `tipo`, `order`, `icon`, `created_at`, `updated_at`) VALUES
(8, '{\"esp\":\"ADVISER, INGENIER\\u00cdA Y DIRECCI\\u00d3N\",\"ing\":\"ADVISER, ENGINEERING AND ADDRESS\",\"ita\":\"CONSIGLIERE, INGEGNERIA E INDIRIZZO\"}', '{\"esp\":\"C\\u00e1lculos y dise\\u00f1os, seg\\u00fan normas internacionales en diversas \\u00e1reas.\",\"ing\":\"Calculations and designs, according to international standards in various areas.\",\"ita\":\"Calcoli e disegni, secondo gli standard internazionali in varie aree.\"}', '{\"esp\":[\"Ca\\u00f1erias\",\"Recipientes a Presi\\u00f3n\",\"Ventilaci\\u00f3n Industrial\",\"Tanques de almacenamiento\",\"Procesamientos y Secuencias de Soldaduras\"],\"ing\":[],\"ita\":[]}', 'EMP', 'aa', 'images/iconos/1552855381.png', '2019-03-17 23:43:01', '2019-04-01 20:19:16'),
(9, '{\"esp\":\"MONTAJES Y DESMONTAJES INDUSTRIALES\",\"ing\":\"ASSEMBLIES AND INDUSTRIAL DISMONTATIONS\",\"ita\":null}', '{\"esp\":\"Fabricaci\\u00f3n, construcci\\u00f3n y montaje de diferentes proyectos.\",\"ing\":\"Manufacturing, construction and assembly of different projects.\",\"ita\":null}', '{\"esp\":[],\"ing\":[],\"ita\":[]}', 'EMP', 'bb', 'images/iconos/1552856086.png', '2019-03-17 23:54:46', '2019-04-02 02:26:50'),
(10, '{\"esp\":\"OPERACIONES Y MANTENIMIENTO\",\"ing\":\"OPERATIONS AND MAINTENANCE\"}', '{\"esp\":\"Mantenimiento de estructuras varias, manejo de obras, etc.\",\"ing\":\"Maintenance of various structures, works management, etc.\"}', '{\"esp\":[],\"ing\":[],\"ita\":[]}', 'EMP', 'cc', 'images/iconos/1552856276.png', '2019-03-17 23:57:56', '2019-03-22 04:34:55'),
(11, '{\"esp\":\"TRATAMIENTOS SUPERFICIALES, CONSTRUCCI\\u00d3N Y PREFABRICADOS\",\"ing\":\"SUPERFICIAL, CONSTRUCTION AND PREFABRICATED TREATMENTS\"}', '{\"esp\":\"Tratamientos superficiales, construcci\\u00f3n y prefabricados de obras.\",\"ing\":\"Surface treatments, construction and prefabricated works.\"}', '{\"esp\":[],\"ing\":[],\"ita\":[]}', 'EMP', 'dd', 'images/iconos/1553774310.jpg', '2019-03-17 23:59:07', '2019-03-28 14:58:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` char(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto_esp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto_ing` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto_ita` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `lugar`, `texto_esp`, `texto_ing`, `texto_ita`, `order`, `created_at`, `updated_at`) VALUES
(1, 'images/sliders/home/1552853710.jpg', 'home', '<p>MANGMENT BY OBJECTIVES</p>\r\n\r\n<p><strong>&quot;UN ESTILO EN SERVICIOS&quot;</strong></p>', '<p>MANGMENT BY OBJECTIVES</p>\r\n\r\n<p><strong>&quot;A STYLE IN SERVICES&quot;</strong></p>', '<p>MANGIA DA PARTE DI OBIETTIVI</p>\r\n\r\n<p><strong>&quot;UNO STILE IN SERVIZI&quot;</strong></p>', 'AA', '2019-03-17 23:15:10', '2019-04-01 18:16:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajoimagens`
--

CREATE TABLE `trabajoimagens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trabajo_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `trabajoimagens`
--

INSERT INTO `trabajoimagens` (`id`, `image`, `order`, `trabajo_id`, `created_at`, `updated_at`) VALUES
(1, 'images/trabajos/1553376303.jpg', 'AA', 1, '2019-03-24 00:25:03', '2019-03-24 00:25:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empresa` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volumen` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiempo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familia_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `nombre`, `subtitulo`, `descripcion`, `image`, `empresa`, `ubicacion`, `volumen`, `tiempo`, `order`, `familia_id`, `created_at`, `updated_at`) VALUES
(1, 'NATURGY', '{\"esp\":\"Montajes y desmontajes\",\"ing\":\"Assembly and disassembly\",\"ita\":\"Assemblaggio e smontaggio\"}', '{\"esp\":\"Montaje de 2 tanques de acero al carb\\u00f3n de 100 MBLS de capacidad para una planta de congeneraci\\u00f3n.\",\"ing\":\"Installation of 2 carbon steel tanks of 100 MBLS capacity for a congeneration plant.\",\"ita\":\"Installazione di 2 serbatoi in acciaio al carbonio con capacit\\u00e0 di 100 MBLS per un impianto di congenerazione.\"}', NULL, 'Naturgy', 'Gregorio de Laferrere, Buenos Aires', '920 TONS', '{\"esp\":\"4 meses y medio\",\"ing\":\"4 meses y medio\",\"ita\":\"4 meses y medio\"}', 'aa', 1, '2019-03-20 18:14:01', '2019-04-02 09:44:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL COMMENT 'Fecha de autorización',
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_user` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `fecha`, `estado`, `is_admin`, `is_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pablo Cabañuz', 'pablo', NULL, NULL, '$2y$10$lDHardfpTCQyyHjnyhIvFeefUMHFyIvHcfwfOpo0Q9vzP0J1LGDSu', NULL, 0, 1, 0, NULL, '2019-03-14 02:07:46', '2019-03-25 00:53:24'),
(7, 'Florencia', 'florencia', NULL, NULL, '$2y$10$uMssicOQMQQ/Kdvn0eK3lebtf/TP3sJ1RHUr4qjreRatN6FPY7lTu', NULL, 0, 1, 0, NULL, '2019-03-29 17:59:40', '2019-03-29 18:20:40'),
(8, 'Juan Carlos', 'juancarlos', NULL, NULL, '$2y$10$sYKigwWcHiNSwa.20laciurvUu31t4eGQzLiQiaHTJK9rzweLVc6q', NULL, 0, 1, 0, NULL, '2019-03-29 18:00:12', '2019-03-29 18:00:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_password`
--

CREATE TABLE `user_password` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_password`
--

INSERT INTO `user_password` (`id`, `user_id`, `estado`, `created_at`, `updated_at`) VALUES
(15, 2, 1, '2019-03-29 21:46:36', '2019-03-29 21:46:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioclientes`
--

CREATE TABLE `usuarioclientes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  `fecha` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarioclientes`
--

INSERT INTO `usuarioclientes` (`id`, `name`, `username`, `password`, `estado`, `fecha`, `created_at`, `updated_at`) VALUES
(1, 'Florencia', 'florencia', '0ca49a62fbafbd44de016076221a0e9e', 0, '2019-03-30', '2019-03-29 16:11:20', '2019-03-29 16:11:20'),
(2, 'Pepe', 'pepe', '926e27eecdbc7a18858b3798ba99bddd', 1, '2019-03-29', '2019-03-29 16:11:47', '2019-03-29 22:03:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresacontactos`
--
ALTER TABLE `empresacontactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresaimagenes`
--
ALTER TABLE `empresaimagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metadatos`
--
ALTER TABLE `metadatos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `rrhhs`
--
ALTER TABLE `rrhhs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajoimagens`
--
ALTER TABLE `trabajoimagens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_password`
--
ALTER TABLE `user_password`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarioclientes`
--
ALTER TABLE `usuarioclientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empresacontactos`
--
ALTER TABLE `empresacontactos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empresaimagenes`
--
ALTER TABLE `empresaimagenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `metadatos`
--
ALTER TABLE `metadatos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rrhhs`
--
ALTER TABLE `rrhhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `trabajoimagens`
--
ALTER TABLE `trabajoimagens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `user_password`
--
ALTER TABLE `user_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarioclientes`
--
ALTER TABLE `usuarioclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
