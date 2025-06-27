<?php

class CImage
{
    public static function showImage($id){
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
        require_once __DIR__ . '/../view/Verror.php';
        $view = new Verror();
        $view->show404();
        exit;
    }
    }
    
    public static function getPropertyFirstImage($propertyId) {
        // Verifica che l'ID sia valido
        if (!is_numeric($propertyId)) {
            echo json_encode(['success' => false, 'message' => 'Invalid property ID']);
            return;
        }
        
        // Usa FPosition per trovare direttamente la prima immagine
        $photoId = FPosition::getFirstImageForPosition((int)$propertyId);
        
        if ($photoId) {
            // Costruisci l'URL dell'immagine
            $imageUrl = '/PetHouse/image/showImage/' . $photoId;
            echo json_encode(['success' => true, 'imageUrl' => $imageUrl]);
        } else {
            // Nessuna foto trovata
            echo json_encode(['success' => false, 'message' => 'No images found']);
        }
    }
}