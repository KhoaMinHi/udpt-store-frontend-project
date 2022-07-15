<?php
require_once "./../controller/storeController.php";
//require_once "./../controller/loginlogout.php";

//LoginLogoutController::checkSession("Location:loginout.php");

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
            case "update":
                $storeInfo->updateStoreInfo();
                break;
            case "create":
                $storeInfo->createStore();
                break;
            default:
                $storeInfo->getStoreInfo();
                break;
        }
    case 'GET':
        $storeInfo->getStoreInfo();
        break;
    default:
        handle_error($request);
        break;
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