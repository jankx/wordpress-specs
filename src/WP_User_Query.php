<?php
namespace Jankx\Specs;

class WP_User_Query
{
    public static function userRoleParameterer()
    {
        return array(
            'role' => __('User Role', 'jankx-wordpress-specs'),
            'role__in' => __('An array of role names', 'jankx-wordpress-specs'),
            'role__not_in' => __('An array of role names to exclude', 'jankx-wordpress-specs'),
        );
    }

    public static function includeAndExcludeParameters()
    {
        return array(
            'include' => __('List of users to be included', 'jankx-wordpress-specs'),
            'exclude' => __('List of users to be excluded', 'jankx-wordpress-specs')
        );
    }

    public static function blogParameter()
    {
        return array(
            'blog_id' => __('The blog id on a multisite environment', 'jankx-wordpress-specs'),
        );
    }

    public static function searchParameters()
    {
        return array(
            'search' => __('Searches for possible string matches on columns'),
            'search_columns' => __('Search Columns', 'jankx-wordpress-specs')
        );
    }

    public static function paginationParameters()
    {
        return array(
            'number' => __('The maximum returned number of results', 'jankx-wordpress-specs'),
            'offset' => __('Offset the returned results', 'jankx-wordpress-specs'),
            'paged' => __('When used with number, defines the page of results to return')
        );
    }

    public static function orderAndOrderbyParameters()
    {
        return array(
            'orderby' => __('Order by'),
            'order' => __('Order'),
        );
    }

    public static function dateParameters()
    {
        return array(
            'date_query' => __('Date Query', 'jankx-wordpress-specs'),
        );
    }

    public static function customFieldParameters()
    {
        return array(
            'meta_key' => __('Custom field key', 'jankx-wordpress-specs'),
            'meta_value' => __('Custom field value', 'jankx-wordpress-specs'),
            'meta_compare' => __('Operator to test the ‘meta_value‘'),
            'meta_query' => __('Custom field parameters', 'jankx-wordpress-specs')
        );
    }

    public static function whoParameter()
    {
        return array(
            'who' => __('Which users to query', 'jankx-wordpress-specs'),
        );
    }

    public static function totalCountParameter()
    {
        return array(
            'count_total' => __('Total number of users found', 'jankx-wordpress-specs')
        );
    }

    public static function hasPublishedPostsParameter()
    {
        return array(
            'has_published_posts' => __('who have published posts in those post types', 'jankx-wordpress-specs')
        );
    }

    public static function returnFieldsParameter()
    {
        return array(
            'fields' => __('Which fields to return', 'jankx-wordpress-specs')
        );
    }

    public static function getAllParameters($keyOnly = false)
    {
        $allParameters = array_merge(
            static::userRoleParameterer(),
            static::includeAndExcludeParameters(),
            static::blogParameter(),
            static::searchParameters(),
            static::paginationParameters(),
            static::orderAndOrderbyParameters(),
            static::dateParameters(),
            static::customFieldParameters(),
            static::whoParameter(),
            static::totalCountParameter(),
            static::hasPublishedPostsParameter(),
            static::returnFieldsParameter()
        );

        if ($keyOnly) {
            return array_keys($allParameters);
        }
        return $allParameters;
    }

    public function orderby($keyOnly = false, $showAlias = false)
    {
        $commonOrderBy = array(
            'ID' => __('Order by user id', 'jankx-wordpress-specs'),
            'display_name' => __('Order by user display name', 'jankx-wordpress-specs'),
            'name' => __('Order by user name', 'jankx-wordpress-specs'),
            'include' => __('Order by the included list of user_ids(requires the include parameter)(since Version 4.1)', 'jankx-wordpress-specs'),
            'login' => __('Order by user name', 'jankx-wordpress-specs', 'jankx-wordpress-specs'),
            'nicename' => __('Order by user nicename', 'jankx-wordpress-specs'),
            'email' => __('Order by user email', 'jankx-wordpress-specs'),
            'url' => __('Order by user url', 'jankx-wordpress-specs'),
            'registered' => __('Order by user registered date', 'jankx-wordpress-specs'),
            'post_count' => __('Order by user post count', 'jankx-wordpress-specs'),
        );

        if ($showAlias) {
            $commonOrderBy = array_merge($commonOrderBy, array(
                'user_name' => __('Order by user name', 'jankx-wordpress-specs'),
                'user_login' => __('Order by user login.', 'jankx-wordpress-specs'),
                'user_email' => __('Order by user email.', 'jankx-wordpress-specs'),
                'user_nicename' => __('Order by user nicename.', 'jankx-wordpress-specs'),
                'user_url' => __('Order by user url', 'jankx-wordpress-specs'),
                'user_registered' => __('Order by user registered date.', 'jankx-wordpress-specs'),
            ));
        }
        $orderBy = apply_filters(
            'jankx_wordpress_specs_wp_user_query_order_by',
            $commonOrderBy
        );

        if ($keyOnly) {
            return array_keys($orderBy);
        }
        return $orderBy;
    }
}
