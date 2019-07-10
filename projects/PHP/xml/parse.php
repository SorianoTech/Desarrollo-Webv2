<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
    $(function() {
      $("#accordion").accordion();
    });
  </script>
  <title>Document</title>
</head>

<body>
  <?
  $xml = simplexml_load_file('http://ep00.epimg.net/rss/elpais/portada.xml');

  echo '<pre>';
  /*echo '<h2>JSON</h2>';
  $json = json_encode($xml);
  $array = json_decode($json, TRUE);
  echo json_encode($xml);
  print_r($array);*/

  echo '<h2>XML</h2>';
  //print_r($xml);
  //print_r($xml->channel->item);
  echo '</pre>';
  foreach ($xml->channel->item as $valor) {
    echo '<h1>' . $valor->title . '</h1>';
    echo '<p>' . $valor->description . '</p>';
  }
  $url=['http://ep00.epimg.net/rss/elpais/portada.xml'];
  
  ?>

  <div id="accordion">
    <?
    foreach ($xml->channel->item as $valor) {
      echo '<h3>' . $valor->title . '</h3>';
      echo '<div><p>' . $valor->description . '</p></div>';
    } ?>
    <h3>Section 1</h3>
    <div>
      <p>
        Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
        ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
        amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
        odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
      </p>
    </div>
    <h3>Section 2</h3>
    <div>
      <p>
        Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
        purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
        velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
        suscipit faucibus urna.
      </p>
    </div>
  </div>
</body>

</html>