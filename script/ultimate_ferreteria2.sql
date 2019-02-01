
--
-- Estructura de tabla para la tabla `table_cliente`
--

CREATE TABLE `table_clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nombre_Cliente` varchar(45) NOT NULL,
  `Apellido_Cliente` varchar(45) NULL,
  `razon_s_Cliente` varchar(200) NULL,
  `ruc_Cliente` varchar(20) NULL,
  `direccion_Cliente` varchar(100) NULL,
  `telefono_Cliente` varchar(20) NULL,
  `correo_Cliente` varchar(50) NULL,
  `tipo` varchar(50) NULL,
   `created_at` timestamp,
   `updated_at` timestamp,
   constraint PK_tableClientes primary key (id)
);

--
-- Volcado de datos para la tabla `table_cliente`
--

INSERT INTO `table_clientes` (`id`, `Nombre_Cliente`, `Apellido_Cliente`, `razon_s_Cliente`, `ruc_Cliente`, `direccion_Cliente`, `telefono_Cliente`, `correo_Cliente`) VALUES
(1, 'fulano', 'mengano', '', '00000000', '', '22222222', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_facturas`
--

CREATE TABLE `table_facturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `totals` int(11) NOT NULL,
   `created_at` timestamp,
   `updated_at` timestamp,
   constraint PK_tableFacturas primary key (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_productos`
--

CREATE TABLE `table_productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombreProductos` varchar(45) NOT NULL,
  `preciosProductos` float NOT NULL,
  `descripcionProductos` varchar(200) NOT NULL,
  `cantidadProductos` int(11) NOT NULL,
  `preciocompraProductos` float DEFAULT NULL,
  `Difererencia` float NOT NULL,
  `inventario` date NULL,
   `created_at` timestamp,
   `updated_at` timestamp,
   constraint PK_tableProductos primary key (id)
);

--
-- Volcado de datos para la tabla `table_productos`
--

INSERT INTO `table_productos` (`id`, `nombreProductos`, `preciosProductos`, `descripcionProductos`, `cantidadProductos`, `preciocompraProductos`, `Difererencia`) VALUES
(1, 'Spray gris', 2.25, 'Spray gris', 3, 1.59, 0.66),
(2, 'Spray cafe', 2.25, 'Spray cafe', 5, 1.59, 0.66),
(3, 'Spray Blanco', 2.25, 'Spray Blanco', 4, 1.59, 0.66);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_ventas`
--

CREATE TABLE `table_ventas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_facturas` int(11) NOT NULL,
  `id_productos` int(10) NOT NULL,
  `cantidad` int(11) NOT NULL,
   `created_at` timestamp,
   `updated_at` timestamp,
   constraint PK_tableVentas primary key (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_facturasc`
--

CREATE TABLE `table_facturasc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `totals` int(11) NULL,
  `estado` varchar(45) NOT NULL,
  `notaEnvio` int NOT NULL,
   `created_at` timestamp,
   `updated_at` timestamp,
   constraint PK_tableFacturasc primary key (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_compras`
--

CREATE TABLE `table_compras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_productos` int(10) NOT NULL,
  `id_facturasc` int(11) NULL,
  `cantidad` int(11) NOT NULL,
  `notaEnvio` int NOT NULL,
   `created_at` timestamp,
   `updated_at` timestamp,
   constraint PK_tableCompras primary key (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `USERS` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` char(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(191) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` int(8) NOT NULL,
  `telefono` int(12) NOT NULL,
   `remember_token` varchar(100),
   `created_at` timestamp,
   `updated_at` timestamp,
   constraint PK_tableUsers primary key (id)
);

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `USERS` (`id`, `usuario`, `name`, `email`, `password`, `tipo`, `apellidos`, `dni`, `telefono`) VALUES
(1, 'admin', 'Ferreteria', 'ferre@gmail.com', '$2y$10$Z1wsG.S9f/k4DQKiuqp/d.i9KaDghoHqxAVw0fDw7KyQEh0fLzRoa', 'Administrador', 'Elias', 43121223, 321132),
(2, 'Rigo', 'Rigoberto', 'rigo@gmail.com', '$2y$10$Z1wsG.S9f/k4DQKiuqp/d.i9KaDghoHqxAVw0fDw7KyQEh0fLzRoa', 'Empleado', 'Guzman', 0, 93656565);

--
-- Llaves foraneas para la tabla `table_facturas`
--
ALTER TABLE `table_facturas`
  ADD CONSTRAINT `table_Facturas_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `table_clientes` (`id`);

--
-- Filtros para la tabla `table_ventas`
--
ALTER TABLE `table_ventas`
  ADD CONSTRAINT `table_Ventas_ibfk_1` FOREIGN KEY (`id_productos`) REFERENCES `table_productos` (`id`);

ALTER TABLE `table_ventas`
  ADD CONSTRAINT `table_Ventas_ibfk_2` FOREIGN KEY (`id_facturas`) REFERENCES `table_facturas` (`id`);

ALTER TABLE `table_facturasc`
  ADD CONSTRAINT `table_Facturasc_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `table_clientes` (`id`);

ALTER TABLE `table_compras`
  ADD CONSTRAINT `table_Compras_ibfk_1` FOREIGN KEY (`id_productos`) REFERENCES `table_productos` (`id`);

ALTER TABLE `table_compras`
  ADD CONSTRAINT `table_Compras_ibfk_2` FOREIGN KEY (`id_facturasc`) REFERENCES `table_facturasc` (`id`);
COMMIT;
