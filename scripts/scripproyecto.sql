INSERT INTO public.categorias(
	id, "catPadre", user_id, tipo, descripcion, presupuesto)
	VALUES (45, 'N/A','2','Ingreso','Salario',10000);
INSERT INTO public.categorias(
	id, "catPadre", user_id, tipo, descripcion, presupuesto)
	VALUES (46, 'Vivienda','2','Gasto','Reparaciones',40000);
INSERT INTO public.categorias(
	id, "catPadre", user_id, tipo, descripcion, presupuesto)
	VALUES (47, 'Entretenimiento','4','Gasto','Cine',30000);
INSERT INTO public.categorias(
	id, "catPadre", user_id, tipo, descripcion, presupuesto)
	VALUES (48, 'N/A','2','Ingreso','Trabajos',10000);
INSERT INTO public.categorias(
	id, "catPadre", user_id, tipo, descripcion, presupuesto)
	VALUES (50, 'Vivienda','6','Gasto','Agua',10000);
INSERT INTO public.categorias(
	id, "catPadre", user_id, tipo, descripcion, presupuesto)
	VALUES (49, 'N/A','2','Gasto','Viaje',500000);
INSERT INTO public.cuentas(
	id, user_id, moneda_id, nombre, descripcion, "saldoInicial", icono)
	VALUES (1,'3','1','Coocique','Cuenta Dollar',1000000);
INSERT INTO public.cuentas(
	id, user_id, moneda_id, nombre, descripcion, "saldoInicial", icono)
	VALUES (3,'5','2','BCR','Cuenta Colones',200000);
INSERT INTO public.cuentas(
	id, user_id, moneda_id, nombre, descripcion, "saldoInicial", icono)
	VALUES (5,'3','5','Banco Nacional','Cuenta Euro',2000000);
INSERT INTO public.monedas(
	id, user_id, nombre, simbolo, descripcion, tasa)
	VALUES (1, '2', 'Dollar', '$','Dolar USA','609');
INSERT INTO public.monedas(
id, user_id, nombre, simbolo, descripcion, tasa)
VALUES (4, '4', 'Colones', '$','=Colon CR','1');
INSERT INTO public.transaccions(
	id, tipo, user_id, fecha, categoria, cuenta, detalle, monto)
	VALUES (6, 'Gasto', '3','2020-12-03 00:00:00', 'Alquiler','BCR', 'Pago Alquiler', 1325);
INSERT INTO public.transaccions(
	id, tipo, user_id, fecha, categoria, cuenta, detalle, monto)
	VALUES (67, 'Gasto', '2','2020-11-03 00:00:00', 'Cine','BAC', 'Entretenimiendo', 20000);
INSERT INTO public.transaccions(
	id, tipo, user_id, fecha, categoria, cuenta, detalle, monto)
	VALUES (26, 'Salario', '1','2019-12-03 00:00:00', 'Salario','Banco Nacional', 'Salario mes diciembre', 500000);
INSERT INTO public.transaccions(
	id, tipo, user_id, fecha, categoria, cuenta, detalle, monto)
	VALUES (55, 'Gasto', '2','2020-12-03 00:00:00', 'Supermercado','BCR', 'Compras', 30000);
INSERT INTO public.transaccions(
	id, tipo, user_id, fecha, categoria, cuenta, detalle, monto)
	VALUES (77, 'Gasto', '3','2020-12-03 00:00:00', 'Alquiler','BCR', 'Pago Alquiler', 1325);
INSERT INTO public.transaccions(
	id, tipo, user_id, fecha, categoria, cuenta, detalle, monto)
	VALUES (58, 'Ingreso', '2','2020-12-03 00:00:00', 'Ahorros','BCR', 'Ahorros', 30000);
INSERT INTO public.transaccions(
	id, tipo, user_id, fecha, categoria, cuenta, detalle, monto)
	VALUES (59, 'Gasto', '2','2020-12-03 00:00:00', 'Ahorros','BAC', 'Ahorros', 30000);
