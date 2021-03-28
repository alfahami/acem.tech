<?php

    function($image_name, $path, $width, $height){

        // Assign file to variable
        $file = $path . '/' . $image_name;

        //Load image file
        $ext = pathinfo($file['path'], PATHINFO_EXTENSION);

        function createimage($ext, $file) {
            switch ($ext) {
                case 'jpg':
                    return  imagecreatefromjpeg($file);
                case 'png':
                    return imagecreatefrompng($file);
                case 'gif':
                    return imagecreatefromgif($file);
            }
        }
        // we use imagescale() to resize the image
        $image = createimage($ext, $file);
        return imagescale($image, $width, $height);

    }
