<?php
require_once "./../controller/authController.php";
require_once "./../controller/storeController.php";

$storeInfo = new StoreController();

$action = "";
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'PUT':
        //$storeInfo->updateStoreInfo();
        break;
    case 'POST':
        switch ($action) {
            case "login":
                LoginLogoutController::login();
                break;
            case "register":
                $storeInfo->registerStore();
                break;
            default:
                break;
        }
    case 'GET':
        switch ($action) {
            case "logout":
                LoginLogoutController::logout();
                break;
            case "register":
                $storeInfo->registerStoreHtml();
                break;
            default:
                LoginLogoutController::getLoginHtml();
                break;
        }
}

// switch ($action) {
//     case "update":
//         //$storeInfo->updateStoreInfo();
//         break;
//     default:
//         $storeInfo->getStoreInfo();
//         break;
// }
?>