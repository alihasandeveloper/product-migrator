<?php

class Product_Migrator_REST_API
{

    public function __construct()
    {
        add_action('rest_api_init', array($this, 'register_routes'));
    }

    public static function run()
    {
        return new self();
    }
    public function register_routes()
    {
        register_rest_route('product-migrator/v1', '/create', array(
            'methods' => 'POST',
            'callback' => array($this, 'create_product'),
            'permission_callback' => function () {
                // return current_user_can('manage_options');
                return true;
            },
        ));
        register_rest_route('product-migrator/v1', '/update', array(
            'methods' => 'POST',
            'callback' => array($this, 'update_product'),
            'permission_callback' => function () {
                // return current_user_can('manage_options');
                return true;
            },
        ));
        register_rest_route('product-migrator/v1', '/delete', array(
            'methods' => 'POST',
            'callback' => array($this, 'delete_product'),
            'permission_callback' => function () {
                // return current_user_can('manage_options');
                return true;
            },
        ));
    }

    public function create_product(WP_REST_Request $request)
    {
        return rest_ensure_response('Product created successfully');
    }
    public function update_product(WP_REST_Request $request)
    {
        return rest_ensure_response('Product updated successfully');
    }
    public function delete_product(WP_REST_Request $request)
    {
        return rest_ensure_response('Product deleted successfully');
    }
}
