<?php

namespace Filament\Panel\Concerns;

use Closure;

trait HasSpaMode
{
    protected bool | Closure $hasSpaMode = false;

    protected bool | Closure $hasSpaPrefetch = false;

    /**
     * @var array<string> | Closure
     */
    protected array | Closure $spaModeUrlExceptions = [];

    public function spa(bool | Closure $condition = true, bool | Closure $prefetch = false): static
    {
        $this->hasSpaMode = $condition;
        $this->hasSpaPrefetch = $prefetch;

        return $this;
    }

    /**
     * @param  array<string>| Closure  $exceptions
     */
    public function spaUrlExceptions(array | Closure $exceptions): static
    {
        $this->spaModeUrlExceptions = $exceptions;

        return $this;
    }

    public function hasSpaMode(): bool
    {
        return (bool) $this->evaluate($this->hasSpaMode);
    }

    public function hasSpaPrefetch(): bool
    {
        return (bool) $this->evaluate($this->hasSpaPrefetch);
    }

    /**
     * @return array<string>
     */
    public function getSpaUrlExceptions(): array
    {
        return $this->evaluate($this->spaModeUrlExceptions);
    }
}
