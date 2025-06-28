<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/autoloader.php';
require_once __DIR__ . '/../services/foundation/FEntityManager.php';

// Script to create 4 users with image variables



$admin = new Madmin("admin@example.com");
$admin->setPassword("adpass");

// Set randomized telephone numbers for users
function randomTel() {
    return rand(320000000, 399999999); // Italian mobile range
}

// User 1
$user1 = new Muser('Alberto', 'Rossi', 'alberto.rossi', 'alberto.rossi@example.com');
$user1->setPassword('pass1');
$user1->setTel(randomTel());
$user1Img = __DIR__ . '/img/user1.jpg';

// User 1 houses
$user1House1 = new MPosition(
    'Via dei Laghi 12',
    'Ampia casa vicino al lago, ideale per famiglie.',
    'Milano',
    'Milano',
    'Italia',
    $user1,
    'Casa Lago Blu'
);
$user1House1Img = __DIR__ . '/img/user1_house1.jpg';

$user1House2 = new MPosition(
    'Piazza Duomo 5',
    'Appartamento moderno in centro città.',
    'Milano',
    'Milano',
    'Italia',
    $user1,
    'Appartamento Centro'
);
$user1House2Img = __DIR__ . '/img/user1_house2.jpg';

// User 1 posts
$user1Post1 = new Mpost(
    'Offro soggiorno per 2 gatti in casa tranquilla.',
    ['CAT' => 2],
    25.00,
    'Soggiorno Gatti',
    'Ampio spazio e giochi per gatti.',
    $user1,
    $user1House1,
    new DateTime('2025-07-10'),
    new DateTime('2025-07-20')
);
$user1Post2 = new Mpost(
    'Accetto 1 cane di piccola taglia.',
    ['DOG' => 1],
    30.00,
    'Cane Benvenuto',
    'Appartamento con parco vicino.',
    $user1,
    $user1House2,
    new DateTime('2025-08-01'),
    new DateTime('2025-08-10')
);

// User 2
$user2 = new Muser('Marco', 'Bianchi', 'marco.bianchi', 'marco.bianchi@example.com');
$user2->setPassword('pass2');
$user2->setTel(randomTel());
$user2Img = __DIR__ . '/img/user2.jpg';

// User 2 houses
$user2House1 = new MPosition(
    'Via delle Rose 8',
    'Villa panoramica sulle colline.',
    'Firenze',
    'Firenze',
    'Italia',
    $user2,
    'Villa Collina'
);
$user2House1Img = __DIR__ . '/img/user2_house1.jpg';

$user2House2 = new MPosition(
    'Viale Europa 22',
    'Loft moderno e luminoso.',
    'Empoli',
    'Firenze',
    'Italia',
    $user2,
    'Loft Moderno'
);
$user2House2Img = __DIR__ . '/img/user2_house2.jpg';

// User 2 posts
$user2Post1 = new Mpost(
    'Ospito 3 cani di media taglia.',
    ['DOG' => 3],
    40.00,
    'Vacanza per Cani',
    'Grande giardino recintato.',
    $user2,
    $user2House1,
    new DateTime('2025-07-15'),
    new DateTime('2025-07-25')
);
$user2Post2 = new Mpost(
    'Accolgo 1 coniglio e 1 gatto.',
    ['RABBIT' => 1, 'CAT' => 1],
    22.00,
    'Coniglio e Gatto',
    'Ambiente silenzioso e sicuro.',
    $user2,
    $user2House2,
    new DateTime('2025-09-01'),
    new DateTime('2025-09-07')
);

// User 3
$user3 = new Muser('Giulio', 'Verdi', 'giulio.verdi', 'giulio.verdi@example.com');
$user3->setPassword('pass3');
$user3->setTel(randomTel());
$user3Img = __DIR__ . '/img/user3.png';

// User 3 houses
$user3House1 = new MPosition(
    'Lungomare 10',
    'Casa fronte mare con terrazza.',
    'Avezzano',
    'L\'Aquila',
    'Italia',
    $user3,
    'Casa Mare'
);
$user3House1Img = __DIR__ . '/img/user3_house1.jpg';

$user3House2 = new MPosition(
    'Via Porto 3',
    'Attico con vista sul porto.',
    'Coppito',
    'L\'Aquila',
    'Italia',
    $user3,
    'Attico Vista Porto'
);
$user3House2Img = __DIR__ . '/img/user3_house2.jpg';

