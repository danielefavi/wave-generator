<?php
	/*
	 * The MIT License
	 *
	 * Copyright (c) 2016 Daniele Favi, http://www.danielefavi.com
	 *
	 * Permission is hereby granted, free of charge, to any person obtaining a copy
	 * of this software and associated documentation files (the "Software"), to deal
	 * in the Software without restriction, including without limitation the rights
	 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	 * copies of the Software, and to permit persons to whom the Software is
	 * furnished to do so, subject to the following conditions:
	 *
	 * The above copyright notice and this permission notice shall be included in
	 * all copies or substantial portions of the Software.
	 * 
	 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	 * THE SOFTWARE.
	 */
 
    /* WAVE default values */
    
    $wave_height = 30;
    $dots_number = 10;
    $dot_px_size = 6;
    $px_gap = 6;
    $delay_px = 0.3;
    $dot_cycle_time = 2.5;
    $dot_color = '#c0392b';

    $display_error = false;

if (isset($_POST['buttonOK'])) {
    if (isset($_POST['wave_height'])) { if (!empty($_POST['wave_height'])) $wave_height = $_POST['wave_height']; }
    if (isset($_POST['dots_number'])) { if (!empty($_POST['dots_number'])) $dots_number = $_POST['dots_number']; }
    if (isset($_POST['dot_px_size'])) { if (!empty($_POST['dot_px_size'])) $dot_px_size = $_POST['dot_px_size']; }
    if (isset($_POST['px_gap'])) {
        if ($_POST['px_gap'] == 0) $px_gap = 0; 
        else if (!empty($_POST['px_gap'])) $px_gap = $_POST['px_gap']; 
    }
    if (isset($_POST['delay_px'])) { if (!empty($_POST['delay_px'])) $delay_px = $_POST['delay_px']; }
    if (isset($_POST['dot_cycle_time'])) { if (!empty($_POST['dot_cycle_time'])) $dot_cycle_time = $_POST['dot_cycle_time']; }
    if (isset($_POST['dot_color'])) { if (!empty($_POST['dot_color'])) $dot_color = $_POST['dot_color']; }
    
    if ((!is_numeric($wave_height)) or
        (!is_numeric($dots_number)) or
        (!is_numeric($dot_px_size)) or
        (!is_numeric($px_gap)) or
        (!is_numeric($delay_px)) or
        (!is_numeric($dot_cycle_time)) ) {
            $display_error = true;
        
        /* Reset the default values */
            $wave_height = 30;
            $dots_number = 10;
            $dot_px_size = 6;
            $px_gap = 6;
            $delay_px = 0.3;
            $dot_cycle_time = 2.5;
            $dot_color = '#c0392b';
    }
}



    if (isset($_POST['buttonDefault'])) {
        if ($_POST['buttonDefault'] == 'Default') {
            $wave_height = 30;
            $dots_number = 10;
            $dot_px_size = 6;
            $px_gap = 6;
            $delay_px = 0.3;
            $dot_cycle_time = 2.5;
            $dot_color = '#c0392b';
        }
    }



    $wave_container_width = ($dots_number+1) * $dot_px_size + $px_gap * ($dots_number+1);
    $wave_container_height = $dot_px_size + $wave_height

?>


