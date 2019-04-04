-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2019 a las 22:04:46
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gds`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`id`, `seccion`, `data`, `created_at`, `updated_at`) VALUES
(1, 'home', '{\"titulo\":\"Somos especialistas en Control de Accesos\",\"texto\":\"<p>El control de acceso de personal aporta grandes beneficios en administraci&oacute;n y en la seguridad habitual.<\\/p>\\r\\n\\r\\n<p><span style=\\\"color:#007953\\\">GSD TECNOLOGIA<\\/span> desarrolla, fabrica, provee e instala software y hardware para el control de Acceso de personal y vehicular.<\\/p>\",\"img\":\"images\\/general\\/home\\/1554388617.png\",\"opciones\":[{\"img\":\"images\\/general\\/home\\/1554387158_opciones_1.png\",\"titulo\":\"Empresas y oficinas\"},{\"img\":\"images\\/general\\/home\\/1554387158_opciones_3.png\",\"titulo\":\"Clubes y natatorios\"},{\"img\":\"images\\/general\\/home\\/1554387158_opciones_2.png\",\"titulo\":\"Gimnasios\"}]}', '2019-04-04 13:44:17', '2019-04-04 19:11:10'),
(2, 'empresa', '{\"acerca\":{\"titulo\":\"Acerca de GDS Tecnolog\\u00eda\",\"texto\":\"<p>Grupo Silicon Dinap SRL es una empresa dedicada desde el a&ntilde;o 1998 al desarrollo de software y hardware que cuenta con un plantel especializado de profesionales y t&eacute;cnicos con experiencia y trayectoria en aplicaciones destinadas a implementaciones integrales de control de acceso de personal, vehicular, procesos productivos automatizados. Como factor determinante para el futuro de la organizaci&oacute;n se mantiene permanente la inquietud innovadora incorporando nuevas y mejores herramientas de dise&ntilde;o para satisfacer a los clientes y acompa&ntilde;arlos en el an&aacute;lisis de proyectos para la mejor toma de decisiones.<\\/p>\",\"opciones\":[{\"numero\":\"1998\",\"nombre\":\"m\\u00e1s de 20 a\\u00f1os de trayector\\u00eda\"},{\"numero\":\"100\",\"nombre\":\"gimnasios instalados en el pa\\u00eds\"},{\"numero\":\"20\",\"nombre\":\"desde 1998 trabajando en rubro\"}]},\"mision\":{\"titulo\":\"Misi\\u00f3n\",\"texto\":\"<p>Ofrecer a nuestros clientes y a la comunidad <span style=\\\"color:#007954\\\">soluciones tecnol&oacute;gicas<\\/span> y gesti&oacute;n de negocios de excelencia. Orientando nuestra conducta sobre la base del compromiso en la <span style=\\\"color:#007954\\\">calidad de procesos y servicios<\\/span>. La misi&oacute;n de <span style=\\\"color:#007954\\\">GSD TECNOLOG&Iacute;A<\\/span> consiste en asegurar la oferta de una <span style=\\\"color:#007954\\\">amplia gama de soluciones<\\/span> para el mercado, somos especialistas en el control de accesos, optimizando nuestros sistemas al requerimiento de nuestros clientes, con excelencia de calidad y alto respaldo tecnol&oacute;gico.&nbsp;<\\/p>\"},\"valor\":{\"titulo\":\"Valores y Visi\\u00f3n\",\"texto\":\"<p>El control de acceso de personal en edificios de oficinas y empresas es de las inversiones m&aacute;s consideradas dado el gran beneficio que aporta tanto a recursos humanos en el proceso de liquidaci&oacute;n de haberes como en la seguridad habitual, facilitando el control de visitas, personal de planta estable y personal eventual. <span style=\\\"color:#007954\\\">GSD TECNOLOG&Iacute;A desarrolla, fabrica, provee e instala software y hardware<\\/span> para el control de Acceso de personal y vehicular en todos sus aspectos.<\\/p>\"}}', '2019-04-04 17:40:15', '2019-04-04 18:25:09'),
(3, 'ecobruma', '{\"texto\":\"<p>&ldquo;EcoBruma&rdquo; est&aacute; dise&ntilde;ado para <span style=\\\"color:#007954\\\">refrigerar grandes ambientes al aire libre o espacios cubiertos<\\/span> como gimnasios, restaurantes, parrillas, terrazas, salones de exposiciones, estadios, dep&oacute;sitos, galpones de empaque de fruta, y superficies donde la implementaci&oacute;n de aire acondicionado es poco efectiva o demasiado costosa. Novedoso sistema de climatizaci&oacute;n para grandes espacios de bajo costo, ecol&oacute;gico y f&aacute;cil implementaci&oacute;n.<\\/p>\\r\\n\\r\\n<p><strong><span style=\\\"color:#ff7100\\\">M&eacute;todo de refrigeraci&oacute;n<\\/span><\\/strong><\\/p>\\r\\n\\r\\n<p>La evaporaci&oacute;n del sudor de la superficie de la piel donde se transfiere al ambiente el calor regulando la temperatura corporal es b&aacute;sicamente el &nbsp;ejemplo t&iacute;pico del m&eacute;todo que se utiliza para bajar la temperatura ambiente por nuestro sistema. Para la automatizaci&oacute;n de los ciclos de nebulizaci&oacute;n contamos con un controlador microprocesado que permite la programaci&oacute;n del accionamiento de la bomba permitiendo la dosificaci&oacute;n de la niebla para hacer efectiva la refrigeraci&oacute;n y evitar la condensanci&oacute;n. &nbsp;Opcionalmente se pueden administrar varios sectores permitiendo definir tiempo y frecuencia comandando v&aacute;lvulas de dosificaci&oacute;n.<\\/p>\",\"video\":\"JkK8g6FMEXE\",\"dinamica\":{\"titulo\":\"Din\\u00e1mica t\\u00e9rmica\",\"texto\":\"<p>Nuestro sistema utiliza agua en estado natural sujeta a presi&oacute;n por medio de bombeo, pasa por picos especiales donde es nebulizada y evaporada logrando disminu&iacute;r la temperatura sustancialmente. La niebla generada y suspendida por nuestro sistema puede ser distribu&iacute;da en forma natural por la brisa en ambientes abiertos o forzada por ventiladores para optimizar el alcance tanto en espacios cerrados como al aire libre.<\\/p>\"},\"aplicaciones\":{\"titulo\":\"Aplicaciones\",\"texto\":\"<p>La utilizaci&oacute;n del sistema de refrigeraci&oacute;n <span style=\\\"color:#007954\\\">EcoBruma<\\/span> tiene diversas aplicaciones ya sea para <span style=\\\"color:#007954\\\">refrigerar grandes ambientes al aire libre o espacios cubiertos<\\/span> como gimnasios, restaurantes, parrillas, terrazas, salones de exposiciones, estadios, dep&oacute;sitos, galpones de empaque de fruta, y superficies donde la implementaci&oacute;n de aire acondicionado es poco efectiva o demasiado costosa.<\\/p>\"},\"caracteristicas\":[{\"img\":\"images\\/general\\/ecobruma\\/1554398622_caracteristicas_1.png\",\"titulo\":\"Se adapta a  ventiladores existentes\"},{\"img\":\"images\\/general\\/ecobruma\\/1554398622_caracteristicas_2.png\",\"titulo\":\"Gimnasios y salas de  actividades grupales\"},{\"img\":\"images\\/general\\/ecobruma\\/1554398622_caracteristicas_3.png\",\"titulo\":\"Agradable sensaci\\u00f3n de frescura\"},{\"img\":\"images\\/general\\/ecobruma\\/1554398622_caracteristicas_4.png\",\"titulo\":\"F\\u00e1cil instalaci\\u00f3n y bajo mantenimiento\"},{\"img\":\"images\\/general\\/ecobruma\\/1554398622_caracteristicas_5.png\",\"titulo\":\"Sistema ecol\\u00f3gico y de bajo consumo\"}]}', '2019-04-04 18:37:25', '2019-04-04 20:29:32'),
(6, 'videos', '[{\"titulo\":\"Refrigeraci\\u00f3n Evaporativa en Industrias\",\"video\":\"NMNgbISmF4I\"},{\"titulo\":\"Cron\\u00f3metro Programable\",\"video\":\"8SbUC-UaAxE\"},{\"titulo\":\"Control de parking y flotas\",\"video\":\"ErvgV4P6Fzc\"}]', '2019-04-04 20:49:26', '2019-04-04 21:22:07'),
(7, 'clientes', '{\"texto\":\"<p>D&iacute;a a d&iacute;a trabajamos en proyectos para empresas de primera l&iacute;nea. Trabajamos con un equipo de profesionales y t&eacute;cnicos capacitados en reconocer las necesidades de nuestros clientes y brindar nuestros servicios de la manera m&aacute;s eficiente.<\\/p>\\r\\n\\r\\n<p>A continuaci&oacute;n algunas de las empresas con las que trabajamos.<\\/p>\",\"listado\":[{\"img\":\"images\\/general\\/clientes\\/1554405515_clientes_1.png\",\"nombre\":\"Metrogas\"},{\"img\":\"images\\/general\\/clientes\\/1554405515_clientes_2.png\",\"nombre\":\"Megatlon\"},{\"img\":\"images\\/general\\/clientes\\/1554405515_clientes_3.png\",\"nombre\":\"Open Park\"},{\"img\":\"images\\/general\\/clientes\\/1554405515_clientes_4.png\",\"nombre\":\"Well Club\"}]}', '2019-04-04 21:25:11', '2019-04-04 22:18:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `redes` text COLLATE utf8mb4_unicode_ci,
  `img` text COLLATE utf8mb4_unicode_ci,
  `domicilio` text COLLATE utf8mb4_unicode_ci,
  `tel` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metadatos`