// User 3 posts
$user3Post1 = new Mpost(
    'Soggiorno per 2 pappagalli.',
    ['PARROT' => 2],
    15.00,
    'Ospitalità Uccelli',
    'Vista mare e ambiente luminoso.',
    $user3,
    $user3House1,
    new DateTime('2025-07-05'),
    new DateTime('2025-07-12')
);
$user3Post2 = new Mpost(
    'Accetto 2 gatti e 1 cane.',
    ['CAT' => 2, 'DOG' => 1],
    35.00,
    'Gatti e Cane',
    'Attico spazioso con terrazza.',
    $user3,
    $user3House2,
    new DateTime('2025-08-15'),
    new DateTime('2025-08-22')
);

// User 4
$user4 = new Muser('Luca', 'Neri', 'luca.neri', 'luca.neri@example.com');
$user4->setPassword('pass4');
$user4->setTel(randomTel());
$user4Img = __DIR__ . '/img/user4.jpg';

// User 4 houses
$user4House1 = new MPosition(
    'Via delle Alpi 1',
    'Chalet accogliente in montagna.',
    'Torino',
    'Torino',
    'Italia',
    $user4,
    'Chalet Montagna'
);
$user4House1Img = __DIR__ . '/img/user4_house1.jpg';

$user4House2 = new MPosition(
    'Corso Roma 15',
    'Casa storica nel centro di Torino.',
    'Villorba',
    'Treviso',
    'Italia',
    $user4,
    'Casa Storica'
);
$user4House2Img = __DIR__ . '/img/user4_house2.jpg';

// User 4 posts
$user4Post1 = new Mpost(
    'Ospito 1 cane grande.',
    ['DOG' => 1],
    28.00,
    'Cane in Montagna',
    'Passeggiate in montagna garantite.',
    $user4,
    $user4House1,
    new DateTime('2025-07-20'),
    new DateTime('2025-07-30')
);
$user4Post2 = new Mpost(
    'Accolgo 2 gatti.',
    ['CAT' => 2],
    26.00,
    'Gatti in Centro',
    'Casa storica, ambiente tranquillo.',
    $user4,
    $user4House2,
    new DateTime('2025-09-10'),
    new DateTime('2025-09-18')
);

// 3 reports for user2Post1 (owner: user2, reporters: user1, user3, user4)
$report1 = new Mreport('Inappropriate content', $user1, $user2Post1);
$user2Post1->setNumReport(($user2Post1->getNumReport() ?? 0) + 1);
$report2 = new Mreport('Spam or misleading', $user3, $user2Post1);
$user2Post1->setNumReport(($user2Post1->getNumReport() ?? 0) + 1);
$report3 = new Mreport('Harmful to animals', $user4, $user2Post1);
$user2Post1->setNumReport(($user2Post1->getNumReport() ?? 0) + 1);

// 2 reports for user3Post2 (owner: user3, reporters: user1, user2)
$report4 = new Mreport('Offensive language', $user1, $user3Post2);
$user3Post2->setNumReport(($user3Post2->getNumReport() ?? 0) + 1);
$report5 = new Mreport('Fake listing', $user2, $user3Post2);
$user3Post2->setNumReport(($user3Post2->getNumReport() ?? 0) + 1);

// 1 report for user4Post1 (owner: user4, reporter: user2)
$report6 = new Mreport('Other reason', $user2, $user4Post1);
$user4Post1->setNumReport(($user4Post1->getNumReport() ?? 0) + 1);

// Set 6 posts to 'finished' and create 1 offer for each
$posts = [$user1Post1, $user1Post2, $user2Post1, $user2Post2, $user3Post1, $user3Post2];
$offers = [];
$offerClients = [$user2, $user3, $user4, $user1, $user4, $user2]; // ensure not the post owner
$offerPets = [
    ['CAT' => 2],
    ['DOG' => 1],
    ['DOG' => 2],
    ['RABBIT' => 1],
    ['PARROT' => 1],
    ['CAT' => 1, 'DOG' => 1]
];
$offerInDates = [
    '2025-07-11', '2025-08-02', '2025-07-16', '2025-09-02', '2025-07-06', '2025-08-16'
];
$offerOutDates = [
    '2025-07-19', '2025-08-09', '2025-07-24', '2025-09-06', '2025-07-11', '2025-08-20'
];

