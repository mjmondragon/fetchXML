<?php

namespace App\Entity;

/**
 * @author Mauricio J Mondragon R <mauro102189@gmail.com>
 */
class Model {
    /**
     * The cache of studly-cased words.
     *
     * @var array
     */
    protected static $studlyCache = [];

    public function __construct($attributes = array())
    {
        $this->fill($attributes);
    }

    public function fill($attributes){
        foreach ($attributes as $key => $value) {
            if($this->hasSetMutator($key)){
                $this->setMutatedAttributeValue($key, $value);
            }
        }
    }

    /**
     * Determine if a set mutator exists for an attribute.
     *
     * @param  string  $key
     * @return bool
     */
    public function hasSetMutator($key)
    {
        return method_exists($this, 'set'.self::studly($key).'Attribute');
    }

    /**
     * Set the value of an attribute using its mutator.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function setMutatedAttributeValue($key, $value)
    {
        return $this->{'set'.self::studly($key).'Attribute'}($value);
    }
    /**
     * Convert a value to studly caps case.
     *
     * @param  string  $value
     * @return string
     */
    public static function studly($value)
    {
        $key = $value;

        if (isset(static::$studlyCache[$key])) {
            return static::$studlyCache[$key];
        }

        $value = ucwords(str_replace(['-', '_'], ' ', $value));

        return static::$studlyCache[$key] = str_replace(' ', '', $value);
    }
}