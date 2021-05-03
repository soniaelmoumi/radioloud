<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

	<main id="site-content" role="main">
		<section id="ol_first_section">
			<div class="section_wrapper">
				<div class="col">
					<h1>OM LOUD</h1>
					<p>LOUD er Danmarks kultur- og talemedie for unge. Bag LOUD står en række medievirksomheder, ungdomsorganisationer og fremtrædende kultur- og undervisningsinstitutioner, der har fundet sammen om at skabe et landsdækkende lydmedie med DAB-kanal, podcast, stream og liveevents. LOUD drives af selskabet Kulturradio Danmark A/S, som er ejet af Berlingske Media A/S, Radio Diablo ApS, Foreningen Radio Limfjord, Radio Max Danmark ApS, Klinkby Holding ApS og Our Media ApS. Kulturpartnerne bidrager med viden, kompetencer og indhold. Kulturpartnerne er Roskilde Festival, Vega, Nationalmuseet, Enigma, Teater Mungo Park, Det Kongelige Danske Musikkonservatorium, lex.dk, Danske Studerendes Fællesråd og Ungdomsbureauet.</p>
				</div>
				<div class="col">
					<img class="h-12 w-auto sm:h-10 xyz" src="https://loud.land/wp-content/themes/radioloud/dist/images/radio-loud_2f112a81.png" alt="Radio LOUD" data-alt-src="https://loud.land/wp-content/themes/radioloud/dist/images/loud-logo-red-box_animated_9a8afa41.svg">
				</div>
			</div>
		</section>
		<section id="ol_second_section">
			<div class="overskrift">
				<div>
					<h1>INFOR- <br> MATION</h1>
				</div>
				<div></div>
			</div>

			<div class="section_wrapper">
				<div class="col">
					<h4>KONTAKT</h4>
					<p>kontakt@radioloud.dk
						<br> +45 32 42 17 14
						<br>
						<br> <b> Programredaktion</b>

						<br> Wildersgade 10B, 2. sal
						<br> 1408 København
						<br>
						<br><b> Nyhedsredaktion </b>

						<br> Vestergade 165D, 2. sal
						<br> 5700 Svendborg </p>
				</div>
				<div class="col">
					<h4>PRESSE</h4>
					<p> For information og pressebilleder
						<br> Skriv til presse@radioloud.dk
						<br>
						<br> <b>Pressemeddelelser</b>
						<br> Du finder LOUDs pressemeddelelser på ritzau.dk/nyhedsrum/radio-loud</p>
				</div>
				<div class="col">
					<h4>PRAKTIK</h4>
					<p> Er du journaliststuderende og står overfor at søge praktik? Så er det dig, vi leder efter.</p>
					<h4>JOB</h4>
					<p> Har du lyst til at være en del af Radio LOUD?
						<br>
						<br> Du er meget velkommen til at sende en ansøgning til job@radioloud.dk</p>
				</div>
			</div>

		</section>
		<section id="ol_third_section">
			<div class="overskrift">
				<div>
				</div>
				<div>
					<h1>LYT TIL LOUD</h1></div>
			</div>
			<div class="section_wrapper">
				<div class="col">
					<h4>WEB</h4>
					<p>Du kan lytte til LOUD her på hjemmesiden: Klik blot på ”LOUD live” på forsiden eller ved at finde vores podcasts her. </p>
					<h4>APP</h4>
					<p>Du kan downloade vores app, Radio LOUD, i App Store eller Google Play. </p>
				</div>
				<div class="col">
					<h4>INTERNETRADIO</h4>
					<p>Har du en internetradio, kan du lytte på den. Det er ikke alle apparater, der endnu har medtaget Radio LOUD på deres lister over stationer. Der findes mange forskellige steder, hvor producenterne henter deres stationslister fra, men kan du ikke finde os på netop din internetradio, kan du selv bruge dette direkte stream: https://stream.radioloud.dk/loud128</p>
				</div>
				<div class="col">
					<h4>DAB</h4>
					<p>På din DAB-radio skal du måske lave en søgning efter nye kanaler, hvis du ikke har opdateret din DAB-radio for nylig. Efter en søgning vil du finde LOUD blandt dine kanaler. Du kan se, hvor DAB-nettet dækker på kortet nedenfor.</p>
				</div>
			</div>

		</section>

	</main>
	<!-- #site-content -->

	<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

		<?php get_footer(); ?>
