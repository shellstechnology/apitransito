create database fast_tracker_db;
use fast_tracker_db;
create table monedas(
    id int primary key auto_increment,
    moneda varchar(30),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime
);
create table productos(
    id int primary key auto_increment,
    nombre varchar (50) not null,
    precio float(8) not null,
    stock int not null,
    id_moneda int not null,
    constraint fk_id_moneda foreign key (id_moneda) references monedas(id),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime
);
create table caracteristicas(
    id int primary key auto_increment,
    descripcion_caracteristica varchar(50) not null,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime
);
create table lugares_entrega(
    id int primary key auto_increment,
    longitud float(16) not null,
    latitud float(16) not null,
    direccion varchar(100),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime
);
create table estados_p(
    id int primary key auto_increment,
    descripcion_estado_p varchar(100),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime
);
CREATE TABLE paquetes(
    id int primary key auto_increment,
    nombre varchar(50) not null,
    volumen_l float(8) not null,
    peso_kg float (8) not null,
    id_estado_p int not null,
    id_caracteristica_paquete int not null,
    id_producto int not null,
    id_lugar_entrega int not null,
    nombre_destinatario varchar(100) not null,
    nombre_remitente varchar(100) not null,
    fecha_de_entrega datetime,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint fk_id_estado_p foreign key (id_estado_p) references estados_p(id),
    constraint fk_id_caracteristica_paquete foreign key (id_caracteristica_paquete) references caracteristicas(id),
    constraint fk_id_lugar_entrega_p foreign key (id_lugar_entrega) references lugares_entrega(id),
    constraint fk_id_producto foreign key (id_producto) references productos(id)
);
create table almacenes(
    id int primary key auto_increment,
    id_lugar_entrega int not null,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint fk_id_lugar_entrega_a foreign key (id_lugar_entrega) references lugares_entrega(id)
);
/* hace falta agregar el calculo automatico que dijo el profe :D*/
create table lotes(
    id int primary key auto_increment,
    volumen_l float(16),
    peso_kg float (16),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime
);
create table paquete_contiene_lote(
    id_paquete int primary key not null,
    id_lote int not null,
    id_almacen int not null,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint fk_id_paquete foreign key (id_paquete) references paquetes (id),
    constraint fk_id_lote_p foreign key (id_lote) references lotes (id),
    constraint fk_id_almacen foreign key (id_almacen) references almacenes (id)
);
create table marcas(
    id int primary key auto_increment,
    marca varchar(50) not null,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime
);
create table modelos(
    id int primary key auto_increment,
    modelo varchar (50) not null,
    id_marca int not null,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint fk_id_marca foreign key (id_marca) references marcas(id)
);
create table estados_c(
    id int primary key auto_increment,
    descripcion_estado_c varchar (100) not null,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime
);
create table camiones(
    matricula varchar(10) primary key not null,
    id_estado_c int not null,
    id_modelo_marca int not null,
    volumen_max_l float not null,
    peso_max_kg float not null,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint fk_id_estado_c foreign key (id_estado_c) references estados_c(id),
    constraint fk_id_modelo_marca foreign key (id_modelo_marca) references modelos (id)
);
create table camion_lleva_lote(
    id_lote int primary key not null,
    matricula varchar(10) not null,
    constraint fk_id_lote_c foreign key (id_lote) references lotes(id),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint fk_matricula_c foreign key (matricula) references camiones(matricula)
);
create table usuarios(
    id int primary key auto_increment,
    nombre_de_usuario varchar(50) not null unique,
    contrasenia varchar(25) not null,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime
);
create table telefonos_usuarios(
    id_usuarios int not null,
    telefono varchar(15) unique,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint primary key (id_usuarios, telefono),
    constraint fk_id_usuarios_t foreign key (id_usuarios) references usuarios(id)
);
create table mail_usuarios(
    id_usuarios int not null,
    mail varchar(50) unique,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint primary key (id_usuarios, mail),
    constraint fk_id_usuarios_m foreign key (id_usuarios) references usuarios(id)
);
create table choferes(
    id_usuarios int primary key not null,
    licencia_de_conducir varchar (10) unique,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint fk_id_usuarios_c foreign key (id_usuarios) references usuarios(id)
);
create table almaceneros(
    id_usuarios int primary key not null,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint fk_id_usuarios_a foreign key (id_usuarios) references usuarios(id)
);
create table clientes(
    id_usuarios int primary key not null,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint fk_id_usuarios_cl foreign key (id_usuarios) references usuarios(id)
);
CREATE TABLE administradores (
    id_usuarios INT PRIMARY KEY NOT NULL,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    CONSTRAINT fk_id_usuarios_admin FOREIGN KEY (id_usuarios) REFERENCES usuarios (id)
);
create table chofer_conduce_camion(
    id_chofer int primary key not null,
    matricula_camion varchar(10) not null unique,
    fecha_y_hora datetime,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    constraint fk_id_chofer foreign key (id_chofer) references choferes(id_usuarios),
    constraint fk_matricula_camion foreign key (matricula_camion) references camiones(matricula)
);