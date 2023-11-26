<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mms
 */

?>
<style>
       body {
        position: relative;
    }
	.site-footer {
		margin-top: 100px;
        background-color: #8A70C2;
        color: #fff;
        width: 100%;
        position: absolute;
        bottom: 0;
    }

	main#primary {
        margin: 20px 0; /* Adjust the margin to create space between content and footer */
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .footer-section {
        flex: 1;
        margin: 0 20px;
    }

    .footer-section h2 {
        color: #fff;
        border-bottom: 2px solid #fff;
        padding-bottom: 10px;
    }

    .footer-section p {
        margin-top: 10px;
    }

    .footer-section ul {
        list-style-type: none;
        padding: 0;
    }

    .footer-section a {
        color: #fff;
        text-decoration: none;
    }

    .bottom-bar {
        background-color: #6A5090;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }
</style>


<footer id="footer" class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p>Travel the world with us.</p>
            </div>
            <div class="footer-section contact">
                <h2>Contact Us</h2>
                <p>Email: info@example.com</p>
            </div>
            <div class="footer-section links">
                <h2>Quick Links</h2>
                <ul>
                    <li>
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<p>Home</p>
						</a>
					</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom-bar">
        <div class="container">
            <p>&copy; 2023 TarvelTheWorld.</p>
        </div>
    </div>
</footer>
</div><!-- #page -->
<br>
<br>
<br>
<br>
<br>
<?php wp_footer(); ?>

</body>
</html>
