<?php
require_once 'config/config.php';
//Load helper
//require_once    'helpers/url_helper.php';
require_once    'helpers/session_helper.php';
require_once    'helpers/general_helper.php';
require_once    'helpers/upload_image.php';

require_once    'librairies/Core.php';
require_once    'librairies/Controller.php';
require_once    'librairies/Database.php';

// Load PHPMailer 
require 'librairies/PHPMailer/src/PHPMailer.php';
require 'librairies/PHPMailer/src/SMTP.php';
require 'librairies/PHPMailer/src/Exception.php';

