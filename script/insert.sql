-- Module
insert into Module (name, code, description, url, enabled) values 
	('Modulos', 'MOD', 'Administrador de Moduloes', '#', true)
	,('Opciones', 'OPT', 'Administrador de Opciones', '#', true)
	,('Aplicaciones', 'APP', 'Administrador de Aplicaciones', '#', true)
	,('Packetes', 'PAC', 'Administrador Packetes', '#', true)
	,('Perfiles', 'PRF', 'Administrador de Perfiles', '#', true)
	,('Usuarios', 'USR', 'Administrador de Usuarios', '#', true)
	,('Tipo Usuario', 'TUSR', 'Administrador Tipo de Usuarios', '#', true);

-- Option
insert into Options (name, description, code, url, module_id, father_option, enabled) values 
	-- MODULE
	('Listar', 'Listar Modulos', 'module.list', 'module/list',(select id from Module where code = 'MOD'),null, true)
	,('Modificar', 'Modificar Modulos', 'module.edit', '#',(select id from Module where code = 'MOD'), 1, true)
	,('Detalle', 'Detalle Modulos', 'module.detail', '#',(select id from Module where code = 'MOD'), 1, true)
	,('Eliminar', 'Eliminar Modulos', 'module.del', '#',(select id from Module where code = 'MOD'), 1, true)
	,('Activar', 'Activar Modulos', 'module.active', '#',(select id from Module where code = 'MOD'), 1, true)
	,('Crear', 'Crear Modulos', 'module.add', 'module/put',(select id from Module where code = 'MOD'), null, true)
	-- OPTION	
	,('Listar', 'Listar Opciones', 'option.list', 'option/list',(select id from Module where code = 'OPT'),null, true)
	,('Modificar', 'Modificar Opciones', 'option.edit', '#',(select id from Module where code = 'OPT'), 7, true)
	,('Detalle', 'Detalle Opciones', 'option.detail', '#',(select id from Module where code = 'OPT'), 7, true)
	,('Eliminar', 'Eliminar Opciones', 'option.del', '#',(select id from Module where code = 'OPT'), 7, true)
	,('Activar', 'Activar Opciones', 'option.active', '#',(select id from Module where code = 'OPT'), 7, true)
	,('Crear', 'Crear Modulos', 'option.add', 'option/put',(select id from Module where code = 'OPT'), null, true)
	-- APPLICATION	
	,('Listar', 'Listar Applicaciones', 'app.list', 'application/list',(select id from Module where code = 'APP'),null, true)
	,('Modificar', 'Modificar Applicaciones', 'app.edit', '#',(select id from Module where code = 'APP'), 13, true)
	,('Detalle', 'Detalle Applicaciones', 'app.detail', '#',(select id from Module where code = 'APP'),  13, true)
	,('Eliminar', 'Eliminar Applicaciones', 'app.del', '#',(select id from Module where code = 'APP'),  13, true)
	,('Activar', 'Activar Applicaciones', 'app.active', '#',(select id from Module where code = 'APP'),  13, true)
	,('Opciones', 'Agregar Opcione a Applicacion', 'appOpt.list', '#',(select id from Module where code = 'APP'), 13, true)
	,('Crear', 'Crear Applicaciones', 'app.add', 'application/put',(select id from Module where code = 'APP'), null, true)
	-- USUARIOS	
	,('Listar', 'Listar Usuario', 'user.list', 'user/list',(select id from Module where code = 'USR'),null, true)
	,('Modificar', 'Modificar Usuario', 'user.mod', '#',(select id from Module where code = 'USR'), 20, true)
	,('Detalle', 'Detalle Usuario', 'user.detail', '#',(select id from Module where code = 'USR'),20, true)
	,('Elimiar', 'Eliminar Usuario', 'user.del', '#',(select id from Module where code = 'USR'),20, true)
	,('Activar', 'Activar Usuario', 'user.enabled', '#',(select id from Module where code = 'USR'),20, true)
	,('Password', 'Resetear Password Usuario', 'user.password', '#',(select id from Module where code = 'USR'),20, true)
	,('Crear', 'Crear Usuario', 'user.add', 'user/put',(select id from Module where code = 'USR'),null, true)
	-- PROFILE	
	,('Listar', 'Listar Perfil', 'profile.list', 'profile/list',(select id from Module where code = 'PRF'),null, true)
	,('Modificar', 'Modificar Perfil', 'profile.mod', '#',(select id from Module where code = 'PRF'),27, true)
	,('Detalle', 'Detalle Perfil', 'profile.detail', '#',(select id from Module where code = 'PRF'),27, true)
	,('Elimiar', 'Eliminar Perfil', 'profile.del', '#',(select id from Module where code = 'PRF'),27, true)
	,('Activar', 'Activar Perfil', 'profile.enabled', '#',(select id from Module where code = 'PRF'),27, true)
	,('Opciones', 'Asignar Opciones', 'profile.option', '#',(select id from Module where code = 'PRF'),27, true)
	,('Crear', 'Crear Perfil', 'profile.add', 'profile/put',(select id from Module where code = 'PRF'),null, true)
	-- PACKET	
	,('Listar', 'Listar Paquete', 'packet.list', 'packet/list',(select id from Module where code = 'PAC'),null, true)
	,('Modificar', 'Modificar Paquete', 'packet.mod', '#',(select id from Module where code = 'PAC'),34, true)
	,('Detalle', 'Detalle Paquete', 'packet.detail', '#',(select id from Module where code = 'PAC'),34, true)
	,('Elimiar', 'Eliminar Paquete', 'packet.del', '#',(select id from Module where code = 'PAC'),34, true)
	,('Activar', 'Activar Paquete', 'packet.enabled', '#',(select id from Module where code = 'PAC'),34, true)
	,('Crear', 'Crear Paquete', 'packet.add', 'packet/put',(select id from Module where code = 'PAC'),null, true);

