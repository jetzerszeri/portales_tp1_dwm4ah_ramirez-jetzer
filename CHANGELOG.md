# Descripción del Proyecto
Sitio web de una empresa que ofrece servicios de limpieza. Los potenciales clientes pueden hacer la solicitud de un estimado para obtener un servicio personalizado.

## Detalles
- **Desarrollado por**: Jetzer Ramirez
- **Comisión**: DWM4AH
- **Fecha**: Diciembre 2023
- Escuela DaVinci

# Changelog

## [2023-12-19]
### Añadido
- Vista de estadísticas.

## [2023-12-16]
### Añadido
- Añadir imagen al crear un servicio desde el input de archivo.

### Arreglado
- Actualización de un servicio obteniendo una imagen desde el input de archivo.
- Obtener la categoría seleccionada después de mostrar errores al crear un servicio.

## [2023-12-15]
### Estilos
- Actualizar el width del main y las tablas de administración.

### Arreglado
- Añadir id a todos los inputs para que puedan tener un label correctamente.

## [2023-11-27]
### Añadido
- Crear `CategoryFactory`.
- Finalizar la adición de seeders y factories.

### Arreglado
- Seeders y factories.

## [2023-11-26]
### Añadido
- Generar estimados.
- Crear controlador para estimados, permitir agregar y editarlos.

### Arreglado
- Usar hash en lugar de bcrypt en seeders.
- Botón de eliminar, eliminando modal.
- Añadir nueva columna en la lista de solicitudes para generar un estimado.

## [2023-11-20]
### Añadido
- Autenticación a las rutas admin/user y nombrando la vista de inicio de sesión.
- Mensajes de validación faltantes.
- Añadir el método down en la migración de la columna de notas.
- Migración para renombrar la columna de categoría en la tabla de servicio.
- Relación hasMany (solicitudes) a los modelos de Estado y Servicio.
- Migración y modelo para crear la tabla de roles.
- Relación entre Usuario y Rol.
- Rol en los formularios al crear y actualizar un usuario.
- Agregando RolesSeeder.

### Refactorizado
- Modal de confirmación y mover footer y header a "partials".
- Rutas de servicios de admin, agregando el controlador.
- Rutas de categorías de admin, agregando el controlador.
- Rutas de solicitudes de admin, agregando el controlador.
- Rutas de estados de admin, agregando el controlador.
- Rutas de inicio de sesión, eliminando el controlador de inicio de sesión.
- Ruta de contacto, eliminando el controlador de contacto.

### Arreglado
- Eliminar el controlador de "exit".
- Eliminar el controlador de cierre de sesión.
- Añadir la carpeta para los controladores de clientes.

## [2023-11-19]
### Añadido
- Crear `ServicesController.php`.
- Rutas de servicios para el sitio público.
- Ruta para las solicitudes.
- Middleware de Solicitud para crear una nueva solicitud.
- Controlador y middleware para inicio de sesión.

### Arreglado
- Renombra el Middleware de inicio de sesión.

### Refactorizado
- Controlador de contacto.
- Rutas de éxito y cierre de sesión a controladores.
- Controlador para la vista del tablero de administración.

## [2023-10-10]
### Añadido
- Restringir que solo el usuario administrador pueda ver/editar usuarios.
- Solo elimina un usuario si no es un administrador.
- Seeder para categorías.
- Seeder de usuarios.
- Seeder de solicitudes.
- Seeder de estados.
- Seeder de servicios.

### Estilos
- Enlaces del footer.
- Vista/formulario de contacto.
- CSS para el mensaje de éxito.

## [2023-10-08]
### Añadido
- Ruta de contacto (get) y hace el formulario dinámico.
- Validación al formulario de contacto.
- Mostrar el formulario de nueva solicitud desde la vista de administración.

### Refactorizado
- Formulario de edición de solicitud para mostrar información de la solicitud desde la base de datos.
- Obtener el servicio seleccionado de la base de datos y lo muestra en el selector.
- Obtener la lista de categorías de la base de datos y la usa en los formularios de servicios.
- Actualizar una solicitud en la base de datos desde la vista de administración.

## [2023-10-07]
### Añadido
- Crear migración para la tabla de categorías.
- Crear el modelo para Categoría.
- Añadir vista de categorías para administrador.
- Añadir formulario de categorías + crear la ruta post para añadir la categoría.
- Añadir formulario de edición de categoría y el método patch para actualizarla.
- Relacionar la tabla de Servicio con la tabla de Categorías.
- Mostrar el nombre de la categoría en la lista de cada servicio en el sitio público.
- Crear migración para la tabla de solicitudes.
- Crear el modelo de Solicitud.
- Actualizar el formulario de solicitudes para mostrar errores.
- Añadir el método post y validar el formulario de solicitudes.
- Crear migración para hacer que la columna de notas sea nula en la tabla de solicitudes.
- Añadir la solicitud a la base de datos.
- Añadir vista de solicitud para administrador.
- Relaciona la tabla de Solicitudes con la tabla de Servicio.
- Añadir la lista de servicios de la base de datos en el formulario de solicitudes.
- Enlace en migas de pan en la vista de servicio para el público.
- Vista de éxito después de enviar una solicitud.
- Opción de filtro en la vista de servicios.

### Arreglado
- Condición para mostrar vistas de administrador solo si el usuario existe.
- Elimina el rol "editor" por defecto al actualizar un usuario.

### Refactorizado
- Hace que adminlayout sea dinámico para reutilizarlo.

## [2023-10-06]
### Añadido
- Crear rutas para la vista de usuario para administrador.

### Refactorizado
- Añadir el método Patch en el formulario solo si es necesario.

## [2023-10-03]
### Añadido
- Añadiendo los primeros datos a la base de datos.
- Añadiendo primeras validaciones al formulario de servicios.
- Mostrando error en HTML en el formulario de servicio.
- Añadiendo vista para editar un servicio.
- Añadiendo h2 desde la ruta y arreglando enlaces.
- Añadir método patch en el formulario para actualizar datos.
- Añadiendo método patch en ruta para actualizar el servicio.
- Obteniendo la lista de servicios de la base de datos.
- Obteniendo la información de cada servicio en su propia vista.
- Actualizar la clase activa en los enlaces de la barra de navegación.

### Refactorizado
- Haciendo el formulario de servicio como un archivo parcial.
- Reutiliza el formulario de servicio.
- Crear un layout para los servicios de administración.

## [2023-10-02]
### Añadido
- Moviendo archivos a una carpeta para crear un proyecto Laravel.
- Actualizar git ignore.
- Crear proyecto Laravel.
- Añadir estilos personalizados y archivo JS.
- Añadiendo las imágenes iniciales.
- Crear un archivo de diseño genérico.
- Haciendo cabecera y pie de página como archivos parciales.
- Añadiendo vista de índice.
- Añadiendo vista de servicios.
- Añadiendo vista de servicio.
- Añadir vista de inicio de sesión.
- Añadir panel de administración.
- Añadir vista de usuarios.
- Crear formulario para agregar usuario.
- Creando vista de servicios para administrador y crear migración.

### Refactorizado
- Haciendo estimateform como un archivo parcial.
