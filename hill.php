<?php error_reporting (E_ALL ^ E_NOTICE); ?>




<html>

<head>
      <title> Hill Cipher</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
</head>

<body>

      <div id="navbar">
            <ul>
                  <li><a href="#aim">Aim</a></li>
                  <li><a href="#procedure">Procedure</a></li>
                  <li><a href="#simulation">Simulation</a></li>
                  <li><a href="#test">Test</a></li>
                  <li><a href="#abtus">About Us</a></li>
            </ul>
      </div>

      <div id="aim">
            <div class="cont">
			<div>
			<h3>Aim</h3>
			<h2>To implement and analyse the hill cipher substitution technique </h2> 
			<br>
			<h3>
				Problem Statement </h3>
				<h2>Develop a web application that simulates working of hill cipher subtitution technique<h2>
			
			</div>
		</div>
      </div>
      <div id="procedure">
            <section>
                  <article>
                        <p>
                        <h2>Encryption :</h2>
                        Encrypting with the Hill cipher is built on the following operations:<br><br>
                        Step 1]: To encrypt a message using the Hill Cipher we must first turn our keyword into a key
                        matrix (a 2 × 2 matrix
                        for working with digraphs, a 3 × 3 matrix for working with trigraphs, etc.).<br><br>

                        Step 2]: We also turn the plaintext into digraphs (or trigraphs) and each of these into a column
                        vector.
                        We then perform matrix multiplication modulo the length of the alphabet (i.e. 26) on each
                        vector.
                        These vectors are then converted back into letters to produce the ciphertext.<br><br>
                        Step 3]: To encrypt a message, we use following formula,
                        E(K, P) = (K*P) mod 26</p>
                        <p>
                        <h2>Decryption :</h2>
                        Decrypting with the Hill cipher is built on the following operation:<br><br>
                        Step 1]: To decrypt the message, each block is multiplied by the inverse of the key matrix used
                        for encryption.
                        The matrix used for encryption is the cipher key, and it should be chosen randomly from the set
                        of
                        invertible (modulo 26). <br><br>
                        Step 2]: To encrypt a message, we use following formula,
                        D(K, C) = (K-1 *C) mod 26
                        </p>

                  </article>
            </section>
      </div>
      <div id="simulation">


            <div class="main">

                  <form name="enc" id="enc" method="post" action="hill.php?op=enc">
                        <div id="econtent">
                              <h2> Encryption using Hill Cipher </h2>
                              <table border="0">
                                    <tr>
                                          <td>Plain Text :</td>
                                          <td><textarea name="plain" id="plain" rows="3" cols="50"><?php
				if($_GET['op']=="enc"){
					echo $_POST['plain'];
				}
			?></textarea></td>
                                    </tr>
                                    <tr>
                                          <td></td>
                                          <td>Please insert the key in <i>numeric form</i> only</td>
                                    </tr>
                                    <tr>
                                          <td>Key :</td>
                                          <td>
                                                <table>
                                                      <tr>
                                                            <td><input type="text" name="k1" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k1']!=""){echo $_POST['k1'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k2" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k2']!=""){echo $_POST['k2'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k3" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k3']!=""){echo $_POST['k3'];}?>">
                                                            </td>
                                                      </tr>
                                                      <tr>
                                                            <td><input type="text" name="k4" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k4']!=""){echo $_POST['k4'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k5" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k5']!=""){echo $_POST['k5'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k6" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k6']!=""){echo $_POST['k6'];}?>">
                                                            </td>
                                                      </tr>
                                                      <tr>
                                                            <td><input type="text" name="k7" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k7']!=""){echo $_POST['k7'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k8" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k8']!=""){echo $_POST['k8'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k9" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k9']!=""){echo $_POST['k9'];}?>">
                                                            </td>
                                                      </tr>
                                                </table>
                                          </td></br>
                                    </tr>
                                    <tr>
                                          <td>Command Line key: </td>
                                          <td><input type="text" name="cmdkey" size="50"
                                                      value="<?php if($_POST['cmdkey'] != ""){echo $_POST['cmdkey'];} else {echo "$k";}?>">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td></td>
                                          <td>For e.g: <i>50 34 23;45 43 34;34 32 42 </i>i.e. start with a number, put a
                                                <i>space</i> for separating
                                          </td>
                                    </tr>
                                    <tr>
                                          <td></td>
                                    </tr>
                                    <tr>
                                          <td>Cipher Text : </td>

                                          <td><textarea name="cipher" id="cipher" rows="3" cols="50"><?php
				if($_GET['op']=="enc"){
					$pt=$_POST['plain'];
					$k = "";
					if($_POST['cmdkey'] != "")
					{
						$k = $_POST['cmdkey'];
					}
					else
					{
						(string)$k1=$_POST['k1'];
						(string)$k2=$_POST['k2'];
						(string)$k3=$_POST['k3'];
						(string)$k4=$_POST['k4'];
						(string)$k5=$_POST['k5'];
						(string)$k6=$_POST['k6'];
						(string)$k7=$_POST['k7'];
						(string)$k8=$_POST['k8'];
						(string)$k9=$_POST['k9'];
						$k = $k1." ".$k2." ".$k3.";".$k4." ".$k5." ".$k6.";".$k7." ".$k8." ".$k9;
					}
					$cmd="python hill.py -e -k \"".$k."\" -t \"".$pt."\"";
                              // echo $cmd;
                               if(exec($cmd)==null){
                                     echo "ERROR OCCURED !!"; 
                               }
                               else{
                                     //echo $cmd;
                                     echo exec($cmd);
                               } 
                              
				}
			?></textarea></td>
                                    </tr>

                                    <tr>
                                          <td><input id="ebtn" type="submit" value="Encrypt" /></td>
                                          <td><input name="esim" id="esim" type="button" value="Explaination" /></td>
                                    </tr>



                              </table>
                        </div>

                        <div id="decrsim" style="display:none">
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                              Dolor accusamus recusandae tenetur quaerat animi. Doloribus veritatis sed voluptate
                              officia
                              soluta
                              iure nostrum saepe reprehenderit! Quia voluptas nobis repudiandae enim asperiores!
                              <button id="decback">
                                    back to encryption
                              </button>
                        </div>
                  </form>

                  <hr>

                  <form name="dec" id="dec" method="post" action="hill.php?op=dec">
                        <div id="dcontent">
                              <h2> Decryption using Hill Cipher </h2>
                              <table border="0">
                                    <tr>
                                          <td>Cipher Text :</td>
                                          <td><textarea name="cipher" id="cipher" rows="3" cols="50"><?php
				if($_GET['op']=="dec"){
					echo $_POST['cipher'];
				}
			?></textarea></td>
                                    </tr>
                                    <tr>
                                          <td></td>
                                          <td>Please insert the key in <i>numeric form</i> only</td>
                                    </tr>
                                    <tr>
                                          <td>Key :</td>
                                          <td>
                                                <table>
                                                      <tr>
                                                            <td><input type="text" name="k1" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k1']!=""){echo $_POST['k1'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k2" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k2']!=""){echo $_POST['k2'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k3" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k3']!=""){echo $_POST['k3'];}?>">
                                                            </td>
                                                      </tr>
                                                      <tr>
                                                            <td><input type="text" name="k4" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k4']!=""){echo $_POST['k4'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k5" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k5']!=""){echo $_POST['k5'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k6" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k6']!=""){echo $_POST['k6'];}?>">
                                                            </td>
                                                      </tr>
                                                      <tr>
                                                            <td><input type="text" name="k7" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k7']!=""){echo $_POST['k7'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k8" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k8']!=""){echo $_POST['k8'];}?>">
                                                            </td>
                                                            <td><input type="text" name="k9" maxlength="2" size="1"
                                                                        value="<?php if($_POST['k9']!=""){echo $_POST['k9'];}?>">
                                                            </td>
                                                      </tr>
                                                </table>
                                          </td></br>
                                    </tr>
                                    <tr>
                                          <td>Command Line key: </td>
                                          <td><input type="text" name="cmdkey" size="50"
                                                      value="<?php if($_POST['cmdkey'] != ""){echo $_POST['cmdkey'];} else {echo "$k";}?>">
                                          </td>
                                    </tr>
                                    <tr>
                                          <td></td>
                                          <td>For e.g: <i>50 34 23;45 43 34;34 32 42 </i>i.e. start with a number, put a
                                                <i>space</i> for separating
                                          </td>
                                    </tr>
                                    <tr>
                                          <td></td>
                                    </tr>
                                    <tr>
                                          <td>Plain Text : </td>
                                          <td><textarea name="plain" id="plain" rows="3" cols="50"><?php
				if($_GET['op']=="dec"){
					$pt=$_POST['cipher'];
					$k = "";
					if($_POST['cmdkey'] != "")
					{
						$k = $_POST['cmdkey'];
					}
					else
					{
						(string)$k1=$_POST['k1'];
						(string)$k2=$_POST['k2'];
						(string)$k3=$_POST['k3'];
						(string)$k4=$_POST['k4'];
						(string)$k5=$_POST['k5'];
						(string)$k6=$_POST['k6'];
						(string)$k7=$_POST['k7'];
						(string)$k8=$_POST['k8'];
						(string)$k9=$_POST['k9'];
						$k = $k1." ".$k2." ".$k3.";".$k4." ".$k5." ".$k6.";".$k7." ".$k8." ".$k9;
					}
					$cmd="python hill.py -d -k \"".$k."\" -t \"".$pt."\"";
					// echo $cmd;
					echo exec($cmd);
					if(exec($cmd)==null){
						echo "ERROR OCCURED !!"; 
					}
					else{
					     // echo $cmd;
						echo exec($cmd);
					} 
					
				}
			?></textarea></td>
                                    </tr>

                                    <tr>
                                          <td><input id="dbtn" type="submit" value="Decrypt" /></td>
                                          <td><input id="dsim" type="button" value="Explaination" /></td>

                                    </tr>


                              </table>
                        </div>

                        <div id="encrsim" style="display:none">

                              <?php
				   $c_to_int=array(
					"/" => 0,
					"0" => 1,
					"1" => 2,
					"2" => 3,
					"3" => 4,
					"4" => 5,
					"5" => 6,
					"6" => 7,
					"7" => 8,
					"8" => 9,
					"9" => 10,
					"A" => 11,
					"B" => 12,
					"C" => 13,
					"D" => 14,
					"E" => 15,
					"F" => 16,
					"G" => 17,
					"H" =>  18,
					"I" => 19,
					"J" => 20,
					"K" => 21,
					"L" => 22,
					"M" => 23,
					"N" => 24,
					"O" =>  25,
					"P" => 26,
					"Q" => 27,
					"R" => 28,
					"S" => 29,
					"T" => 30,
					"U" => 31,
					"V" => 32,
					"W" => 33,
					"X" => 34,
					"Y" => 35,
					"Z"  => 36,
					"a" => 37,
					"b" => 38,
					"c" => 39,
					"d" => 40,
					"e" => 41,
					"f" => 42,
					"g" => 43,
					"h" =>  44,
					"i" => 45,
					"j" => 46,
					"k" => 47,
					"l" => 48,
					"m" => 49,
					"n" => 50,
					"o" =>  51,
					"p" => 52,
					"q" => 53,
					"r" => 54,
					"s" => 55,
					"t" => 56,
					"u" => 57,
					"v" => 58,
					"w" => 59,
					"x" => 60,
					"y" => 61,
					"z"  => 62,
                              "," => 63,
					" " => 64,
					"!" => 65,
					"@" => 66,
					"#" => 67,
					"$" => 68,
					"%" =>  69,
					"^" => 70,
					"&" => 71,
					"*" => 72,
					"(" => 73,
					")" => 74,
					"-" => 75,
					"=" => 76,
					"_" => 77,
					"+" => 78,
					"[" => 79,
					"]"  => 80,
                              "?" => 81,
					"{" => 82,
					"}" => 83,
					"<" => 84,
					";" => 85,
					"." => 86,
					":"  => 87,
                              ">" => 88
				);

				//
				$int_to_c=array(
					0 => "/",
					1 => "0",
					2 => "1",
					3 => "2",
					4 => "3",
					5 => "4",
					6 => "5",
					7 => "8",
					8 => "7",
					9 => "8",
					10 => "9",
					11 => "A",
					12 => "B",
					13 => "C",
					14 => "D",
					15 => "E",
					16 => "F",
					17 => "G",
					18 =>  "H",
					19 => "I",
					20 => "J",
					21 => "K",
					22=> "L",
				      23 => "M",
					24 => "N",
				      25 =>  "O",
					26 => "P",
					27 => "Q",
					28 => "R",
					29 => "S",
					30 => "T",
					31 => "U",
					32 => "V",
					33 => "W",
					34 => "X",
					35 => "Y",
					36  => "Z",
					37 => "a",
					38 => "b",
					39 => "c",
				       40 => "d",
					41 => "e",
					42 => "f",
				        43 => "g",
					44=>  "h",
					45 => "i",
					46 =>"j",
					47 => "k",
					48 => "l",
					49 => "m",
					50 => "n",
					51 =>  "o",
					52 => "p",
					53 => "q",
					54 => "r",
					55 => "s",
				      56 => "t",
					57 => "u",
					58 => "v",
					59 => "w",
					60 => "x",
					61 => "y",
					62  =>"z" ,
                              63 => ",",
					64 => " ",
					65 => "!",
					66 => "@",
					67 => "#",
					68 => "$",
					69 =>  "%",
					70 => "^",
				      71 => "&",
					72 => "*",
					73 =>")",
					74 =>"(",
					75 =>"-",
					76 =>"=",
					77 =>"_",
					78 =>"+",
					79 =>"[",
					80  =>"]",
                              81 =>"?",
					82 =>"{",
					83 =>"}",
					84 =>"<",
					85 =>";",
					86 =>".",
					87  =>":",
                              88 =>">"
				);
					
				    $pt=$_POST['plain'];
				    $len=strlen(strval($pt));
				    $size=3;
				    //1
				    echo "Plain text : ",$pt,"<br>";
				   
				    $extra=ceil(($len/$size))*$size- $len;
				    $a = str_repeat('Z', $extra);
				    $pt=$pt.$a;
				    //2
				    if($len%$size!=0){
					
					echo "Length of plain text is not multiple of ",$size," (size of matrix),Need to add","<i> ",$extra ," </i>","bogus chars <br>";
					
					echo "Plain text : ",$pt,"<br>";
				    }
				    else{
					  echo "Length of plain is multiple of n (size of matrix),Dont need to add bogus chars";
				    }
                            //3
				  $d = [];
				    $k = 1;
				     
				    for($row = 0; $row < 3; $row++) {
					  for ($col = 0; $col <3; $col++){
						$p='k'.$k;
						// echo $p;
						$d[$row][$col]=$_POST[$p];;
						// echo $d[$row][$col];
						$k++;
					  }
				    }

				 echo "<br>" ;
				    
				    for ($row = 0; $row < 3; $row++) {
					for ($col = 0; $col < 3; $col++) {
						$val=$d[$row][$col];
						// sleep(1);
					    echo "<input type='text's value='$val'  style='width:30px;margin:2px'/>";
					}
					echo "<br>";
				  }
                         //4
				 $a = str_repeat('Z', $extra);
				 $pt=$pt.$a;
				 $round=floor(strlen($pt)/$size);
				 $length=strlen($pt);
				//  echo $pt;
				 $count=0;
				 $ct="";
				//  echo $round;
				 for($i=0;$i<$round;$i++){
					$str="";
					for($j=0;$j<$size;$j++){
						$str.=($pt[$count]);
						$count++;
					}
					// echo $str;
                             
					for($row=0;$row<$size;$row++){
						$sum=0;
						for($col=0;$col<$size;$col++){
						$val=$c_to_int[$str[$col]]*$d[$row][$col];
						$sum+=$val;
                                    echo $str[$col]," ( ".$c_to_int[$str[$col]]." )"," * ",$d[$row][$col]," = ",$val,"   |";

						}
						
						$ans=$sum%89;
                   
						echo ": sum = ".$sum." % 89"." = ".$ans."(".$int_to_c[$ans].")";
						$ct.=($int_to_c[$ans]);
						echo "<br>";
					}
					
                             
				 }
				 echo "<br>Cipher text :   ",$ct," ";
				    
				    echo " <br><br>";
				?>


                              <button id="encback"
                                    class="button button--wayra button--border-thick button--text-upper button--size-s">
                                    back to decryption
                              </button>
                        </div>
                  </form>
            </div>
      </div>

      <div id="test">
	<section class="js--tabs">
                <p>1) Hill cipher is an example of ____________</p>
                <p>
                    a) mono-alphabetic cipher
                    b) substitution cipher
                    c) transposition cipher
                    d) additive cipher
                </p>
                <!-- <br> -->
                <p>
                   2) Encryption in hill cipher is done using ______________</p>
                   <p>
                    a) matrix multiplication
                    b) a 5×5 table
                    c) vigenere table
                    d) matrix inversion
                </p>
                <!-- <br> -->
                <p>
                    3) What is poly graphic substitution cipher? </p>
                <p> a) a substitution based cipher which uses multiple substitutions at different positions <br>
                    b) a substitution based cipher which uses fixed substitution over entire plain text <br>
                    c) a substitution based cipher in which substitution is performed over a block of letters <br>
                    d) a transposition based cipher which uses fixed substitution over entire plain text<br>
                </p>
                <!-- <br> -->
                <p>
                    4) What will be the plain text corresponding to cipher text “YGQ“ if hill cipher is used with keyword as “GYBNQKURP”?</p>
                    <p>
                    a) SECRET
                    b) WORLD
                    c) DOLLAR
                    d) HELLO
                    </p>
                    <!-- <br> -->
                    <p>
                    5) What will be the ciphered text if the plain text “SAN” is encrypted using hill cipher with keyword as “GYBNQKURP”? </p>
                <p> a) RAJ
                    b) JAR
                    c) ARJ
                    d) AJR
                </p>
      </div>

      <div id="abtus">

		<div class="cont">
			<div>
		      	
			<li>Aashish Omre    -   27</li>
		      <li>Kalash Parate   -   52</li>
		       <li>Harshal Vaidya -   48</li>
			
			</div>
		</div>

      </div>








      <script src="script.js"></script>
</body>

</html>