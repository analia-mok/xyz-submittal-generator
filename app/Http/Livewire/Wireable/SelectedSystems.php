<?php

namespace App\Http\Livewire\Wireable;

use App\Models\System;
use Livewire\Wireable;

class SelectedSystems implements Wireable
{
    protected $systems = [];

    public function __construct(array $systems = [])
    {
        $this->systems = $systems;
    }

    public function toLivewire()
    {
        return $this->systems;
    }

    public static function fromLivewire($value)
    {
        return new static($value);
    }

    public function isEmpty(): bool
    {
        return empty($this->systems);
    }

    public function addSystem(System $system)
    {
        $this->systems[$system->id] = $system->name;
    }

    public function hasSystem(int $systemId)
    {
        return array_key_exists($systemId, $this->systems);
    }

    public function removeSystem(int $systemId)
    {
        if ($this->hasSystem($systemId)) {
            unset($this->systems[$systemId]);
        }
    }

    public function all(): array
    {
        return $this->systems;
    }
}
