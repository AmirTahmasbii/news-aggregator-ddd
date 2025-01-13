<?php
namespace Domain\User\Exceptions;

class InvalidCredentialsException extends \Exception
{
    protected $message = 'Invalid credentials';
}