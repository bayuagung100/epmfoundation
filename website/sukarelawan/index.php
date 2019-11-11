<?php
if (empty($_SESSION['email']) or empty($_SESSION['password']) or $_SESSION['log'] == 0) {
    echo '
        <script>
        window.location = "' . $set['url_website'] . 'auth?login";
        </script>
        ';
} else {
    echo '
        <script>
        window.location = "' . $set['url_website'] . 'sukarelawan/dashboard";
        </script>
        ';
}
?>