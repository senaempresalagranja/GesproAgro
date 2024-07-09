-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2019 a las 22:20:38
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gesproagro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisissensorial_producciones`
--

CREATE TABLE `analisissensorial_producciones` (
  `id` int(11) NOT NULL,
  `produccion_id` int(11) DEFAULT NULL,
  `analisisSensorial_id` int(11) DEFAULT NULL,
  `caracteristica` varchar(20) DEFAULT NULL,
  `atributo` varchar(20) DEFAULT NULL,
  `puntuacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Estructura de tabla para la tabla `analisis_sensorial`
--

CREATE TABLE `analisis_sensorial` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `puntuacion_final` int(11) DEFAULT NULL,
  `analisis_resultado` varchar(45) DEFAULT NULL,
  `aceptacion` varchar(45) DEFAULT NULL,
  `evaluador` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Estructura de tabla para la tabla `bodega_principal`
--

CREATE TABLE `bodega_principal` (
  `id` int(11) NOT NULL,
  `materiaPrima_insumo_id` int(11) DEFAULT NULL,
  `unidad_medida_id` int(11) DEFAULT NULL,
  `numero_lote` varchar(45) DEFAULT NULL,
  `cantidad_entrante` int(11) DEFAULT NULL,
  `precio_total` int(11) DEFAULT NULL,
  `precio_unitario` int(11) DEFAULT NULL,
  `stock_bodega_principal` int(11) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Instructor ', NULL),
(2, 'Instructor Sena Empresa', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

CREATE TABLE `clasificaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clasificaciones`
--

INSERT INTO `clasificaciones` (`id`, `nombre`) VALUES
(1, 'Carne '),
(9, 'Envases'),
(2, 'Frutas y Hortalizas'),
(4, 'Insumos Aditivos '),
(3, 'Insumos Cárnicos'),
(10, 'Laboratorio'),
(5, 'Leche'),
(8, 'Limpieza y Desinfección'),
(11, 'Menaje'),
(7, 'Otros'),
(6, 'Víveres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id`, `nombre`) VALUES
(4, 'Aprobación de Calidad'),
(3, 'Bioinsumos'),
(5, 'Liberación de Productos'),
(1, 'Mercasena'),
(7, 'Otras Unidades Productivas'),
(6, 'Otros'),
(2, 'Sub Bodegas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liberaciones`
--

CREATE TABLE `liberaciones` (
  `id` int(11) NOT NULL,
  `produccion_id` int(11) DEFAULT NULL,
  `operacion_id` int(11) DEFAULT NULL,
  `cantidad_saliente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `responsable_recepcion` varchar(45) DEFAULT NULL,
  `cargo_responsable` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Estructura de tabla para la tabla `linea_produccion`
--

CREATE TABLE `linea_produccion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `linea_produccion`
--

INSERT INTO `linea_produccion` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Bebidas Lácteas', NULL),
(2, 'Fermentados', NULL),
(3, 'Leches Evaporadas', NULL),
(4, 'Postres y Helados', NULL),
(5, 'Quesos', NULL),
(6, 'Prototipo', NULL),
(7, 'Embutidos', NULL),
(8, 'Comida Rápida', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiasprimas_insumos`
--

CREATE TABLE `materiasprimas_insumos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `entradas` int(11) DEFAULT NULL,
  `salidas` int(11) DEFAULT NULL,
  `stock_general` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `clasificacion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `nombre`, `link`) VALUES
(1, 'Inicio', 'dashboard'),
(2, 'Materias Primas e Insumos', 'registrar/materiasPrimas_insumos'),
(3, 'Personal de Planta', 'registrar/personal_planta'),
(4, 'Productos Catalogo', 'registrar/productosCatalogo'),
(5, 'Control Materias Primas e Insumos', 'control/controlMateriasPrimasInsumos'),
(6, 'Nota de Producción', 'produccion/producciones'),
(7, 'Reporte Control Materias Primas e Insumos', 'reportes/inventarioMpi'),
(8, 'Reporte Personal de Planta', 'reportes/personal_planta'),
(9, 'Reporte Productos Catalogo', 'reportes/productosCatalogo'),
(10, 'Reporte Informe de Producción', 'reportes/informeProduccion'),
(11, 'Usuarios', 'administrador/usuarios'),
(12, 'Permisos', 'administrador/permisos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `id` int(11) NOT NULL,
  `destino_id` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`id`, `destino_id`, `nombre`) VALUES
(1, 2, 'Lácteos'),
(2, 2, 'Cárnicos'),
(3, 2, 'Panificación'),
(4, 2, 'Fruhor'),
(5, 2, 'Aguas'),
(6, 2, 'Poscosecha'),
(7, 3, 'No se Hizo Traslado'),
(8, 4, 'Evaluación Formación'),
(9, 4, 'No Aplica'),
(10, 5, 'Fisicoquímicos '),
(11, 5, 'Fisicoquímicos y Sensoriales '),
(12, 5, 'Sensoriales y Microbiológicos'),
(13, 5, 'Fisicoquímicos Sensoriales y Microbiológicos'),
(14, 6, 'Eventos de Investigación '),
(15, 6, 'Eventos de Divulgación'),
(16, 6, 'Evaluación de Mercado'),
(17, 6, 'Prototipos'),
(18, 6, 'Hidratación'),
(19, 6, 'No se Hizo Traslado'),
(20, 6, 'Otros'),
(21, 1, 'Venta Directa'),
(22, 1, 'Entregado a Punto de Venta'),
(23, 1, 'No Se Comercializo El Producto'),
(24, 3, 'Daño Biológico'),
(25, 3, 'Daños Mecánicos'),
(26, 3, 'Daño Físico'),
(27, 7, 'Unidades Pecuarias'),
(28, 7, 'Unidades Agrícolas'),
(29, 7, 'No se Hizo Traslado'),
(30, 5, 'Microbiologicos'),
(31, 5, 'Sensoriales ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `read` int(11) DEFAULT NULL,
  `insert` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `menu_id`, `rol_id`, `read`, `insert`, `update`, `delete`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(3, 2, 1, 1, 1, 1, 1),
(4, 3, 1, 1, 1, 1, 1),
(5, 4, 1, 1, 1, 1, 1),
(6, 5, 1, 1, 1, 1, 1),
(7, 6, 1, 1, 1, 1, 1),
(8, 11, 1, 1, 1, 1, 1),
(9, 12, 1, 1, 1, 1, 1),
(10, 7, 1, 1, 1, 1, 1),
(11, 8, 1, 1, 1, 1, 1),
(12, 9, 1, 1, 1, 1, 1),
(13, 10, 1, 1, 1, 1, 1),
(14, 1, 2, 1, 1, 1, 1),
(15, 2, 2, 1, 1, 1, 1),
(16, 3, 2, 1, 1, 1, 1),
(17, 4, 2, 1, 1, 1, 1),
(18, 5, 2, 1, 1, 1, 1),
(19, 6, 2, 1, 1, 1, 1),
(20, 7, 2, 1, 1, 1, 1),
(21, 8, 2, 1, 1, 1, 1),
(22, 9, 2, 1, 1, 1, 1),
(23, 10, 2, 1, 1, 1, 1),
(24, 11, 2, 0, 1, 1, 1),
(25, 12, 2, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_planta`
--

CREATE TABLE `personal_planta` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(100) DEFAULT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `numero_documento` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `cargo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estructura de tabla para la tabla `producciones`
--

CREATE TABLE `producciones` (
  `id` int(11) NOT NULL,
  `trimestre` int(11) NOT NULL,
  `semana` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `lote` varchar(45) DEFAULT NULL,
  `tipo_encargado_id` int(11) DEFAULT NULL,
  `ficha_encargado` varchar(45) DEFAULT NULL,
  `prototipo` tinyint(4) DEFAULT NULL,
  `unidades_elaboradas_pt` varchar(45) DEFAULT NULL,
  `total_cantidad_peso_inicial` varchar(45) DEFAULT NULL,
  `total_cantidad_pt` varchar(45) DEFAULT NULL,
  `rendimiento` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `costo_producccion` varchar(45) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `personal_planta_id` int(11) DEFAULT NULL,
  `encargado_planta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estructura de tabla para la tabla `productos_catalogo`
--

CREATE TABLE `productos_catalogo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `presentacion` varchar(10) DEFAULT NULL,
  `precio_venta` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `unidad_medida_id` int(11) DEFAULT NULL,
  `subcentro_id` int(11) DEFAULT NULL,
  `linea_produccion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Superadmin', 'Control Total'),
(2, 'Admin', 'Algunos Módulos'),
(3, 'Almacén', 'Algunos Módulos'),
(4, 'Líder', 'Algunos Módulos'),
(5, 'Consulta', 'Solo Consultas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subbodegas_producciones`
--

CREATE TABLE `subbodegas_producciones` (
  `id` int(11) NOT NULL,
  `sub_bodega_id` int(11) DEFAULT NULL,
  `produccion_id` int(11) DEFAULT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `precio_total` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Estructura de tabla para la tabla `subcentros`
--

CREATE TABLE `subcentros` (
  `id` int(11) NOT NULL,
  `primer_letra` varchar(5) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcentros`
--

INSERT INTO `subcentros` (`id`, `primer_letra`, `nombre`, `codigo`) VALUES
(1, 'L', 'Lácteos ', 1),
(2, 'C', 'Cárnicos', 2),
(3, 'P', 'Panificación', 3),
(4, 'F', 'Fruhor', 4),
(5, 'A', 'Aguas', 5),
(6, 'PC', 'Poscosecha', 6),
(7, 'LACC', 'L.A - C.C.A', 7),
(8, 'LPC', 'Laboratorio de poscosecha', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_bodegas`
--

CREATE TABLE `sub_bodegas` (
  `id` int(11) NOT NULL,
  `bodega_principal_id` int(11) DEFAULT NULL,
  `produccion_id` int(11) DEFAULT NULL,
  `cantidad_entrante` int(11) DEFAULT NULL,
  `stock_subBodega` int(11) DEFAULT NULL,
  `precio_unitario` int(11) DEFAULT NULL,
  `precio_total` int(11) DEFAULT NULL,
  `subcentro_id` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `sigla`, `nombre`) VALUES
(1, 'TI', 'Tarjeta de Identidad'),
(2, 'CC', 'Cédula de Ciudadanía'),
(3, 'CE', 'Cédula Extranjera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_encargado`
--

CREATE TABLE `tipo_encargado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_encargado`
--

INSERT INTO `tipo_encargado` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Sena Empresa', NULL),
(2, 'Formación', NULL),
(3, 'Cliente Externo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_medida`
--

CREATE TABLE `unidades_medida` (
  `id` int(11) NOT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `nombre_completo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidades_medida`
--

INSERT INTO `unidades_medida` (`id`, `sigla`, `nombre_completo`) VALUES
(1, 'g', 'gramos'),
(2, 'ml', 'mililitros'),
(3, 'u', 'unidades'),
(4, 'mt', 'metros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `username`, `password`, `rol_id`, `estado`) VALUES
(1, 'Yeison Yesid', 'Bocanegra Quimbayo', '3227494963', 'yybocanegra7@misena.edu.co', 'dosybq', 'db6ce945cd557d6e2c9c5ec098ff18edbec3d7ab', 1, 0),
(2, 'Luis', 'Serrato', '3154328765', 'jolu@misena.edu.co', 'jolu', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisissensorial_producciones`
--
ALTER TABLE `analisissensorial_producciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_analisisSensorial_analisisSensorialProducciones_idx` (`analisisSensorial_id`),
  ADD KEY `fk_produccion_analisisSensorialProducciones_idx` (`produccion_id`);

--
-- Indices de la tabla `analisis_sensorial`
--
ALTER TABLE `analisis_sensorial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bodega_principal`
--
ALTER TABLE `bodega_principal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_lote_UNIQUE` (`numero_lote`),
  ADD KEY `fk_materiasPrimasInsumos_bodegaPrincipal_idx` (`materiaPrima_insumo_id`),
  ADD KEY `fk_unidadesMedida_bodegaPrincipal_idx` (`unidad_medida_id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `liberaciones`
--
ALTER TABLE `liberaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_operacion_liberacion_idx` (`operacion_id`),
  ADD KEY `fk_produccion_liberacion_idx` (`produccion_id`);

--
-- Indices de la tabla `linea_produccion`
--
ALTER TABLE `linea_produccion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `materiasprimas_insumos`
--
ALTER TABLE `materiasprimas_insumos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD KEY `fk_clasificacion_materiaPrima_insumo_idx` (`clasificacion_id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_destino_operacion_idx` (`destino_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menus_idx` (`menu_id`),
  ADD KEY `fk_rol_idx` (`rol_id`);

--
-- Indices de la tabla `personal_planta`
--
ALTER TABLE `personal_planta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_documento_UNIQUE` (`numero_documento`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_cargo_funcionario_idx` (`cargo_id`),
  ADD KEY `fk_tipo_documento_funcionario_idx` (`tipo_documento_id`);

--
-- Indices de la tabla `producciones`
--
ALTER TABLE `producciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lote_UNIQUE` (`lote`),
  ADD KEY `fk_producto_catalogo_produccion_idx` (`producto_id`),
  ADD KEY `fk_usuario_produccion_idx` (`usuario_id`),
  ADD KEY `fk_tipo_encargado_produccion_idx` (`tipo_encargado_id`),
  ADD KEY `fk_personal_planta_produccion_idx` (`personal_planta_id`);

--
-- Indices de la tabla `productos_catalogo`
--
ALTER TABLE `productos_catalogo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD KEY `fk_unidad_medida_productos_catalogo_idx` (`unidad_medida_id`),
  ADD KEY `fk_subcentro_productos_catalogo_idx` (`subcentro_id`),
  ADD KEY `fk_linea_produccion_productos_catalogo_idx` (`linea_produccion_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `subbodegas_producciones`
--
ALTER TABLE `subbodegas_producciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produccion_elementoProduccion_idx` (`produccion_id`),
  ADD KEY `fk_subBodega_materiaPrimaInsumos_produccion_idx` (`sub_bodega_id`);

--
-- Indices de la tabla `subcentros`
--
ALTER TABLE `subcentros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- Indices de la tabla `sub_bodegas`
--
ALTER TABLE `sub_bodegas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subcentro_subBodega_idx` (`subcentro_id`),
  ADD KEY `fk_bodegaPrincipal_subBodega_idx` (`bodega_principal_id`),
  ADD KEY `fk_produccion_subBodega_idx` (`produccion_id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `tipo_encargado`
--
ALTER TABLE `tipo_encargado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre_completo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_rol_usuarios_idx` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisissensorial_producciones`
--
ALTER TABLE `analisissensorial_producciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `analisis_sensorial`
--
ALTER TABLE `analisis_sensorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `bodega_principal`
--
ALTER TABLE `bodega_principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `liberaciones`
--
ALTER TABLE `liberaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `linea_produccion`
--
ALTER TABLE `linea_produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `materiasprimas_insumos`
--
ALTER TABLE `materiasprimas_insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `personal_planta`
--
ALTER TABLE `personal_planta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producciones`
--
ALTER TABLE `producciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos_catalogo`
--
ALTER TABLE `productos_catalogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subbodegas_producciones`
--
ALTER TABLE `subbodegas_producciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `subcentros`
--
ALTER TABLE `subcentros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sub_bodegas`
--
ALTER TABLE `sub_bodegas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_encargado`
--
ALTER TABLE `tipo_encargado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analisissensorial_producciones`
--
ALTER TABLE `analisissensorial_producciones`
  ADD CONSTRAINT `fk_analisisSensorial_analisisSensorialProducciones` FOREIGN KEY (`analisisSensorial_id`) REFERENCES `analisis_sensorial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produccion_analisisSensorialProducciones` FOREIGN KEY (`produccion_id`) REFERENCES `producciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bodega_principal`
--
ALTER TABLE `bodega_principal`
  ADD CONSTRAINT `fk_materiasPrimasInsumos_bodegaPrincipal` FOREIGN KEY (`materiaPrima_insumo_id`) REFERENCES `materiasprimas_insumos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_unidadesMedida_bodegaPrincipal` FOREIGN KEY (`unidad_medida_id`) REFERENCES `unidades_medida` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `liberaciones`
--
ALTER TABLE `liberaciones`
  ADD CONSTRAINT `fk_operacion_liberacion` FOREIGN KEY (`operacion_id`) REFERENCES `operaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produccion_liberacion` FOREIGN KEY (`produccion_id`) REFERENCES `producciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materiasprimas_insumos`
--
ALTER TABLE `materiasprimas_insumos`
  ADD CONSTRAINT `fk_clasificacion_materiaPrima_insumo` FOREIGN KEY (`clasificacion_id`) REFERENCES `clasificaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD CONSTRAINT `fk_destino_operacion` FOREIGN KEY (`destino_id`) REFERENCES `destinos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_menus_permisos` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rol_permisos` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personal_planta`
--
ALTER TABLE `personal_planta`
  ADD CONSTRAINT `fk_cargo_personal_planta` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_documento_personal_planta` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producciones`
--
ALTER TABLE `producciones`
  ADD CONSTRAINT `fk_personal_planta_produccion` FOREIGN KEY (`personal_planta_id`) REFERENCES `personal_planta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_catalogo_produccion` FOREIGN KEY (`producto_id`) REFERENCES `productos_catalogo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_encargado_produccion` FOREIGN KEY (`tipo_encargado_id`) REFERENCES `tipo_encargado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_produccion` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_catalogo`
--
ALTER TABLE `productos_catalogo`
  ADD CONSTRAINT `fk_linea_produccion_productos_catalogo` FOREIGN KEY (`linea_produccion_id`) REFERENCES `linea_produccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subcentro_productos_catalogo` FOREIGN KEY (`subcentro_id`) REFERENCES `subcentros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_unidad_medida_productos_catalogo` FOREIGN KEY (`unidad_medida_id`) REFERENCES `unidades_medida` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subbodegas_producciones`
--
ALTER TABLE `subbodegas_producciones`
  ADD CONSTRAINT `fk_produccion_subBodega_produccion` FOREIGN KEY (`produccion_id`) REFERENCES `producciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subBodega_subBodega_produccion` FOREIGN KEY (`sub_bodega_id`) REFERENCES `sub_bodegas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sub_bodegas`
--
ALTER TABLE `sub_bodegas`
  ADD CONSTRAINT `fk_bodegaPrincipal_subBodega` FOREIGN KEY (`bodega_principal_id`) REFERENCES `bodega_principal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produccion_subBodega` FOREIGN KEY (`produccion_id`) REFERENCES `producciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subcentro_subBodega` FOREIGN KEY (`subcentro_id`) REFERENCES `subcentros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_rol_usuarios` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
