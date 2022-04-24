<main>
    <section>
        <div class="row justify-content-center">
            <div class="col-lg-12 bg-secondary rounded-3 shadow p-3">
                <h4 class="text-white text-center">QUESTION 2</h4>
                <p class="text-light">
                    <strong>ASCII Array</strong><br />
                    Write a PHP script to generate a random array containing all the ASCII characters from comma (“,”) to
                    pipe (“|”). Then randomly remove and discard an arbitrary element from this newly generated array.
                    Write the code to efficiently determine the missing character.
                </p>
            </div>
        </div>
        <div class="row justify-content-center mt-3 mb-5">
            <div class="col-lg-4 bg-white rounded-3 shadow p-3 text-dark m-2">
                <p class="text-dark">
                    <strong>ASCII Array - (All items)</strong><br />
                    <?php
                    print_r($arrays['array']);
                    ?>
                </p>
            </div>
            <div class="col-lg-4 bg-white rounded-3 shadow p-3 text-dark m-2">
                <p class="text-dark">
                    <strong>ASCII Array - (Removed item)</strong><br />
                    <?php
                    print_r($arrays['arrayRemoved']);
                    ?>
                </p>
            </div>
            <div class="col-lg-3 bg-white rounded-3 shadow p-3 text-dark m-2">
                <p class="text-dark">
                    <strong>Removed Item</strong><br />
                    <?php
                    print_r($arrays['arrayDiff']);
                    ?>
                </p>
            </div>
        </div>
    </section>
</main>