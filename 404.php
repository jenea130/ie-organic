<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ar-starter
 */

get_header();
?>
<meta http-equiv="refresh" content="5;url=/" />
<main id="primary" class="site-main">
    <section class="error-404 not-found" style="padding-top: 30vh; padding-bottom: 30vh;">
        <header class="page-header">
            <h1 class="page-title" style="text-align:center; margin-top:10vh;">404 - La pagina che stavi cercando non
                esiste. <br>
                <progress value="0" max="4" id="progressBar"></progress>
            </h1>
        </header><!-- .page-header -->
        <div class="page-content" style="text-align:center">
            <p>La pagina richiesta non è stata trovata, <br> tra pochi secondi sarai rediretto all'home page</p>
        </div><!-- .page-content -->
    </section><!-- .error-404 -->
</main><!-- #main -->
<script>
var timeleft = 4;
var downloadTimer = setInterval(function() {
    if (timeleft <= 0) {
        clearInterval(downloadTimer);
    }
    document.getElementById("progressBar").value = 4 - timeleft;
    timeleft -= 1;
}, 1000);
</script>
<?php
get_footer();