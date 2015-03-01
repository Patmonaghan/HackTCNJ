<!doctype html>
<html lang="en" ng-app="app">
<head>
  <meta charset="utf-8">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">

  <title>My App</title>  
  
  <link rel="stylesheet" href="lib/onsen/css/onsenui.css">  
    <link rel="stylesheet" href="styles/onsen-css-components-blue-basic-theme.css">  
  <link rel="stylesheet" href="styles/app.css"/>

  <script src="lib/onsen/js/angular/angular.js"></script>    
  <script src="lib/onsen/js/onsenui.js"></script>    
  
  <script src="cordova.js"></script>  
  <script src="js/app.js"></script>  
  <script>
    ons.ready(function() {});
  </script>

</head>

<body ng-controller="AppController">  
 
 <?php 
    // database credentials
    $db_user = 'kmonagha_hack15';
    $db_password = 'hacktcnj15';
    $db_host = 'localhost';
    $db_name = 'kmonagha_hacktcnj';

    // connect to database
    $conn = mysqli_connect ($db_host, $db_user, $db_password, $db_name); 

    //check connection
    if ($conn->connect_error) {
      die ("Connection Failed: " . $conn->connect_error);
    }

    $sql = "SELECT order_id, orders FROM ORDERS";
    $result = $conn->query($sql);
    if ($result ->num_rows > 0) {
      //output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
      }
    }
    else { 
      echo "0 results";
    }
    // Close Database Connection
    $conn->close(); 
    ?> 
 
    
  <ons-navigator var="navi">
    <ons-page>
      <ons-toolbar>
        <div class="center"> App Name </div>
        <div class="right"> 
          <i class="fa fa-shopping-cart cart"></i>
        </div>
      </ons-toolbar>

<!-- title screen -->
      <ons-list ng-controller="MasterController">
        <ons-list-item modifier="chevron" class="item" ng-repeat="item in items" ng-click="showDetail($index)">
          <ons-row>
            <ons-col width="60px"> 
              <div class="item-thum">
                <img src={{item.img}}>
              </div>

            </ons-col>
            <ons-col>
              <header>
                <span class="item-title"><b> {{item.title}} </b></span> 
              </header>
            </ons-col>
          </ons-row>                          
        </ons-list-item>
      </ons-list>
    </ons-page>
  </ons-navigator>

<!-- form for submission to php server --> 
  <ons-template id="detail.html">
    <ons-page ng-controller="DetailController">

<ons-toolbar>
        <div class="left"><ons-back-button>Back</ons-back-button></div>
  <div class="center"> What else do you want? </div>
</ons-toolbar>

      <ons-list>

<!-- Coffee type -->

        <ons-list-item modifier="chevron" class="item" ng-repeat="coffeeType in item.coffeeType">
          <select class="dropdownstyle">

          <option value={{coffeeType.title}}> </option>

          </select>
          </ons-list-item>
<!-- Coffee Flavor -->
          <ons-list-item>
          <select class="dropdownstyle">
          <?php 
          /*
          // connect to database
          $conn = mysqli_connect ($db_host, $db_user, $db_password, $db_name); 

          //check connection
          if ($conn->connect_error) {
            die ("Connection Failed: " . $conn->connect_error);
          }
          $sql = "SELECT Flavors FROM Coffee_Flavors";
          $result = $conn->query($sql);
          if ($result ->num_rows > 0) {
            //output data of each row
            while ($row = $result->fetch_assoc()) {
              echo "<option value=\"" . $row["Flavors"] . "\">" . $row["Flavors"] . "</option>";
            }
          }
          else { 
            echo "0 results";
          }
          $conn->close(); 
          */
          ?> 
          </select>
          </ons-list-item>

<!-- Coffee Size -->
          <ons-list-item>
          <select class="dropdownstyle">
          <?php 
          // connect to database
          $conn = mysqli_connect ($db_host, $db_user, $db_password, $db_name); 

          //check connection
          if ($conn->connect_error) {
            die ("Connection Failed: " . $conn->connect_error);
          }
          $sql = "SELECT Size FROM Coffee_Size";
          $result = $conn->query($sql);
          if ($result ->num_rows > 0) {
            //output data of each row
            while ($row = $result->fetch_assoc()) {
              echo "<option value=\"" . $row["Size"] . "\">" . $row["Size"] . "</option>";
            }
          }
          else { 
            echo "0 results";
          }
          $conn->close(); 
          ?> 
          </select>
          </ons-list-item>

          <!-- coffee milk -->
                    <ons-list-item>
          <select class="dropdownstyle">
          <?php 
          // connect to database
          $conn = mysqli_connect ($db_host, $db_user, $db_password, $db_name); 

          //check connection
          if ($conn->connect_error) {
            die ("Connection Failed: " . $conn->connect_error);
          }
          $sql = "SELECT Milk FROM Coffee_Milk";
          $result = $conn->query($sql);
          if ($result ->num_rows > 0) {
            //output data of each row
            while ($row = $result->fetch_assoc()) {
              echo "<option value=\"" . $row["Milk"] . "\">" . $row["Milk"] . "</option>";
            }
          }
          else { 
            echo "0 results";
          }
          $conn->close(); 
          ?> 
          </select>
          </ons-list-item>

          <!-- Tea Type -->
          




          <!-- random stuff -->
        <ons-list-item>
          <input type="text" placeholder="Email Address" class="text-input text-input--transparent" style="margin-top:8px; width: 100%;">
        </ons-list-item>

        <ons-list-item>
          <ons-row>
            <ons-col width="90px">
          <span style="color: #666">Gender</span></ons-col>
            <ons-col>

              <div style="float: right; padding-right: 16px;">
                <label class="radio-button">
                  <input type="radio" name="level" ng-model="selectedLevel">
                  <div class="radio-button__checkmark"></div>
                  Male
                </label>

                <label class="radio-button">
                  <input type="radio" name="level" ng-model="selectedLevel">
                  <div class="radio-button__checkmark"></div>
                  Female
                </label>
              </div>

            </ons-col>
          </ons-row>
        </ons-list-item>

        <ons-list-item>
          <span style="color: #666">Mail Magazine</span>
          <ons-switch modifier="list-item" checked></ons-switch>
        </ons-list-item>

        <ons-list-item>
          <span style="color: #666">Offline</span>
          <ons-switch modifier="list-item"></ons-switch>
        </ons-list-item>
      </ons-list>

        <ons-list-item>
          <ons-row>n
            <ons-col width="90px">
          <span style="color: #666"> Milk? </span></ons-col>
            <ons-col>

              <div style="float: right; padding-right: 16px;">
                <label class="radio-button">
                  <input type="radio" name="level" ng-model="selectedLevel">
                  <div class="radio-button__checkmark"></div>
                  Yes
                </label>

                <label class="radio-button">
                  <input type="radio" name="level" ng-model="selectedLevel">
                  <div class="radio-button__checkmark"></div>
                  No
                </label>
              </div>

            </ons-col>
          </ons-row>
        </ons-list-item>

        <ons-list-item>
          <input type="textarea" placeholder="Comments" class="text-input text-input--transparent" style="margin-top:8px; width: 100%;">
        </ons-list-item>
      <div class="content-padded">
        <ons-button modifier="large"
                    onclick="">
          Submit
        </ons-button>
      </div>

    </ons-page>
  </ons-template>

</body>  
</html>
