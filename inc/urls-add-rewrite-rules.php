<?php 
function custom_rewrite_rule() {
//    add_rewrite_rule('^ads/?([^/]*)/?','index.php?page_id=12&addslug=$matches[1]','top');
    add_rewrite_rule('^annunci-immobiliari/?([^/]*)/?','index.php?page_id=12&addslug=$matches[1]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);

add_filter( 'query_vars', function( $query_vars ) {
    $query_vars[] = 'addslug';
    return $query_vars;
} );

?>