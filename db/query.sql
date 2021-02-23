CREATE DATABASE  'C:/limonalmacenes.fdb' user 'sysdba' password 'masterkey';
connect 'C:/limonalmacenes.fdb' user 'sysdba' password 'masterkey';
 
 insert into "users" ("name", "email","id_rol" ,"password", "updated_at", "created_at") 
 	values ('uriel', 'ums_1306@hotmail.com',1, 
 		'$2y$10$ccJ3MjEQLGcTfpwmUjl7rexQPEQWl2A1hPcqn9Or/RgL06Te64lA6', 
 		'2019-09-29 00:55:46', '2019-09-29 00:55:46');

CREATE TABLE "roles"(
	"id" INTEGER NOT NULL PRIMARY KEY,
	"nombre" VARCHAR(100) NOT NULL UNIQUE,
	"created_at"  TIMESTAMP DEFAULT NULL,
	"updated_at" TIMESTAMP DEFAULT NULL
);

CREATE TABLE "users"(
	"id" INTEGER NOT NULL,
	"name" VARCHAR(255) NOT NULL,
	"email" VARCHAR(255) NOT NULL,
	"password" VARCHAR(255) NOT NULL,
	"remember_token" VARCHAR(100) DEFAULT NULL,
	"id_rol" INTEGER NOT NULL,
	"created_at"  TIMESTAMP DEFAULT NULL,
	"updated_at" TIMESTAMP DEFAULT NULL,
	CONSTRAINT "fk_id_rol"  FOREIGN KEY ("id_rol") REFERENCES "roles" ("id")

);

CREATE TABLE "personal" (
	"id" INTEGER NOT NULL PRIMARY KEY,
	"cod_barras" VARCHAR(100) NOT NULL UNIQUE,
	"nombre" VARCHAR (100) NOT NULL,
	"url_foto" VARCHAR(250) NOT NULL,
	"fecha_nacimiento" DATE NOT NULL,
	"telefono" VARCHAR(15),
	"id_direccion" INTEGER,
	"id_cargo" INTEGER,
	"id_departamento" INTEGER,
	"id_sucursal" INTEGER,
	"created_at" timestamp DEFAULT NULL,
	"updated_at" timestamp DEFAULT NULL,
	CONSTRAINT "fk_id_cargo"  FOREIGN KEY ("id_cargo") REFERENCES "cargo" ("id"),
	CONSTRAINT "fk_id_departamento"  FOREIGN KEY ("id_departamento") REFERENCES "departamento" ("id"),
	CONSTRAINT "fk_id_direccion"  FOREIGN KEY ("id_direccion") REFERENCES "direccion" ("id"),
	CONSTRAINT "fk_id_sucursal"  FOREIGN KEY ("id_sucursal") REFERENCES "sucursal" ("id")
);



CREATE TABLE "cargo"(
	"id" INTEGER NOT NULL PRIMARY KEY,
	"cargo" VARCHAR(20),
	"created_at" timestamp DEFAULT NULL,
	"updated_at" timestamp DEFAULT NULL  
);


CREATE TABLE "departamento"(
	"id" INTEGER NOT NULL PRIMARY KEY,
	"departamento" VARCHAR(20),
	"created_at" timestamp DEFAULT NULL,
	"updated_at" timestamp DEFAULT NULL 
);

CREATE TABLE "sucursal"(
	"id" INTEGER NOT NULL PRIMARY KEY,
	"nombre" VARCHAR(20),
	"created_at" timestamp DEFAULT NULL,
	"updated_at" timestamp DEFAULT NULL 
);


CREATE TABLE "direccion" (
	"id" INTEGER NOT NULL PRIMARY KEY,
	"calle" VARCHAR(50) NOT NULL,
	"numero" VARCHAR(10) NOT NULL,
	"colonia" VARCHAR(50),
	"codigo_postal" INTEGER NOT NULL,
	"localidad" VARCHAR(50),
	"created_at" timestamp DEFAULT NULL,
	"updated_at" timestamp DEFAULT NULL
);


CREATE TABLE "asistencia" (
	"id" INTEGER NOT NULL PRIMARY KEY,
	"cod_barras" VARCHAR(100) NOT NULL,
	"fecha" DATE,
	"hora_entrada" TIME,
	"hora_salida" TIME,
	"hora_entrada2" TIME,
	"hora_salida2" TIME,
	"created_at" timestamp DEFAULT NULL,
	"updated_at" timestamp DEFAULT NULL 

);

