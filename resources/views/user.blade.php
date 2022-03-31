<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>How to Get Current User Location with Laravel - Tutsmake.com</h1>
    <div class="card">
        <div class="card-body">
            @if($currentUserInfo)
                <h4>IP: {{ $currentUserInfo->ip }}</h4>
                <h4>Country Name: {{ $currentUserInfo->countryName }}</h4>
                <h4>Country Code: {{ $currentUserInfo->countryCode }}</h4>
                <h4>Region Code: {{ $currentUserInfo->regionCode }}</h4>
                <h4>Region Name: {{ $currentUserInfo->regionName }}</h4>
                <h4>City Name: {{ $currentUserInfo->cityName }}</h4>
                <h4>Zip Code: {{ $currentUserInfo->zipCode }}</h4>
                <h4>Latitude: {{ $currentUserInfo->latitude }}</h4>
                <h4>Longitude: {{ $currentUserInfo->longitude }}</h4>
            @endif
        </div>
        <?php
echo" i am mazharul.";
$latitude ="23.7948";
$longitude ="90.4096";
$geolocation = $latitude.','.$longitude;
$request = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&sensor=false';
$file_contents = file_get_contents($request);
$json_decode = json_decode($file_contents);
if(isset($json_decode->results[0])) {
    $response = array();
    foreach($json_decode->results[0]->address_components as $addressComponet) {
        if(in_array('political', $addressComponet->types)) {
                $response[] = $addressComponet->long_name;
        }
    }

    if(isset($response[0])){ $first  =  $response[0];  } else { $first  = 'null'; }
    if(isset($response[1])){ $second =  $response[1];  } else { $second = 'null'; }
    if(isset($response[2])){ $third  =  $response[2];  } else { $third  = 'null'; }
    if(isset($response[3])){ $fourth =  $response[3];  } else { $fourth = 'null'; }
    if(isset($response[4])){ $fifth  =  $response[4];  } else { $fifth  = 'null'; }

    if( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth != 'null' ) {
        echo "<br/>Address:: ".$first;
        echo "<br/>City:: ".$second;
        echo "<br/>State:: ".$fourth;
        echo "<br/>Country:: ".$fifth;
    }
    else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth == 'null'  ) {
        echo "<br/>Address:: ".$first;
        echo "<br/>City:: ".$second;
        echo "<br/>State:: ".$third;
        echo "<br/>Country:: ".$fourth;
    }
    else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth == 'null' && $fifth == 'null' ) {
        echo "<br/>City:: ".$first;
        echo "<br/>State:: ".$second;
        echo "<br/>Country:: ".$third;
    }
    else if ( $first != 'null' && $second != 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
        echo "<br/>State:: ".$first;
        echo "<br/>Country:: ".$second;
    }
    else if ( $first != 'null' && $second == 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
        echo "<br/>Country:: ".$first;
    }
  }
?>
    </div>
</div>

</body>
</html>
