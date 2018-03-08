<?php

namespace Malekbenelouafi\LaravelStatus\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class StatusScope implements Scope
{
    /**
     * All of the extensions to be added to the builder.
     *
     * @var array
     */
    protected $extensions = [ 'WithInactive', 'WithoutInactive', 'OnlyInactive' ];

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where(
            $model->getQualifiedStatusColumn(), 1
        );
    }

    /**
     * Extend the query builder with the needed functions.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    public function extend(Builder $builder)
    {
        foreach ($this->extensions as $extension) {
            $this->{"add{$extension}"}($builder);
        }
    }

    /**
     * Add the with-trashed extension to the builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    protected function addWithInactive(Builder $builder)
    {
        $builder->macro('withInactive', function(Builder $builder, $withInactive = true) {
            if (!$withInactive) {
                return $builder->withoutInactive();
            }

            return $builder->withoutGlobalScope($this);
        });
    }


    /**
     * Add the without-trashed extension to the builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    protected function addWithoutInactive(Builder $builder)
    {
        $builder->macro('withoutInactive', function(Builder $builder) {
            $model = $builder->getModel();
            
            $builder->withoutGlobalScope($this)->where(
                $model->getQualifiedStatusColumn(), 1
            );

            return $builder;
        });
    }

    /**
     * Add the only-trashed extension to the builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    protected function addOnlyInactive(Builder $builder)
    {
        $builder->macro('onlyInactive', function(Builder $builder) {
            $model = $builder->getModel();

            $builder->withoutGlobalScope($this)->where(
                $model->getQualifiedStatusColumn(), 0
            );

            return $builder;
        });
    }

}