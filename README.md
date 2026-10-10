# Gestión de pedidos de hamburguesería

Aplicación web PHP + MySQL para registrar y administrar pedidos.

## Funciones
- Crear, listar, buscar, editar y eliminar pedidos.
- Registrar dirección de entrega y cantidades de hamburguesas sencillas, dobles y mixtas.
- Estados disponibles: `Preparando` y `Despacho`, modificables desde el listado.
- Resumen de pedidos, conteo por estado y total de hamburguesas.
- Diseño adaptable a computador y móvil.
- Consultas PDO preparadas, escape de salida y protección CSRF para formularios.

## Instalación
1. Descomprime el ZIP y sube la carpeta `gestion_pedidos_hamburgueseria` a tu servidor PHP.
2. Comprueba que PHP tenga activadas las extensiones `pdo_mysql` y `mbstring`.
3. Abre `index.php` desde el navegador.

## Base de datos
`config.php` contiene las credenciales solicitadas. Al iniciar, `db.php` intenta crear la base `ccdoriv_pedidoshamburgueseria` si no existe y crea la tabla `pedidos`.

El usuario MySQL debe tener permisos para crear bases de datos. Algunos alojamientos administrados requieren crear la base desde su panel; si ocurre, créala con el nombre indicado y vuelve a abrir la aplicación.

## Requisitos
- PHP 8.1 o superior recomendado.
- MySQL 5.7+ o MariaDB compatible.
- Extensiones `pdo_mysql` y `mbstring`.

Para producción, restringe el acceso al panel, utiliza HTTPS y evita compartir las credenciales. También puedes configurar `DB_HOST`, `DB_USER`, `DB_PASSWORD` y `DB_NAME` como variables de entorno.
