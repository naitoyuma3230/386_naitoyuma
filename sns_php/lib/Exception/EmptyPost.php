<?php
namespace MyApp\Exception;

class EmptyPost extends \Exception{
  protected $message = 'please enter email\password';
}
