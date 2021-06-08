<?php
/* Template Name: Kalendar test */

get_header();
?>

<style>

</style>

	<div id="primary" class="content-area page-area">
		<main id="main" class="site-main">
			<div class="page-content">
				<?php
				while ( have_posts() ) :
					the_post(); ?>

					<article id="post-<?php the_ID(); ?>" class="single-zz">
						<header class="entry-header zz-header">
							<?php the_title( '<h1 class="page-title entry-title">', '</h1>' ); ?>
						</header>

						<div class="entry-content">

						<!-- Kalendar -->	

						<?php

						$mydb = new wpdb('user','pass','dbname','host');
						$events = $mydb->get_results("SELECT post_title, guid, startDate, endDate FROM wp4_posts p, wp4_eo_events e WHERE p.post_type='event' AND p.post_status='publish' AND p.ID = e.post_id");

						?>

<div class="container col-sm-4 col-md-7 col-lg-4 mt-5">
    <div class="card">
        <h3 class="card-header" id="monthAndYear"></h3>
        <table class="table table-bordered table-responsive-sm" id="calendar">
            <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            </thead>

            <tbody id="calendar-body">

            </tbody>
        </table>

        <div class="form-inline">

            <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Previous</button>

            <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Next</button>
        </div>
        <br/>
        <form class="form-inline">
            <label class="lead mr-2 ml-2" for="month">Jump To: </label>
            <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                <option value=0>Jan</option>
                <option value=1>Feb</option>
                <option value=2>Mar</option>
                <option value=3>Apr</option>
                <option value=4>May</option>
                <option value=5>Jun</option>
                <option value=6>Jul</option>
                <option value=7>Aug</option>
                <option value=8>Sep</option>
                <option value=9>Oct</option>
                <option value=10>Nov</option>
                <option value=11>Dec</option>
            </select>
            <label for="year"></label>
            <select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
	            <option value=1990>1990</option>
	            <option value=1991>1991</option>
	            <option value=1992>1992</option>
	            <option value=1993>1993</option>
	            <option value=1994>1994</option>
	            <option value=1995>1995</option>
	            <option value=1996>1996</option>
	            <option value=1997>1997</option>
	            <option value=1998>1998</option>
	            <option value=1999>1999</option>
	            <option value=2000>2000</option>
	            <option value=2001>2001</option>
	            <option value=2002>2002</option>
	            <option value=2003>2003</option>
	            <option value=2004>2004</option>
	            <option value=2005>2005</option>
	            <option value=2006>2006</option>
	            <option value=2007>2007</option>
	            <option value=2008>2008</option>
	            <option value=2009>2009</option>
	            <option value=2010>2010</option>
	            <option value=2011>2011</option>
	            <option value=2012>2012</option>
	            <option value=2013>2013</option>
	            <option value=2014>2014</option>
	            <option value=2015>2015</option>
	            <option value=2016>2016</option>
	            <option value=2017>2017</option>
	            <option value=2018>2018</option>
	            <option value=2019>2019</option>
	            <option value=2020>2020</option>
	            <option value=2021>2021</option>
	            <option value=2022>2022</option>
	            <option value=2023>2023</option>
	            <option value=2024>2024</option>
	            <option value=2025>2025</option>
	            <option value=2026>2026</option>
	            <option value=2027>2027</option>
	            <option value=2028>2028</option>
	            <option value=2029>2029</option>
	            <option value=2030>2030</option>
        	</select>
        </form>
    </div>
</div>						

						</div>

					</article>

				<?php
				endwhile;
				?>
			</div>
		</main>
	</div>

<script>

var events = <?php echo json_encode($events); ?>;

var eventDays = [];
var years = [];
events.forEach(function(event) {
	var startDate = event['startDate'];
	var endDate = event['endDate'];
	eventDays.push( [startDate.substring(0,4), startDate.substring(5,7), startDate.substring(8,10)] );
});
console.log(eventDays);

//var test = [1,4,9,10,16,24,28];

let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");

let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

let monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);


function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}

function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay();
    let daysInMonth = 32 - new Date(year, month, 32).getDate();

    let tbl = document.getElementById("calendar-body"); // body of the calendar

    // clearing all previous cells
    tbl.innerHTML = "";

    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    let date = 1;
    for (let i = 0; i < 6; i++) {
        // creates a table row
        let row = document.createElement("tr");

        //creating individual cells, filing them up with data.
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                let cell = document.createElement("td");
                let cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            } else if (date > daysInMonth) {
                break;
            } else {
                let cell = document.createElement("td");
                let cellText = document.createTextNode(date);

                eventDays.forEach(function(dt) {
	                if ( dt[2].includes(Number(date)) && date!==today.getDate() && month === today.getMonth() ) {
						if (month === dt[1]) { 
		                	cell.classList.add("bg-success");
						}
	                } else if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth() && dt[2].includes(Number(date)) ) {
						if (month === dt[1]) {	                	
	                    	cell.classList.add("bg-danger");
	                    }
	                } else if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
	                	if (month === dt[1]) {
	                    	cell.classList.add("bg-info");
	                	}
	                } 
	                cell.appendChild(cellText);
	                row.appendChild(cell);               	
                })

                /*if ( test.includes(Number(date)) && date!==today.getDate() && month === today.getMonth() ) { 
                	cell.classList.add("bg-success");
                } else if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth() && test.includes(Number(date)) ) {
                    cell.classList.add("bg-danger");
                } else if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("bg-info");
                } 
                cell.appendChild(cellText);
                row.appendChild(cell);*/
                date++;
            }
        }
        tbl.appendChild(row); // appending each row into calendar body.
    }

}
</script>	

<?php
get_sidebar();
get_footer();
