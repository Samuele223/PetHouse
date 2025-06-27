# PetHouse Project Documentation

## 1. Controllers

Controllers in PetHouse are responsible for handling user requests, processing input, interacting with models, and rendering the appropriate views. Each controller is a PHP class located in `App/controller/` and typically exposes static methods for each route or user action.

### 1.1. CUser
Handles all user-related actions, including registration, login, profile management, property (house) management, and post management.

**Key Methods:**
- `registration()`: Shows the registration form (GET) or processes registration (POST). Validates input, checks for unique username/email, and creates a new user.
- `login()`: Handles user login, session management, and error feedback.
- `logout()`: Logs out the user and destroys the session.
- `home()`: Displays the user home/dashboard.
- `profile()`: Shows the user's profile page.
- `addHouse()`: Displays the form to add a new property.
- `createHouse()`: Processes the property creation form, handles file uploads, and saves the property to the database.
- `myPost()`, `myHouses()`: Lists the user's posts and properties.
- `viewMyHousesDetails($id)`: Shows details for a specific property.
- `editHouse($id)`, `updateHouse($id)`: Allows editing and updating property details.
- `deleteHouse($id)`: Deletes a property.
- `askVerification()`, `submitVerification()`: Handles user verification requests.
- Post management: `delete_post($id_post)`, `edit_post($id_post)`, `savedit()`, `review()`, `yourpost($id)`.

### 1.2. CReview
Manages reviews between users and for posts.
- `Deals()`: Shows reviewable deals.
- `makereview($id, $type)`: Displays the review form for a user or post.
- `savereview($id)`: Saves a submitted review.

### 1.3. CReport
Handles reporting of posts.
- `reportPost($idPost)`: Initiates a report for a post.
- `makeReport($idPost)`: Processes a submitted report.
- `showReportForm($idPost)`: Displays the report form.

### 1.4. CofferHosting
Manages hosting offers.
- `showOfferForm()`: Displays the offer creation form.
- `createOffer()`: Processes the offer form and creates a new offer.
- `showErrorAndForm($error, $positionId)`: Shows errors and re-displays the form.

### 1.5. Cmanagerequest
Handles requests and offers for posts.
- `viewoffers($post_id)`: Lists offers for a post.
- `accept_Deny_Offer($offer_id, $yesorno)`: Accepts or denies an offer.

### 1.6. CImage
Handles image display and retrieval.
- `showImage($id)`: Outputs an image by ID.
- `getPropertyFirstImage($propertyId)`: Gets the first image for a property.

### 1.7. CFrontController
The main entry point for routing requests.
- `run($requestUri)`: Parses the request URI and dispatches to the appropriate controller and method.

### 1.8. Cfindhosting
Handles property search and booking.
- `startResearch()`: Shows the search form.
- `searchHost()`: Processes search requests.
- `selectPost($id)`: Shows details for a selected post.
- `bookPost($id)`: Displays the booking form for a post.
- `createOffer($id_post)`: Creates an offer for a post.
- `viewprofile($id_user)`: Shows a user's profile.

### 1.9. CAdmin
Handles admin actions.
- `login()`, `logout()`, `profile()`: Admin authentication and profile.
- `listVerificationRequests()`, `acceptVerification($id)`, `rejectVerification($id)`: Manages user verification.
- `listReportedPosts()`, `reportedPostDetail($postId)`, `approveReportedPost($postId)`, `deleteReportedPost($postId)`: Manages reported posts.
- `userProfile($userId)`, `showuserProfile($userId)`: Views user profiles.

---

## 1. Controllers (Detailed)

### General Architecture

Controllers in PetHouse act as the main entry point for user actions. They:
- Receive HTTP requests (via routes/front controller).
- Validate and process input.
- Interact with the business logic and data layer (models, persistent manager, entity manager).
- Pass data to the view layer for rendering.

#### Data Flow Example

1. **Controller** (e.g., `CUser::registration()`) receives a request.
2. It calls methods on the **Persistent Manager** (e.g., `FPersistentManager::verifyUserUsername($username)`), which acts as a service layer.
3. The Persistent Manager uses the **Entity Manager** (Doctrine ORM) to interact with the database and fetch or persist entities (e.g., `User`, `Post`, `Property`).
4. The controller receives results (entities, arrays, or status) and passes them to the **View** (Smarty template) for rendering.

