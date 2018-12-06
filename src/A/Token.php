<?php

namespace BSFP\A;

class Token
{
  private $session;
  private $provider;

  public function __construct($provider)
  {
    session_start();

    $this->provider = $provider;
    $this->session = $_SESSION;
  }

  public function isAuthenticate(): bool
  {
    return $this->session['is_authenticated'] ?? false;
  }

  public function authenticate(string $login, string $password): void
  {
    $this->provider->set('login', $login);
    $this->provider->set('password', $password);

    $this->session['is_authenticated'] = $this->provider->thatsCorrect();
  }
}