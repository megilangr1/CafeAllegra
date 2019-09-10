<?php
class CekCart extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $cart = $this->cart->contents();

    print_r($cart);
  }

  public function index()
  {
    $cart = $this->cart->contents();

    print_r($cart);
  }
}