foreach ($posts as $i => $post) {
    $post->setBooked('finished');
    $offer = new Moffer(
        new DateTime($offerInDates[$i]),
        new DateTime($offerOutDates[$i]),
        $post,
        $offerPets[$i],
        $offerClients[$i]
    );
    $offer->setState(stateoffer::FINISHED); // Set offer state to FINISHED for review eligibility
    $offers[] = $offer;
}

// Add reviews for each finished post/offer
$reviews = [];
$reviewData = [
    [
        'desc' => 'Esperienza ottima, animali trattati benissimo!',
        'rating' => rating::five,
        'reviewer' => $offers[0]->getClient(),
        'reviewed' => $offers[0]->getPost()->getSeller(),
        'offer' => $offers[0]
    ],
    [
        'desc' => 'Casa pulita e accogliente, consigliato.',
        'rating' => rating::four,
        'reviewer' => $offers[1]->getClient(),
        'reviewed' => $offers[1]->getPost()->getSeller(),
        'offer' => $offers[1]
    ],
    [
        'desc' => 'Tutto come da descrizione, ottima comunicazione.',
        'rating' => rating::five,
        'reviewer' => $offers[2]->getClient(),
        'reviewed' => $offers[2]->getPost()->getSeller(),
        'offer' => $offers[2]
    ],
    [
        'desc' => 'Ambiente tranquillo, animali felici.',
        'rating' => rating::four,
        'reviewer' => $offers[3]->getClient(),
        'reviewed' => $offers[3]->getPost()->getSeller(),
        'offer' => $offers[3]
    ],
    [
        'desc' => 'Vista mare spettacolare, esperienza positiva.',
        'rating' => rating::five,
        'reviewer' => $offers[4]->getClient(),
        'reviewed' => $offers[4]->getPost()->getSeller(),
        'offer' => $offers[4]
    ],
    [
        'desc' => 'Tutto perfetto, consigliato!',
        'rating' => rating::three,
        'reviewer' => $offers[5]->getClient(),
        'reviewed' => $offers[5]->getPost()->getSeller(),
        'offer' => $offers[5]
    ]
];

foreach ($reviewData as $data) {
    $review = new Mreview($data['desc'], $data['rating'], $data['reviewer'], $data['reviewed']);
    // Relate review to offer
    $reflection = new ReflectionClass($review);
    $prop = $reflection->getProperty('offer');
    $prop->setAccessible(true);
    $prop->setValue($review, $data['offer']);
    $reviews[] = $review;
}

// === PERSIST TO DATABASE ===
FEntityManager::getInstance();
$em = FEntityManager::getEntityManager();

// === CLEANUP EXISTING DEMO DATA ===
// Remove reviews, offers, reports, posts, houses, users, admin (in this order to respect FKs)
$entities = [
    'Mreview',
    'Moffer',
    'Mreport',
    'Mpost',
    'Mphoto', // must be before MPosition!
    'MPosition',
    'Muser',
    'Madmin'
];
foreach ($entities as $entity) {
    $repo = $em->getRepository($entity);
    foreach ($repo->findAll() as $obj) {
        $em->remove($obj);
    }
}
$em->flush();

// === CREATE PHOTOS AND ASSOCIATE ===
function createPhotoFromPath($path) {
    $data = file_exists($path) ? file_get_contents($path) : '';
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    return new Mphoto($data, $ext);
}

// User profile photos
$user1Photo = createPhotoFromPath($user1Img);
$user2Photo = createPhotoFromPath($user2Img);
$user3Photo = createPhotoFromPath($user3Img);
$user4Photo = createPhotoFromPath($user4Img);

$user1->setProfilePicture($user1Photo);
$user2->setProfilePicture($user2Photo);
$user3->setProfilePicture($user3Photo);
$user4->setProfilePicture($user4Photo);

// House photos
$user1House1Photo = createPhotoFromPath($user1House1Img);
$user1House2Photo = createPhotoFromPath($user1House2Img);
$user2House1Photo = createPhotoFromPath($user2House1Img);
$user2House2Photo = createPhotoFromPath($user2House2Img);
$user3House1Photo = createPhotoFromPath($user3House1Img);
$user3House2Photo = createPhotoFromPath($user3House2Img);
$user4House1Photo = createPhotoFromPath($user4House1Img);
$user4House2Photo = createPhotoFromPath($user4House2Img);

