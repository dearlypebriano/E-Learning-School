<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session;

use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Drak <drak@zikula.org>
 */
class Session implements SessionInterface, \IteratorAggregate, \Countable
{
    protected $storage;

    private $flashName;
    private $attributeName;

    /**
     * @param SessionStorageInterface $storage    A SessionStorageInterface instance
     * @param AttributeBagInterface   $attributes An AttributeBagInterface instance, (defaults null for default AttributeBag)
     * @param FlashBagInterface       $flashes    A FlashBagInterface instance (defaults null for default FlashBag)
     */
    public function __construct(SessionStorageInterface $storage = null, AttributeBagInterface $attributes = null, FlashBagInterface $flashes = null)
    {
        $this->storage = $storage ?: new NativeSessionStorage();

        $attributes = $attributes ?: new AttributeBag();
        $this->attributeName = $attributes->getName();
        $this->registerBag($attributes);

        $flashes = $flashes ?: new FlashBag();
        $this->flashName = $flashes->getName();
        $this->registerBag($flashes);
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]

    public function start()
    {
        return $this->storage->start();
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]

    public function has($name)
    {
        return $this->storage->getBag($this->attributeName)->has($name);
    }

    /**
     * {@inheritdoc}
     */
    public function get($name, $default = null)
    {
        return $this->storage->getBag($this->attributeName)->get($name, $default);
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]

    public function set($name, $value)
    {
        $this->storage->getBag($this->attributeName)->set($name, $value);
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]

    public function all()
    {
        return $this->storage->getBag($this->attributeName)->all();
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]

    public function replace(array $attributes)
    {
        $this->storage->getBag($this->attributeName)->replace($attributes);
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]

    public function remove($name)
    {
        return $this->storage->getBag($this->attributeName)->remove($name);
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]

    public function clear()
    {
        $this->storage->getBag($this->attributeName)->clear();
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]

    public function isStarted()
    {
        return $this->storage->isStarted();
    }

    /**
     * Returns an iterator for attributes.
     *
     * @return \ArrayIterator An \ArrayIterator instance
     */
    
    #[\ReturnTypeWillChange]
    public function getIterator()
    {
        return new \ArrayIterator($this->storage->getBag($this->attributeName)->all());
    }

    /**
     * Returns the number of attributes.
     *
     * @return int The number of attributes
     */
    #[\ReturnTypeWillChange]

    public function count()
    {
        return count($this->storage->getBag($this->attributeName)->all());
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]

    public function invalidate($lifetime = null)
    {
        $this->storage->clear();

        return $this->migrate(true, $lifetime);
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]

    public function migrate($destroy = false, $lifetime = null)
    {
        return $this->storage->regenerate($destroy, $lifetime);
    }

    /**
     * {@inheritdoc}
     */
    public function save()
    {
        $this->storage->save();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->storage->getId();
    }

    /**
     * {@inheritdoc}
     */
    public function setId($id)
    {
        $this->storage->setId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->storage->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->storage->setName($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getMetadataBag()
    {
        return $this->storage->getMetadataBag();
    }

    /**
     * {@inheritdoc}
     */
    public function registerBag(SessionBagInterface $bag)
    {
        $this->storage->registerBag($bag);
    }

    /**
     * {@inheritdoc}
     */
    public function getBag($name)
    {
        return $this->storage->getBag($name);
    }

    /**
     * Gets the flashbag interface.
     *
     * @return FlashBagInterface
     */
    public function getFlashBag()
    {
        return $this->getBag($this->flashName);
    }
}
