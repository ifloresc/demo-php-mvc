-- Script para crear BD

-- Borramos data anterior
source drop.sql;

-- Creamos BD
source db.sql;

-- COnectamos
use sisnetcl_demo;

-- Creamos Tablas
source table.sql;

-- Aller
source alter.sql;

-- Insert
source insert.sql;