/**
 * Set default post time to 14:00
 */
add_filter('wp_insert_post_data', 'set_default_post_time_14', 10, 2);

function set_default_post_time_14($data, $postarr) {
    // Only modify if this is a new post
    if (empty($postarr['ID'])) {
        // Get the current date
        $current_date = current_time('Y-m-d');
        // Set the time to 14:00:00
        $data['post_date'] = $current_date . ' 14:00:00';
        $data['post_date_gmt'] = get_gmt_from_date($data['post_date']);
    }
    return $data;
}