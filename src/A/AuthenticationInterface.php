<?php

namespace BSFP\A;

interface AuthenticationInterface
{
  /**
   * @return bool
   */
  public function isAuthenticate(): bool;

  /**
   * @return void
   * @throws AuthenticationException
   */
  public function tryAuthenticate(): void;

  /**
   * @return void
   * @throws \BadMethodCallException
   */
  public function authenticate(): void;
}