--

CREATE TABLE `metadatos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_03_31_213217_create_contenidos_table', 1),
(4, '2019_03_31_214025_create_familias_table', 1),
(5, '2019_03_31_214107_create_productos_table', 2),
(6, '2019_03_31_214133_create_productosimg_table', 2),
(7, '2019_03_31_214302_create_productosrelacion_table', 2),
(8, '2019_03_31_214348_create_proyecto_table', 2),
(9, '2019_03_31_220741_create_slider_table', 2),
(10, '2019_03_31_220806_create_empresa_table', 2),
(11, '2019_03_31_220832_create_metadato_table', 2);

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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci,
  `destacado` tinyint(1) NOT NULL DEFAULT '0',
  `familia_id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosimg`
--

CREATE TABLE `productosimg` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosrelacion`
--

CREATE TABLE `productosrelacion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `producto_relacion` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `orden` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seccion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `orden` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `img`, `seccion`, `texto`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'images/sliders/home/1554374651.jpg', 'home', '<p>Texto</p>', 'aa', '2019-04-04 13:44:11', '2019-04-04 13:44:11'),
(2, 'images/sliders/empresa/1554388797.jpg', 'empresa', '<p>DESDE EL A&Ntilde;O 1998</p>\r\n\r\n<p>M&aacute;s de&nbsp;20 a&ntilde;os en el rubro</p>', 'aa', '2019-04-04 17:39:57', '2019-04-04 17:39:57'),
(3, 'images/sliders/ecobruma/1554391992.jpg', 'ecobruma', NULL, 'aa', '2019-04-04 18:33:12', '2019-04-04 18:33:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pablo', 'pablo', NULL, NULL, '$2y$10$0XB3rQp4bPzyr5IUOxNIqODxNANzMCwNzbne7BK0BXgr5OvuD3r6q', 1, NULL, '2019-04-01 03:18:55', '2019-04-01 03:18:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
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
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_familia_id_foreign` (`familia_id`);

--
-- Indices de la tabla `productosimg`
--
ALTER TABLE `productosimg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productosimg_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `productosrelacion`
--
ALTER TABLE `productosrelacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyectos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metadatos`
--
ALTER TABLE `metadatos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productosimg`
--
ALTER TABLE `productosimg`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productosrelacion`
--
ALTER TABLE `productosrelacion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_familia_id_foreign` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productosimg`
--
ALTER TABLE `productosimg`
  ADD CONSTRAINT `productosimg_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