-- Application
insert into Application (name, code, description, enabled) values
	('Administracion', 'APP', 'Aplicacion de Configuraciones de las opciones de los Sitios', true)
	,('Control de Acceso', 'CA', 'Aplicacion de Control de Acceso a los Sitios', true);

-- ApplicationOption
insert into ApplicationOption (application_id, option_id, enabled) 
	select (Select id from Application where code = "APP") app, o.id, true from Options o, Module m WHERE m.id = o.module_id AND m.code in ('MOD', 'APP', 'OPT', 'POPT', 'PAC');

insert into ApplicationOption (application_id, option_id, enabled) 
	select (Select id from Application where code = "CA") app, o.id, true from Options o, Module m WHERE m.id = o.module_id AND m.code in ('USR', 'PRF', 'TUSR');


-- Packet
insert into Packet (name, description, enabled) values
	('Paquete Defecto', 'Paquete Defecto', 1);
insert into Packet (name, description, enabled) values
	('Paquete Defecto Cliente', 'Paquete Defecto Cliente', 1);
insert into Packet (name, description, enabled) values
	('Paquete Defecto Empresa', 'Paquete Defecto Empresa', 1);

insert into PacketOption (app_opt_id, packet_id, enabled)
	Select id , (select id from Packet where name = 'Paquete Defecto'), 1 From ApplicationOption;

-- Perfiles
insert into Profile (name, description, packet_id, enabled) values
	('Perfil Defecto', 'Perfil Defecto', (select id from Packet where name = 'Paquete Defecto'), 1);
insert into Profile (name, description, packet_id, enabled) values
	('Perfil Defecto Cliente', 'Perfil Defecto Cliente', (select id from Packet where name = 'Paquete Defecto Cliente'), 1);
insert into Profile (name, description, packet_id, enabled) values
	('Perfil Defecto Empresa', 'Perfil Defecto Empresa', (select id from Packet where name = 'Paquete Defecto Empresa'), 1);


