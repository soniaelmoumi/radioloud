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

    <article class="indhold">

        <h1></h1>
        <div class="sp_section_wrapper">
            <div class="col">
                <h3>LYT TIL EPISODEN</h3>
                <p class="titel"></p>
                <p class="beskrivelse"></p>
                <p class="dato"></p>
                <div class="some">

                    <a href="#"><img class="h-8 w-auto" src="https://loud.land/wp-content/themes/radioloud/dist/images/apple-podcast_2f6140b7.svg" alt="Apple podcast"></a>

                    <a href="#"><img class="h-8 w-8" src="https://loud.land/wp-content/themes/radioloud/dist/images/spotify_977b3a3c.svg" alt="Apple podcast"></a>

                    <a href="#"><img class="h-8 w-auto" src="https://loud.land/wp-content/themes/radioloud/dist/images/google-podcast_27468af1.svg" alt="Apple podcast"></a>

                    <a href="#"><img class="h-8 w-auto mt-px" src="https://loud.land/wp-content/themes/radioloud/dist/images/podimo_8c4b0116.png" alt="Podomi podcast"></a>
                </div>
                <button id="knap">Tilbage til Episoder</button>
            </div>
            <div class="col">
                <img src="" alt="" class="billede">
            </div>
        </div>


    </article>
</main><!-- #site-content -->

<script>
    //let podcast;
    let episoder;
        let aktuelEpisode = <?php echo get_the_ID() ?>;

    //const dbUrl = "http://victorialoekke.dk/kea/09_cms/loud/wordpress/wp-json/wp/v2/podcast/" + aktuelPodcast;
    const episodeUrl = "http://victorialoekke.dk/kea/09_cms/loud/wordpress/wp-json/wp/v2/episoder/" + aktuelEpisode ;
    const container = document.querySelector("indhold");

    document.addEventListener("DOMContentLoaded", getJSON);
    console.log("load");

    async function getJSON() {
        //henter podcast 
        //let jsonData = await fetch(dbUrl);
        //console.log("henter json");
        //podcast = await jsonData.json();
        // henter episoder

        let jsonData2 = await fetch(episodeUrl);
        episoder = await jsonData2.json();


        visEpisode();

        function visEpisode() {

            console.log("vis episode");
            console.log(episoder);


            document.querySelector(".titel").textContent = episoder.title.rendered;
            document.querySelector(".billede").src = episoder.singlebillede.guid;
            document.querySelector(".beskrivelse").innerHTML = episoder.episodebeskrivelse;
            document.querySelector(".dato").innerHTML = episoder.singlebillede.post_date;
            document.querySelector("#knap").addEventListener("click", tilbageTilEpisoder);
        }




        function tilbageTilEpisoder() {
            console.log("gå tilbage");
            history.back();
        }




    }

</script>
<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
