/*
----------------------------------------
-- Insertando usuarios
INSERT INTO users (username, firstName, lastName, password,active) 
                    VALUES ('admin@gmail.com', 'admin', 'admin', 'f1973d96812ab16510499d5a8747f03492c9fd582dd4c20ffd89ed84598b2a5e043d24cd3d8bda5106316b191f360852c695058f11b9d3851c60ec7aca2c72c6',0)


-- Insertando artículos
INSERT INTO urbankicks.articles (name, price, stock, description)
VALUES
('Nike Air Max', 120.50, 50, 'Comfortable and stylish sneakers.'),
('Puma RS-X', 110.75, 20, 'Fashionable sneakers with vibrant colors.');
('Adidas Ultraboost', 150.00, 40, 'Zapatillas de running con tecnología Boost para una excelente comodidad y retorno de energía.'),
('New Balance 574', 85.75, 60, 'Zapatillas clásicas, resistentes y cómodas, perfectas para cualquier ocasión.'),
('Converse Chuck Taylor', 55.00, 100, 'Las clásicas zapatillas de lona con el famoso diseño de Converse, para un estilo casual.'),
('Jordan 1 Retro', 190.00, 25, 'Zapatillas deportivas con un diseño clásico de la línea Air Jordan, ideales para los fanáticos del baloncesto.'),
('Reebok Classic Leather', 70.00, 45, 'Zapatillas de cuero clásicas, cómodas y con un estilo minimalista que nunca pasa de moda.'),
('Nike Air Force 1', 100.00, 80, 'Zapatillas de baloncesto clásicas con una suela robusta y un diseño atemporal.'),
('Under Armour HOVR Phantom', 130.00, 35, 'Zapatillas deportivas con tecnología HOVR para una sensación de gravedad cero y mayor retorno de energía.'),
('Fila Disruptor 2', 75.00, 90, 'Zapatillas con una suela gruesa y un diseño audaz, populares por su estilo urbano y retro.'),
('Vans Old Skool', 65.00, 60, 'Zapatillas clásicas de skate con la icónica franja lateral y diseño simple y elegante.'),
('Asics Gel-Kayano 26', 120.00, 50, 'Zapatillas de running con tecnología Gel para una amortiguación y estabilidad excepcionales.'),
('Saucony Ride 13', 115.00, 40, 'Zapatillas de running con una excelente amortiguación y ajuste perfecto para largas distancias.');


-- Insertando logins
INSERT INTO urbankicks.logins (date, screenResolution, operatingSystem, IDuser)
VALUES
CURRENT_TIMESTAMP, '1920x1080', 'Windows', 1;

-- Insertando pedidos
INSERT INTO urbankicks.orders (dateorder, IDuser)
VALUES
('2024-11-28 14:00:00', 1),
('2024-11-28 15:30:00', 2),
('2024-11-28 16:00:00', 3);

-- Insertando relación entre pedidos y artículos (orderarticle)
INSERT INTO urbankicks.orderarticle (quantity, idorder, idarticle)
VALUES
(2, 1, 1),  -- 2 Nike Air Max for order 1
(1, 1, 2),  -- 1 Adidas Ultraboost for order 1
(3, 2, 3),  -- 3 Puma RS-X for order 2
(1, 3, 1),  -- 1 Nike Air Max for order 3
(2, 3, 2);  -- 2 Adidas Ultraboost for order 3

-- Insertando relación entre usuarios y artículos (userarticle)
INSERT INTO urbankicks.userarticle (quantity, IDuser, idarticle)
VALUES
(1, 1, 1),  -- 1 Nike Air Max for John Doe
(2, 2, 2),  -- 2 Adidas Ultraboost for Jane Smith
(1, 3, 3);  -- 1 Puma RS-X for Sam Jones


---------------------------------------

*/