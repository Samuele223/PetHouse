<?php

class CImage
{
    public static function showImage($id){
        // No output before this point!
        $img = FPersistentManager::retriveObj(Mphoto::getEntity(), $id);

        if ($img) {
            // Clean output buffer to prevent accidental output
            if (ob_get_level()) {
                ob_end_clean();
            }
            header("Content-Type: " . $img->getType());
            // Optionally set Content-Length if available
            // header("Content-Length: " . strlen($img->getImageData()));
            echo stream_get_contents($img->getImageData());
            exit; // Stop further output
        } else {
            http_response_code(404);
            echo "Immagine non trovata";
        }
    }
}