<?php
/* Template Name: Font test */

get_header();
?>

	<div id="primary" class="content-area page-area">
		<main id="main" class="site-main">
			<div class="page-content">
				<?php
				while ( have_posts() ) :
					the_post(); ?>

					<article id="post-<?php the_ID(); ?>" class="single-zz">

						<div style="margin-top:83px">

							<h1>Europski tjedan testiranja na HIV i virusne hepatitise</h1>
							<h5>16. STUDENOGA 2018.</h5>

							<div style="max-width:580px; /*margin:0 auto;*/">
								<!--<h2>Drugi naslov ili podnaslov</h2>-->
								<!--<h5>Objavio: <a href="#urednik">Urednik</a> / 16.01.2019</h5>-->
								<p>U razdoblju od 23. do 30. studenog 2018. godine održat će se šesti po redu Europski tjedan testiranja na HIV i virusne hepatitise (četvrti po redu za virusne hepatitise) s ciljem podizanja svijesti javnosti diljem Europe o važnosti testiranja i ranog otkrivanja infekcije HIV-om i virusnih hepatitisa.</p>
								<p>Aktivnosti Europskog tjedna testiranja su u skladu s globalnim ciljem u kojem je Zajednički program Ujedinjenih naroda za HIV (UNAIDS) pozvao sve zemlje da do 2020. godine postignu da 90 % zaraženih osoba bude dijagnosticirano, 90 % dijagnosticiranih uzima antiretrovirusne lijekove i 90 % liječenih ima nemjerljivu viremiju.</p>
								<h3>Naslov u postu</h3>
								<p>Hrvatska pripada skupini zemalja niske prevalencije za infekciju HIV-om i virusne hepatitise, no neka rizična ponašanja dovode i do većeg rizika. Testiranje i rano otkrivanje infekcije je stoga važno, jer je liječenje u tom slučaju uspješnije i sprečava se širenje infekcija.</a>, eleifend enim id, finibus orci. Vivamus tempus nibh sed malesuada elementum. Etiam sed neque at erat interdum sollicitudin. Quisque lacus orci, dictum sed mauris eu, interdum commodo tellus.</p>
								<h4>Podnaslov u postu</h4>
								<p>In placerat egestas elit. Cras dictum gravida tincidunt. In nec imperdiet libero. In luctus ultricies purus, nec rutrum nisl maximus ultrices. Nullam molestie congue laoreet. Duis tristique elit sed erat tristique venenatis. Nulla facilisi. Sed interdum non mi in tincidunt. Curabitur semper ultrices tellus, nec dictum nunc ornare sed.</p>
								<h2>Veliki naslov u postu</h2>
								<p>Aenean et feugiat purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas purus nunc, suscipit eu tristique id, tincidunt sed ligula. Etiam laoreet elit quis lectus ullamcorper, id ornare nunc porttitor. Fusce molestie eget arcu vel suscipit. Vivamus sodales dolor quam, et luctus nisl volutpat at. Cras dignissim quis ex a maximus. Fusce placerat ullamcorper pharetra. Praesent vitae lorem in odio vulputate pretium in nec dui.</p>
								<p><strong>Unordered list:</strong></p>
								<ul>
									<li>In placerat egestas elit</li>
									<li><a href="#link2">Fusce molestie eget</a></li>
									<li>Vivamus sodales dolor quam</li>
									<li>Curabitur rhoncus orci massa</li>
								</ul>
								<p><strong>Ordered list:</strong></p>
								<ol>
									<li>Pellentesque interdum elit purus, in dignissim mi cursus at</li>
									<li><a href="#link2">Sed ut dapibus tellus</a></li>
									<li><a href="#link3">Cras dictum gravida tincidunt</a></li>
									<li>Etiam elit lectus, blandit sit amet malesuada vel</li>
								</ol>
							</div>

						</div>
						<br><br><br><br><br><br><br><br>
					</article>

				<?php
				endwhile;
				?>
			</div>
		</main>
	</div>

<?php
get_sidebar();
get_footer();