CREATE TABLE "asistencia_mensual" (
	"id" INTEGER NOT NULL PRIMARY KEY,
	"cod_barras" VARCHAR(100),
	"mes" VARCHAR(100),
	"anio" VARCHAR(100),
	"d1" VARCHAR(2) DEFAULT 0,
	"d2" VARCHAR(2)	DEFAULT 0,
	"d3" VARCHAR(2) DEFAULT 0,
	"d4" VARCHAR(2) DEFAULT 0,
	"d5" VARCHAR(2) DEFAULT 0,
	"d6" VARCHAR(2) DEFAULT 0,
	"d7" VARCHAR(2) DEFAULT 0,
	"d8" VARCHAR(2) DEFAULT 0,
	"d9" VARCHAR(2) DEFAULT 0,
	"d10" VARCHAR(2) DEFAULT 0,
	"d11" VARCHAR(2) DEFAULT 0,
	"d12" VARCHAR(2) DEFAULT 0,
	"d13" VARCHAR(2) DEFAULT 0,
	"d14" VARCHAR(2) DEFAULT 0,
	"d15" VARCHAR(2) DEFAULT 0,
	"d16" VARCHAR(2) DEFAULT 0,
	"d17" VARCHAR(2) DEFAULT 0,
	"d18" VARCHAR(2) DEFAULT 0,
	"d19" VARCHAR(2) DEFAULT 0,
	"d20" VARCHAR(2) DEFAULT 0,
	"d21" VARCHAR(2) DEFAULT 0,
	"d22" VARCHAR(2) DEFAULT 0,
	"d23" VARCHAR(2) DEFAULT 0,
	"d24" VARCHAR(2) DEFAULT 0,
	"d25" VARCHAR(2) DEFAULT 0,
	"d26" VARCHAR(2) DEFAULT 0,
	"d27" VARCHAR(2) DEFAULT 0,
	"d28" VARCHAR(2) DEFAULT 0,
	"d29" VARCHAR(2) DEFAULT 0,
	"d30" VARCHAR(2) DEFAULT 0,
	"d31" VARCHAR(2) DEFAULT 0,
	"created_at" timestamp DEFAULT NULL,
	"updated_at" timestamp DEFAULT NULL 


);

CREATE GENERATOR "increment_id_users";
SET GENERATOR "increment_id_users" TO 0;

SET TERM ^ ;
CREATE TRIGGER "increment_id_users" FOR "users"
ACTIVE BEFORE INSERT POSITION 0
AS
BEGIN
  NEW."id" = next value for "increment_id_users";
END^

SET TERM ; ^


CREATE GENERATOR "increment_id_departamento";
SET GENERATOR "increment_id_departamento" TO 0;

SET TERM ^ ;
CREATE TRIGGER "increment_id_departamento" FOR "departamento"
ACTIVE BEFORE INSERT POSITION 0
AS
BEGIN
  NEW."id" = next value for "increment_id_departamento";
END^

SET TERM ; ^

CREATE GENERATOR "increment_id_cargo";
SET GENERATOR "increment_id_cargo" TO 0;

SET TERM ^ ;
CREATE TRIGGER "increment_id_cargo" FOR "cargo"
ACTIVE BEFORE INSERT POSITION 0
AS
BEGIN
  NEW."id" = next value for "increment_id_cargo";
END^

SET TERM ; ^


CREATE GENERATOR "increment_id_direccion";
SET GENERATOR "increment_id_direccion" TO 0;

SET TERM ^ ;
CREATE TRIGGER "increment_id_direccion" FOR "direccion"
ACTIVE BEFORE INSERT POSITION 0
AS
BEGIN
  NEW."id" = next value for "increment_id_direccion";
END^

SET TERM ; ^

CREATE GENERATOR "increment_id_personal";
SET GENERATOR "increment_id_personal" TO 0;

SET TERM ^ ;
CREATE TRIGGER "increment_id_personal" FOR "personal"
ACTIVE BEFORE INSERT POSITION 0
AS
BEGIN
  NEW."id" = next value for "increment_id_personal";
END^

SET TERM ; ^

CREATE GENERATOR "increment_id_sucursal";
SET GENERATOR "increment_id_sucursal" TO 0;

SET TERM ^ ;
CREATE TRIGGER "increment_id_sucursal" FOR "sucursal"
ACTIVE BEFORE INSERT POSITION 0
AS
BEGIN
  NEW."id" = next value for "increment_id_sucursal";
END^

SET TERM ; ^

CREATE GENERATOR "increment_id_asistencia";
SET GENERATOR "increment_id_asistencia" TO 0;

SET TERM ^ ;
CREATE TRIGGER "increment_id_asistencia" FOR "asistencia"
ACTIVE BEFORE INSERT POSITION 0
AS
BEGIN
  NEW."id" = next value for "increment_id_asistencia";
END^

SET TERM ; ^


CREATE GENERATOR "increment_id_asistencia_mensual";
SET GENERATOR "increment_id_asistencia_mensual" TO 0;

SET TERM ^ ;
CREATE TRIGGER "increment_id_asistencia_mensual" FOR "asistencia_mensual"
ACTIVE BEFORE INSERT POSITION 0
AS
BEGIN
  NEW."id" = next value for "increment_id_asistencia_mensual";
END^

SET TERM ; ^


CREATE GENERATOR "increment_id_roles";
SET GENERATOR "increment_id_roles" TO 0;