$user1House1->addPhoto($user1House1Photo);
$user1House2->addPhoto($user1House2Photo);
$user2House1->addPhoto($user2House1Photo);
$user2House2->addPhoto($user2House2Photo);
$user3House1->addPhoto($user3House1Photo);
$user3House2->addPhoto($user3House2Photo);
$user4House1->addPhoto($user4House1Photo);
$user4House2->addPhoto($user4House2Photo);

// Persist admin and users
$em->persist($admin);
$em->persist($user1);
$em->persist($user2);
$em->persist($user3);
$em->persist($user4);

// Persist houses
$em->persist($user1House1);
$em->persist($user1House2);
$em->persist($user2House1);
$em->persist($user2House2);
$em->persist($user3House1);
$em->persist($user3House2);
$em->persist($user4House1);
$em->persist($user4House2);

// Persist posts
$em->persist($user1Post1);
$em->persist($user1Post2);
$em->persist($user2Post1);
$em->persist($user2Post2);
$em->persist($user3Post1);
$em->persist($user3Post2);
$em->persist($user4Post1);
$em->persist($user4Post2);

// Persist offers
foreach ($offers as $offer) {
    $em->persist($offer);
}

// Persist reports
foreach ([$report1, $report2, $report3, $report4, $report5, $report6] as $report) {
    $em->persist($report);
}

// Persist reviews
foreach ($reviews as $review) {
    $em->persist($review);
}

// Persist photos before users/houses
$em->persist($user1Photo);
$em->persist($user2Photo);
$em->persist($user3Photo);
$em->persist($user4Photo);
$em->persist($user1House1Photo);
$em->persist($user1House2Photo);
$em->persist($user2House1Photo);
$em->persist($user2House2Photo);
$em->persist($user3House1Photo);
$em->persist($user3House2Photo);
$em->persist($user4House1Photo);
$em->persist($user4House2Photo);

// === VERIFICATION DEMO DATA ===
// User 1: verified
$verification1 = new Mverification($user1, 'Verifica completata');
$verification1->setApproved(true);
$user1->setVerification($verification1);

// User 2: verification request with document
$verification2 = new Mverification($user2, 'Richiesta verifica documento');
$doc2 = createPhotoFromPath($user2Img); // Use user2 image as document
$verification2->addDocument($doc2);
$user2->setVerification($verification2);

// User 3: verification request with document
$verification3 = new Mverification($user3, 'Richiesta verifica documento');
$doc3 = createPhotoFromPath($user3House1Img); // Use user3 house1 image as document
$verification3->addDocument($doc3);
$user3->setVerification($verification3);

// Persist verifications and documents
$em->persist($verification1);
$em->persist($verification2);
$em->persist($verification3);
$em->persist($doc2);
$em->persist($doc3);

// Flush all at once
$em->flush();

echo "\nAll demo data persisted to the database successfully.\n";

// Example: print user info and image path
echo "User 1: {$user1->getName()} {$user1->getSurname()} - Image: $user1Img\n";
echo "User 2: {$user2->getName()} {$user2->getSurname()} - Image: $user2Img\n";
echo "User 3: {$user3->getName()} {$user3->getSurname()} - Image: $user3Img\n";
echo "User 4: {$user4->getName()} {$user4->getSurname()} - Image: $user4Img\n";

// Example: print house info and image path for user 1
foreach ([['obj' => $user1House1, 'img' => $user1House1Img], ['obj' => $user1House2, 'img' => $user1House2Img]] as $house) {
    echo $house['obj']->getTitle() . " - Image: " . $house['img'] . "\n";
}

// Example: print post info for user 1
foreach ([$user1Post1, $user1Post2] as $post) {
    echo $post->getTitle() . " - Animali: ";
    foreach ($post->getAcceptedPets() as $pet => $num) {
        $petStr = is_object($pet) && $pet instanceof acceptedPet ? $pet->value : (string)$pet;
        echo $num . ' ' . $petStr . ' ';
    }
    echo "- Prezzo: " . $post->getPrice() . "\n";
}

// Example: print report info
// (Reports are persisted but not shown to users; admin will decide what to do)
// $reports = [$report1, $report2, $report3, $report4, $report5, $report6];
// foreach ($reports as $idx => $report) {
//     echo "Report " . ($idx+1) . ": Post '" . $report->getPostReported()->getTitle() . "' by Reporter " . $report->getReporter()->getName() . " - Desc: " . $report->getDescription() . "\n";
// }

