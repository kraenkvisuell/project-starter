<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource as NovaResource;

abstract class Resource extends NovaResource
{
    public static $redirectToIndexAfterEdit = true;

    protected static function applyOrderings($query, array $orderings)
    {
        if (empty($orderings) && property_exists(static::class, 'orderBy')) {
            $orderings = static::$orderBy;
        }
        
        return parent::applyOrderings($query, $orderings);
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query;
    }

    public static function scoutQuery(NovaRequest $request, $query)
    {
        return $query;
    }

    public static function detailQuery(NovaRequest $request, $query)
    {
        return parent::detailQuery($request, $query);
    }

    public static function relatableQuery(NovaRequest $request, $query)
    {
        return parent::relatableQuery($request, $query);
    }

    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        if (static::$redirectToIndexAfterEdit) {
            return '/resources/'.static::uriKey();
        }
        
        return parent::redirectAfterCreate($request, $resource);
    }

    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        if (static::$redirectToIndexAfterEdit) {
            return '/resources/'.static::uriKey();
        }

        return parent::redirectAfterUpdate($request, $resource);
    }
}