---

### 1.1. CUser

Handles user registration, authentication, profile, and property management.

#### Example: Registration Flow

- `CUser::registration()`
  - On GET: Calls `VUser::showRegisterForm()` to display the registration form.
  - On POST:
    - Validates input.
    - Calls `FPersistentManager::verifyUserUsername($username)` and `FPersistentManager::verifyUserEmail($email)` to check for duplicates.
      - These methods use Doctrine's Entity Manager to query the `User` entity.
    - If valid, calls `FPersistentManager::registerUser($userData)` to create a new user.
      - This method creates a new `User` entity and persists it using the Entity Manager.
    - On success, redirects or shows a success view.

#### Example: Property Creation

- `CUser::createHouse()`
  - Validates form data and file uploads.
  - Calls `FPersistentManager::createHouse($houseData, $userId)`:
    - This method creates a new `Property` entity, sets its fields, and persists it with the Entity Manager.
    - Handles image uploads, creating `Photo` entities as needed.
  - On success, redirects to the user's property list or shows a confirmation view.

#### Other Methods

- `login()`, `logout()`: Manage session state, use persistent manager to verify credentials.
- `myPost()`, `myHouses()`: Fetch posts/properties for the logged-in user via persistent manager, which queries the database.
- `editHouse($id)`, `updateHouse($id)`: Fetch and update property entities.
- `deleteHouse($id)`: Removes a property entity from the database.

---

### 1.2. CReview

Handles reviews between users and for posts.

- `Deals()`: Fetches deals eligible for review using persistent manager, which queries the relevant entities.
- `makereview($id, $type)`: Loads the entity to be reviewed (user or post) and displays the review form.
- `savereview($id)`: Validates and saves the review entity using the persistent manager and entity manager.

---

### 1.3. CReport

Handles reporting of posts.

- `reportPost($idPost)`: Loads the post entity and displays the report form.
- `makeReport($idPost)`: Validates and saves a new report entity.
- `showReportForm($idPost)`: Shows the report form for a specific post.

---

### 1.4. CofferHosting

Handles creation and management of hosting offers.

- `showOfferForm()`: Displays the offer form.
- `createOffer()`: Validates input, creates a new `Offer` entity, and persists it.
- `showErrorAndForm($error, $positionId)`: Displays errors and re-renders the form.

---

### 1.5. Cmanagerequest

Handles requests and offers for posts.

- `viewoffers($post_id)`: Fetches all offers for a post using persistent manager.
- `accept_Deny_Offer($offer_id, $yesorno)`: Updates the offer entity's status.

---

### 1.6. CImage

Handles image retrieval and display.

- `showImage($id)`: Fetches the image entity and outputs the binary data.
- `getPropertyFirstImage($propertyId)`: Fetches the first image for a property.

---

### 1.7. CFrontController

Handles routing.

- `run($requestUri)`: Parses the URI, determines the controller and method, and dispatches the request.

---

### 1.8. Cfindhosting

Handles property search and booking.

- `startResearch()`: Displays the search form.
- `searchHost()`: Processes search parameters, queries the persistent manager for matching properties.
- `selectPost($id)`: Loads a post entity and displays its details.
- `bookPost($id)`: Displays the booking form for a post.
- `createOffer($id_post)`: Creates an offer for a post.
- `viewprofile($id_user)`: Loads and displays a user's profile.

---

### 1.9. CAdmin

Handles admin actions.

- `login()`, `logout()`, `profile()`: Admin authentication and session management.
- `listVerificationRequests()`, `acceptVerification($id)`, `rejectVerification($id)`: Fetches and updates verification requests.
- `listReportedPosts()`, `reportedPostDetail($postId)`, `approveReportedPost($postId)`, `deleteReportedPost($postId)`: Manages reported posts.
- `userProfile($userId)`, `showuserProfile($userId)`: Loads and displays user profiles.

---

#### Persistent Manager and Entity Manager

- **FPersistentManager**: Acts as a service layer between controllers and the database. It contains static methods for CRUD operations, validation, and business logic. It uses the Doctrine Entity Manager to interact with the database.
- **Entity Manager**: Provided by Doctrine ORM, it handles the actual database operations (persist, find, update, remove) for entities.

