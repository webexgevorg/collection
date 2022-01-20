<?php
if(isset($_POST['show'])){
   
   
                         $dir="../../images_banner";
                         $images = scandir($dir);
                            array_shift($images);
                            array_shift($images);

                            foreach ($images as $file) {
                              echo "<img src=".$dir."/".$file." name='".$file."' class='banner_img img-thumbnail' style='width: 150px; height: 150px; cursor: pointer'>";
                             
                            }
                      
}

?>