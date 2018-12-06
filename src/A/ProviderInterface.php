<?php

namespace BSFP\A;

interface ProviderInterface
{
  public function has(string $key): bool;

  public function set(string $key, $value): void;

  public function authenticate();
}
