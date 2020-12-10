<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<div>
<p><?php printf( esc_html__( 'Lieve %s,', 'woocommerce' ), esc_html( $user_login ) ); ?></p>
<p><?php printf( 'Welkom bij Ground Yourself! Leuk dat je een account hebt aangemaakt en je mee op reis gaat naar jouw kern, wie je diep van binnen bent.'); ?></p>
<p><?php printf( 'In deze mail vind je jouw gegevens om in te loggen in jouw account. Hier staat een overzicht van de producten die je hebt aangeschaft, je facturen, etc. Automatisch is er een wachtwoord voor je aangemaakt. Je kan dit wachtwoord zelf aanpassen in je account of door op het inlogscherm te kiezen voor de optie ‘wachtwoord vergeten’.'); ?></p>
</div>
<p>
	<h3>AccountGegevens</h3><
	<?php printf( 'Gebruikersnaam: %s', esc_html( $user_login ) ); ?><br />
	<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>
		<?php printf( esc_html__( 'Gegenereerd wachtwoord: %s', 'woocommerce' ), '<strong>' . esc_html( $user_pass ) . '</strong>' ); ?><br />
	<?php endif; ?>
	<?php printf('Account omgeving: %s',make_clickable( esc_url( wc_get_page_permalink( 'myaccount' ) ) )); ?>
</p>
<?php
/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}


?>
<p><?php printf( esc_html('Mocht je vragen hebben of ergens tegenaan lopen. Stuur me een bericht via')); ?>
<a href='mailto:info@groundyourself.nl'>info@groundyourself.nl</a>
<?php printf( esc_html('. Ik help je graag op weg.')); ?></p>
<p><?php printf( esc_html('Heel veel plezier op je reis!')); ?></p>
<p><?php printf( esc_html('Warme groet,')); ?></p>
<p><?php printf( esc_html('Esther')); ?></p>

<p>
<strong>Ground Yourself</strong><br />
<a href='tel:0031654340961'>0650495212</a><br />
<a href='mailto:info@groundyourself.nl'>info@groundyourself.nl</a><br />
<a href='https://groundyourself.nl'>groundyourself.nl</a><br />
<?php

do_action( 'woocommerce_email_footer', $email );
