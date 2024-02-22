 create database pweb_k2_2023_001;
use pweb_k2_2023_001;

create table produk(
     id int not null primary key (auto_increment),
     kode varchar(10) not null UNIQUE,
     nama VARCHAR (150) not null,
     harga DECIMAL(10,2)  DEFAULT 0,
     stok int DEFAULT 0
 );

INSERT INTO produk values(null,'P001','spidol snowman',1000,5);

 SELECT * from produk;
ALTER Table produk
 ADD deleted_at DATETIME DEFAULT NULL;
CREATE Table kategori(
    id int not null PRIMARY KEY auto_increment,
    nama varchar(200) not NULL
);


ALTER Table produk add id_kategori int;

alter table produk add id_kategori int;

insert into kategori(nama) values
('Makanan'),('Minuman'),('Elektronik');

insert into kategori(nama) values
('Pakaian'),('ATK');

alter table produk add gamabar varchar(200) default null;

drop table user
create table user(
 id int not null primary key auto_increment,
 username varchar(50) not null unique,
 password varchar(100) not null,
 token varchar(100),
 role enum('superadmin','admin') default 'admin'   
);
insert into user(username,password,role)
values ('superadmin','$2y$10$TiS9D6gABDBW1WNI/WTpB.rnqqZZjMQsUYbdK6n1jT9Qq5j83Zomu','superadmin');
--kode: superadmin

insert into user(username,password,role)
values ('Gabriel','$2y$10$l8EiOcEGJkMphOwiLI8d1ukrMwEIYXrLsZxKrn.qc6umNU1DCZhuC','admin');
--kode:pwebUKRIM
