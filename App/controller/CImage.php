<?php

class Cimage
{
    public static function showImage($id){
        $img = FpersistentManager::retriveObj(Mphoto::getEntity(), $id);

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
        require_once __DIR__ . '/../view/Verror.php';
        $view = new Verror();
        $view->show404();
        exit;
    }
    }
    
    public static function getPropertyFirstImage($propertyId) {
        if (!is_numeric($propertyId)) {
            echo json_encode(['success' => false, 'message' => 'Invalid property ID']);
            return;
        }
        
        $photoId = Fposition::getFirstImageForPosition((int)$propertyId);
        
        if ($photoId) {

            $imageUrl = '/PetHouse/image/showImage/' . $photoId;
            echo json_encode(['success' => true, 'imageUrl' => $imageUrl]);
        } else {

            echo json_encode(['success' => false, 'message' => 'No images found']);
        }
    }
}