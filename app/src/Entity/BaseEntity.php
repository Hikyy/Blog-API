<?php

namespace App\Entity;

use App\Traits\Hydrator;

/**
 *
 */
abstract class BaseEntity
{
    use Hydrator;

    private ?object $relationship;

    public function __construct(array $data = [])
    {
       $this->hydrate($data);
    }

    /**
     * @return object|null
     */
    public function getRelationship(): ?object
    {
        return $this->relationship;
    }

    /**
     * @param object|null $relationship
     * @return $this
     */
    public function setRelationship(?object $relationship)
    {
        $this->relationship = $relationship;
        return $this;
    }

}
