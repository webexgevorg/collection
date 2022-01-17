<?php

                         $dir="../textures";
                         $images = scandir($dir);
                            array_shift($images);
                            array_shift($images);

                            foreach ($images as $file) {
                              echo "<img src=".$dir."/".$file." name='".$file."' class='texture_img img-thumbnail' style='width: 50px; height: 50px; cursor: pointer'>";
                             
                            }
                      


?>