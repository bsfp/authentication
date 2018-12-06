<?php
namespace BSFP;


class Authentication
{
  private $config;

  public function __construct(iterable $config)
  {
    $this->config = $config;
  }

  public function bySession(): A\AuthenticationInterface
  {
    return new A\Session($this->config->provider);
  }

  public function byToken(): A\AuthenticationInterface
  {
    return new A\Token($this->config->provider);
  }
}