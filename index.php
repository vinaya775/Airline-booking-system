<?php
    include_once './connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Let's Go Airlines</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
   <!-- Styles -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <style>
   html, body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
   }
   .full-height {
      height: 100vh;
   }
   .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
   }
   .position-ref {
      position: relative;
   }
   .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
   }
   .content {
      text-align: center;
   }
   .title {
      font-size: 84px;
   }
   .links > a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
   }
   .m-b-md {
      margin-bottom: 30px;
   }

   </style>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<body>
 <!--header-->
<header class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">


                    <div class="logobox">
                        <img src="images/logo.jpg" alt="Let's Go Airlines">
                        <h3>Let's Go Airlines</h3>
                    </div>
                    <ul class="text-right">
                        <li class="navbar__item">
                            <a href="#overview" class="navbar__links" id="overview-page">Overview</a>
                        </li>
                        <li class="navbar__item">
                            <a href="#vision" class="navbar__links" id="vision-page">Vision</a>
                        </li>
                        <li class="navbar__item">
                            <a href="#values" class="navbar__links" id="values-page">Values</a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>

    </header>

  


               <div class="booking-form-box">
        <form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <label>Origin</label>
                        <br>
                      <input type="text" class="form-control" placeholder="City" required>  

                    
                     <select class="form-control" id="country-dropdown">
                        <option value="">Select Origin</option>
                        <?php
                        require_once "db.php";
                        $result = mysqli_query($conn,"SELECT * FROM cities");
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option name="origin" id="origin" value="<?php echo $row['code'];?>"><?php echo $row["code"];?></option>
                        <?php
                     }
                     ?>
                  </select>
                    
                    
                      
                    </div>

                     <div class="col-lg-3">
                        <label>Destination</label>
                    
                      
                     <select class="form-control" id="country-dropdown">
                        <option value="">Select Destination</option>
                        <?php
                        require_once "db.php";
                        $result = mysqli_query($conn,"SELECT * FROM cities");
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option name="destination" id="destination" value="<?php echo $row['code'];?>"><?php echo $row["code"];?></option>
                        <?php
                     }
                     ?>
                  </select>
                    </div>
            
                
             
                    <div class="col-lg-3">
                        <div class="input-grp">
                            <label>Date</label>
                            <input id="datefield" type="date" class="form-control select date" min="2021-08-18" required>

                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="input-grp">
                            <label>Number of Passengers</label>
                            <select class="custom-select">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-2">
                        <div class="input-grp">
                            <button type="submit"  class="btn-btn-primary flight">Search Flights</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<!--flight listings-->