SET TERM ^ ;
CREATE TRIGGER "increment_id_roles" FOR "roles"
ACTIVE BEFORE INSERT POSITION 0
AS
BEGIN
  NEW."id" = next value for "increment_id_roles";
END^

SET TERM ; ^



SELECT a."id", a."cod_barras",P."nombre", a."fecha", a."hora_entrada", a."hora_salida",
    a."hora_entrada2", a."hora_salida2"
FROM "asistencia" a INNER JOIN "personal" p ON p."cod_barras"=a."cod_barras";

SELECT P."cod_barras",P."nombre",A.*
 FROM "personal" P INNER JOIN "asistencia_mensual" A ON P."cod_barras" =A."cod_barras";
/*Consulta de prueba con sunconsulta*/
    
    SELECT a."fecha",p."cod_barras",p."nombre",SUM ((hora1+hora2)/60) as total
    FROM "personal" p
    JOIN 
    (SELECT "cod_barras","fecha",DATEDIFF(MINUTE,"hora_entrada","hora_salida") as hora1,DATEDIFF(MINUTE,"hora_entrada2","hora_salida2") as hora2 FROM "asistencia" GROUP BY "cod_barras","fecha",hora1,hora2) AS A
    ON P."cod_barras"= A."cod_barras"
    group BY p."cod_barras",p."nombre", a."fecha"

/*Consulta segundo reporte*/
SELECT p."nombre",r."cod_barras", r."fecha", r."hora_entrada", r."hora_salida",
    r."hora_entrada2", r."hora_salida2",DATEDIFF(HOUR,R."hora_entrada",R."hora_salida") AS HORASLABORADAS1,
    DATEDIFF(HOUR,R."hora_entrada2",R."hora_salida2") AS HORASLABORADAS2
    FROM "asistencia" r INNER JOIN "personal" p ON p."cod_barras"=r."cod_barras"
    WHERE R."fecha" >='31.10.2019' AND R."fecha" <='10.11.2019'
         group BY p."nombre",r."cod_barras", r."fecha", r."hora_entrada", r."hora_salida",
    r."hora_entrada2", r."hora_salida2"
    ORDER BY R."cod_barras"


SELECT a."id", a."cod_barras",P."nombre", a."fecha", a."hora_entrada", a."hora_salida",
    a."hora_entrada2", a."hora_salida2"
FROM "asistencia" a INNER JOIN "personal" p ON p."cod_barras"=a."cod_barras";




/*Consulta reporte 1 con  minutos*/
SELECT a."id", a."cod_barras",P."nombre", a."fecha", a."hora_entrada", a."hora_salida",
    a."hora_entrada2", a."hora_salida2",DATEDIFF(MINUTE,A."hora_entrada",A."hora_salida"),DATEDIFF(MINUTE,A."hora_entrada2",A."hora_salida2") AS "horas_laboradas"
FROM "asistencia" a INNER JOIN "personal" p ON p."cod_barras"=a."cod_barras";
/*Consulta 1 con horas*/*
SELECT a."id", a."cod_barras",P."nombre", a."fecha", a."hora_entrada", a."hora_salida",
    a."hora_entrada2", a."hora_salida2",DATEDIFF(HOUR,A."hora_entrada",A."hora_salida"),DATEDIFF(HOUR,A."hora_entrada2",A."hora_salida2") AS "horas_laboradas"
FROM "asistencia" a INNER JOIN "personal" p ON p."cod_barras"=a."cod_barras";


SELECT r."cod_barras",p."nombre", r."mes", r."anio", r."d1", r."d2", r."d3",
    r."d4", r."d5", r."d6", r."d7", r."d8", r."d9", r."d10", r."d11", r."d12",
    r."d13", r."d14", r."d15", r."d16", r."d17", r."d18", r."d19", r."d20",
    r."d21", r."d22", r."d23", r."d24", r."d25", r."d26", r."d27", r."d28", r."d29", r."d30", r."d31"
FROM "asistencia_mensual" r INNER JOIN "personal" p ON p."cod_barras"=r."cod_barras" 



/* consulta nomina*/

SELECT a."id", a."cod_barras",P."nombre", a."fecha", a."hora_entrada", a."hora_salida",
    a."hora_entrada2", a."hora_salida2",DATEDIFF(MINUTE,A."hora_entrada",A."hora_salida") AS "TURNO1" ,DATEDIFF(MINUTE,A."hora_entrada2",A."hora_salida2") AS "TURNO2",
    (select count(*) from "asistencia" where "cod_barras"='75016526346675' )AS ASISTENCIAS 
FROM "asistencia" a INNER JOIN "personal" p ON p."cod_barras"=a."cod_barras"
WHERE a."cod_barras"='75016526346675'
AND a."fecha">'2019-12-29'
AND a."fecha"<'2020-12-29'
GROUP BY a."id", a."cod_barras",P."nombre", a."fecha", a."hora_entrada", a."hora_salida",
    a."hora_entrada2", a."hora_salida2";