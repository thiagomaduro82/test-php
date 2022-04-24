<?php
if ($_GET['create_database'] == 'yes') {
    $return = $database->makeStructure();
}
?>
<main>
    <section>
        <div class="row justify-content-center">
            <div class="col-lg-6 bg-secondary rounded-3 shadow p-3">
                <h5 class="text-white">This is a system made for the position of PHP Developer at Exads.<br />
                    To access the questions with their results, access the menu above.<br /><br />
                    To perform Question 3, you must include your database access data in the Database.php file. <br />
                    Required data:<br />
                    HOST, DB_NAME, USER, PASS.<br />
                    Once you fill in the data, click the button below to generate the entire database.</h5>
                <a href="/test-php/index.php?create_database=yes" class="btn btn-dark">Create Database</a>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 ">
                <?php if ($return == 'ok') { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>PERFECT!</strong> Database created successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } else if ($return == "nok") { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR!</strong> Error creating database, check your login details.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>