<div  class="container pt-5">
    <div id="result" class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-auto d-block">
            <table class="table table-striped" id="firstTable">
                <thead class="bg-success text-white" id="firstThead">
                    <th> Origin </th>
                    <th> Destination </th>
                    <th> Date </th>
                    <th> Departure time </th>
                    <th> Arrival time </th>
                    <th> Flight charge </th>
                    <th> flight number </th>
                    <th> Book tickets </th>
                   
                </thead>
                <tbody>
                    <?php
                         $sql                 =       "SELECT * FROM flight_details ";
                         $result              =       mysqli_query($conn, $sql);
                 
                         if(mysqli_num_rows($result) > 0) {
                             $students        =       mysqli_fetch_all($result,MYSQLI_ASSOC);
                             foreach($students as $student) : ?>
                                <tr id="result">
                                    <td><?php echo $student['origin']; ?> </td>
                                    <td><?php echo $student['destination']; ?> </td>
                                    <td><?php echo $student['Date']; ?> </td>
                                    <td><?php echo $student['departure_time']; ?> </td>
                                    <td><?php echo $student['arrival_time']; ?> </td>
                                    <td><?php echo $student['ticket_price']; ?> </td>
                                    <td><?php echo $student['flight_number']; ?> </td>
                                    <td><button onclick="location.href = 'customer.html';">Bookticket</button><td>
                                </tr>
                             <?php endforeach; 
                         }   
                         ?>
                </tbody>
            </table>
        </div>
    </div>
     <!--Overview section-->

     <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main" id="overview">
                    <h1> Overview</h1>
                    <p>Let's Go Airlines is the project name for a new airline company that will focus on single
                        class long-haul scheduled flights. Let's Go Airlines will capitalise on the widening gap in
                        long-haul travel between business and economy class. Let's Go Airlines will operate
                        Boeing 757-200 aircraft configured with 80 seats which will provide a very spacious and
                        pleasant environment. The aircraft will be equipped with the latest technology in order to
                        enable the business traveller to use his time efficiently while travelling. The company will
                        start by leasing two aircraft and expand its fleet to 6 aircraft by the second year of
                        operation.</p>

                    <p>Let's Go will be a "business to business" airline and will focus exclusively on the
                        premium/business segment of the market. It will offer customers a compelling value
                        proposition: a high level of service and comfort at 50 percent of the current
                        publishedbusiness-class
                        fare. In addition to an attractive price, Let's Go will offer passengers
                        considerable time savings, convenience, and will focus on creating a lifestyle appeal.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Vision Section -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main" id="vision">
                    <h1> Vision</h1>
                    <p>Let's Go aims to establish itself as a niche player in the long-haul market of business
                        travel. By continuously focusing on the needs of the premium class business traveller,
                        Let's Go will provide the best value proposition in the markets it serves.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Values Section -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main" id="values">
                    <h1> Values</h1>
                    <p>We exist to provide a valuable service to our customers, a rewarding opportunity for our
                        employees, and profitability to our shareholders. We believe that success in this
                        endeavor depends on our employees. Satisfied employees lead to satisfied customers,
                        which lead to satisfied shareholders. To achieve this, we enable our employees to act
                        with an entrepreneurial spirit, and we value those willing to take responsibility for their
                        actions and the consequences of those actions. We treat employees as family, which
                        fosters intimacy, informality, strong relationships, caring attitudes, and it makes work
                        more fun. We want our customers to experience legendary service that makes a lasting
                        impression. Providing exceptional value to customers requires hard work and
                        concentration. We believe in doing things right the first time. We take pride in our efforts
                        as well as the rewards. Throughout this endeavor, safety will be the overriding force
                        behind any decision.</p>
                </div>
            </div>
        </div>
    </div>


<script>
$(document).ready(function() {
   $('#country-dropdown').on('change', function() {
      var country_id = this.value;
      $.ajax({
         url: "state-by-country.php",
         type: "POST",
         data: {
            country_id: country_id
         },
         cache: false,
         success: function(result){
            $("#state-dropdown").html(result);
            $('#city-dropdown').html('<option value="">Select State First</option>'); 
         }
      });
   });    
   $('#state-dropdown').on('change', function() {
      var state_id = this.value;
      $.ajax({
         url: "city-by-state.php",
         type: "POST",
         data: {
            state_id: state_id
         },
         cache: false,
         success: function(result){
            $("#city-dropdown").html(result);
         }
      });
   });
});
</script>



<script>
$(document).ready(function() {
    var recordCount         =       2;
    $("#loadBtn").click(function() {
        
        recordCount = recordCount + 2;

        $.ajax({
                    type: "GET",
                    url: "./load-data.php?count="+recordCount,
                    data: {},
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",                    
                    cache: false,                       
                    success: function(response) {                        
                        var trHTML = '';
                            $.each(response, function (i, item) {
                                trHTML +=    '<tr><td>' + item.origin + '</td><td>' + item.destination +
                               '</td><td>' + item.Date + '</td><td>' + item.flight_number + '</td><td>' + item.departure_time +
                               '</td><td>' + item.arrival_time + '</td><td>' + item.ticket_price + '</td></tr>';
                            });
                            $('#firstTable').append(trHTML);
                    },
                    error: function (e) {
                        console.log(response);
                    }
            });  
    });        
});

$(document).ready( function() {
    var now = new Date();
    var month = (now.getMonth() + 1);               
    var day = now.getDate();
    if (month < 10) 
        month = "0" + month;
    if (day < 10) 
        day = "0" + day;
    var today = now.getFullYear() + '-' + month + '-' + day;
    $('#datefield').val(today);
});

var toValidate = jQuery('#origin, #destination'),
    valid = false;
toValidate.keyup(function () {
    if (jQuery(this).val().length > 0) {
        jQuery(this).data('valid', true);
    } else {
        jQuery(this).data('valid', false);
    }
    toValidate.each(function () {
        if (jQuery(this).data('valid') == true) {
            valid = true;
        } else {
            valid = false;
        }
    });
    if (valid === true) {
        jQuery("#Submit").prop('disabled', false);
    } else {
        jQuery("#Submit").prop('disabled', true);
    }
});
</script>
<script src="js/app.js"></script>

</body>
</html>