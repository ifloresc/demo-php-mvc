/*
Script para la creacion de la BD
*/
-- Creamos DB
create database IF NOT EXISTS sisnetcl_demo;

--  creamos el usuario
create user 'demo_user'@'localhost' identified by 'nz2038pq';

-- Acceso a la BD
GRANT ALL ON sisnetcl_demo.* TO demo_user@'localhost';

FLUSH PRIVILEGES;