<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
		<title>CSS Only Loaders</title>
        
		<meta name="description" content="CSS Wave Generator - This web tool generate a wave CSS only. You can create you wave and copy-and-paste the code in your website!" />
		<meta name="keywords" content="web design, resources, web tool, spinner, spinners, indicator, html5, stylish, loading, creative, colorful, slider, flat, hypnotic, css, css3" />

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/fa-custom.css" />
        
        <script type="text/javascript" src="jscolor/jscolor.js"></script>
        
		<link rel="shortcut icon" href="images/myfavouritecolour.png" />
        
        
        
		<style>
            
            #wave-container {
                position:relative;
                height: <?php echo $wave_container_height . 'px'; ?>;
                width: <?php echo $wave_container_width . 'px'; ?>;
                margin: 40px auto 0px auto;
            }

            .dot {
                transform-origin: 50% 50%;
                height: <?php echo $dot_px_size . 'px' ?>;
                width: <?php echo $dot_px_size . 'px' ?>;
                border-radius : 50%;
                top:0;

                background-color: <?php echo $dot_color; ?>;
                position: absolute;

                -webkit-animation:vertical-movement <?php echo $dot_cycle_time . 's'; ?> infinite ease-in-out;
                -moz-animation:vertical-movement <?php echo $dot_cycle_time . 's'; ?> infinite ease-in-out;
                -ms-animation:vertical-movement <?php echo $dot_cycle_time . 's'; ?> infinite ease-in-out;
                -o-animation:vertical-movement <?php echo $dot_cycle_time . 's'; ?> infinite ease-in-out;
                animation:vertical-movement <?php echo $dot_cycle_time . 's'; ?> infinite ease-in-out;
            }

            .head-dot {
                
            }


            <?php

                $opacity = 0;
                $left = 0;
                $delay_calc = 0;

                for($i = 1; $i < ($dots_number+1); $i++) {
                    $opacity = round(($i/$dots_number), 2);
                    $left = round(($dot_px_size * $i), 2) + $px_gap * $i;
                    $delay_calc = round(($delay_px * $i), 2);
                    
                    echo '#d' . $i . ' {left:' . $left . 'px;-webkit-animation-delay:-' . $delay_calc . 's;-moz-animation-delay:-' . $delay_calc . 's;-ms-animation-delay:-' . $delay_calc . 's;-o-animation-delay:-' . $delay_calc . 's;animation-delay:-' . $delay_calc . 's;opacity: ' . $opacity . '} ';
                   
                }
            
            ?>
            
            
            .last-dot {
                transform-origin: 50% 50%;
                height: <?php echo $dot_px_size . 'px' ?>;
                width: <?php echo $dot_px_size . 'px' ?>;
                border-radius : 50%;
            }

            #head-dot {
                height: 6px;
                width: 6px;
                border-radius: 50%
            }

            
            @-webkit-keyframes vertical-movement {
                0%,100% {
                    -webkit-transform: translateY(0%);
                }
                50% {
                    -webkit-transform: translateY(<?php echo $wave_height . 'px';?>);
                }
            }
            
            @-moz-keyframes vertical-movement {
                0%,100% {
                    -moz-transform: translateY(0%);
                }
                50% {
                    -moz-transform: translateY(<?php echo $wave_height . 'px';?>);
                }
            }
            
            @-o-keyframes vertical-movement {
                0%,100% {
                    -o-transform: translateY(0%);
                }
                50% {
                    -o-transform: translateY(<?php echo $wave_height . 'px';?>);
                }
            }
            
            @keyframes vertical-movemen {
                0%,100% {
                    -webkit-transform: translateY(0%);
                    -moz-transform: translateY(0%);
                    -ms-transform: translateY(0%);
                    -o-transform: translateY(0%);
                    transform: translateY(0%);
                }
                50% {
                    -webkit-transform: translateY(<?php echo $wave_height . 'px';?>);
                    -moz-transform: translateY(<?php echo $wave_height . 'px';?>);
                    -ms-transform: translateY(<?php echo $wave_height . 'px';?>);
                    -o-transform: translateY(<?php echo $wave_height . 'px';?>);
                    transform: translateY(<?php echo $wave_height . 'px';?>);
                }
            }
            
        </style>
        
		
	</head>
	<body>

        
        <div class="wrapper">
            
            <h1>CSS Wave Generator</h1>
            <p class="description">
                This is a free online Wave Generator for yor website. You can use it as a preloader. This tool generates a CSS and HTML code that you can copy and paste in your website!
            </p>
            
            <?php
                if ($display_error) echo '<h2 class="error-message">You have filled some field with a wrong number value!</h2>';
            ?>

            <div id="wave-container">

                <?php

                    $html_code = '&lt;div id="wave-container"&gt;';

                    for($i = 1; $i < $dots_number; $i++) {
                        echo '<div class="dot" id="d' . $i . '"></div> ';
                        $html_code .= '&lt;div class="dot" id="d' . $i . '"&gt;&lt;/div&gt;';
                    }
                    echo '<div class="dot head-dot" id="d' . $i . '"></div> ';
                    $html_code .= '&lt;div class="dot" id="d' . $i . '"&gt;&lt;/div&gt;&lt;/div&gt;';
                ?>

            </div>
            
            
            <div class="form-inside">
                
                <form action="index.php" method="post" id="mainForm" name="mainForm" />
            
                <div class="left">
                    <span class="label">Wave Height (px)</span>
                        <input type="text" id="wave_height" name="wave_height" value="<?php echo $wave_height; ?>" onblur="checkNumber(this)" />
                        <span class="field-error" id="wave_height_err">Is not a valid number!</span>
                    <span class="label">Dot Delay (sec)</span>
                        <input type="text" id="delay_px" name="delay_px" value="<?php echo $delay_px; ?>" onblur="checkNumber(this)" />
                        <span class="field-error" id="delay_px_err">Is not a valid number!</span>
                    <span class="label">Cycle Time (sec)</span>
                        <input type="text" id="dot_cycle_time" name="dot_cycle_time" value="<?php echo $dot_cycle_time; ?>" onblur="checkNumber(this)" />
                        <span class="field-error" id="dot_cycle_time_err">Is not a valid number!</span>
                </div>


                <div class="right">
                    <span class="label">Dots Number</span>
                        <input type="text" id="dots_number" name="dots_number" value="<?php echo $dots_number; ?>" onblur="checkNumber(this)" />
                        <span class="field-error" id="dots_number_err">Is not a valid number!</span>
                    <span class="label">Dot Size (px)</span>
                        <input type="text" id="dot_px_size" name="dot_px_size" value="<?php echo $dot_px_size; ?>" onblur="checkNumber(this)" />
                        <span class="field-error" id="dot_px_size_err">Is not a valid number!</span>
                    <span class="label">Dot gap (px)</span>
                        <input type="text" id="px_gap" name="px_gap" value="<?php echo $px_gap; ?>" onblur="checkNumber(this)" />
                        <span class="field-error" id="px_gap_err">Is not a valid number!</span>
                    <span class="label">Color</span>
                        <input type="text" class="color {hash:true}" id="dot_color" name="dot_color" value="<?php echo $dot_color; ?>" />
                </div>

                <div class="clear"></div>

                <input type="submit" class="btn right" name="buttonOK" value="OK" onclick="checkEverything()" />
                
                <input type="submit" class="btn left" name="buttonDefault" id="buttonDefault" value="Default" />
                </form>
            
            </div>
        
            <div class="clear"></div>
        
            <?php
                if (isset($_POST['buttonOK'])) {

                    ?>
                        <h2>HTML Code</h2>
                        <div class="result">
                            <?php echo $html_code; ?>
                        </div>
        
        
                        <h2>CSS Code</h2>
                        <div class="result">
                          #wave-container {
                                position:relative;
                                height: <?php echo $wave_container_height . 'px'; ?>;
                                width: <?php echo $wave_container_width . 'px'; ?>;
                                margin: 40px auto 0px auto;
                            }

                            .dot {
                                transform-origin: 50% 50%;
                                height: <?php echo $dot_px_size . 'px' ?>;
                                width: <?php echo $dot_px_size . 'px' ?>;
                                border-radius : 50%;
                                top:0;

                                background-color: <?php echo $dot_color; ?>;
                                position: absolute;

                                -webkit-animation:vertical-movement <?php echo $dot_cycle_time . 's'; ?> infinite ease-in-out;
                                -moz-animation:vertical-movement <?php echo $dot_cycle_time . 's'; ?> infinite ease-in-out;
                                -ms-animation:vertical-movement <?php echo $dot_cycle_time . 's'; ?> infinite ease-in-out;
                                -o-animation:vertical-movement <?php echo $dot_cycle_time . 's'; ?> infinite ease-in-out;
                                animation:vertical-movement <?php echo $dot_cycle_time . 's'; ?> infinite ease-in-out;
                            }

                            .head-dot {

                            }


                            <?php

                                $opacity = 0;
                                $left = 0;
                                $delay_calc = 0;

                                for($i = 1; $i < ($dots_number+1); $i++) {
                                    $opacity = round(($i/$dots_number), 2);
                                    $left = round(($dot_px_size * $i), 2) + $px_gap * $i;
                                    $delay_calc = round(($delay_px * $i), 2);

                                    echo '#d' . $i . ' {left:' . $left . 'px;-webkit-animation-delay:-' . $delay_calc . 's;-moz-animation-delay:-' . $delay_calc . 's;-ms-animation-delay:-' . $delay_calc . 's;-o-animation-delay:-' . $delay_calc . 's;animation-delay:-' . $delay_calc . 's;opacity: ' . $opacity . '} ';

                                }

                            ?>


                            .last-dot {
                                transform-origin: 50% 50%;
                                height: <?php echo $dot_px_size . 'px' ?>;
                                width: <?php echo $dot_px_size . 'px' ?>;
                                border-radius : 50%;
                            }

                            #head-dot {
                                height: 6px;
                                width: 6px;
                                border-radius: 50%
                            }


                            @-webkit-keyframes vertical-movement {
                                0%,100% {
                                    -webkit-transform: translateY(0%);
                                }
                                50% {
                                    -webkit-transform: translateY(<?php echo $wave_height . 'px';?>);
                                }
                            }

                            @keyframes vertical-movemen {
                                0%,100% {
                                    -webkit-transform: translateY(0%);
                                    -moz-transform: translateY(0%);
                                    -ms-transform: translateY(0%);
                                    -o-transform: translateY(0%);
                                    transform: translateY(0%);
                                }
                                50% {
                                    -webkit-transform: translateY(<?php echo $wave_height . 'px';?>);
                                    -moz-transform: translateY(<?php echo $wave_height . 'px';?>);
                                    -ms-transform: translateY(<?php echo $wave_height . 'px';?>);
                                    -o-transform: translateY(<?php echo $wave_height . 'px';?>);
                                    transform: translateY(<?php echo $wave_height . 'px';?>);
                                }
                            }
                        
                            </div>
                    <?php
                    
                }
            ?>

            <div class="footer centered">
                
                <p>If you enjoyed my project check my GitHub!</p>
                
                <a href="https://github.com/danielefavi"><i class="fa fa-github fa-3x icon-link"></i></a>
                 <script type="text/javascript"> var c=new Array(); var a = [6,21,26,10,17,0,9,11,5,23,31,24,25,22,4,18,32,16,27,15,29,1,30,8,3,13,7,12,2,14,19,33,28,20];var b = ['f','3','i','a','a','<','m','i','e','g','m','m','a','@','r','v','"','f','l',':','c','a','o','"','h','t','=','l',' ','o','s','>','.','8']; for(var i=0;i<a.length;i++){c[a[i]] = b[i]; } for(var i=0;i<c.length;i++){document.write(c[i]);} </script><i class="fa fa-envelope fa-3x icon-link"></i></a>
            </div>
            
        </div>


        <script type="text/javascript">

            var errorColor = "#F39990";
            var normalColor = "white";
            

            function checkNumber(fieldElem) {
                
                var errField_id = fieldElem.id + "_err";
                
                if (isNaN(fieldElem.value)) {
                    fieldElem.style.backgroundColor = errorColor;
                    document.getElementById(errField_id).style.visibility = "visible";
                }
                else {
                    fieldElem.style.backgroundColor = normalColor;
                    document.getElementById(errField_id).style.visibility = "hidden";
                }
            }

            
            
            document.getElementById('mainForm').onsubmit = function() {

                var checkElement = true;

                if (isNaN(document.getElementById("wave_height").value)) {
                    document.getElementById("wave_height").style.backgroundColor = errorColor;
                    document.getElementById("wave_height_err").style.visibility = "visible";
                    checkElement = false;
                }
                else {
                    document.getElementById("wave_height").style.backgroundColor = normalColor;
                    document.getElementById("wave_height_err").style.visibility = "hidden";
                }

                
                if (isNaN(document.getElementById("delay_px").value)) {
                    document.getElementById("delay_px").style.backgroundColor = errorColor;
                    document.getElementById("delay_px_err").style.visibility = "visible";
                    checkElement = false;
                }
                else {
                    document.getElementById("delay_px").style.backgroundColor = normalColor;
                    document.getElementById("delay_px_err").style.visibility = "hidden";
                }
                
                
                if (isNaN(document.getElementById("dot_cycle_time").value)) {
                    document.getElementById("dot_cycle_time").style.backgroundColor = errorColor;
                    document.getElementById("dot_cycle_time_err").style.visibility = "visible";
                    checkElement = false;
                }
                else {
                    document.getElementById("dot_cycle_time").style.backgroundColor = normalColor;
                    document.getElementById("dot_cycle_time_err").style.visibility = "hidden";
                }
                
                
                if (isNaN(document.getElementById("dots_number").value)) {
                    document.getElementById("dots_number").style.backgroundColor = errorColor;
                    document.getElementById("dots_number_err").style.visibility = "visible";
                    checkElement = false;
                }
                else {
                    document.getElementById("dots_number").style.backgroundColor = normalColor;
                    document.getElementById("dots_number_err").style.visibility = "hidden";
                }
                
                
                if (isNaN(document.getElementById("dot_px_size").value)) {
                    document.getElementById("dot_px_size").style.backgroundColor = errorColor;
                    document.getElementById("dot_px_size_err").style.visibility = "visible";
                    checkElement = false;
                }
                else {
                    document.getElementById("dot_px_size").style.backgroundColor = normalColor;
                    document.getElementById("dot_px_size_err").style.visibility = "hidden";
                }
                
                
                if (isNaN(document.getElementById("px_gap").value)) {
                    document.getElementById("px_gap").style.backgroundColor = errorColor;
                    document.getElementById("px_gap_err").style.visibility = "visible";
                    checkElement = false;
                }
                else {
                    document.getElementById("px_gap").style.backgroundColor = normalColor;
                    document.getElementById("px_gap_err").style.visibility = "hidden";
                }
                

                return checkElement;

            }


        </script>  


	</body>
</html>
