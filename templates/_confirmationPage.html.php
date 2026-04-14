<div class="content">
    <h2>Thank You <?= htmlspecialchars($firstName) ?> for Contacting Us</h2>
    <p>We have received your message and will get back to you as soon as possible.</p>


    <?php
    $targetDate = "2026-12-31 23:59:59";
    ?>

    <div id="countdown"></div>
    <script>
        const targetDate = new Date("<?= $targetDate ?>").getTime();

        setInterval(function() {
            const now = new Date().getTime();
            const diff = targetDate - now;

            if (diff <= 0) {
                document.getElementById("countdown").innerHTML = "Countdown finished!";
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
            const minutes = Math.floor((diff / (1000 * 60)) % 60);
            const seconds = Math.floor((diff / 1000) % 60);

            document.getElementById("countdown").innerHTML =
                days + "d " + hours + "h " + minutes + "m " + seconds + "s";
        }, 1000);
    </script>

</div>