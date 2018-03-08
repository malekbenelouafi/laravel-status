<?php
namespace Malekbenelouafi\LaravelStatus;
use Malekbenelouafi\LaravelStatus\Scopes\StatusScope;

trait HasStatus
{

    /**
     * Boot the Active Events trait for a model.
     *
     * @return void
     */
    public static function bootHasStatus()
    {
        static::addGlobalScope(new StatusScope);
    }


    /**
     * Get the name of the "deleted at" column.
     *
     * @return string
     */
    public function getStatusColumn()
    {
        return defined('static::STATUS') ? static::STATUS : 'status';
    }

    /**
     * Get the fully qualified "deleted at" column.
     *
     * @return string
     */
    public function getQualifiedStatusColumn()
    {
        return $this->qualifyColumn($this->getStatusColumn());
    }

}
