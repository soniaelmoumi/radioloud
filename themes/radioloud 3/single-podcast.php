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

		<section id="singlePodcast"></section>
	</main>


	<article class="indhold">

		<h1></h1>
		<div class="sp_section_wrapper">
			<div class="col">
				<h3>HØR SENESTE</h3>
				<p class="titel"></p>
				<p class="beskrivelse"></p>
				<div class="some">

					<a href="#"><img class="h-8 w-auto" src="https://loud.land/wp-content/themes/radioloud/dist/images/apple-podcast_2f6140b7.svg" alt="Apple podcast"></a>

					<a href="#"><img class="h-8 w-8" src="https://loud.land/wp-content/themes/radioloud/dist/images/spotify_977b3a3c.svg" alt="Apple podcast"></a>

					<a href="#"><img class="h-8 w-auto" src="https://loud.land/wp-content/themes/radioloud/dist/images/google-podcast_27468af1.svg" alt="Apple podcast"></a>

					<a href="#"><img class="h-8 w-auto mt-px" src="https://loud.land/wp-content/themes/radioloud/dist/images/podimo_8c4b0116.png" alt="Podomi podcast"></a>
				</div>
				<button id="knap">Tilbage til Podcasts</button>
			</div>
			<div class="col">
				<img src="" alt="" class="billede">
			</div>
		</div>


	</article>
	<h2>FLERE EPISODER</h2>
	<section id="episoder">

		<template id="template">
			<article class="single_ep">
				<div class="container">
					<img src="" alt="">
					<div class="mellem">
						<div class="text">
							<h3></h3>
							<p class="ep_beskrivelse"></p>
							<p class="dato"></p>
						</div>
					</div>
				</div>
			</article>
		</template>
	</section>

	<section id="meresom">
		<h2>MERE SOM DETTE</h2>
		<template id="fleretemp">
			<article class="fleretemp1">
				<p class="meretitel"></p>
				<p class="merebeskrivelse"></p>
				<img src="" alt="" class="mere">
			</article>
		</template>
	</section>



	<script>
		let podcast;
		let episoder;
		let aktuelPodcast = <?php echo get_the_ID() ?>;
		let mereSomDette;
		let mereSom;

		const dbUrl = "http://victorialoekke.dk/kea/09_cms/loud/wordpress/wp-json/wp/v2/podcast/" + aktuelPodcast;
		const episodeUrl = "http://victorialoekke.dk/kea/09_cms/loud/wordpress/wp-json/wp/v2/episoder?per_page=100";
		const container = document.querySelector("#episoder");
		const mereTemp = document.querySelector("#meresom");
		const flereTemp = document.querySelector("#fleretemp");

		document.addEventListener("DOMContentLoaded", getJSON);
		console.log("load");

		async function getJSON() {
			//henter podcast 
			let jsonData = await fetch(dbUrl);
			console.log("henter json");
			podcast = await jsonData.json();
			// henter episoder

			let jsonData2 = await fetch(episodeUrl);
			episoder = await jsonData2.json();
			mereSomDette = podcast.categories[0];

			let jsonData3 = await fetch("http://victorialoekke.dk/kea/09_cms/loud/wordpress/wp-json/wp/v2/podcast?categories=" + mereSomDette);
			mereSom = await jsonData3.json();


			console.log("Podcast", mereSomDette);

			visPodcast();
			visEpisoder();
			visMere();
		}

		function visPodcast() {

			console.log("vis podcast");
			console.log(podcast.billede.guid);

			document.querySelector(".billede").src = podcast.billede.guid;
			document.querySelector("h1").textContent = podcast.title.rendered;
			document.querySelector(".beskrivelse").textContent = podcast.beskrivelse;
			document.querySelector("#knap").addEventListener("click", tilbageTilPodcasts);

		}



		function visEpisoder() {
			console.log("vis episoder");
			let temp = document.querySelector("#template");
			episoder.forEach(episode => {

				console.log("episoder", episoder);
				console.log("horer_til_podcast", parseInt(episode.horer_til_podcast));
				if (episode.horer_til_podcast == aktuelPodcast) {
					console.log("loop id: ", aktuelPodcast);
					let klon = temp.cloneNode(true).content;
					klon.querySelector("h3").textContent = episode.title.rendered;
					klon.querySelector("img").src = episode.singlebillede.guid;
					klon.querySelector(".ep_beskrivelse").innerHTML = episode.episodebeskrivelse;
					klon.querySelector(".dato").innerHTML = episode.singlebillede.post_date;
					klon.querySelector(".single_ep").addEventListener("click", () => {
						location.href = episode.link;
					})
					container.appendChild(klon);
				}

			})

		}

		function visMere() {
			console.log("vis mere", mereSom);

			mereSom.forEach(podcast => {
				if (aktuelPodcast != podcast.id) {
					console.log("aktuel podcast:", aktuelPodcast);
					console.log("podcast id:", podcast.id);

					const klon = flereTemp.cloneNode(true).content;

					klon.querySelector(".mere").src = podcast.billede.guid;
					klon.querySelector(".meretitel").textContent = podcast.title.rendered;
					klon.querySelector(".merebeskrivelse").textContent = podcast.beskrivelse;
					klon.querySelector(".fleretemp1").addEventListener("click", () => {
						location.href = podcast.link;
					})
					mereTemp.appendChild(klon);
				}
			})

			//episoder skal være mereSom
			//episode skal være podcast
		}

		function tilbageTilPodcasts() {
			console.log("gå tilbage");
			history.back();
		}

	</script>

	<?php get_footer(); ?>