**Example Flow:**
- Controller calls `FPersistentManager::findUserById($id)`
- Persistent manager calls `$entityManager->find('User', $id)`
- Returns a `User` entity to the controller

---

#### Views

- Controllers pass data to view classes (e.g., `VUser`), which assign variables to Smarty templates.
- Templates are rendered with dynamic data and sent to the browser.

---

## 2. Views

Views are implemented using the Smarty templating engine and are located in `App/templates/templates_tpl/`. Each `.tpl` file corresponds to a page or component in the application.

- Controllers instantiate view classes (e.g., `VUser`) and call methods to render the appropriate template.
- Data is passed from the controller to the view, which then populates the template with dynamic content.
- Templates are organized by feature (user, admin, property, post, etc.) and include forms, lists, detail pages, and feedback messages.

**Examples:**
- `user-profile.tpl`: Displays user profile information.
- `user_posts.tpl`: Lists posts created by the user.
- `houseform.tpl`: Form for submitting a new property.
- `offer_hosting.tpl`: Form for making a hosting offer.
- `list_of_reported_posts.tpl`: Admin view for reported posts.

---

## 2.1. Template Files and Their Roles

### user-profile.tpl
- **Role:** Displays the profile page for a user, including personal information, verification status, and social links.
- **Hierarchy:** Rendered by the `VUser` view class, typically from the `CUser::profile()` controller method.
- **Data Flow:** The controller fetches user data from the persistent manager (which uses the entity manager to query the `User` entity) and passes it to the view.
- **Languages/Tech:** Smarty templating, HTML, CSS, Bootstrap.
- **JavaScript:** May include scripts for UI effects (e.g., fade-out messages), but no heavy logic.
- **Workflow:**  
  1. User navigates to profile page.
  2. Controller fetches user entity and passes it to the view.
  3. View assigns data to Smarty variables.
  4. Template renders user info, verification status, and social links.

---

### user_posts.tpl
- **Role:** Lists all posts created by the logged-in user, with options to view, edit, or delete.
- **Hierarchy:** Rendered by `VUser` from `CUser::myPost()`.
- **Data Flow:** Controller fetches posts for the user via persistent manager, which queries the `Post` entity.
- **Languages/Tech:** Smarty, HTML, CSS, Bootstrap.
- **JavaScript:** May include scripts for confirmation dialogs or UI enhancements.
- **Workflow:**  
  1. Controller retrieves all posts for the user.
  2. Data is passed to the view and assigned to Smarty variables.
  3. Template loops through posts and displays them in a table or card format.

---

### houseform.tpl
- **Role:** Form for submitting a new property (house) to the platform.
- **Hierarchy:** Rendered by `VUser` from `CUser::addHouse()`.
- **Data Flow:**  
  - On GET: Controller provides empty/default data.
  - On POST: Form submits to `CUser::createHouse()`, which validates and persists the property.
- **Languages/Tech:** Smarty, HTML, CSS, Bootstrap.
- **JavaScript:**  
  - Used for form validation (e.g., required fields, terms acceptance).
  - Dynamic UI for adding/removing images and accepted pets.
  - Location autocomplete and validation.
- **Workflow:**  
  1. User opens the form to add a property.
  2. Fills out details, uploads images, accepts terms.
  3. JavaScript validates input before submission.
  4. On submit, data is sent to the controller, which uses the persistent manager and entity manager to create a new `Property` entity and related `Photo` entities.

---

### offer_hosting.tpl
- **Role:** Form for making a hosting offer for a property/post.
- **Hierarchy:** Rendered by a view class (e.g., `VOffer`) from `CofferHosting::showOfferForm()`.
- **Data Flow:**  
  - On GET: Controller provides property/post data.
  - On POST: Form submits to `CofferHosting::createOffer()`, which validates and persists the offer.
- **Languages/Tech:** Smarty, HTML, CSS, Bootstrap.
- **JavaScript:**  
  - May be used for date pickers, validation, or dynamic form fields.
- **Workflow:**  
  1. User opens the offer form for a property/post.
  2. Fills out offer details.
  3. JavaScript may validate input.
  4. On submit, controller creates a new `Offer` entity via persistent manager and entity manager.

---

