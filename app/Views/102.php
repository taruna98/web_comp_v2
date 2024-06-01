<?php require('template/layout_top.php') ?>

<style>
    .page-102 {
        height: 100vh;
        width: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .page-102 .text-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 600;
        font-family: "Open Sans", sans-serif;
        color: #205375;
    }

    .page-102 .text-subtitle {
        text-align: center;
        font-size: 4rem;
        font-weight: 600;
        font-family: "Raleway", sans-serif;
        color: #F66B0E;
    }

    .page-102 .text-paragraph {
        text-align: center;
        font-size: 1.5rem;
        font-weight: 400;
        font-family: "Open Sans", sans-serif;
        color: #205375;
        margin: 0.5rem 0 0 0;
    }
</style>

<section class="page-102" id="page-102">
    <div class="d-block">
        <div class="text-subtitle">Thank You!</div>
        <div class="text-title">We will be processing your request</div>
        <div class="text-paragraph">Please wait the next information. You will be redirect to Our Company page in <span class="fw-bold ms-2" id="countdown"> 10</span>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        var baseUrl = "<?= $response['profile']['base_url'] ?>";
        var countdownNumber = 10;
        var countdownElement = $('#countdown');

        function setCountdown() {
            countdownElement.fadeOut(500, function() {
                countdownElement.text(countdownNumber);
                countdownElement.fadeIn(500);
            });

            if (countdownNumber > 0) {
                countdownNumber--;
            } else {
                clearInterval(countdownInterval);
                window.location.href = baseUrl;
            }
        }

        var countdownInterval = setInterval(setCountdown, 990);
    });
</script>
<?php require('template/layout_bottom.php') ?>