<?php

namespace Controllers;

use Libraries\Database;

// get file .env
require_once str_replace('\app\Controllers', '', __DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(str_replace('\app\Controllers', '', __DIR__));
$dotenv->load();

class ControllerHome
{
    public function __construct()
    {
        $db             = new Database();
        $this->mysql    = $db->connect($_ENV['DB_HOST_1'], $_ENV['DB_NAME_1'], $_ENV['DB_USER_1'], $_ENV['DB_PASS_1']);

        $this->baseUrl  = $_ENV['BASE_URL'];
        $this->apiUrl   = $_ENV['API_URL'];
        $this->url      = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $this->page     = ltrim(substr($this->url, strlen($this->baseUrl)), "?");
    }

    public function index()
    {
        // get data from json file
        $json_file = str_replace('\app\Controllers', '', __DIR__) . '\/assets\/json\/data.json';
        if (!file_exists($json_file)) {
            die('file not found');
        }
        $json_content = file_get_contents($json_file);
        $response = json_decode($json_content, true);
        $response['profile']['base_url'] = $this->baseUrl;
        $response['profile']['api_url'] = $this->apiUrl;

        require_once('app/Views/index.php');
    }

    public function nulls()
    {
        require_once('app/Views/404.php');
    }

    public function _102()
    {
        // get data from json file
        $json_file = str_replace('\app\Controllers', '', __DIR__) . '\/assets\/json\/data.json';
        if (!file_exists($json_file)) {
            die('file not found');
        }
        $json_content = file_get_contents($json_file);
        $response = json_decode($json_content, true);
        $response['profile']['base_url'] = $this->baseUrl;
        $response['profile']['page'] = '102';

        require_once('app/Views/102.php');
    }
}
