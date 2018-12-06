<?php

namespace BSFP\A;

class Session implements AuthenticationInterface
{
  private $session;
  private $provider;

  /**
   * Session constructor.
   * @param $provider
   */
  public function __construct($provider)
  {
    session_start();

    $this->provider = $provider;
    $this->session = $_SESSION;
  }

  /**
   * @inheritdoc
   */
  public function isAuthenticate(): bool
  {
    return $this->session['is_authenticated'] ?? false;
  }

  /**
   * @inheritdoc
   */
  public function tryAuthenticate(): void
  {
    if (!$this->isAuthenticate()) {
      throw new AuthenticationException();
    }
  }

  /**
   * @param string $login
   * @return AuthenticationInterface
   */
  public function setLogin(string $login): AuthenticationInterface
  {
    $this->provider->set('login', $login);

    return $this;
  }

  /**
   * @param string $password
   * @return AuthenticationInterface
   */
  public function setPassword(string $password): AuthenticationInterface
  {
    $this->provider->set('password', $password);

    return $this;
  }

  /**
   * @inheritdoc
   */
  public function authenticate(): void
  {
    if (!$this->provider->has('login') || !$this->provider->has('password')) {
      throw new \BadMethodCallException('You should provide login and password before call authenticate method');
    }

    $this->session['is_authenticated'] = $this->provider->fetch();
  }
}