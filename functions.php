<?php

add_action('wp_enqueue_scripts', 'myrehat_test_assets');
function myrehat_test_assets()
{
    wp_enqueue_style('myrehat-test-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script(
        'myrehat-test-trails',
        get_stylesheet_directory_uri() . '/trails.js',
        array(),
        '1.0.0',
        true
    );
}

function myrehat_test_booking_title()
{
    return __('Book a guided hike', 'myrehat-test');
}

add_action('template_redirect', 'myrehat_test_booking_handler');
function myrehat_test_booking_handler()
{
    if (!isset($_POST['trails_booking'])) {
        return;
    }

    $nonce = isset($_POST['trails_nonce']) ? sanitize_text_field(wp_unslash($_POST['trails_nonce'])) : '';
    if (!wp_verify_nonce($nonce, 'trails_booking_action')) {
        wp_send_json_error(array('message' => __('Security check failed. Please reload the page.', 'myrehat-test')), 403);
    }

    $name = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $date = isset($_POST['date']) ? sanitize_text_field(wp_unslash($_POST['date'])) : '';
    $nomad = isset($_POST['digital_nomad']) ? sanitize_key(wp_unslash($_POST['digital_nomad'])) : '';
    $plan = isset($_POST['plan']) ? sanitize_key(wp_unslash($_POST['plan'])) : '';
    $terms = isset($_POST['host_terms']);

    $parsed = DateTime::createFromFormat('Y-m-d', $date);
    $valid_date = $parsed && $parsed->format('Y-m-d') === $date;

    if ('' === $name || !$valid_date || !in_array($nomad, array('yes', 'no'), true) || !in_array($plan, array('daily', 'monthly'), true) || !$terms) {
        wp_send_json_error(array('message' => __('Please complete all required fields.', 'myrehat-test')), 400);
    }

    $total = ('monthly' === $plan) ? (int) round(350 * 30 * 80 / 100) : 350;

    set_transient(
        'trails_last_booking',
        array(
            'name' => $name,
            'date' => $date,
            'nomad' => $nomad,
            'plan' => $plan,
            'total' => $total,
        ),
        HOUR_IN_SECONDS
    );

    wp_send_json_success(array('name' => $name));
}

add_action('myrehat_trail_viewed', 'myrehat_test_count_view', 10, 2);
function myrehat_test_count_view($trail_id, $count = 1)
{
    $trail_id = absint($trail_id);
    $count = absint($count);
    $key = 'trail_views_' . $trail_id;
    $total = (int) get_option($key, 0);
    update_option($key, $total + $count);
}