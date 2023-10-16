<!DOCTYPE html>
<html>
  <head> 
    <meta charset="UTF-8">
    <title> Stats: Homepage </title>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width">
    <link rel='stylesheet' type="text/css" href='/includes/css/preloader.css'>
    <style>
        .error-message{color:#fff;}
    </style>
  </head>
<body>
<noindex>
    <?php include 'core/users-registration.php'; ?>
    <div id="page-preloader">
        <div class="spinner">
            <div class="ball"></div>
            <div class="ball2"></div>
            <div class="ball3"></div>    
        </div>
    </div>
	<div class="main-section-stat shadow-stat">
		<div class="main-section-stat-head">
			<div class="stat-head-login">
			    <span> <?php echo $validationResult ?> </span>
			</div>
		</div>
		
		<div class="main-section-stat-desc">
			<div class="main-section-stat-desc-menu">
			    <a href="#" ><img src="/includes/images/menuicon-small.png"></a>
			    <h1>Statistics</h1>
			    <div class="main-section-stat-desc-search">
			        <a href="/client-registration-form.php" >
			            <img src="/includes/images/user-profile.png">
			        </a>
			    </div>
			    <div class="main-section-stat-desc-search">
			        <a href="#" >
			            <img src="/includes/images/searchicon-small.png">
			        </a>
			    </div>
			</div>
		</div>
		<div class="main-section-stat-body">
			<div class="main-section-stat-desc-menu-tabs">
                    <div class="section-stat-desc-menu-tabs">
                        <button name="week" class="desc-menu-tablinks" onclick="openPeriod(event, 'Week')"> Week </button>
                        <button name="month" class="desc-menu-tablinks" onclick="openPeriod(event, 'Month')" id="defaultOpen"> Month </button>
                        <button name="1/2year" class="desc-menu-tablinks" onclick="openPeriod(event, '1/2year')"> 6 Months </button>
                        <button name="year" class="desc-menu-tablinks" onclick="openPeriod(event, 'Year')"> Year </button>
                    </div>
                    <div id="Week" class="desc-menu-tabcontent">
                        <div class="desc-tabcontent-graph-skin"></div>
                        <div class="desc-tabcontent-graph">
                            <span id="knob-red-circle">
                                <input class="knob" type = "hidden" name = "views" value="<?php echo $Views/4;?>" data-thickness="0.15" data-width="150" data-min="0" 
                                    data-max="<?php echo $Views*13;?>" data-angleOffset=180 data-linecap=round data-fgColor="#e63937"></span>
                            <span id="knob-yellow-circle">
                                <input class="knob"  type = "hidden" name = "views" value="<?php echo $Visitors/4;?>" data-thickness="0.15" data-width="115" data-min="0" 
                                    data-max="<?php echo $Visitors*13; ?>" data-angleOffset=180 data-linecap=round data-lineRound="true" data-fgColor="#eeb11d"></span>
                            <span id="knob-blue-circle">
                                <input class="knob"  type = "hidden" name = "views" value="<?php echo $Budget/4;?>" data-thickness="0.15" data-width="80" data-min="0" 
                                    data-max="<?php echo $Budget*13; ?>" data-angleOffset=180 data-linecap=round data-fgColor="#21a295"></span>
                        </div>
                        <div class="desc-tabcontent-section">
                            <div class="desc-tabcontent-red">
                                <p></p>
                                <span>Views:</span><br>
                                <span class="color-grey float-right"> <?php echo round($Views/4);?> </span>
                            </div>
                            <div class="desc-tabcontent-yellow">
                                <p></p>
                                <span>Visitors:</span><br>
                                <span class="color-grey float-right"> <?php echo round($Visitors/4);?> </span>
                            </div>
                            <div class="desc-tabcontent-blue">
                                <p></p>
                                <span>Budget:</span><br>
                                <span class="color-grey float-right">$ <?php echo $Budget/4;?></span>
                            </div>
                        </div>
                    </div>
                    <div id="Month" class="desc-menu-tabcontent">
                        <div class="desc-tabcontent-graph-skin"></div>
                        <div class="desc-tabcontent-graph">
                            <span id="knob-red-circle">
                                <input class="knob" type = "hidden" name = "views" value="<?php echo $Views;?>" data-thickness="0.15" data-width="150" data-min="0" 
                                    data-max="<?php echo $Views*13;?>" data-angleOffset=180 data-linecap=round data-fgColor="#e63937"></span>
                            <span id="knob-yellow-circle">
                                <input class="knob"  type = "hidden" name = "views" value="<?php echo $Visitors;?>" data-thickness="0.15" data-width="115" data-min="0" 
                                    data-max="<?php echo $Visitors*13;?>" data-angleOffset=180 data-linecap=round data-lineRound="true" data-fgColor="#eeb11d"></span>
                            <span id="knob-blue-circle">
                                <input class="knob"  type = "hidden" name = "views" value="<?php echo $Budget;?>" data-thickness="0.15" data-width="80" data-min="0" 
                                    data-max="<?php echo $Budget*13;?>" data-angleOffset=180 data-linecap=round data-fgColor="#21a295"></span>
                        </div>
                        <div class="desc-tabcontent-section">
                            <div class="desc-tabcontent-red">
                                <p></p>
                                <span>Views:</span><br>
                                <span class="color-grey float-right"> <?php echo round($Views);?> </span>
                            </div>
                            <div class="desc-tabcontent-yellow">
                                <p></p>
                                <span>Visitors:</span><br>
                                <span class="color-grey float-right"> <?php echo round($Visitors);?> </span>
                            </div>
                            <div class="desc-tabcontent-blue">
                                <p></p>
                                <span>Budget:</span><br>
                                <span class="color-grey float-right">$ <?php echo $Budget*1;?></span>
                            </div>
                        </div>
                    </div>
                    <div id="1/2year" class="desc-menu-tabcontent">
                        <div class="desc-tabcontent-graph-skin"></div>
                        <div class="desc-tabcontent-graph">
                            <span id="knob-red-circle">
                                <input class="knob" type = "hidden" name = "views" value="<?php echo $Views*6;?>" data-thickness="0.15" data-width="150" data-min="0" 
                                    data-max="<?php echo $Views*13; ?>" data-angleOffset=180 data-linecap=round data-fgColor="#e63937"></span>
                            <span id="knob-yellow-circle">
                                <input class="knob"  type = "hidden" name = "views" value="<?php echo $Visitors*6;?>" data-thickness="0.15" data-width="115" data-min="0" 
                                    data-max="<?php echo $Visitors*13; ?>" data-angleOffset=180 data-linecap=round data-lineRound="true" data-fgColor="#eeb11d"></span>
                            <span id="knob-blue-circle">
                                <input class="knob"  type = "hidden" name = "views" value="<?php echo $Budget*6;?>" data-thickness="0.15" data-width="80" data-min="0" 
                                    data-max="<?php echo $Budget*13; ?>" data-angleOffset=180 data-linecap=round data-fgColor="#21a295"></span>
                        </div>
                        <div class="desc-tabcontent-section">
                            <div class="desc-tabcontent-red">
                                <p></p>
                                <span>Views:</span><br>
                                <span class="color-grey float-right"> <?php echo round($Views*6);?> </span>
                            </div>
                            <div class="desc-tabcontent-yellow">
                                <p></p>
                                <span>Visitors:</span><br>
                                <span class="color-grey float-right"> <?php echo round($Visitors*6);?> </span>
                            </div>
                            <div class="desc-tabcontent-blue">
                                <p></p>
                                <span>Budget:</span><br>
                                <span class="color-grey float-right">$ <?php echo $Budget*6;?></span>
                            </div>
                        </div>
                    </div>
                    <div id="Year" class="desc-menu-tabcontent">
                        <div class="desc-tabcontent-graph-skin"></div>
                        <div class="desc-tabcontent-graph">
                            <span id="knob-red-circle">
                                <input class="knob" type = "hidden" name = "views" value="<?php echo $Views*12;?>" data-thickness="0.15" data-width="150" data-min="0" 
                                    data-max="<?php echo $Views*13;?>" data-angleOffset=180 data-linecap=round data-fgColor="#e63937">
                            </span>
                            <span id="knob-yellow-circle">
                                <input class="knob"  type = "hidden" name = "views" value="<?php echo $Visitors*12;?>" data-thickness="0.15" data-width="115" data-min="0" 
                                    data-max="<?php echo $Visitors*13;?>" data-angleOffset=180 data-linecap=round data-lineRound="true" data-fgColor="#eeb11d">
                            </span>
                            <span id="knob-blue-circle">
                                <input class="knob"  type = "hidden" name = "views" value="<?php echo $Budget*12;?>" data-thickness="0.15" data-width="80" data-min="0" 
                                    data-max="<?php echo $Budget*13;?>" data-angleOffset=180 data-linecap=round data-fgColor="#21a295">
                            </span>
                        </div>
                        <div class="desc-tabcontent-section">
                            <div class="desc-tabcontent-red">
                                <p></p>
                                <span>Views:</span><br>
                                <span class="color-grey float-right"> <?php echo round($Views*12);?> </span>
                            </div>
                            <div class="desc-tabcontent-yellow">
                                <p></p>
                                <span>Visitors:</span><br>
                                <span class="color-grey float-right"> <?php echo round($Visitors*12);?> </span>
                            </div>
                            <div class="desc-tabcontent-blue">
                                <p></p>
                                <span>Budget:</span><br>
                                <span class="color-grey float-right">$ <?php echo $Budget*12;?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="position: absolute;display: block;width: 555px;height:220px;margin-top: -220px;"></div>
                <div class="month-chart-graph">
                    <table class="chart-graph-table">
                        <tr style="text-align:left;">
                            <td style="width: 100px;">Date</td>
                            <td style="width: 100px;">Unique visitors</td>
                            <td style="width: 55px;">Views</td>
                            <td>Domain</td>
                        </tr>
                            <?php echo $displayStatsData; ?>
                    </table>
                </div>
		</div>
	</div>
    <link type="text/css" rel='stylesheet' href='/includes/css/main.css'>
    <script type='text/javascript' src="/includes/js/jquery.min.js"></script>
    <script type='text/javascript' src="/includes/js/knob-library.js"></script>
    <script type='text/javascript' src="/includes/js/jquery.knob.js"></script>
    <script type='text/javascript' src="/includes/js/main.js"></script>
    </noindex>
</body>
</html>