<?php

namespace Viloveul\Router;

/**
 * @email fajrulaz@gmail.com
 * @author Fajrul Akbar Zuhdi
 */

use Iterator;

class RouteCollection implements Iterator
{
    /**
     * @var array
     */
    protected $collections = [];

    /**
     * @param $pattern
     * @param $handler
     */
    public function add($pattern, $handler): RouteCollection
    {
        $this->collections[$pattern] = $handler;
        return $this;
    }

    public function current()
    {
        return current($this->collections);
    }

    /**
     * @param  $pattern
     * @return mixed
     */
    public function fetch($pattern)
    {
        return $this->has($pattern) ? $this->collections[$pattern] : null;
    }

    /**
     * @param $pattern
     */
    public function has($pattern): bool
    {
        return array_key_exists($pattern, $this->collections);
    }

    public function key()
    {
        return key($this->collections);
    }

    public function next()
    {
        next($this->collections);
    }

    public function rewind()
    {
        reset($this->collections);
    }

    public function valid(): bool
    {
        return null !== $this->key();
    }
}
