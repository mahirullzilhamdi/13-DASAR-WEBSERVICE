<html>
<head>
    <title>MHS Web Service</title>
    <style>
        body {
            width: 200px;
        }
    </style>
</head>
<body>
    <h2>MHS Web Service</h2>
    <hr/>

    <form method="get" action="">
        Nama: <input type="text" name="name"/><br/>
        Umur: <input type="text" name="umur"/><br/>
        <button type="submit">Search</button>
    </form>

    <?php
    if ($_GET) {
        $s_name = isset($_GET['name']) ? $_GET['name'] : '';
        $s_umur = isset($_GET['umur']) ? $_GET['umur'] : '';

        $url = "http://" . $_SERVER['HTTP_HOST']
             . "/webservice/web_service.php?API=khss8363621";

        $fields = array(
            'name' => $s_name,
            'umur' => $s_umur
        );

        $data = http_build_query($fields);
        $url .= "&" . $data;

        $result = file_get_contents($url);
        $vr = json_decode($result, true);

        echo "<pre>";
        print_r($vr);
        echo "</pre>";
    }
    ?>
</body>
</html>
