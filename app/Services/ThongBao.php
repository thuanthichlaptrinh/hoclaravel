<?php
namespace App\Services;

class ThongBao {
    private $so;

    public function __construct() {
        $this->so = rand(1, 1000);
    }

    public function index() {
        return $this->so;
    }
}
