-- Primero creamos la base de datos DAW203_DBDepartamentos.
create database DAW203_DBDepartamentos;
-- Entramos a la base de datos sobre la que vamos a trabajar con la sentencia use 'nombre'.
use DAW203_DBDepartamentos;
-- Por último creamos la tabla Departamento con dos campos: CodDepartamento que es la clave primaria y son tres letras mayúsculas y DescDepartamento que es un varchar y describe el Departamento.
create table Departamento(CodDepartamento varchar(3) primary key, DescDepartamento varchar(255), bajaLogica date)engine=innodb;
-- Damos permisos al usuario
grant all privileges on DAW203_DBDepartamentos.* to 'usuarioDAW203DBDepartamentos'@'%' identified by 'paso';