### list_of_reported_posts.tpl
- **Role:** Admin view listing all reported posts for moderation.
- **Hierarchy:** Rendered by `VAdmin` from `CAdmin::listReportedPosts()`.
- **Data Flow:** Controller fetches reported posts via persistent manager, which queries the `Report` and `Post` entities.
- **Languages/Tech:** Smarty, HTML, CSS, Bootstrap.
- **JavaScript:**  
  - May be used for admin actions (approve, delete) or confirmation dialogs.
- **Workflow:**  
  1. Admin navigates to the reported posts list.
  2. Controller retrieves all reported posts and passes them to the view.
  3. Template displays each report with options for admin action.

---

**Other Templates:**  
- Most other `.tpl` files follow a similar pattern:  
  - Controller fetches data (using persistent manager/entity manager).
  - Data is passed to the view and assigned to Smarty variables.
  - Template renders the data, sometimes with JavaScript for interactivity.

**General Notes:**
- All templates use Smarty for variable interpolation and logic.
- Most templates use Bootstrap for layout and styling.
- JavaScript is included as needed for validation, UI effects, and dynamic form fields.
- Templates do not directly access the database; all data comes from the controller via the view.

---

## 1. Controllers – Main Operation Flows (Detailed)

### 1.1. CUser – Main Operation Flows

