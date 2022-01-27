<?php
require_once 'config/config.php';
//Load helper
//require_once    'helpers/url_helper.php';
// require_once    'helpers/session_helper.php';
// require_once    'helpers/general_helper.php';
// require_once    'helpers/upload_image.php';

// require_once    'librairies/Core.php';
// require_once    'librairies/Controller.php';
// require_once    'librairies/Database.php';

// // Load PHPMailer 
// require 'librairies/PHPMailer/src/PHPMailer.php';
// require 'librairies/PHPMailer/src/SMTP.php';
// require 'librairies/PHPMailer/src/Exception.php';

spl_autoload_register(AutoLoader::helperLoader);
spl_autoload_register(AutoLoader::librairieLoader);
spl_autoload_register(AutoLoader::mailerLoader);

class AutoLoader {
    public static function helperLoader($className) {

        require 'helpers/' . $className . '.php';
    }

    public static function librairieLoader($className) {

        require 'librairies/' . $className . '.php';
    }

    public static function mailerLoader($sclassName) {

        require 'librairies/PHPMailer/src/' . $className . '.php';
    }
}

