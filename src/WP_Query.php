<?php
namespace Jankx\Specs;

class WP_Query
{
    const DEFAULT_ORDER_BY = 'date';
    const DEFAULT_ORDER = 'DESC';

    public static function order_by($key_only = false, $show_all = false)
    {
        $common_orderby = array(
            'none'          => __('None'),
            'ID'            => __('ID'),
            'author'        => __('Author'),
            'title'         => __('Title'),
            'name'          => __('Name'),
            'type'          => __('Type'),
            'date'          => __('Date'),
            'modified'      => __('Modified'),
            'parent'        => __('Parent'),
            'rand'          => __('Rand'),
            'comment_count' => __('Comments'),
            'relevance'     => __('relevance'),
        );
        // This hook use incase other plugin theme has custom order by
        $orderby = apply_filters(
            'jankx_wordpress_specs_wp_query_order_by',
            $common_orderby
        );

        if ($show_all) {
            $orderby = array_merge($orderby, array(
                'menu_order'      => __('Menu order'),
                'meta_value'      => __('Meta value'),
                'meta_value_num'  => __('Meta value num'),
                'post__in'        => __('Post in'),
                'post_name__in'   => __('Post name in'),
                'post_parent__in' => __('Post parent in'),
            ));
        }

        if ($key_only) {
            return array_keys($orderby);
        }
        return $orderby;
    }

    public static function order($key_only = false)
    {
        $orders = array(
            'ASC' => __('ASC'),
            'DESC' => __('DESC'),
        );
        return $key_only ? array_keys($orders) : $orders;
    }
}