#### Registration Flow
1. **User Action:** Navigates to the registration page (`/User/registration`).
2. **Controller (`CUser::registration`)**:
   - On GET: Instantiates `VUser` and calls `showRegisterForm()` to render the registration form.
   - On POST:
     - Collects form data (`name`, `surname`, `username`, `email`, `password`, `phone`).
     - Validates required fields.
     - Checks for unique username/email via `FPersistentManager::verifyUserUsername` and `verifyUserEmail` (these use Doctrine's Entity Manager to query the `User` entity).
     - Validates phone number (digits only).
     - Creates a new `MUser` entity and sets its properties.
     - If a profile picture is uploaded, creates an `Mphoto` entity, saves it via `FPersistentManager::saveObj`, and associates it with the user.
     - Saves the user entity via `FPersistentManager::saveObj` (which persists the user using the Entity Manager).
     - On success, calls `registrationSuccess()` on the view; on failure, re-renders the form with an error.

#### Login Flow
1. **User Action:** Navigates to the login page (`/User/login`).
2. **Controller (`CUser::login`)**:
   - On GET: Renders the login form.
   - On POST:
     - Collects `username` and `password`.
     - Validates input.
     - Fetches user by username via `FPersistentManager::getUserByUsername`.
     - Verifies password using `password_verify`.
     - If valid, starts a session and stores the user ID in the session.
     - Redirects to the home page.
     - On failure, shows an invalid credentials message.

#### Add House (Property) Flow
1. **User Action:** Navigates to add house page (`/User/addHouse`).
2. **Controller (`CUser::addHouse`)**:
   - Checks if the user is logged in.
   - Renders the house submission form (`houseform.tpl`) via the view.
3. **Form Submission:**
   - On POST to `/User/createHouse`, controller validates input and images.
   - Calls `FPersistentManager::createHouse` to:
     - Create a new `Property` entity.
     - Persist it using the Entity Manager.
     - Handle image uploads as `Photo` entities.
   - On success, redirects to the user's property list.

#### Profile and My Posts
- **Profile:**  
  - `CUser::profile()` fetches the user entity by session ID, passes it to the view, and renders `user-profile.tpl`.
- **My Posts:**  
  - `CUser::myPost()` fetches all posts for the user, passes them to the view, and renders `user_posts.tpl`.

---

### 1.2. CReview – Main Operation Flows

#### Make Review
1. **User Action:** Navigates to review form for a deal or post.
2. **Controller (`CReview::makereview`)**:
   - Loads the entity to be reviewed (user or post) via persistent manager.
   - Passes data to the view and renders the review form.
3. **On Submit:**  
   - `CReview::savereview` validates input, creates a new `Review` entity, and saves it via persistent manager/entity manager.

---

### 1.3. CReport – Main Operation Flows

#### Report Post
1. **User Action:** Clicks to report a post.
2. **Controller (`CReport::showReportForm`)**:
   - Loads the post entity.
   - Passes it to the view to render the report form.
3. **On Submit:**  
   - `CReport::makeReport` validates input, creates a new `Report` entity, and saves it.

---

### 1.4. CofferHosting – Main Operation Flows

#### Create Offer
1. **User Action:** Navigates to offer form for a property/post.
2. **Controller (`CofferHosting::showOfferForm`)**:
   - Loads property/post data.
   - Passes it to the view to render the offer form.
3. **On Submit:**  
   - `CofferHosting::createOffer` validates input, creates an `Offer` entity, and saves it.

---

### 1.5. Cmanagerequest – Main Operation Flows

#### View and Accept/Deny Offers
1. **User Action:** Views offers for a post.
2. **Controller (`Cmanagerequest::viewoffers`)**:
   - Fetches all offers for the post.
   - Passes them to the view for display.
3. **Accept/Deny:**  
   - `Cmanagerequest::accept_Deny_Offer` updates the offer status in the database.

---

### 1.6. CImage – Main Operation Flows

#### Show Image
1. **User Action:** Requests an image (e.g., for a property or profile).
2. **Controller (`CImage::showImage`)**:
   - Fetches the image entity by ID.
   - Outputs the image binary data with the correct MIME type.

---

### 1.7. CFrontController – Main Operation Flows

#### Routing
1. **User Action:** Any request to the application.
2. **Controller (`CFrontController::run`)**:
   - Parses the request URI.
   - Determines the appropriate controller and method.
   - Dispatches the request.

---

### 1.8. Cfindhosting – Main Operation Flows

#### Search and Book Property
1. **User Action:** Uses the search form to find properties.
2. **Controller (`Cfindhosting::searchHost`)**:
   - Processes search parameters.
   - Queries the persistent manager for matching properties.
   - Passes results to the view for display.
3. **Book Property:**  
   - `Cfindhosting::bookPost` displays the booking form.
   - `Cfindhosting::createOffer` creates an offer for the selected post.

---

### 1.9. CAdmin – Main Operation Flows

#### Admin Actions
- **Login/Logout:**  
  - Handles admin authentication and session.
- **Verification Requests:**  
  - Lists, accepts, or rejects user verification requests.
- **Reported Posts:**  
  - Lists reported posts, allows admin to approve or delete.
- **User Profiles:**  
  - Views user profiles for moderation.

---

## 3. Model Classes (`M*`)

Model classes represent the main business entities in the application. They encapsulate the data and business logic for each domain object and are typically mapped to database tables via Doctrine ORM.

### 3.1. Muser
- **Role:** Represents a user in the system.
- **Fields:** id, name, surname, username, email, password, phone, profile picture, etc.
- **Usage:** Instantiated when registering a new user, logging in, or fetching user data.
- **Data Source:** Data is loaded from or persisted to the database via the entity manager.
- **Methods:** Getters/setters for all fields, password hashing, profile picture association, etc.
- **Used by:** Controllers (e.g., `CUser`), persistent manager, and FUser.

### 3.2. Mpost
- **Role:** Represents a post (property listing or request).
- **Fields:** id, title, description, user, images, location, etc.
- **Usage:** Created when a user submits a new property, fetched for display or editing.
- **Data Source:** Database via entity manager.
- **Methods:** Getters/setters, image management, etc.
- **Used by:** Controllers, persistent manager, Fpost.

### 3.3. Mposition
- **Role:** Represents a physical location or address.
- **Fields:** id, address, city, province, country, etc.
- **Usage:** Associated with posts/properties.
- **Data Source:** Database.
- **Methods:** Getters/setters.
- **Used by:** Mpost, persistent manager, Fposition.

### 3.4. Mphoto
- **Role:** Represents an image (property photo, profile picture, document).
- **Fields:** id, binary data, mime type, etc.
- **Usage:** Uploaded by users for properties or profiles.
- **Data Source:** Database (often as BLOB).
- **Methods:** Getters/setters.
- **Used by:** Muser, Mpost, persistent manager, Fphoto.

### 3.5. Moffer
- **Role:** Represents an offer made for a property or post.
- **Fields:** id, user, post, dates, status, etc.
- **Usage:** Created when a user makes an offer, updated when accepted/denied.
- **Data Source:** Database.
- **Methods:** Getters/setters.
- **Used by:** Controllers, persistent manager, Foffer.

### 3.6. Mreview
- **Role:** Represents a review between users or for a post.
- **Fields:** id, reviewer, reviewed, rating, comment, etc.
- **Usage:** Created when a user submits a review.
- **Data Source:** Database.
- **Methods:** Getters/setters.
- **Used by:** Controllers, persistent manager, Freview.

### 3.7. Mreport
- **Role:** Represents a report (complaint) about a post.
- **Fields:** id, post, user, reason, status, etc.
- **Usage:** Created when a user reports a post.
- **Data Source:** Database.
- **Methods:** Getters/setters.
- **Used by:** Controllers, persistent manager, Freport.

### 3.8. Mverification
- **Role:** Represents a user verification request.
- **Fields:** id, user, description, documents, status, etc.
- **Usage:** Created when a user requests verification.
- **Data Source:** Database.
- **Methods:** Getters/setters, document management.
- **Used by:** Controllers, persistent manager, Fverification.

### 3.9. Madmin
- **Role:** Represents an admin or moderator.
- **Fields:** id, name, email, password, etc.
- **Usage:** Used for admin authentication and actions.
- **Data Source:** Database.
- **Methods:** Getters/setters.
- **Used by:** Controllers, persistent manager, Fadmin.

### 3.10. acceptedPet, rating, stateoffer
- **Role:** Represent auxiliary entities (accepted pets for a property, rating values, offer states).
- **Usage:** Used as part of other entities (e.g., a post's accepted pets).
- **Data Source:** Database.
- **Methods:** Getters/setters.

---

## 4. Foundation Classes (`F*`)

Foundation classes act as the data access layer (repositories) and service layer. They encapsulate all database operations, queries, and business logic for each entity.

### 4.1. FPersistentManager
- **Role:** Central service layer for all persistence operations. Singleton.
- **Usage:** Used by controllers to perform CRUD operations, complex queries, and business logic.
- **Data Source:** Delegates to FEntityManager or specific F* classes.
- **Key Methods:**
  - `retriveObj($Mclass, $id)`: Fetches an object by class and ID.
  - `saveObj($obj)`: Persists an object.
  - `deleteObj($obj)`: Deletes an object.
  - `getUserByUsername($username)`: Fetches a user by username.
  - `getVerificationsPending()`, `getReportedPosts()`, etc.: Aggregates data for admin.
  - `getHousesFromUser($userId)`: Gets all properties for a user.
  - `serachPost(...)`: Complex search for posts.
- **How it works:** Calls FEntityManager for generic operations, or delegates to FUser, Fpost, etc. for entity-specific logic.

### 4.2. FEntityManager
- **Role:** Low-level interface to Doctrine's EntityManager.
- **Usage:** Used by FPersistentManager and F* classes for direct database operations.
- **Key Methods:** `retrieveObj`, `saveObject`, `deleteObj`, `getEntityManager`.
- **How it works:** Wraps Doctrine ORM methods for finding, persisting, and removing entities.

### 4.3. FUser, Fpost, Fposition, Fphoto, Foffer, Freview, Freport, Fverification, Fadmin
- **Role:** Repository/service classes for each entity.
- **Usage:** Provide entity-specific queries and business logic.
- **Key Methods:**
  - `FUser::getUserByUsername($username)`: Finds a user by username.
  - `Fpost::listOfPostFilterDate($datein, $dateout)`: Finds posts by date.
  - `Fposition::findByCity($city)`: Finds positions by city.
  - `Freview::returnReviewsTOUser($userId)`: Gets reviews for a user.
  - `Freport::listReportedPost()`: Lists all reported posts.
  - `Fverification::createVerificationRequest(...)`: Creates a verification request.
  - `Fadmin::getModByEmail($email)`: Finds an admin by email.
- **How they work:** Use FEntityManager for basic CRUD, but implement custom queries and logic for their entity.

---

## 5. Data Flow and Usage

- **Controllers** call FPersistentManager for all data operations.
- **FPersistentManager** delegates to FEntityManager for generic CRUD, or to F* classes for entity-specific logic.
- **F* classes** use FEntityManager to interact with the database, and may implement custom queries.
- **M* classes** are instantiated, filled with data, and passed between layers. They represent the application's business objects.

---
