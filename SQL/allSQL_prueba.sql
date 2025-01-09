/*
----------------------------------------
-- Insertando usuarios
INSERT INTO urbankicks.users (username, firstName, lastName, password,active) 
                    VALUES ('admin@gmail.com', 'admin', 'admin', 'f1973d96812ab16510499d5a8747f03492c9fd582dd4c20ffd89ed84598b2a5e043d24cd3d8bda5106316b191f360852c695058f11b9d3851c60ec7aca2c72c6',0)


-- Insertando artículos
INSERT INTO urbankicks.articles (name, price, stock, description, type)
VALUES
('Nike Air Max', 120.50, 50, 'Comfortable and stylish sneakers.', 1),
('Puma RS-X', 110.75, 20, 'Fashionable sneakers with vibrant colors.', 1),
('Adidas Ultraboost', 150.00, 40, 'Zapatillas de running con tecnología Boost para una excelente comodidad y retorno de energía.', 2),
('New Balance 574', 85.75, 60, 'Zapatillas clásicas, resistentes y cómodas, perfectas para cualquier ocasión.', 2),
('Converse Chuck Taylor', 55.00, 100, 'Las clásicas zapatillas de lona con el famoso diseño de Converse, para un estilo casual.', 3),
('Jordan 1 Retro', 190.00, 25, 'Zapatillas deportivas con un diseño clásico de la línea Air Jordan, ideales para los fanáticos del baloncesto.', 3),
('Reebok Classic Leather', 70.00, 45, 'Zapatillas de cuero clásicas, cómodas y con un estilo minimalista que nunca pasa de moda.', 1),
('Nike Air Force 1', 100.00, 80, 'Zapatillas de baloncesto clásicas con una suela robusta y un diseño atemporal.', 1),
('Under Armour HOVR Phantom', 130.00, 35, 'Zapatillas deportivas con tecnología HOVR para una sensación de gravedad cero y mayor retorno de energía.', 3),
('Fila Disruptor 2', 75.00, 90, 'Zapatillas con una suela gruesa y un diseño audaz, populares por su estilo urbano y retro.', 1),
('Vans Old Skool', 65.00, 60, 'Zapatillas clásicas de skate con la icónica franja lateral y diseño simple y elegante.', 2),
('Asics Gel-Kayano 26', 120.00, 50, 'Zapatillas de running con tecnología Gel para una amortiguación y estabilidad excepcionales.', 3);


-- Insertando logins
INSERT INTO `urbankicks`.`logins` (date, screenResolution, operatingSystem, IDuser) VALUES (CURRENT_TIMESTAMP, '1920x1080', 'Windows', 1);



---------------------------------------

*/