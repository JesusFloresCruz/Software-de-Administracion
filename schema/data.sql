--
-- Dumping data for table `proyecto`
--

INSERT INTO `proyecto` (`nombre`, `fecha_inicio`, `fecha_fin`, `descripcion`) VALUES
( 'Instalacion Fibra Optica GES SRL', '2015-12-01', '2015-12-10', 'Descripcion de empresa'),
( 'Construccion Puente Vehicular', '2015-12-11', '2015-12-20', 'Descripcion de empresa'),
( 'Auditoria Financiera a SAS', '2015-12-21', '2015-10-30', 'Descripcion de empresa'),
( 'Implementacion Sistema SIGMA', '2016-01-01', '2016-01-10', 'Descripcion de empresa'),
( 'Gestion de Desarrollo de Obras Cochabamba', '2016-01-11', '2016-01-20', 'Descripcion de empresa'),
( 'Implementacion Seguridad Electronica GES', '2016-01-21', '2016-01-30', 'Descripcion de empresa');

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` ( `nombre`, `apellidos`, `edad`, `direccion`, `telefono`, `tipo`, `rol`, `id_proyecto`) VALUES
( 'Usuario', 'Uno', 12, 'Direccion uno', 123456, 'Administrador', 'Funcionario', 1),
( 'Usuario', 'Dos', 21, 'Direccion dos', 1234567, 'Administrador', 'Funcionario', 2),
( 'Usuario', 'Tres', 22, 'Direccion tres', 1234567, 'Administrador', 'Funcionario', 2),
( 'Usuario', 'Cuatro', 23, 'Direccion cuatro', 1234567, 'Administrador', 'Funcionario', 3),
( 'Usuario', 'Cinco', 25, 'Direccion cinco', 1234567, 'Administrador', 'Funcionario', 3);

--
-- Dumping data for table `tarea`
--

INSERT INTO `tarea` (`posicion`, `nombre`, `fecha_inicio`, `fecha_fin`, `progreso`, `id_proyecto`,  `id_usuario`) VALUES
( 1, 'Tarea uno', '2015-12-01', '2015-12-05', 60, 1, 1),
( 2, 'Tarea dos', '2015-12-05', '2015-12-10', 80, 1, 3);
