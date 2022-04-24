<?php
if ($_GET['nextView']) {
    $results[0] = $seriesTV->nextView();
} else if (isset($_POST['time']) || isset($_POST['title'])) {
    $time = ($_POST['time'] == "") ? null : $_POST['time'];
    $title = ($_POST['title'] == "") ? null : $_POST['title'];
    $results = $seriesTV->searchSeries($time, $title);
} else {
    $results = null;
}
?>
<main>
    <section>
        <div class="row justify-content-center">
            <div class="col-lg-12 bg-secondary rounded-3 shadow p-3">
                <h4 class="text-white text-center">QUESTION 3</h4>
                <p class="text-light">
                    <strong>TV Series</strong><br />
                    Populate a MySQL (InnoDB) database with data from at least 3 TV Series using the following structure:<br />
                    tv_series -> (id, title, channel, gender);<br />
                    tv_series_intervals -> (id_tv_series, week_day, show_time);<br />
                    * Provide the SQL scripts that create and populate the DB;<br />
                    Using OOP, write a code that tells when the next TV Series will air based on the current time-date or an
                    inputted time-date, and that can be optionally filtered by TV Series title.
                </p>
            </div>
        </div>
        <div class="row justify-content-center mt-3 mb-5">
            <div class="col-lg-3">
                <a href="/test-php/indexSeriesTV.php?nextView=true" class="btn btn-sm btn-success">Next View (Series)</a>
            </div>
            <div class="col-lg-9">
                <form class="row row-cols-lg-auto g-3 align-items-center" method="post" action="/test-php/indexSeriesTV.php">
                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-text">Time</div>
                            <input type="time" class="form-control form-control-sm" name="time">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-text">Title</div>
                            <input type="text" class="form-control form-control-sm" name="title">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-3 mb-5">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <th>Title</th>
                        <th>Channel</th>
                        <th>Gender</th>
                        <th>Week Day</th>
                        <th>Show Time</th>
                    </thead>
                    <tbody>
                        <?php
                        if ($results == null) {
                            echo "<tr><td>No results!</td></tr>";
                        } else {
                            foreach ($results as $result) {
                                echo "<tr>";
                                echo "<td>" . $result['title'] . "</td>";
                                echo "<td>" . $result['channel'] . "</td>";
                                echo "<td>" . $result['gender'] . "</td>";
                                echo "<td>" . $result['week_day'] . "</td>";
                                echo "<td>" . $result['show_time'] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>