Propuesta para el proyecto de tecnologías web
Luis Guajardo Olvera
Golden Glove
Descripción
Es un gimnasio que imparte clases de box para principiantes y a su vez acondicionamiento físico-aeróbico con ejercicios clásicos del boxeo.
Objetivo
-	Dar a conocer el establecimiento a través de internet.
-	Dar un mejor servicio a los usuarios activos (consultando sus registros).
-	Llevar un mejor control del negocio para el administrador.

Estructura de la página web
Front-end
Diseñado con el framework bootstrap para adoptar un diseño responsivo.
Páginas web:
-	Principal
o	Información que se vaya añadiendo
-	Nosotros
o	Historia
o	Objetivo
o	Misión
-	Entrenamientos
o	Tipos de entrenamiento
o	Clases
o	Información adicional
-	Página galería
o	Fotos del gimnasio
-	Sesión de usuario
o	Información de sus registros(pagos, características físicas)


Back-end
Web Service en PHP con la librería Nusoap (opcional)
Administración
El administrador podrá:
-	Agregar editar y eliminar información en la “página principal”
-	Editar información en la página “Nosotros” y “Entrenamiento”
-	Agregar y eliminar fotos en la página “Galería”
-	Dar de alta, editar y modificar usuarios
-	Dar de alta, editar y eliminar registros de detalles físicos de usuarios
-	Dar de alta eliminar y editar artículos del inventario

Un usuario dado de alta podrá ver la página web e iniciar sesión para ver sus detalles físicos por mes así como el registro de sus pagos efectuados.

Un usuario no dado de alta solo podrá ver la página web.

Base de Datos
Administrado por MySQL con el motor InnoDB para permitir el uso de integridad referencial.

Datos a almacenar:
-	Usuarios
-	Características Físicas
-	Pagos de inscripción/mensualidad
-	Inventario de artículos
