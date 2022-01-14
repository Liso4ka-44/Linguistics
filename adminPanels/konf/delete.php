<?php

include('../connect.php');

                
                  $ID_conf = (int)$_GET['id'];
                  $sql = "SELECT  `date` FROM `conferences` WHERE `ID_conf` = ".$ID_conf;
                  $poisk=mysqli_query($connect, $sql);	
                  $row = mysqli_fetch_assoc($poisk);
                  $dateKonf = date("Y.m.d",strtotime($row["date"]));
                  $dir = $dateKonf;

                function removeDirectory($dir) {
                    if (file_exists($dir) && is_dir($dir)) {
                      chmod($dir, 0777 );
                      if ($elements = glob($dir."/*")) {
                        foreach($elements as $element) {
                          is_dir($element) ? removeDirectory($element) : unlink($element);
                        }
                      }
                      rmdir($dir);
                    }
                    else{
                      print_r('Error! There is no such directory or it is not a directory!');
                    }
                  }
					removeDirectory($dir);
                  $sql = "DELETE FROM `conferences` WHERE `ID_conf`=".$ID_conf;
                  mysqli_query($connect, $sql);
                  
	
                echo "<script> document.location.href='../conflist.php';</script>"; 
              
?>