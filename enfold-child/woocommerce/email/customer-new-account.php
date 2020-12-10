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

<?php /* translators: %s: Customer username */ ?>
<p><?php printf( esc_html__( 'lieve %s,'), esc_html( $user_login ) ); ?></p>
<?php /* translators: %1$s: Site title, %2$s: Username, %3$s: My account link */ ?>
<p><?php printf( esc_html__( 'Welkom bij %1$s!. Leuk dat je een account hebt aangemaakt en je mee op reis gaat naar jouw kern, wie je diep van binnen bent.', esc_html( $blogname ))); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
<p><?php printf( esc_html__( 'In deze mail vind je jouw gegevens om in te loggen in jouw account. Hier staat een overzicht van de producten die je hebt aangeschaft, je facturen, etc. Automatisch is er een wachtwoord voor je aangemaakt. Je kan dit wachtwoord zelf aanpassen in je account of door op het inlogscherm te kiezen voor de optie wachtwoord vergeten. ');?></p>

<p><strong><?php printf( esc_html__( 'AccountGegevens') ); ?></strong></p>
<p><?php printf( esc_html__( 'Gebruikersnaam :%s,' ), '<strong>' . esc_html( $user_login ) . '</strong>' ); ?></p>
<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>
	<?php /* translators: %s: Auto generated password */ ?>
	<p><?php printf( esc_html__( 'Automatisch gegenereerd wachtwoord: %s', 'woocommerce' ), '<strong>' . esc_html( $user_pass ) . '</strong>' ); ?></p>
<?php endif; ?>
<p><?php printf( esc_html__('account omgeving: %3$s', 'woocommerce' ), esc_html( $blogname ), '<strong>' . esc_html( $user_login ) . '</strong>', make_clickable( esc_url( wc_get_page_permalink( 'myaccount' ) ) ) );?></p>

<p>Mocht je vragen hebben of ergens tegenaan lopen, let me know. Stuur me een bericht via <a href='mailto:info@groundyourself.nl'>info@groundyourself.nl</a>. Ik help je graag op weg.</p>
<p>Heel veel plezier op je reis!</p>
<p>Warme groet,</p>
<p>Esther </p>

<p>
<strong>Ground Yourself</strong> <br />
<a href="tel:0031650495212">0650495212</a> <br/>
<a href='mailto:info@groundyourself.nl'>info@groundyourself.nl</a>
<a href='https://groundyourself.nl'>groundyourself.nl</a>
</p>

<?php
/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

do_action( 'woocommerce_email_footer', $email );
