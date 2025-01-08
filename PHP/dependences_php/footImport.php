<footer
        style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; padding: 20px 0;">
        <p>&copy; 2024 Snickers Webshop. All rights reserved.</p>

        <a class="nav-link <?= ($activePage == 'about') ? 'active' : ''; ?>" href="aboutus.php">About Us</a>

        <a class="nav-link <?= ($activePage == 'contact') ? 'active' : ''; ?>" href="contact.php">Contact</a>

        <br><br>
</footer>

<script src="..\JS\bootstrap\js\bootstrap.bundle.min.js"></script>