<?php
require_once "./../controller/storeController.php";
require_once "./../controller/authController.php";

if(LoginLogoutController::checkSession() == false){
    echo "<script>alert('Vui lòng đăng nhập!'); window.location.href='auth.php'</script>";
    //header("Location:auth.php");
    return;
}

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
            case "updatelogo":
                $storeInfo->updateStoreLogo();
                break;
            default:
                $storeInfo->getStoreInfo();
                break;
        }
    case 'GET':
        switch ($action) {
            default:
                $storeInfo->getStoreInfo();
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