// Example: print offer info
foreach ($offers as $i => $offer) {
    echo "Offer " . ($i+1) . ": Post '" . $offer->getPost()->getTitle() . "' for Client " . $offer->getClient()->getName() . " - State: " . $offer->getState()->value . "\n";
}

// Example: print review info
foreach ($reviews as $i => $review) {
    echo "Review " . ($i+1) . ": Post '" . $review->getOfferReviewed()->getPost()->getTitle() . "' by Reviewer " . $review->getReviewer()->getName() . " - Rating: " . $review->getRating()->value . " - Desc: " . $review->getDescription() . "\n";
}

// === ADD 8 MORE RANDOMIZED POSTS ===
$newPosts = [];
$postTemplates = [
    [
        'desc' => 'Ospito 1 cane e 1 gatto, ambiente familiare.',
        'pets' => ['DOG' => 1, 'CAT' => 1],
        'price' => 32.00,
        'title' => 'Cane e Gatto Amici',
        'details' => 'Giardino e giochi disponibili.'
    ],
    [
        'desc' => 'Accolgo 2 conigli, spazio verde.',
        'pets' => ['RABBIT' => 2],
        'price' => 18.00,
        'title' => 'Conigli Felici',
        'details' => 'Ampio prato recintato.'
    ],
    [
        'desc' => 'Ospito 1 pappagallo e 1 gatto.',
        'pets' => ['PARROT' => 1, 'CAT' => 1],
        'price' => 20.00,
        'title' => 'Pappagallo e Gatto',
        'details' => 'Ambiente luminoso e tranquillo.'
    ],
    [
        'desc' => 'Accetto 2 cani grandi.',
        'pets' => ['DOG' => 2],
        'price' => 45.00,
        'title' => 'Cani Grandi Benvenuti',
        'details' => 'Passeggiate quotidiane incluse.'
    ],
    [
        'desc' => 'Ospito 3 gatti.',
        'pets' => ['CAT' => 3],
        'price' => 27.00,
        'title' => 'Gatti in Vacanza',
        'details' => 'Tiragraffi e giochi.'
    ],
    [
        'desc' => 'Accolgo 1 cane piccolo.',
        'pets' => ['DOG' => 1],
        'price' => 22.00,
        'title' => 'Cane Piccolo OK',
        'details' => 'Appartamento con balcone.'
    ],
    [
        'desc' => 'Ospito 2 conigli e 1 gatto.',
        'pets' => ['RABBIT' => 2, 'CAT' => 1],
        'price' => 24.00,
        'title' => 'Conigli e Gatto',
        'details' => 'Spazio verde e giochi.'
    ],
    [
        'desc' => 'Accetto 1 cane e 1 pappagallo.',
        'pets' => ['DOG' => 1, 'PARROT' => 1],
        'price' => 29.00,
        'title' => 'Cane e Pappagallo',
        'details' => 'Ambiente sereno.'
    ]
];

$users = [$user1, $user2, $user3, $user4];
$houses = [$user1House1, $user1House2, $user2House1, $user2House2, $user3House1, $user3House2, $user4House1, $user4House2];
for ($i = 0; $i < 8; $i++) {
    $template = $postTemplates[$i % count($postTemplates)];
    $user = $users[$i % count($users)];
    $house = $houses[$i % count($houses)];
    $start = new DateTime('2025-07-' . str_pad(21 + $i, 2, '0', STR_PAD_LEFT));
    $end = (clone $start)->modify('+7 days');
    $newPosts[] = new Mpost(
        $template['desc'],
        $template['pets'],
        $template['price'],
        $template['title'],
        $template['details'],
        $user,
        $house,
        $start,
        $end
    );
}
// Add new posts to persistence
foreach ($newPosts as $np) {
    $em->persist($np);
}

// Flush all at once
$em->flush();

echo "\nAll demo data with new posts persisted to the database successfully.\n";

// Example: print new post info
foreach ($newPosts as $post) {
    echo $post->getTitle() . " - Animali: ";
    foreach ($post->getAcceptedPets() as $pet => $num) {
        $petStr = is_object($pet) && $pet instanceof acceptedPet ? $pet->value : (string)$pet;
        echo $num . ' ' . $petStr . ' ';
    }
    echo "- Prezzo: " . $post->getPrice() . "\n";
}


