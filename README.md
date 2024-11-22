# SnickersWebshop

NOMBRE--->>UrbanKicks

Todas las imagenes en .jpg y organizarlas en carpetas

La informacion y fotos sobre zapatillas podemos copiarla de https://stockx.com/category/sneakers

## PAGES

Javier:
- Index.php
- Login.php
- Register.php
- ForgotPassword.php
- HomePage.php
- Contact.php

Yeray:
- AllArticles.php --> solo 3 o 4 articulos en la pagina listados
- ShoppingCart.php
- CheckOut.php
- OrderConfirmed.php
- *emailRegister.php -->email que se manda formateado como html* -- ESTO ES emailSend.php
- About.php
## DATABASE

TODO EL SQL CREARLO EN ARCHIVOS APARTE .SQL --> 1 de definion de todas las tablas. 1 para cada tabla, de agregar filas

JAVIER

- Login data - date,time,screenResolution,operatingSystem, active(yes,no)
- Users - username,password(encripted),email,IDshoppingBasket
- articlesOrder - IDarticlesOrder,IDarticle, quantity
- orders - orderID, username, IDarticlesOrder, date_order

YERAY

- shoppingBasket - IDshoppingBasket,IDarticlesShoppingBasket
- articlesShoppingBasket - IDarticlesShoppingBasket, IDshoppingBasket,IDarticle,quantity
- articles – IDarticle, Name, Price, quantity, type(basket,streetWear),description 
- supportTickets- IDticket, username, title

TAREAS
Poner margenes, Blog? seo?
