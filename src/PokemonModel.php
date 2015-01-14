<?php

namespace BenjaminGuillemant\PokemonBattle;

/**
 * Class PokemonModel
 * @package BenjaminGuillemant\PokemonBattle\Model
 * @Entity
 * @Table(name="pokemon")
 */
class PokemonModel implements Model\PokemonInterface
{
    /**
     * @var int
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    private $Id;

    /**
     * @var string
     * @Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @var int
     * * @Column(name="hp", type="integer")
     */
    private $hp;

    /**
     * @var int
     * @Column(name="type", type="smallint")
     */
    private $type;

    const TYPE_FIRE     = 0;
    const TYPE_WATER    = 1;
    const TYPE_PLANT    = 2;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setName($name)
    {
        if (is_string($name))
            $this->name = $name;
        else
            throw new \Exception('Name => string');

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getHP()
    {
        return $this->hp;
    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setHP($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp = $hp;
        else
            throw new \Exception('HP => int && > 0');

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function addHP($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp += $hp;
        else
            throw new \Exception('HP => int && > 0');

        return $this->hp;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function removeHP($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp = ($this->hp <= $hp) ? 0 : $this->hp - $hp;
        else
            throw new \Exception('HP => int && > 0');

        return $this->hp;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setType($type)
    {
        if (true === in_array($type, [
            self::TYPE_FIRE,
            self::TYPE_WATER,
            self::TYPE_PLANT,
        ]))
            $this->type = $type;
        else
            throw new \Exception('Type => Bad');

        return $this;
    }
}