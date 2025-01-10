INSERT INTO `urbankicks`.`users` (username, firstName, lastName, password, active) 
VALUES ('admin@gmail.com', 'admin', 'admin', 'f1973d96812ab16510499d5a8747f03492c9fd582dd4c20ffd89ed84598b2a5e043d24cd3d8bda5106316b191f360852c695058f11b9d3851c60ec7aca2c72c6', 0);

INSERT INTO `urbankicks`.`articles` (name, price, stock, description, type)
VALUES
('Nike Air Max', 120.50, 50, 'Comfortable and stylish sneakers.', 1),
('Puma RS-X', 110.75, 20, 'Fashionable sneakers with vibrant colors.', 1),
('Adidas Ultraboost', 150.00, 40, 'Running shoes with Boost technology for excellent comfort and energy return.', 2),
('New Balance 574', 85.75, 60, 'Classic, durable, and comfortable shoes, perfect for any occasion.', 2),
('Converse Chuck Taylor', 55.00, 100, 'The classic canvas sneakers with Converse’s famous design, for a casual style.', 3),
('Jordan 1 Retro', 190.00, 25, 'Sports shoes with a classic design from the Air Jordan line, ideal for basketball fans.', 3),
('Reebok Classic Leather', 70.00, 45, 'Classic leather shoes, comfortable and with a minimalist style that never goes out of fashion.', 1),
('Nike Air Force 1', 100.00, 80, 'Classic basketball sneakers with a sturdy sole and timeless design.', 1),
('Under Armour HOVR Phantom', 130.00, 35, 'Sports shoes with HOVR technology for a zero-gravity feel and greater energy return.', 3),
('Fila Disruptor 2', 75.00, 90, 'Shoes with a thick sole and bold design, popular for their urban and retro style.', 1),
('Vans Old Skool', 65.00, 60, 'Classic skate shoes with the iconic side stripe and a simple, elegant design.', 2),
('Asics Gel-Kayano 26', 120.00, 50, 'Running shoes with Gel technology for exceptional cushioning and stability.', 3);

INSERT INTO `urbankicks`.`logins` (date, screenResolution, operatingSystem, IDuser) 
VALUES (CURRENT_TIMESTAMP, '1920x1080', 'Windows', 1);
