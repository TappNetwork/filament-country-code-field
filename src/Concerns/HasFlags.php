<?php

namespace Tapp\FilamentCountryCodeField\Concerns;

use Closure;

trait HasFlags
{
    protected bool|Closure $flags = true;

    public function flags(bool|Closure $flags): static
    {
        $this->flags = $flags;

        return $this;
    }

    public function getFlags(): bool
    {
        return $this->evaluate($this->flags);
    }
}
