<!DOCTYPE html>
<html lang="en">
<head>
  <title>autocomplete address search module on your website using Google Place API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<!--  Today I’m going to show you how you can add an autocomplete address search module on your website using Google Place API web service.-->
  <h2>Address form</h2>
  <form action="">
    <div class="form-group">
      <label for="email">Address:</label>
      <input type="hidden" name="latitude" id="latitude">
  <input type="hidden" name="longitude" id="longitude">
      <input type="text" name="address" id="address" class="form-control" value="" id="address" placeholder="address">
    </div>
    
  </form>
</div>
<script type="text/javascript">
    var cou = "bh";
    function initAutocomplete() {
        var options = {
            componentRestrictions: {country: cou}
        };

        var pl=$('#address')[0];

        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */pl,options,
            {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();
            console.log(place);
            $("#address").val(place.formatted_address);
            //set hidden field values
            $("#longitude").val(place.geometry.viewport.ga.j);
            $("#latitude").val(place.geometry.viewport.ga.l);
           // alert(place.geometry.viewport.ga.j);
           // alert(lat);
           // alert(place.geometry.viewport.ga.j);
           
       }
   </script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&libraries=places&callback=initAutocomplete"
        async defer></script>
</body>
</html>