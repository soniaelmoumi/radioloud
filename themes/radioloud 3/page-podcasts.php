<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		<h1>PODCASTS</h1>

		<nav id="filtrering">
			<button data-genre="alle">Alle</button>
		</nav>

		<section id="allePodcasts"></section>
	</main>
	<template>
		<article class="podcast-oversigt">
			<div class="container">
				<img src="" alt="" class="billede">
				<div class="mellem">
					<div class="text">
						<h3></h3>
						<h3>⮕</h3>
					</div>
				</div>
			</div>
			<p class="titel"></p>
		</article>
	</template>

	<script>
		const skabelon = document.querySelector("template");
		const allePods = document.querySelector("#allePodcasts");

		let podcasts = [];
		let categories;
		let filterPodcast = "alle";

		document.addEventListener("DOMContentLoaded", start)

		function start() {
			console.log("start");
			getJson();
		}

		const url = "http://victorialoekke.dk/kea/09_cms/loud/wordpress/wp-json/wp/v2/podcast?per_page=100";
		const caturl = "http://victorialoekke.dk/kea/09_cms/loud/wordpress/wp-json/wp/v2/categories";

		async function getJson() {
			let data = await fetch(url);
			let catdata = await fetch(caturl);
			podcasts = await data.json();
			categories = await catdata.json();
			console.log(podcasts);
			console.log(categories);
			visPodcasts();
			opretknapper();
		}

		function opretknapper() {

			categories.forEach(cat => {
				document.querySelector("#filtrering").innerHTML += `<button class="filter" data-genre="${cat.id}">${cat.name}</button>`

			})

			addEventListenersToButtons();
		}

		function addEventListenersToButtons() {
			document.querySelectorAll("#filtrering button").forEach(elm => {
				elm.addEventListener("click", filtrering);
			})
			console.log("clickknap");
		};

		function filtrering() {
			filterPodcast = this.dataset.genre;
			console.log(filterPodcast);
			visPodcasts();
		}




		function visPodcasts() {
			console.log("visPodcasts");
			allePods.innerHTML = "";
			podcasts.forEach(podcast => {
					if (filterPodcast == "alle" || podcast.categories.includes(parseInt(filterPodcast))) {
						let klon = skabelon.cloneNode(true).content;
						console.log(klon);
						klon.querySelector(".container img").src = podcast.billede.guid;
						klon.querySelector("h3").textContent = podcast.title.rendered;
						klon.querySelector("article").addEventListener("click", () => {
							location.href = podcast.link;
						})
						allePods.appendChild(klon);
					}
				} //tuborg fra if sætning lukke  
			)
		}

	</script>


	<!-- #site-content -->

	<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

		<?php
get_footer();
