<?php


namespace Src\Application\Commands;


class AdminCreateCommand implements CommandInterface
{
    private $name;

    /**
     * AdminCreateCommand constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
