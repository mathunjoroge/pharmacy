<?php
ini_set("display_errors", "On");
?>
<script src="../main/js/jquery-3.7.1.min.js" ></script>
 <link rel="icon" type="image/ico" href="../main/ico/favicon.ico">
<body style="text-transform:capitalize;background-image: url(../main/images/double-bubble-outline.png);">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner" id="nav">
        <div class="container-fluid">
          <a class="btn btn-navbar navbarpills" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><img src="../main/ico/logo.PNG" style="height:35px;">
          <div class="nav-collapse collapse">          
            <ul class="nav pull-right"></a><li></li>
			<li><a>
                <i class="icon-user icon-large"></i> Welcome:<strong> <?php echo $_SESSION['SESS_FIRST_NAME'];?></strong></a>
				</a></li>
              <li><a href="../index.php"><font color="red"><i class="icon-off icon-large"></i></font> Log Out</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <script>
export default {
  data() {
    return {
      navbarOpen: false
    };
  },
  methods: {
    toggleNavbar() {
      this.navbarOpen = !this.navbarOpen;
    }
  }
};
</script>
      <style>

    #cards {
        display: flex;
        justify-content: left;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        width: 300px; /* Adjust the width as needed */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow */
        background-color: #c5d5f0;
        text-align: center;
        text-decoration: none;
        color: inherit;
    }

    .card:hover {
        background-color: #f0f0f0;
    }

    .card a {
        color: inherit; /* Inherit text color */
    }
</style>
