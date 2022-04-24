<main>
    <section>
        <div class="row justify-content-center">
            <div class="col-lg-8 bg-secondary rounded-3 shadow p-3">
                <h4 class="text-white text-center">QUESTION 4</h4>
                <p class="text-light">
                    <strong>A/B Testing</strong><br />
                    Exads would like to A/B test some promotional designs to see which provides the best conversion rate.<br />
                    Write a snippet of PHP code that redirects end users to the different designs based on the data
                    provided by this library: packagist.org/exads/ab-test-data.
                </p>
            </div>
        </div>
        <div class="row justify-content-center mt-3 mb-2">
            <div class="col-lg-8 bg-white rounded-3 shadow p-3 text-dark">
                <h5>Choose a promotion and start the test</h5>
                <form class="row row-cols-lg-auto g-3 align-items-center" method="post" action="/test-php/indexABTesting.php">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="promotion" id="flexRadioDefault1" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Promotion (1)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="promotion" id="flexRadioDefault2" value="2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Promotion (2)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="promotion" id="flexRadioDefault2" value="3">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Promotion (3)
                        </label>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Start Test</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-3 mb-2">
            <div class="col-lg-8 bg-white rounded-3 shadow p-3 text-dark">
                <a href="/test-php/indexABTesting.php?plus=yes" class="btn btn-sm btn-success">Plus Visitors
                    <?php
                    if ($_SESSION['control']) {
                        echo "<span class='badge bg-warning text-dark p-2'> Total Visitors: " . $_SESSION['control']['total'] . "</span>";
                    }
                    ?>
                </a>
                <a href="/test-php/indexABTesting.php?clear=yes" class="btn btn-sm btn-danger">Clear data</a>

            </div>
        </div>
        <div class="row justify-content-center mt-3 mb-2">
            <div class="col-lg-8 bg-white rounded-3 shadow p-3 text-dark">
                <?php
                if ($_SESSION['control']) {
                    for ($i = 0; $i < count($_SESSION['control']['designers']); $i++) {
                        echo "<div class='card bg-primary mb-1'>";
                        echo "<div class='card-body'>";
                        echo "<h3>{$_SESSION['control']['designers'][$i]['name']}</h3>";
                        echo "Visitors: <span class='badge bg-warning text-dark p-2'>{$_SESSION['control']['designers'][$i]['visitorsNumber']}</span><br />";
                        echo "Split Percent: <span class='badge bg-warning text-dark p-2'>{$_SESSION['control']['designers'][$i]['splitPercent']}</span><br />";
                        echo "Current Percent: <span class='badge bg-warning text-dark p-2'>{$_SESSION['control']['designers'][$i]['currentPercentage']}</span><br />";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>