insert into ProfileOption (packet_opt_id, profile_id, enabled)
	Select id , (select id from Profile where name = 'Perfil Defecto'), 1 From PacketOption;

-- Packet Option Client
insert into PacketOption (app_opt_id, packet_id, enabled)
	Select a.id , (select id from Packet where name = 'Paquete Defecto Cliente'), 1 From ApplicationOption a, Options o, Module m  WHERE a.option_id = o.id AND m.id = o.module_id  AND m.code in ('PROD', 'TPROD', 'CLI', 'TCLI');

insert into PacketOption (app_opt_id, packet_id, enabled)
	Select a.id , (select id from Packet where name = 'Paquete Defecto Empresa'), 1 From ApplicationOption a, Options o, Module m  WHERE a.option_id = o.id AND m.id = o.module_id  AND m.code in ('EMP', 'CLI', 'TCLI', 'USR', 'TUSR', 'PRF', 'PROD', 'TPROD', 'AROLE', 'ARULE', 'ATRX', 'DOC', 'TDOC', 'FDOC', 'EDOC');



-- Profile Client
insert into ProfileOption (packet_opt_id, profile_id, enabled)
	Select o.id , (select id from Profile where name = 'Perfil Defecto Cliente'), 1 From PacketOption o,  ApplicationOption a WHERE o.app_opt_id = a.id AND o.packet_id = (select id from Packet where name = 'Paquete Defecto Cliente');

insert into ProfileOption (packet_opt_id, profile_id, enabled)
	Select o.id , (select id from Profile where name = 'Perfil Defecto Empresa'), 1 From PacketOption o,  ApplicationOption a WHERE o.app_opt_id = a.id AND o.packet_id = (select id from Packet where name = 'Paquete Defecto Empresa');


-- UserType
insert into UserType (name, description) values ('User','Usuario Plataforma');
insert into UserType (name, description) values ('Client','Cliente Plataforma');
insert into UserType (name, description) values ('Empresa','Empresa');
insert into UserType (name, description) values ('Proveedor','Proveedor');

-- User
insert into User (dni, name, lastName, login, profile_id, user_type_id, email, enabled, creation) values ('1-9', 'Admin', 'Adminstrador','admin',(select id from Profile where name = 'Perfil Defecto'),(select id from UserType where name = 'User') , 'info@admin.cl', 1, now());
insert into User (dni, name, lastName, login, profile_id, user_type_id, email, enabled, creation) values ('2-8', 'Client', 'Test','2-8',(select id from Profile where name = 'Perfil Defecto Cliente'),(select id from UserType where name = 'Client') , 'info@admin.cl', 1, now());
insert into User (dni, name, lastName, login, profile_id, user_type_id, email, enabled, creation) values ('3-7', 'Client Empresa', 'Test','admin@EMP1',(select id from Profile where name = 'Perfil Defecto Empresa'),(select id from UserType where name = 'Empresa') , 'info@emp.cl', 1, now());
insert into User (dni, name, lastName, login, profile_id, user_type_id, email, enabled, creation) values ('4-6', 'Proveedor', 'Test','provedor1',(select id from Profile where name = 'Perfil Defecto Cliente'),(select id from UserType where name = 'Proveedor') , 'info@prov.cl', 1, now());

-- Login
insert into Login (user_id, password, enabled, temp, expirate) values ((select id From User where login = 'admin'), password('benjamin'), 1, 0, DATE_ADD(CURDATE(),INTERVAL 90 DAY));
insert into Login (user_id, password, enabled, temp, expirate) values ((select id From User where login = '2-8'), password('benjamin'), 1, 0, DATE_ADD(CURDATE(),INTERVAL 90 DAY));
insert into Login (user_id, password, enabled, temp, expirate) values ((select id From User where login = 'admin@EMP1'), password('benjamin'), 1, 0, DATE_ADD(CURDATE(),INTERVAL 90 DAY));