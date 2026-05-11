<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class HC_Module_Inventory {

    const OPTION_KEY = 'hc_module_catalog';
    const CACHE_GROUP = 'hc_module_inventory';
    const INDEX_TRANSIENT = 'hc_module_inventory_index_v2';
    const CATEGORY_TRANSIENT = 'hc_module_inventory_categories_v2';
    const USAGE_TRANSIENT = 'hc_module_inventory_usage_v2';
    const CACHE_VERSION_OPTION = 'hc_module_inventory_cache_version';
    private static $module_index_cache = null;
    private static $module_usage_cache = null;
    private static $post_usage_index_cache = null;
    private static $category_choices_cache = null;

    public static function get_publisher_name() {
        return 'Alper ATEŞ';
    }

    public static function invalidate_caches() {
        self::$module_index_cache     = null;
        self::$module_usage_cache     = null;
        self::$post_usage_index_cache = null;
        self::$category_choices_cache = null;

        wp_cache_delete( self::INDEX_TRANSIENT, self::CACHE_GROUP );
        wp_cache_delete( self::CATEGORY_TRANSIENT, self::CACHE_GROUP );
        wp_cache_delete( self::USAGE_TRANSIENT, self::CACHE_GROUP );

        delete_transient( self::INDEX_TRANSIENT );
        delete_transient( self::CATEGORY_TRANSIENT );
        delete_transient( self::USAGE_TRANSIENT );
    }

    private static function get_cached_value( $cache_key ) {
        $cached = wp_cache_get( $cache_key, self::CACHE_GROUP );

        if ( false !== $cached ) {
            return $cached;
        }

        $cached = get_transient( $cache_key );

        if ( false !== $cached ) {
            wp_cache_set( $cache_key, $cached, self::CACHE_GROUP, MINUTE_IN_SECONDS * 10 );
            return $cached;
        }

        return null;
    }

    private static function set_cached_value( $cache_key, $value, $ttl = null ) {
        $ttl = null === $ttl ? MINUTE_IN_SECONDS * 10 : (int) $ttl;

        wp_cache_set( $cache_key, $value, self::CACHE_GROUP, $ttl );
        set_transient( $cache_key, $value, $ttl );
    }

    public static function get_catalog_settings() {
        $defaults = [
            'categories'        => [],
            'module_categories' => [],
        ];

        $settings = get_option( self::OPTION_KEY, [] );

        if ( ! is_array( $settings ) ) {
            $settings = [];
        }

        return wp_parse_args( $settings, $defaults );
    }

    public static function save_catalog_settings( $request ) {
        $settings          = self::get_catalog_settings();
        $categories_input  = sanitize_textarea_field( wp_unslash( $request['hc_categories'] ?? '' ) );
        $module_categories = isset( $request['hc_module_category'] ) ? (array) wp_unslash( $request['hc_module_category'] ) : [];
        $all_modules       = self::get_modules();
        $allowed_slugs     = wp_list_pluck( $all_modules, 'slug' );

        $categories = preg_split( '/[\r\n,]+/', $categories_input );
        $categories = array_filter( array_map( [ __CLASS__, 'sanitize_category' ], $categories ) );
        $categories = array_values( array_unique( $categories ) );

        $saved_assignments = isset( $settings['module_categories'] ) && is_array( $settings['module_categories'] )
            ? $settings['module_categories']
            : [];

        foreach ( $saved_assignments as $slug => $category ) {
            if ( ! in_array( $slug, $allowed_slugs, true ) ) {
                unset( $saved_assignments[ $slug ] );
                continue;
            }

            $saved_assignments[ $slug ] = self::sanitize_category( $category );
        }

        foreach ( $module_categories as $slug => $category ) {
            $slug     = sanitize_key( $slug );
            $category = self::sanitize_category( $category );

            if ( ! in_array( $slug, $allowed_slugs, true ) ) {
                continue;
            }

            if ( ! $category ) {
                unset( $saved_assignments[ $slug ] );
                continue;
            }

            if ( ! in_array( $category, $categories, true ) ) {
                $categories[] = $category;
            }

            $saved_assignments[ $slug ] = $category;
        }

        sort( $categories, SORT_NATURAL | SORT_FLAG_CASE );

        $settings['categories']        = $categories;
        $settings['module_categories'] = $saved_assignments;

        update_option( self::OPTION_KEY, $settings, false );
        self::invalidate_caches();
    }

    public static function get_modules( $args = [] ) {
        $args = wp_parse_args(
            $args,
            [
                'search'   => '',
                'category' => '',
                'post_status' => '',
            ]
        );

        $modules = [];

        foreach ( self::get_module_index() as $module ) {
            if ( self::matches_filters( $module, $args ) ) {
                $modules[] = $module;
            }
        }

        usort(
            $modules,
            static function ( $a, $b ) {
                return $b['created'] <=> $a['created'];
            }
        );

        return $modules;
    }

    public static function get_all_categories() {
        $settings   = self::get_catalog_settings();
        $categories = array_merge( $settings['categories'], self::get_wordpress_category_paths() );

        foreach ( self::get_modules() as $module ) {
            if ( ! empty( $module['category'] ) ) {
                $categories[] = $module['category'];
            }
        }

        $categories = array_filter( array_map( [ __CLASS__, 'sanitize_category' ], $categories ) );
        $categories = array_values( array_unique( $categories ) );

        sort( $categories, SORT_NATURAL | SORT_FLAG_CASE );

        return $categories;
    }

    public static function get_category_text() {
        return implode( "\n", self::get_all_categories() );
    }

    private static function get_module_index() {
        $cache_version = (string) get_option( self::CACHE_VERSION_OPTION, '' );

        if ( $cache_version !== HC_VERSION ) {
            self::invalidate_caches();
            update_option( self::CACHE_VERSION_OPTION, HC_VERSION, false );
        }

        if ( null !== self::$module_index_cache ) {
            return self::$module_index_cache;
        }

        $cached = self::get_cached_value( self::INDEX_TRANSIENT );

        if ( is_array( $cached ) ) {
            self::$module_index_cache = $cached;
            return self::$module_index_cache;
        }

        $modules          = [];
        $modules_dir      = HC_PLUGIN_DIR . 'modules/';
        $usage_cache      = self::get_shortcode_usage_cache();
        $post_usage_index = self::get_post_usage_index();
        $seen_slugs       = [];
        $seen_renders     = [];

        if ( is_dir( $modules_dir ) ) {
            foreach ( glob( $modules_dir . '*', GLOB_ONLYDIR ) as $path ) {
                if ( self::should_skip_module_directory( $path ) ) {
                    continue;
                }

                $slug       = basename( $path );
                $slug_key   = self::normalize_module_directory_key( $slug );
                $render_name = self::extract_module_render_function_name( $path . '/calculator.php' );

                if ( isset( $seen_slugs[ $slug_key ] ) ) {
                    continue;
                }

                if ( $render_name && isset( $seen_renders[ $render_name ] ) ) {
                    continue;
                }

                $meta_file         = $path . '/meta.json';
                $meta              = file_exists( $meta_file ) ? json_decode( file_get_contents( $meta_file ), true ) : [];
                $shortcode         = self::normalize_shortcode_tag( '[hc_' . str_replace( '-', '_', $slug ) . ']' );
                $usage_snapshot    = self::get_usage_snapshot_for_shortcodes( [ $shortcode ], $usage_cache );
                $same_slug_posts   = $post_usage_index['posts_by_slug'][ sanitize_title( $slug ) ] ?? [];
                $mismatch_data     = self::detect_shortcode_mismatch( $slug, $shortcode, $same_slug_posts, $post_usage_index );
                $created           = file_exists( $meta_file ) ? filemtime( $meta_file ) : filemtime( $path );
                $category_data = self::resolve_module_category_data(
                    $slug,
                    $shortcode,
                    $meta['name'] ?? '',
                    $usage_snapshot
                );
                $suggested_category = self::resolve_suggested_category_from_post( $category_data, $same_slug_posts, $post_usage_index );

                $seen_slugs[ $slug_key ] = $slug;
                if ( $render_name ) {
                    $seen_renders[ $render_name ] = $slug;
                }

                $modules[] = [
                    'slug'              => $slug,
                    'name'              => $meta['name'] ?? $slug,
                    'shortcode'         => $shortcode,
                    'desc'              => $meta['desc'] ?? '',
                    'created'           => $created,
                    'updated'           => $created,
                    'created_date'      => wp_date( 'd M Y', $created ),
                    'created_datetime'  => wp_date( 'd M Y H:i', $created ),
                    'updated_date'      => wp_date( 'd M Y', $created ),
                    'updated_datetime'  => wp_date( 'd M Y H:i', $created ),
                    'post_count'        => (int) ( $usage_snapshot['published_count'] ?? 0 ),
                    'draft_count'       => (int) ( $usage_snapshot['draft_count'] ?? 0 ),
                    'published_count'   => (int) ( $usage_snapshot['published_count'] ?? 0 ),
                    'category'          => $category_data['label'] ?? '',
                    'category_parent'   => $category_data['parent'] ?? '',
                    'category_child'    => $category_data['child'] ?? '',
                    'category_source'   => $category_data['source'] ?? '',
                    'category_term_ids' => $category_data['term_ids'] ?? [],
                    'expected_shortcode'         => $shortcode,
                    'matched_post_id'            => (int) ( $mismatch_data['matched_post_id'] ?? 0 ),
                    'matched_post_status'        => $mismatch_data['matched_post_status'] ?? '',
                    'matched_post_title'         => $mismatch_data['matched_post_title'] ?? '',
                    'matched_post_url'           => $mismatch_data['matched_post_url'] ?? '',
                    'matched_post_categories'    => $mismatch_data['matched_post_categories'] ?? [],
                    'matched_post_category_label'=> $mismatch_data['matched_post_category_label'] ?? '',
                    'found_shortcodes'           => $mismatch_data['found_shortcodes'] ?? [],
                    'has_same_slug_post'         => ! empty( $mismatch_data['has_same_slug_post'] ),
                    'shortcode_mismatch'         => ! empty( $mismatch_data['shortcode_mismatch'] ),
                    'same_slug_post_count'       => (int) ( $mismatch_data['same_slug_post_count'] ?? 0 ),
                    'shortcode_mismatch_count'   => (int) ( $mismatch_data['shortcode_mismatch_count'] ?? 0 ),
                    'suggested_category_parent'  => $suggested_category['parent'] ?? '',
                    'suggested_category_child'   => $suggested_category['child'] ?? '',
                    'suggested_category_label'   => $suggested_category['label'] ?? '',
                    'suggested_category_source'  => $suggested_category['source'] ?? 'none',
                    'publisher'         => self::get_publisher_name(),
                    'status_label'      => 'Aktif',
                    'ai_enabled'        => true,
                    'posts_url'         => admin_url( 'edit.php?s=' . urlencode( $shortcode ) . '&post_type=post' ),
                ];
            }
        }

        usort(
            $modules,
            static function ( $a, $b ) {
                return $b['created'] <=> $a['created'];
            }
        );

        self::$module_index_cache = $modules;
        self::set_cached_value( self::INDEX_TRANSIENT, self::$module_index_cache );

        return self::$module_index_cache;
    }

    public static function get_wordpress_category_paths() {
        return wp_list_pluck( self::get_wordpress_category_choices(), 'path' );
    }

    public static function get_wordpress_category_choices() {
        if ( null !== self::$category_choices_cache ) {
            return self::$category_choices_cache;
        }

        $cached = self::get_cached_value( self::CATEGORY_TRANSIENT );

        if ( is_array( $cached ) ) {
            self::$category_choices_cache = $cached;
            return self::$category_choices_cache;
        }

        $terms = get_terms(
            [
                'taxonomy'   => 'category',
                'hide_empty' => false,
            ]
        );

        if ( is_wp_error( $terms ) || empty( $terms ) ) {
            return [];
        }

        $term_map = [];
        foreach ( $terms as $term ) {
            $term_map[ $term->term_id ] = $term;
        }

        $choices = [];
        foreach ( $terms as $term ) {
            $lineage = self::get_term_lineage( $term->term_id, $term_map );
            $names   = wp_list_pluck( $lineage, 'name' );
            $depth   = max( 0, count( $names ) - 1 );

            $choices[] = [
                'term_id'   => (int) $term->term_id,
                'parent_id' => (int) $term->parent,
                'name'      => $term->name,
                'depth'     => $depth,
                'path'      => implode( ' › ', $names ),
                'parent'    => $names[0] ?? $term->name,
                'child'     => $depth > 0 ? $term->name : '',
            ];
        }

        usort(
            $choices,
            static function ( $a, $b ) {
                return strnatcasecmp( $a['path'], $b['path'] );
            }
        );

        self::$category_choices_cache = $choices;
        self::set_cached_value( self::CATEGORY_TRANSIENT, self::$category_choices_cache );

        return self::$category_choices_cache;
    }

    public static function get_post_category_ids_for_module( $shortcode, $name = '' ) {
        $snapshot = self::resolve_module_category_data( '', $shortcode, $name );

        return $snapshot['term_ids'] ?? [];
    }

    public static function resolve_module_category_data( $slug, $shortcode, $name = '', $usage_snapshot = null ) {
        $settings       = self::get_catalog_settings();
        $saved_label    = $slug ? ( $settings['module_categories'][ $slug ] ?? '' ) : '';
        $usage_snapshot = is_array( $usage_snapshot ) ? $usage_snapshot : self::find_category_by_shortcode_usage( $shortcode );

        if ( ! empty( $usage_snapshot['label'] ) ) {
            return $usage_snapshot + [ 'source' => 'usage' ];
        }

        if ( $saved_label ) {
            $resolved = self::resolve_term_ids_from_label( $saved_label );

            return [
                'label'    => $saved_label,
                'parent'   => $resolved['parent'] ?? $saved_label,
                'child'    => $resolved['child'] ?? '',
                'term_ids' => $resolved['term_ids'] ?? [],
                'display'  => $saved_label,
                'source'   => 'manual',
            ];
        }

        $inferred = self::infer_category( $slug, $name );

        return [
            'label'    => $inferred,
            'parent'   => $inferred,
            'child'    => '',
            'term_ids' => [],
            'display'  => $inferred,
            'source'   => 'inferred',
        ];
    }

    private static function resolve_suggested_category_from_post( $category_data, $same_slug_posts, $post_usage_index ) {
        foreach ( self::sort_same_slug_posts( $same_slug_posts ) as $post ) {
            $category = $post_usage_index['post_categories'][ (int) $post['ID'] ] ?? [];

            if ( ! empty( $category['label'] ) ) {
                return [
                    'label'  => $category['label'],
                    'parent' => $category['parent'] ?? $category['label'],
                    'child'  => $category['child'] ?? '',
                    'source' => 'post_categories',
                ];
            }
        }

        foreach ( self::sort_same_slug_posts( $same_slug_posts ) as $post ) {
            $planner = $post_usage_index['planner_categories'][ (int) $post['ID'] ] ?? [];

            if ( ! empty( $planner['label'] ) ) {
                return [
                    'label'  => $planner['label'],
                    'parent' => $planner['parent'] ?? $planner['label'],
                    'child'  => $planner['child'] ?? '',
                    'source' => 'planner',
                ];
            }
        }

        if ( ! empty( $category_data['label'] ) && 'Genel' !== $category_data['label'] ) {
            return [
                'label'  => $category_data['label'],
                'parent' => $category_data['parent'] ?? $category_data['label'],
                'child'  => $category_data['child'] ?? '',
                'source' => 'meta',
            ];
        }

        return [
            'label'  => '',
            'parent' => '',
            'child'  => '',
            'source' => 'none',
        ];
    }

    public static function delete_module_category_assignment( $slug ) {
        $slug     = sanitize_key( $slug );
        $settings = self::get_catalog_settings();

        if ( isset( $settings['module_categories'][ $slug ] ) ) {
            unset( $settings['module_categories'][ $slug ] );
            update_option( self::OPTION_KEY, $settings, false );
            self::invalidate_caches();
        }
    }

    public static function save_module_category_assignment( $slug, $category ) {
        $slug     = sanitize_key( $slug );
        $category = self::sanitize_category( $category );

        if ( ! $slug ) {
            return;
        }

        $settings = self::get_catalog_settings();

        if ( ! isset( $settings['module_categories'] ) || ! is_array( $settings['module_categories'] ) ) {
            $settings['module_categories'] = [];
        }

        if ( ! isset( $settings['categories'] ) || ! is_array( $settings['categories'] ) ) {
            $settings['categories'] = [];
        }

        if ( ! $category ) {
            unset( $settings['module_categories'][ $slug ] );
            update_option( self::OPTION_KEY, $settings, false );
            self::invalidate_caches();
            return;
        }

        if ( ! in_array( $category, $settings['categories'], true ) ) {
            $settings['categories'][] = $category;
            sort( $settings['categories'], SORT_NATURAL | SORT_FLAG_CASE );
        }

        $settings['module_categories'][ $slug ] = $category;

        update_option( self::OPTION_KEY, $settings, false );
        self::invalidate_caches();
    }

    public static function group_modules_by_category( $modules ) {
        $grouped = [];

        foreach ( $modules as $module ) {
            $label = $module['category_parent'] ?: ( $module['category'] ?: 'Kategorisiz' );

            if ( ! isset( $grouped[ $label ] ) ) {
                $grouped[ $label ] = [];
            }

            $grouped[ $label ][] = $module;
        }

        ksort( $grouped, SORT_NATURAL | SORT_FLAG_CASE );

        return $grouped;
    }

    public static function get_dashboard_stats() {
        $modules           = self::get_modules();
        $total_posts       = array_sum( wp_list_pluck( $modules, 'post_count' ) );
        $duplicate_modules = array_values( array_filter( $modules, static fn( $module ) => (int) $module['post_count'] > 1 ) );
        $latest_post       = self::get_latest_shortcode_post_summary();

        return [
            'total_modules'     => count( $modules ),
            'total_categories'  => count( self::get_all_categories() ),
            'total_usage'       => (int) $total_posts,
            'duplicate_modules' => count( $duplicate_modules ),
            'duplicate_usage'   => (int) array_sum(
                array_map(
                    static fn( $module ) => max( 0, (int) $module['post_count'] - 1 ),
                    $duplicate_modules
                )
            ),
            'latest_post'       => $latest_post,
        ];
    }

    public static function get_category_tree_data( $modules = null ) {
        $modules = is_array( $modules ) ? $modules : self::get_modules();
        $tree    = [];

        foreach ( $modules as $module ) {
            $parent = $module['category_parent'] ?: ( $module['category'] ?: 'Kategorisiz' );
            $child  = $module['category_child'] ?: '';

            if ( empty( $tree[ $parent ] ) ) {
                $tree[ $parent ] = [
                    'label'    => $parent,
                    'count'    => 0,
                    'children' => [],
                ];
            }

            $tree[ $parent ]['count']++;

            if ( $child ) {
                if ( empty( $tree[ $parent ]['children'][ $child ] ) ) {
                    $tree[ $parent ]['children'][ $child ] = [
                        'label' => $child,
                        'path'  => $module['category'],
                        'count' => 0,
                    ];
                }

                $tree[ $parent ]['children'][ $child ]['count']++;
            }
        }

        ksort( $tree, SORT_NATURAL | SORT_FLAG_CASE );

        foreach ( $tree as &$node ) {
            if ( ! empty( $node['children'] ) ) {
                uasort(
                    $node['children'],
                    static function ( $a, $b ) {
                        return strnatcasecmp( $a['label'], $b['label'] );
                    }
                );
                $node['children'] = array_values( $node['children'] );
            }
        }
        unset( $node );

        return array_values( $tree );
    }

    public static function query_modules( $args = [] ) {
        $args = wp_parse_args(
            $args,
            [
                'search'      => '',
                'category'    => '',
                'post_status' => '',
                'sort_by'     => 'updated',
                'sort_dir'    => 'desc',
                'page'        => 1,
                'per_page'    => 50,
            ]
        );

        $modules = self::get_modules(
            [
                'search'      => $args['search'],
                'category'    => $args['category'],
                'post_status' => $args['post_status'],
            ]
        );

        usort(
            $modules,
            static function ( $a, $b ) use ( $args ) {
                $sort_by  = $args['sort_by'];
                $sort_dir = 'asc' === strtolower( (string) $args['sort_dir'] ) ? 1 : -1;

                switch ( $sort_by ) {
                    case 'name':
                        $value = strnatcasecmp( $a['name'], $b['name'] );
                        break;
                    case 'category':
                        $value = strnatcasecmp( $a['category'], $b['category'] );
                        break;
                    case 'usage':
                        $value = (int) $a['post_count'] <=> (int) $b['post_count'];
                        break;
                    case 'shortcode':
                        $value = strnatcasecmp( $a['shortcode'], $b['shortcode'] );
                        break;
                    case 'updated':
                    default:
                        $value = (int) $a['updated'] <=> (int) $b['updated'];
                        break;
                }

                if ( 0 === $value ) {
                    $value = strnatcasecmp( $a['name'], $b['name'] );
                }

                return $value * $sort_dir;
            }
        );

        $total    = count( $modules );
        $per_page = max( 1, min( 100, (int) $args['per_page'] ) );
        $page     = max( 1, (int) $args['page'] );
        $pages    = max( 1, (int) ceil( $total / $per_page ) );
        $page     = min( $page, $pages );
        $offset   = ( $page - 1 ) * $per_page;

        return [
            'items'      => array_map( [ __CLASS__, 'map_module_list_item' ], array_slice( $modules, $offset, $per_page ) ),
            'total'      => $total,
            'page'       => $page,
            'per_page'   => $per_page,
            'pages'      => $pages,
            'has_more'   => $page < $pages,
        ];
    }

    public static function get_module_detail( $slug ) {
        $slug = sanitize_key( $slug );

        foreach ( self::get_modules() as $module ) {
            if ( $module['slug'] === $slug ) {
                return self::map_module_detail_item( $module );
            }
        }

        return null;
    }

    public static function map_module_list_item( $module ) {
        return [
            'slug'            => $module['slug'],
            'name'            => $module['name'],
            'desc'            => $module['desc'],
            'shortcode'       => $module['shortcode'],
            'expected_shortcode' => $module['expected_shortcode'],
            'category'        => $module['category'],
            'category_parent' => $module['category_parent'],
            'category_child'  => $module['category_child'],
            'suggested_category_parent' => $module['suggested_category_parent'],
            'suggested_category_child'  => $module['suggested_category_child'],
            'suggested_category_label'  => $module['suggested_category_label'],
            'suggested_category_source' => $module['suggested_category_source'],
            'status'          => $module['status_label'],
            'ai_enabled'      => ! empty( $module['ai_enabled'] ),
            'post_count'      => (int) $module['post_count'],
            'draft_count'     => (int) $module['draft_count'],
            'published_count' => (int) $module['published_count'],
            'matched_post_id' => (int) $module['matched_post_id'],
            'matched_post_status' => $module['matched_post_status'],
            'matched_post_title' => $module['matched_post_title'],
            'matched_post_url' => $module['matched_post_url'],
            'matched_post_category_label' => $module['matched_post_category_label'],
            'has_same_slug_post' => ! empty( $module['has_same_slug_post'] ),
            'shortcode_mismatch' => ! empty( $module['shortcode_mismatch'] ),
            'same_slug_post_count' => (int) $module['same_slug_post_count'],
            'shortcode_mismatch_count' => (int) $module['shortcode_mismatch_count'],
            'found_shortcodes' => array_values( $module['found_shortcodes'] ?? [] ),
            'updated'         => $module['updated_datetime'],
            'updated_date'    => $module['updated_date'],
            'posts_url'       => $module['posts_url'],
        ];
    }

    public static function map_module_detail_item( $module ) {
        return self::map_module_list_item( $module ) + [
            'created'                  => $module['created_datetime'],
            'publisher'                => $module['publisher'],
            'term_ids'                 => $module['category_term_ids'],
            'slug_label'               => $module['slug'],
            'matched_post_categories'  => array_values( $module['matched_post_categories'] ?? [] ),
        ];
    }

    private static function sanitize_category( $category ) {
        $category = sanitize_text_field( $category );
        $category = trim( preg_replace( '/\s+/', ' ', $category ) );

        return $category;
    }

    private static function get_term_lineage( $term_id, $term_map ) {
        $lineage = [];
        $guard   = 0;

        while ( $term_id && isset( $term_map[ $term_id ] ) && $guard < 10 ) {
            array_unshift( $lineage, $term_map[ $term_id ] );
            $term_id = (int) $term_map[ $term_id ]->parent;
            $guard++;
        }

        return $lineage;
    }

    private static function find_category_by_shortcode_usage( $shortcode ) {
        $usage_cache = self::get_shortcode_usage_cache();
        $shortcodes  = self::get_related_shortcodes( $shortcode );
        $snapshot    = self::get_usage_snapshot_for_shortcodes( $shortcodes, $usage_cache );

        if ( empty( $snapshot['label'] ) ) {
            return [];
        }

        return $snapshot;
    }

    private static function resolve_term_ids_from_label( $label ) {
        $label = self::sanitize_category( $label );
        if ( ! $label ) {
            return [];
        }

        $parts   = preg_split( '/\s*[›>\/]+\s*/u', $label );
        $parts   = array_values( array_filter( array_map( [ __CLASS__, 'sanitize_category' ], $parts ) ) );
        $choices = self::get_wordpress_category_choices();
        $matched = null;

        foreach ( $choices as $choice ) {
            $path_parts = preg_split( '/\s*[›>\/]+\s*/u', $choice['path'] );
            if ( count( $path_parts ) !== count( $parts ) ) {
                continue;
            }

            $ok = true;
            foreach ( $parts as $index => $part ) {
                if ( self::normalize_category_key( $path_parts[ $index ] ) !== self::normalize_category_key( $part ) ) {
                    $ok = false;
                    break;
                }
            }

            if ( $ok ) {
                $matched = $choice;
                break;
            }
        }

        if ( ! $matched ) {
            return [
                'parent'   => $parts[0] ?? $label,
                'child'    => count( $parts ) > 1 ? end( $parts ) : '',
                'term_ids' => [],
            ];
        }

        $ids = [];
        if ( $matched['parent'] ) {
            foreach ( $choices as $choice ) {
                if ( 0 === $choice['depth'] && self::normalize_category_key( $choice['name'] ) === self::normalize_category_key( $matched['parent'] ) ) {
                    $ids[] = (int) $choice['term_id'];
                    break;
                }
            }
        }

        if ( $matched['child'] ) {
            $ids[] = (int) $matched['term_id'];
        }

        return [
            'parent'   => $matched['parent'],
            'child'    => $matched['child'],
            'term_ids' => array_values( array_unique( array_filter( array_map( 'intval', $ids ) ) ) ),
        ];
    }

    public static function resolve_category_term_ids( $label ) {
        return self::resolve_term_ids_from_label( $label );
    }

    private static function normalize_category_key( $value ) {
        $value = remove_accents( wp_strip_all_tags( (string) $value ) );
        $value = function_exists( 'mb_strtolower' ) ? mb_strtolower( $value, 'UTF-8' ) : strtolower( $value );
        $value = preg_replace( '/[^\p{L}\p{N}]+/u', ' ', $value );

        return trim( preg_replace( '/\s+/', ' ', $value ) );
    }

    private static function get_shortcode_usage_cache() {
        $index = self::get_post_usage_index();

        return $index['usage'] ?? [];
    }

    private static function get_post_usage_index() {
        global $wpdb;

        if ( null !== self::$post_usage_index_cache ) {
            return self::$post_usage_index_cache;
        }

        $cached = self::get_cached_value( self::USAGE_TRANSIENT );

        if ( is_array( $cached ) && isset( $cached['usage'], $cached['posts_by_slug'] ) ) {
            self::$post_usage_index_cache = $cached;
            self::$module_usage_cache     = $cached['usage'];

            return self::$post_usage_index_cache;
        }

        self::$post_usage_index_cache = self::build_post_usage_index( $wpdb );
        self::$module_usage_cache     = self::$post_usage_index_cache['usage'] ?? [];

        self::set_cached_value( self::USAGE_TRANSIENT, self::$post_usage_index_cache, MINUTE_IN_SECONDS * 15 );

        return self::$post_usage_index_cache;
    }

    private static function build_post_usage_index( $wpdb ) {
        $rows = $wpdb->get_results(
            "SELECT ID, post_status, post_title, post_name, post_content, post_modified
             FROM {$wpdb->posts}
             WHERE post_type = 'post'
               AND post_status IN ('publish', 'draft', 'pending', 'private', 'future')",
            ARRAY_A
        );

        $choices    = self::get_wordpress_category_choices();
        $choice_map = [];
        foreach ( $choices as $choice ) {
            $choice_map[ $choice['term_id'] ] = $choice;
        }

        $post_ids      = array_values( array_filter( array_map( 'intval', wp_list_pluck( $rows, 'ID' ) ) ) );
        $post_term_map = [];
        $planner_meta  = [];

        if ( ! empty( $post_ids ) ) {
            $relationships = $wpdb->get_results(
                "SELECT tr.object_id, tt.term_id
                 FROM {$wpdb->term_relationships} tr
                 INNER JOIN {$wpdb->term_taxonomy} tt
                    ON tt.term_taxonomy_id = tr.term_taxonomy_id
                 WHERE tt.taxonomy = 'category'
                   AND tr.object_id IN (" . implode( ',', $post_ids ) . ')',
                ARRAY_A
            );

            foreach ( $relationships as $relationship ) {
                $object_id = (int) $relationship['object_id'];
                $term_id   = (int) $relationship['term_id'];

                if ( empty( $choice_map[ $term_id ] ) ) {
                    continue;
                }

                if ( empty( $post_term_map[ $object_id ] ) ) {
                    $post_term_map[ $object_id ] = [];
                }

                $post_term_map[ $object_id ][ $term_id ] = $term_id;
            }

            $meta_rows = $wpdb->get_results(
                "SELECT post_id, meta_value
                 FROM {$wpdb->postmeta}
                 WHERE meta_key = '_hc_planner_category_source'
                   AND post_id IN (" . implode( ',', $post_ids ) . ')',
                ARRAY_A
            );

            foreach ( $meta_rows as $meta_row ) {
                $planner_meta[ (int) $meta_row['post_id'] ] = sanitize_text_field( $meta_row['meta_value'] );
            }
        }

        $planner_categories = self::get_planner_post_category_index();
        $usage              = [];
        $posts_by_slug      = [];
        $posts_by_id        = [];
        $post_categories    = [];

        foreach ( $rows as $row ) {
            $post_id     = (int) $row['ID'];
            $slug        = sanitize_title( $row['post_name'] ?? '' );
            $shortcodes  = self::extract_hc_shortcodes_from_content( (string) $row['post_content'] );
            $paths       = self::extract_deep_category_paths( $post_term_map[ $post_id ] ?? [], $choice_map );
            $post_record = [
                'ID'                => $post_id,
                'post_status'       => (string) $row['post_status'],
                'post_title'        => (string) $row['post_title'],
                'post_name'         => $slug,
                'post_modified'     => (string) $row['post_modified'],
                'post_content'      => (string) $row['post_content'],
                'shortcodes'        => $shortcodes,
                'edit_url'          => admin_url( 'post.php?post=' . $post_id . '&action=edit' ),
                'planner_meta'      => $planner_meta[ $post_id ] ?? '',
            ];

            $posts_by_id[ $post_id ] = $post_record;

            if ( $slug ) {
                if ( empty( $posts_by_slug[ $slug ] ) ) {
                    $posts_by_slug[ $slug ] = [];
                }

                $posts_by_slug[ $slug ][] = $post_record;
            }

            $post_categories[ $post_id ] = self::summarize_category_paths( $paths );

            foreach ( $shortcodes as $shortcode ) {
                if ( empty( $usage[ $shortcode ] ) ) {
                    $usage[ $shortcode ] = [
                        'count'              => 0,
                        'draft_count'        => 0,
                        'published_count'    => 0,
                        'post_ids'           => [],
                        'draft_post_ids'     => [],
                        'published_post_ids' => [],
                        'path_counts'        => [],
                        'path_post_ids'      => [],
                    ];
                }

                $usage[ $shortcode ]['post_ids'][ $post_id ] = $post_id;

                if ( 'publish' === $post_record['post_status'] ) {
                    $usage[ $shortcode ]['published_post_ids'][ $post_id ] = $post_id;
                } else {
                    $usage[ $shortcode ]['draft_post_ids'][ $post_id ] = $post_id;
                }

                foreach ( $paths as $path ) {
                    if ( empty( $usage[ $shortcode ]['path_counts'][ $path['path'] ] ) ) {
                        $usage[ $shortcode ]['path_counts'][ $path['path'] ] = $path + [ 'count' => 0 ];
                    }

                    if ( empty( $usage[ $shortcode ]['path_post_ids'][ $path['path'] ] ) ) {
                        $usage[ $shortcode ]['path_post_ids'][ $path['path'] ] = [];
                    }

                    $usage[ $shortcode ]['path_post_ids'][ $path['path'] ][ $post_id ] = $post_id;
                }
            }
        }

        foreach ( $usage as $shortcode => $snapshot ) {
            $usage[ $shortcode ] = self::finalize_usage_snapshot( $snapshot );
        }

        return [
            'usage'               => $usage,
            'posts_by_slug'       => $posts_by_slug,
            'posts_by_id'         => $posts_by_id,
            'post_categories'     => $post_categories,
            'planner_categories'  => $planner_categories,
        ];
    }

    public static function extract_hc_shortcodes_from_content( $content ) {
        preg_match_all( '/\[hc_[a-zA-Z0-9_\-]+[^\]]*\]/u', (string) $content, $matches );

        return array_values(
            array_unique(
                array_filter(
                    array_map( [ __CLASS__, 'normalize_shortcode_tag' ], $matches[0] ?? [] )
                )
            )
        );
    }

    private static function summarize_category_paths( $paths ) {
        if ( empty( $paths ) ) {
            return [
                'label'    => '',
                'parent'   => '',
                'child'    => '',
                'term_ids' => [],
            ];
        }

        usort(
            $paths,
            static function ( $a, $b ) {
                if ( $a['depth'] === $b['depth'] ) {
                    return strnatcasecmp( $a['path'], $b['path'] );
                }

                return $b['depth'] <=> $a['depth'];
            }
        );

        $best = $paths[0];

        return [
            'label'    => $best['path'],
            'parent'   => $best['parent'],
            'child'    => $best['child'],
            'term_ids' => self::resolve_term_ids_from_label( $best['path'] )['term_ids'] ?? [],
        ];
    }

    private static function finalize_usage_snapshot( $snapshot ) {
        $snapshot['count']           = count( $snapshot['post_ids'] ?? [] );
        $snapshot['draft_count']     = count( $snapshot['draft_post_ids'] ?? [] );
        $snapshot['published_count'] = count( $snapshot['published_post_ids'] ?? [] );

        if ( ! empty( $snapshot['path_counts'] ) ) {
            foreach ( array_keys( $snapshot['path_counts'] ) as $path_label ) {
                $snapshot['path_counts'][ $path_label ]['count'] = count( $snapshot['path_post_ids'][ $path_label ] ?? [] );
            }

            uasort(
                $snapshot['path_counts'],
                static function ( $a, $b ) {
                    if ( $a['count'] === $b['count'] ) {
                        return $b['depth'] <=> $a['depth'];
                    }

                    return $b['count'] <=> $a['count'];
                }
            );

            $best = reset( $snapshot['path_counts'] );
            $snapshot['label']    = $best['path'];
            $snapshot['parent']   = $best['parent'];
            $snapshot['child']    = $best['child'];
            $snapshot['display']  = $best['path'];
            $snapshot['term_ids'] = self::resolve_term_ids_from_label( $best['path'] )['term_ids'] ?? [];
        }

        return $snapshot;
    }

    private static function get_planner_post_category_index() {
        if ( ! class_exists( 'HC_Excel_Planner' ) || ! method_exists( 'HC_Excel_Planner', 'get_data' ) ) {
            return [];
        }

        $data  = HC_Excel_Planner::get_data();
        $index = [];

        foreach ( (array) ( $data['topics'] ?? [] ) as $topic ) {
            $post_id = (int) ( $topic['draft_post_id'] ?? 0 );
            $parent  = self::sanitize_category( $topic['ana_kategori'] ?? '' );
            $child   = self::sanitize_category( $topic['alt_kategori'] ?? '' );

            if ( ! $post_id || ! $parent ) {
                continue;
            }

            $index[ $post_id ] = [
                'label'  => $child ? $parent . ' › ' . $child : $parent,
                'parent' => $parent,
                'child'  => $child,
            ];
        }

        return $index;
    }

    private static function detect_shortcode_mismatch( $slug, $expected_shortcode, $same_slug_posts, $post_usage_index ) {
        $same_slug_posts = self::sort_same_slug_posts( $same_slug_posts );
        $matched_post    = $same_slug_posts[0] ?? null;
        $found           = [];
        $mismatch_count  = 0;

        foreach ( $same_slug_posts as $post ) {
            $post_shortcodes = array_values( array_unique( array_filter( $post['shortcodes'] ?? [] ) ) );
            $found           = array_merge( $found, $post_shortcodes );

            if ( ! in_array( $expected_shortcode, $post_shortcodes, true ) ) {
                $mismatch_count++;
            }
        }

        $found = array_values( array_unique( array_filter( array_map( [ __CLASS__, 'normalize_shortcode_tag' ], $found ) ) ) );

        return [
            'matched_post_id'             => $matched_post ? (int) $matched_post['ID'] : 0,
            'matched_post_status'         => $matched_post['post_status'] ?? '',
            'matched_post_title'          => $matched_post['post_title'] ?? '',
            'matched_post_url'            => $matched_post['edit_url'] ?? '',
            'matched_post_categories'     => self::build_matched_post_categories( $matched_post, $post_usage_index ),
            'matched_post_category_label' => self::build_matched_post_category_label( $matched_post, $post_usage_index ),
            'found_shortcodes'            => $found,
            'has_same_slug_post'          => ! empty( $same_slug_posts ),
            'shortcode_mismatch'          => ! empty( $same_slug_posts ) && ! in_array( $expected_shortcode, $found, true ),
            'same_slug_post_count'        => count( $same_slug_posts ),
            'shortcode_mismatch_count'    => $mismatch_count,
        ];
    }

    private static function build_matched_post_categories( $matched_post, $post_usage_index ) {
        if ( empty( $matched_post['ID'] ) ) {
            return [];
        }

        $category = $post_usage_index['post_categories'][ (int) $matched_post['ID'] ] ?? [];

        if ( empty( $category['label'] ) ) {
            return [];
        }

        return [
            [
                'label'  => $category['label'],
                'parent' => $category['parent'] ?? '',
                'child'  => $category['child'] ?? '',
            ],
        ];
    }

    private static function build_matched_post_category_label( $matched_post, $post_usage_index ) {
        if ( empty( $matched_post['ID'] ) ) {
            return '';
        }

        $category = $post_usage_index['post_categories'][ (int) $matched_post['ID'] ] ?? [];

        return $category['label'] ?? '';
    }

    private static function sort_same_slug_posts( $posts ) {
        $posts = array_values( is_array( $posts ) ? $posts : [] );

        usort(
            $posts,
            static function ( $a, $b ) {
                $priority = self::get_post_status_priority( $b['post_status'] ?? '' ) <=> self::get_post_status_priority( $a['post_status'] ?? '' );

                if ( 0 !== $priority ) {
                    return $priority;
                }

                return strtotime( (string) ( $b['post_modified'] ?? '' ) ) <=> strtotime( (string) ( $a['post_modified'] ?? '' ) );
            }
        );

        return $posts;
    }

    private static function get_post_status_priority( $status ) {
        static $priorities = [
            'publish' => 5,
            'future'  => 4,
            'private' => 3,
            'pending' => 2,
            'draft'   => 1,
        ];

        return (int) ( $priorities[ $status ] ?? 0 );
    }

    private static function extract_deep_category_paths( $term_ids, $choice_map ) {
        if ( empty( $term_ids ) ) {
            return [];
        }

        $term_ids = array_values( array_unique( array_map( 'intval', (array) $term_ids ) ) );
        $paths    = [];

        foreach ( $term_ids as $term_id ) {
            if ( empty( $choice_map[ $term_id ] ) ) {
                continue;
            }

            $is_parent = false;

            foreach ( $term_ids as $other_id ) {
                if ( (int) $other_id === $term_id ) {
                    continue;
                }

                if ( self::is_ancestor_term_id( $term_id, (int) $other_id, $choice_map ) ) {
                    $is_parent = true;
                    break;
                }
            }

            if ( $is_parent ) {
                continue;
            }

            $paths[ $choice_map[ $term_id ]['path'] ] = $choice_map[ $term_id ];
        }

        return array_values( $paths );
    }

    private static function is_ancestor_term_id( $ancestor_id, $descendant_id, $choice_map ) {
        $guard = 0;

        while ( ! empty( $choice_map[ $descendant_id ]['parent_id'] ) && $guard < 15 ) {
            $descendant_id = (int) $choice_map[ $descendant_id ]['parent_id'];

            if ( $ancestor_id === $descendant_id ) {
                return true;
            }

            $guard++;
        }

        return false;
    }

    private static function get_latest_shortcode_post_summary() {
        global $wpdb;

        $row = $wpdb->get_row(
            "SELECT ID, post_title, post_date
             FROM {$wpdb->posts}
             WHERE post_type = 'post'
               AND post_status IN ('publish','draft','pending','future','private')
               AND post_content LIKE '%[hc_%'
             ORDER BY post_date DESC
             LIMIT 1",
            ARRAY_A
        );

        if ( empty( $row['ID'] ) ) {
            return null;
        }

        return [
            'title'    => get_the_title( (int) $row['ID'] ),
            'date'     => wp_date( 'd M Y H:i', strtotime( (string) $row['post_date'] ) ),
            'edit_url' => get_edit_post_link( (int) $row['ID'], '' ),
        ];
    }

    private static function get_usage_snapshot_for_shortcodes( $shortcodes, $usage_cache = null ) {
        $usage_cache = is_array( $usage_cache ) ? $usage_cache : self::get_shortcode_usage_cache();
        $shortcodes  = array_values( array_unique( array_filter( array_map( [ __CLASS__, 'normalize_shortcode_tag' ], (array) $shortcodes ) ) ) );

        if ( empty( $shortcodes ) ) {
            return [];
        }

        $snapshot = [
            'count'              => 0,
            'draft_count'        => 0,
            'published_count'    => 0,
            'post_ids'           => [],
            'draft_post_ids'     => [],
            'published_post_ids' => [],
            'path_counts'        => [],
            'path_post_ids'      => [],
        ];

        foreach ( $shortcodes as $shortcode ) {
            if ( empty( $usage_cache[ $shortcode ] ) || ! is_array( $usage_cache[ $shortcode ] ) ) {
                continue;
            }

            $item = $usage_cache[ $shortcode ];

            foreach ( (array) ( $item['post_ids'] ?? [] ) as $post_id ) {
                $snapshot['post_ids'][ (int) $post_id ] = (int) $post_id;
            }

            foreach ( (array) ( $item['draft_post_ids'] ?? [] ) as $post_id ) {
                $snapshot['draft_post_ids'][ (int) $post_id ] = (int) $post_id;
            }

            foreach ( (array) ( $item['published_post_ids'] ?? [] ) as $post_id ) {
                $snapshot['published_post_ids'][ (int) $post_id ] = (int) $post_id;
            }

            foreach ( (array) ( $item['path_counts'] ?? [] ) as $path_label => $path_data ) {
                if ( empty( $snapshot['path_counts'][ $path_label ] ) ) {
                    $snapshot['path_counts'][ $path_label ] = $path_data + [ 'count' => 0 ];
                }

                if ( empty( $snapshot['path_post_ids'][ $path_label ] ) ) {
                    $snapshot['path_post_ids'][ $path_label ] = [];
                }

                foreach ( (array) ( $item['path_post_ids'][ $path_label ] ?? [] ) as $post_id ) {
                    $snapshot['path_post_ids'][ $path_label ][ (int) $post_id ] = (int) $post_id;
                }

                $snapshot['path_counts'][ $path_label ]['count'] = count( $snapshot['path_post_ids'][ $path_label ] );
            }
        }

        $snapshot['count']           = count( $snapshot['post_ids'] );
        $snapshot['draft_count']     = count( $snapshot['draft_post_ids'] );
        $snapshot['published_count'] = count( $snapshot['published_post_ids'] );

        if ( ! empty( $snapshot['path_counts'] ) ) {
            uasort(
                $snapshot['path_counts'],
                static function ( $a, $b ) {
                    if ( $a['count'] === $b['count'] ) {
                        return $b['depth'] <=> $a['depth'];
                    }

                    return $b['count'] <=> $a['count'];
                }
            );

            $best = reset( $snapshot['path_counts'] );
            $snapshot['label']    = $best['path'];
            $snapshot['parent']   = $best['parent'];
            $snapshot['child']    = $best['child'];
            $snapshot['display']  = $best['path'];
            $snapshot['term_ids'] = self::resolve_term_ids_from_label( $best['path'] )['term_ids'] ?? [];
        }

        return $snapshot;
    }

    private static function get_module_shortcodes( $slug, $meta = [] ) {
        $shortcodes = [
            '[hc_' . str_replace( '-', '_', $slug ) . ']',
        ];

        if ( ! empty( $meta['shortcode'] ) && is_string( $meta['shortcode'] ) ) {
            $shortcodes[] = $meta['shortcode'];
        }

        $slug_shortcode = '[hc_' . sanitize_key( str_replace( '-', '_', $slug ) ) . ']';
        $shortcodes[]   = $slug_shortcode;

        foreach ( self::get_manual_shortcode_aliases()[ $slug ] ?? [] as $alias ) {
            $shortcodes[] = $alias;
        }

        return array_values( array_unique( array_filter( array_map( [ __CLASS__, 'normalize_shortcode_tag' ], $shortcodes ) ) ) );
    }

    private static function get_related_shortcodes( $shortcode ) {
        $shortcode = self::normalize_shortcode_tag( $shortcode );
        if ( ! $shortcode ) {
            return [];
        }

        $related = [ $shortcode ];

        foreach ( self::get_manual_shortcode_aliases() as $slug => $aliases ) {
            $expected = '[hc_' . str_replace( '-', '_', $slug ) . ']';
            $all      = array_merge( [ $expected ], $aliases );
            $all      = array_values( array_unique( array_filter( array_map( [ __CLASS__, 'normalize_shortcode_tag' ], $all ) ) ) );

            if ( in_array( $shortcode, $all, true ) ) {
                $related = array_merge( $related, $all );
            }
        }

        return array_values( array_unique( $related ) );
    }

    private static function normalize_shortcode_tag( $shortcode ) {
        $shortcode = trim( wp_strip_all_tags( (string) $shortcode ) );
        if ( '' === $shortcode ) {
            return '';
        }

        if ( preg_match( '/hc_[a-z0-9_\-]+/i', $shortcode, $matches ) ) {
            return '[' . strtolower( $matches[0] ) . ']';
        }

        return '';
    }

    private static function should_skip_module_directory( $path ) {
        $slug = basename( (string) $path );
        $slug = function_exists( 'mb_strtolower' ) ? mb_strtolower( $slug, 'UTF-8' ) : strtolower( $slug );

        return false !== strpos( $slug, '.disabled' ) || false !== strpos( $slug, '.off' );
    }

    private static function normalize_module_directory_key( $slug ) {
        $slug = remove_accents( wp_strip_all_tags( (string) $slug ) );
        $slug = function_exists( 'mb_strtolower' ) ? mb_strtolower( $slug, 'UTF-8' ) : strtolower( $slug );
        $slug = str_replace( [ '_', '-' ], ' ', $slug );
        $slug = preg_replace( '/[^\p{L}\p{N}]+/u', ' ', $slug );

        return trim( preg_replace( '/\s+/', ' ', $slug ) );
    }

    private static function extract_module_render_function_name( $file ) {
        if ( ! file_exists( $file ) ) {
            return '';
        }

        $contents = file_get_contents( $file );
        if ( false === $contents ) {
            return '';
        }

        if ( ! preg_match( '/function\s+(hc_render_[a-z0-9_]+)\s*\(/i', $contents, $matches ) ) {
            return '';
        }

        return strtolower( $matches[1] );
    }

    private static function get_manual_shortcode_aliases() {
        return [
            'ip-atlama-kalori-yakimi-hesaplama'          => [ '[hc_ip_atlama_kalori_yakimi]' ],
            'sigara-birakma-ve-tasarruf-hesaplayici'     => [ '[hc_sigara_birakma_tasarruf]' ],
            'spor-protein-ihtiyaci-hesaplama'            => [ '[hc_protein_ihtiyaci_hesaplama]' ],
            'standart-sapma-hesaplama'                   => [ '[hc_standart_sapma_hesaplayici]' ],
            'vucut-yag-orani-hesaplama'                  => [ '[hc_vucut_yag_orani]' ],
            'apgar-skoru-hesaplama'                      => [ '[hc_apgar_skoru]' ],
            'bisiklet-kalori-yakimi-hesaplama'           => [ '[hc_bisiklet_kalori_yakimi]' ],
            'gunluk-adim-hedefi-hesaplama'               => [ '[hc_gunluk_adim_hedefi]' ],
            'hba1c-ortalama-kan-sekeri-hesaplama'        => [ '[hc_hba1c_ortalama_kan_sekeri]' ],
            'hedefe-ulasma-yuzdesi-hesaplama'            => [ '[hc_hedefe_ulasma_yuzdesi]' ],
            'kosu-kalori-yakimi-hesaplama'               => [ '[hc_kosu_kalori_yakimi]' ],
            'yuruyus-kalori-yakimi-hesaplama'            => [ '[hc_yuruyus_kalori_yakimi]' ],
            'yuzme-kalori-yakimi-hesaplama'              => [ '[hc_yuzme_kalori_yakimi]' ],
            'verim-orani-hesaplama'                      => [ '[hc_verim_hesaplama]' ],
            'vucut-kitle-indeksi-hesaplama'              => [ '[hc_bmi_hesaplama]' ],
            'yakit-tuketimi-v2'                          => [ '[hc_yakit_tuketimi_hesaplama]' ],
        ];
    }

    private static function matches_filters( $module, $args ) {
        $search   = trim( (string) $args['search'] );
        $category = self::sanitize_category( (string) $args['category'] );
        $post_status = $args['post_status'] ?? '';

        if ( $post_status === 'used' && $module['post_count'] == 0 ) return false;
        if ( $post_status === 'unused' && ( $module['post_count'] > 0 || $module['draft_count'] > 0 || ! empty( $module['has_same_slug_post'] ) ) ) return false;
        if ( $post_status === 'duplicates' && $module['post_count'] <= 1 ) return false;

        if ( $category ) {
            $cat = $module['category'] ?? '';
            $parent = $module['category_parent'] ?? '';
            $matches = ( $cat === $category )
                || ( $parent === $category )
                || ( '' !== $parent && strpos( $cat, $category . ' › ' ) === 0 );
            if ( ! $matches ) {
                return false;
            }
        }

        if ( ! $search ) {
            return true;
        }

        $haystack = implode(
            ' ',
            [
                $module['name'],
                $module['slug'],
                $module['shortcode'],
                $module['desc'],
                $module['category'],
            ]
        );

        if ( function_exists( 'mb_stripos' ) ) {
            return false !== mb_stripos( $haystack, $search, 0, 'UTF-8' );
        }

        return false !== stripos( $haystack, $search );
    }

    private static function infer_category( $slug, $name ) {
        $source = function_exists( 'mb_strtolower' )
            ? mb_strtolower( $slug . ' ' . $name, 'UTF-8' )
            : strtolower( $slug . ' ' . $name );

        $map = [
            'Finans'     => [ 'kredi', 'maas', 'maaş', 'issizlik', 'işsizlik', 'emekli', 'kart' ],
            'Astroloji'  => [ 'burc', 'burç', 'yukselen', 'yükselen', 'dogum', 'doğum', 'ask', 'aşk' ],
            'Eğitim'     => [ 'tyt', 'ayt', 'okul' ],
            'Zaman'      => [ 'geri', 'sayim', 'sayım' ],
        ];

        foreach ( $map as $category => $keywords ) {
            foreach ( $keywords as $keyword ) {
                $matched = function_exists( 'mb_stripos' )
                    ? false !== mb_stripos( $source, $keyword, 0, 'UTF-8' )
                    : false !== stripos( $source, $keyword );

                if ( $matched ) {
                    return $category;
                }
            }
        }

        return 'Genel';
    }
}

class HC_Admin_Page {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'register_menu' ] );
        add_action( 'admin_init', [ $this, 'handle_settings_save' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_assets' ] );
        add_action( 'wp_ajax_hc_preview_shortcode', [ $this, 'ajax_preview_shortcode' ] );
        add_action( 'wp_ajax_hc_delete_module', [ $this, 'ajax_delete_module' ] );
        add_action( 'wp_ajax_hc_explorer_bootstrap', [ $this, 'ajax_explorer_bootstrap' ] );
        add_action( 'wp_ajax_hc_explorer_modules', [ $this, 'ajax_explorer_modules' ] );
        add_action( 'wp_ajax_hc_explorer_module_detail', [ $this, 'ajax_explorer_module_detail' ] );
        add_action( 'wp_ajax_hc_save_module_categories', [ $this, 'ajax_save_module_categories' ] );
        add_action( 'wp_ajax_hc_save_module_catalog_state', [ $this, 'ajax_save_module_catalog_state' ] );
        add_action( 'wp_ajax_hc_fix_shortcode_mismatch', [ $this, 'ajax_fix_shortcode_mismatch' ] );
        add_action( 'wp_ajax_hc_toggle_module_favorite', [ $this, 'ajax_toggle_module_favorite' ] );
        add_action( 'wp_ajax_hc_track_recent_module', [ $this, 'ajax_track_recent_module' ] );
    }

    public function register_menu() {
        add_menu_page(
            'Hesaplama Suite',
            'H. Suite',
            'manage_options',
            'hesaplama-suite',
            [ $this, 'render_modules_page' ],
            'dashicons-calculator',
            30
        );

        add_submenu_page( 'hesaplama-suite', 'Dashboard', 'Dashboard', 'manage_options', 'hesaplama-suite', [ $this, 'render_modules_page' ] );
        add_submenu_page( 'hesaplama-suite', 'Yazı Oluştur', 'Yazı Oluştur', 'manage_options', 'hesaplama-suite-writer', [ $this, 'render_writer_page' ] );
        add_submenu_page( 'hesaplama-suite', 'Modül Oluştur', 'Modül Oluştur', 'manage_options', 'hesaplama-suite-generator', [ $this, 'render_generator_page' ] );
        add_submenu_page( 'hesaplama-suite', 'Toplu Üretici (DeepSeek/Gemini)', 'Toplu Üretici', 'manage_options', 'hesaplama-suite-bulk', [ $this, 'render_bulk_page' ] );
        add_submenu_page( 'hesaplama-suite', 'AI Ayarları', 'AI Ayarları', 'manage_options', 'hesaplama-suite-ai', [ $this, 'render_ai_settings_page' ] );
        add_submenu_page( 'hesaplama-suite', 'GitHub Ayarları', 'GitHub Ayarları', 'manage_options', 'hesaplama-suite-github', [ $this, 'render_github_page' ] );
        add_submenu_page( 'hesaplama-suite', 'İçerik Planı', 'İçerik Planı', 'manage_options', 'hesaplama-suite-planner', [ $this, 'render_planner_page' ] );
    }

    public function enqueue_admin_assets( $hook ) {
        if ( strpos( $hook, 'hesaplama-suite' ) === false ) {
            return;
        }

        $script_file = HC_PLUGIN_DIR . 'admin/admin.js';
        $style_file  = HC_PLUGIN_DIR . 'admin/admin.css';
        $script_ver  = file_exists( $script_file ) ? HC_VERSION . '-' . filemtime( $script_file ) : HC_VERSION;
        $style_ver   = file_exists( $style_file ) ? HC_VERSION . '-' . filemtime( $style_file ) : HC_VERSION;

        wp_enqueue_style( 'hc-admin', HC_PLUGIN_URL . 'admin/admin.css', [], $style_ver );
        wp_enqueue_script( 'hc-admin', HC_PLUGIN_URL . 'admin/admin.js', [ 'jquery' ], $script_ver, true );
        wp_localize_script(
            'hc-admin',
            'hcAdmin',
            [
                'nonce'      => wp_create_nonce( 'hc_ajax_nonce' ),
                'ajaxurl'    => admin_url( 'admin-ajax.php' ),
                'previewing' => 'Önizleme hazırlanıyor...',
                'previewError' => 'Önizleme yüklenemedi.',
                'copied' => 'Shortcode kopyalandı.',
                'copyError' => 'Shortcode kopyalanamadı.',
                'deleteConfirm' => 'Bu modülü yerel eklentiden kalıcı olarak silmek istediğinize emin misiniz?',
                'deleteError' => 'Modül silinemedi.',
                'checking'   => 'Kontrol ediliyor...',
                'norepo'     => 'Önce repo adresini kaydedin.',
                'saving'     => 'Kaydediliyor...',
                'generating' => 'Yapay zeka makaleyi hazırlıyor (20-60 sn)...',
                'creatingDraft' => 'Taslak oluşturuluyor...',
                'createDraft' => 'Taslak oluştur',
                'analyzingCategory' => 'AI kategori analizi yapılıyor...',
                'analyzeCategory' => 'AI ile kategori analizi',
                'categoryAnalyzed' => 'Kategori önerisi seçildi. Kaydetmeyi unutmayın.',
                'savingCategories' => 'Kategoriler kaydediliyor...',
                'savedCategories' => 'Kategori değişiklikleri kaydedildi.',
                'explorerLoading' => 'Modüller yükleniyor...',
                'explorerError' => 'Modül verisi yüklenemedi.',
                'fixingShortcode' => 'Shortcode düzeltiliyor...',
                'shortcodeFixed' => 'Shortcode başarıyla düzeltildi.',
                'manualShortcodeCheck' => 'Birden fazla shortcode bulundu; manuel kontrol gerekli.',
                'suggestedCategoryReady' => 'Önerilen kategori seçildi. Kaydet ile kalıcı hale getirin.',
                'currentPage' => sanitize_text_field( wp_unslash( $_GET['page'] ?? '' ) ),
            ]
        );
    }

    public function handle_settings_save() {
        if ( isset( $_POST['hc_save_github'] ) ) {
            if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Yetkisiz islem' );
            if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'hc_save_github_settings' ) ) wp_die( 'Gecersiz istek' );

            $updater = new HC_Github_Updater();
            $updater->save_settings( $_POST );

            wp_safe_redirect( admin_url( 'admin.php?page=hesaplama-suite-github&saved=1' ) );
            exit;
        }

        if ( isset( $_POST['hc_save_modules'] ) ) {
            if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Yetkisiz islem' );
            if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'hc_save_module_catalog' ) ) wp_die( 'Gecersiz istek' );

            HC_Module_Inventory::save_catalog_settings( $_POST );

            wp_safe_redirect( add_query_arg( [ 'page' => 'hesaplama-suite', 'modules_saved' => '1' ], admin_url( 'admin.php' ) ) );
            exit;
        }
    }

    private function render_header($title) {
        ?>
        <div class="wrap hc-wrap hesaplamasuite-admin" id="hc-main-wrap">
            <div class="hc-glass-header">
                <div class="hc-header-content">
                    <h1><?php echo esc_html($title); ?> <span class="hc-badge-pro">PRO</span></h1>
                    <p class="hc-page-subtitle">Hesaplama Suite Yönetim Paneli</p>
                </div>
                <div class="hc-header-actions" style="display:flex; align-items:center; gap:15px;">
                    <button type="button" class="button hc-theme-toggle" id="hc-theme-toggle" title="Karanlık/Aydınlık Mod Değiştir" style="border-radius:50%; width:40px; height:40px; padding:0; display:flex; align-items:center; justify-content:center;">
                        <span class="dashicons dashicons-visibility"></span>
                    </button>
                    <div class="hc-page-publisher">
                        <span class="hc-page-publisher-label">Yayıncı</span>
                        <strong><?php echo esc_html( HC_Module_Inventory::get_publisher_name() ); ?></strong>
                    </div>
                </div>
            </div>
            <div class="hc-tab-content" style="display:block; animation:none;">
        <?php
    }

    private function render_footer() {
        ?>
            </div>
        </div>
        <?php
    }

    public function render_modules_page() {
        $this->render_header('Dashboard & Modüller');
        $this->render_modules_tab();
        $this->render_footer();
    }

    public function render_writer_page() {
        $this->render_header('Yazı Oluştur');
        $writer = new HC_AI_Writer();
        $writer->render_writer_tab();
        $this->render_footer();
    }

    public function render_generator_page() {
        $this->render_header('Yapay Zeka ile Modül Oluştur');
        if (class_exists('HC_AI_Module_Generator')) {
            HC_AI_Module_Generator::render_generator_tab();
        } else {
            echo "<p>Generator sınıfı bulunamadı.</p>";
        }
        $this->render_footer();
    }

    public function render_bulk_page() {
        $this->render_header('Toplu AI Üretici (Gemini)');
        if (class_exists('HC_AI_Bulk_Generator')) {
            HC_AI_Bulk_Generator::render_bulk_generator_tab();
        } else {
            echo "<p>Bulk Generator sınıfı bulunamadı.</p>";
        }
        $this->render_footer();
    }

    public function render_ai_settings_page() {
        $this->render_header('AI Ayarları');
        $writer = new HC_AI_Writer();
        $writer->render_ai_settings_tab();
        $this->render_footer();
    }

    public function render_github_page() {
        $this->render_header('GitHub Ayarları');
        $this->render_github_tab();
        $this->render_footer();
    }

    public function render_planner_page() {
        $this->render_header('İçerik Planı');
        HC_Excel_Planner::render_planner_tab();
        $this->render_footer();
    }

    private function render_github_tab() {
        $updater  = new HC_Github_Updater();
        $settings = $updater->get_settings();
        $saved    = isset( $_GET['saved'] );
        $update   = sanitize_text_field( wp_unslash( $_GET['update'] ?? '' ) );
        $last     = get_option( 'hc_last_update', '-' );
        ?>
        <?php if ( $saved ) : ?>
            <div class="notice notice-success is-dismissible"><p>Ayarlar kaydedildi.</p></div>
        <?php endif; ?>

        <?php if ( 'success' === $update ) : ?>
            <div class="notice notice-success is-dismissible"><p>Eklenti GitHub üzerinden başarıyla güncellendi.</p></div>
        <?php elseif ( $update ) : ?>
            <div class="notice notice-error is-dismissible"><p>Güncelleme hatası: <?php echo esc_html( urldecode( $update ) ); ?></p></div>
        <?php endif; ?>

        <div class="hc-card">
            <h2>GitHub Bağlantısı</h2>
            <form method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite-github' ) ); ?>">
                <?php wp_nonce_field( 'hc_save_github_settings' ); ?>
                <input type="hidden" name="hc_save_github" value="1" />
                <table class="form-table">
                    <tr>
                        <th><label for="repo">Repository</label></th>
                        <td>
                            <input type="text" id="repo" name="repo" value="<?php echo esc_attr( $settings['repo'] ); ?>" placeholder="kullanici-adi/hesaplama-wp-addons" class="regular-text" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="branch">Branch</label></th>
                        <td>
                            <input type="text" id="branch" name="branch" value="<?php echo esc_attr( $settings['branch'] ); ?>" placeholder="main" class="small-text" />
                        </td>
                    </tr>
                    <tr>
                        <th><label for="token">Token</label></th>
                        <td>
                            <input type="password" id="token" name="token" value="<?php echo esc_attr( $settings['token'] ); ?>" placeholder="ghp_xxxx" class="regular-text" />
                            <p class="description">Public repo için boş bırakabilirsiniz.</p>
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <button type="submit" name="hc_save_github" class="button button-primary">Kaydet</button>
                    <button type="button" id="hc-check-version" class="button">Son Versiyonu Kontrol Et</button>
                    <span id="hc-version-result" style="margin-left:10px; line-height:30px;"></span>
                </p>
            </form>
        </div>
        <div class="hc-card hc-update-box">
            <h2>Güncelleme</h2>
            <p>Son güncelleme: <strong><?php echo esc_html( $last ); ?></strong></p>
            <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                <?php wp_nonce_field( 'hc_update_from_github' ); ?>
                <input type="hidden" name="action" value="hc_update_from_github" />
                <button type="submit" class="button button-primary hc-update-btn" onclick="return confirm('Güncellemek istediğinize emin misiniz?')">GitHub'dan Güncelle</button>
            </form>
        </div>
        <?php
    }

    public function ajax_preview_shortcode() {
        if ( ! current_user_can( 'manage_options' ) ) {
            $this->send_preview_response( 'Önizleme yetkiniz yok.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            $this->send_preview_response( 'Güvenlik doğrulaması başarısız oldu. Lütfen sayfayı yenileyip tekrar deneyin.', 400 );
        }

        $shortcode  = sanitize_text_field( wp_unslash( $_REQUEST['shortcode'] ?? '' ) );
        $standalone = ! empty( $_REQUEST['standalone'] );
        $module     = $this->get_module_by_shortcode( $shortcode );

        if ( ! $module ) {
            $this->send_preview_response( 'Geçersiz veya kayıtlı olmayan shortcode.', 400 );
        }

        wp_enqueue_style( 'hesaplama-suite', HC_PLUGIN_URL . 'assets/style.css', [], HC_VERSION );
        wp_enqueue_script( 'hesaplama-suite', HC_PLUGIN_URL . 'assets/main.js', [], HC_VERSION, true );

        ob_start();
        echo do_shortcode( $module['shortcode'] );
        $html = ob_get_clean();

        if ( $standalone ) {
            nocache_headers();
            ?>
            <!doctype html>
            <html <?php language_attributes(); ?>>
            <head>
                <meta charset="<?php bloginfo( 'charset' ); ?>">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title><?php echo esc_html( $module['name'] ); ?> - Önizleme</title>
                <?php wp_print_styles(); ?>
                <style>
                    body { margin: 0; padding: 32px; background: #f8fafc; font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
                    .hc-standalone-preview { max-width: 920px; margin: 0 auto; }
                </style>
            </head>
            <body>
                <main class="hc-standalone-preview">
                    <?php echo $html; ?>
                </main>
                <?php wp_print_footer_scripts(); ?>
            </body>
            </html>
            <?php
            exit;
        }

        ob_start();
        wp_print_styles();
        wp_print_footer_scripts();
        $assets = ob_get_clean();

        $preview = $assets . '<div class="hc-admin-preview-surface">' . $html . '</div>';

        wp_send_json_success(
            [
                'html'      => $preview,
                'name'      => $module['name'],
                'shortcode' => $module['shortcode'],
            ]
        );
    }

    public function ajax_delete_module() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Modül silme yetkiniz yok.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'Güvenlik doğrulaması başarısız oldu. Lütfen sayfayı yenileyip tekrar deneyin.', 400 );
        }

        $slug   = sanitize_key( wp_unslash( $_POST['slug'] ?? '' ) );
        $module = $this->get_module_by_slug( $slug );

        if ( ! $module ) {
            wp_send_json_error( 'Geçersiz veya kayıtlı olmayan modül.', 400 );
        }

        $modules_root = realpath( HC_PLUGIN_DIR . 'modules' );
        $module_path  = realpath( HC_PLUGIN_DIR . 'modules/' . $slug );

        if ( ! $modules_root || ! $module_path || ! is_dir( $module_path ) ) {
            wp_send_json_error( 'Modül klasörü bulunamadı.', 404 );
        }

        $modules_root = rtrim( wp_normalize_path( $modules_root ), '/' ) . '/';
        $module_path  = rtrim( wp_normalize_path( $module_path ), '/' ) . '/';

        if ( 0 !== strpos( $module_path, $modules_root ) || $module_path === $modules_root ) {
            wp_send_json_error( 'Güvenli olmayan modül yolu reddedildi.', 400 );
        }

        $deleted = $this->delete_directory( $module_path );

        if ( ! $deleted ) {
            wp_send_json_error( 'Modül klasörü silinemedi.', 500 );
        }

        HC_Module_Inventory::delete_module_category_assignment( $slug );
        HC_Module_Inventory::invalidate_caches();

        wp_send_json_success(
            [
                'slug'    => $slug,
                'message' => 'Modül silindi.',
            ]
        );
    }

    private function get_module_by_shortcode( $shortcode ) {
        foreach ( HC_Module_Inventory::get_modules() as $module ) {
            if ( $module['shortcode'] === $shortcode ) {
                return $module;
            }
        }

        return null;
    }

    private function get_module_by_slug( $slug ) {
        foreach ( HC_Module_Inventory::get_modules() as $module ) {
            if ( $module['slug'] === $slug ) {
                return $module;
            }
        }

        return null;
    }

    private function delete_directory( $path ) {
        if ( ! is_dir( $path ) ) {
            return false;
        }

        $items = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator( $path, FilesystemIterator::SKIP_DOTS ),
            RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ( $items as $item ) {
            $item_path = $item->getPathname();

            if ( $item->isDir() ) {
                if ( ! rmdir( $item_path ) ) {
                    return false;
                }
                continue;
            }

            if ( ! unlink( $item_path ) ) {
                return false;
            }
        }

        return rmdir( $path );
    }

    private function send_preview_response( $message, $status ) {
        if ( ! empty( $_REQUEST['standalone'] ) ) {
            wp_die( esc_html( $message ), esc_html__( 'Önizleme hatası', 'hesaplama-suite' ), [ 'response' => $status ] );
        }

        wp_send_json_error( $message, $status );
    }

    private function get_favorite_slugs() {
        $slugs = (array) get_user_meta( get_current_user_id(), 'hc_module_favorites', true );

        return array_values( array_unique( array_filter( array_map( 'sanitize_key', $slugs ) ) ) );
    }

    private function save_favorite_slugs( $slugs ) {
        update_user_meta(
            get_current_user_id(),
            'hc_module_favorites',
            array_values( array_unique( array_filter( array_map( 'sanitize_key', (array) $slugs ) ) ) )
        );
    }

    private function get_recent_slugs() {
        $slugs = (array) get_user_meta( get_current_user_id(), 'hc_module_recent', true );

        return array_values( array_unique( array_filter( array_map( 'sanitize_key', $slugs ) ) ) );
    }

    private function track_recent_slug( $slug ) {
        $slug   = sanitize_key( $slug );
        $recent = $this->get_recent_slugs();

        if ( ! $slug ) {
            return $recent;
        }

        $recent = array_values( array_diff( $recent, [ $slug ] ) );
        array_unshift( $recent, $slug );
        $recent = array_slice( $recent, 0, 12 );

        update_user_meta( get_current_user_id(), 'hc_module_recent', $recent );

        return $recent;
    }

    private function get_explorer_args( $request = [] ) {
        return [
            'search'      => sanitize_text_field( wp_unslash( $request['search'] ?? $request['s'] ?? '' ) ),
            'category'    => sanitize_text_field( wp_unslash( $request['category'] ?? $request['module_category'] ?? '' ) ),
            'post_status' => sanitize_text_field( wp_unslash( $request['post_status'] ?? '' ) ),
            'collection'  => sanitize_key( wp_unslash( $request['collection'] ?? '' ) ),
            'sort_by'     => sanitize_key( wp_unslash( $request['sort_by'] ?? 'updated' ) ),
            'sort_dir'    => 'asc' === strtolower( (string) ( $request['sort_dir'] ?? 'desc' ) ) ? 'asc' : 'desc',
            'page'        => max( 1, (int) ( $request['page'] ?? 1 ) ),
            'per_page'    => max( 1, min( 100, (int) ( $request['per_page'] ?? 50 ) ) ),
            'view'        => 'table' === ( $request['view'] ?? '' ) ? 'table' : 'gallery',
        ];
    }

    private function apply_collection_filter( $modules, $collection, $favorites, $recent ) {
        if ( ! $collection ) {
            return $modules;
        }

        $favorite_map = array_fill_keys( $favorites, true );
        $recent_map   = array_fill_keys( $recent, true );

        return array_values(
            array_filter(
                $modules,
                static function ( $module ) use ( $collection, $favorite_map, $recent_map ) {
                    switch ( $collection ) {
                        case 'favorites':
                            return ! empty( $favorite_map[ $module['slug'] ] );
                        case 'recent':
                            return ! empty( $recent_map[ $module['slug'] ] );
                        case 'ai-generated':
                            return ! empty( $module['ai_enabled'] );
                        case 'drafts':
                            return (int) $module['draft_count'] > 0;
                        case 'shortcode-mismatch':
                            return ! empty( $module['shortcode_mismatch'] );
                        case 'unused':
                            return (int) $module['post_count'] === 0 && (int) $module['draft_count'] === 0 && empty( $module['has_same_slug_post'] );
                        case 'archived':
                            return false;
                        case 'no-category':
                            return empty( $module['category'] ) || 'Genel' === $module['category'];
                        default:
                            return true;
                    }
                }
            )
        );
    }

    private function paginate_explorer_modules( $modules, $args ) {
        usort(
            $modules,
            static function ( $a, $b ) use ( $args ) {
                $sort_by  = $args['sort_by'];
                $sort_dir = 'asc' === $args['sort_dir'] ? 1 : -1;

                switch ( $sort_by ) {
                    case 'name':
                        $value = strnatcasecmp( $a['name'], $b['name'] );
                        break;
                    case 'category':
                        $value = strnatcasecmp( $a['category'], $b['category'] );
                        break;
                    case 'usage':
                        $value = (int) $a['post_count'] <=> (int) $b['post_count'];
                        break;
                    case 'shortcode':
                        $value = strnatcasecmp( $a['shortcode'], $b['shortcode'] );
                        break;
                    case 'updated':
                    default:
                        $value = (int) $a['updated'] <=> (int) $b['updated'];
                        break;
                }

                if ( 0 === $value ) {
                    $value = strnatcasecmp( $a['name'], $b['name'] );
                }

                return $value * $sort_dir;
            }
        );

        $total  = count( $modules );
        $pages  = max( 1, (int) ceil( $total / $args['per_page'] ) );
        $page   = min( max( 1, $args['page'] ), $pages );
        $offset = ( $page - 1 ) * $args['per_page'];

        return [
            'items'    => array_map( [ 'HC_Module_Inventory', 'map_module_list_item' ], array_slice( $modules, $offset, $args['per_page'] ) ),
            'total'    => $total,
            'page'     => $page,
            'per_page' => $args['per_page'],
            'pages'    => $pages,
            'has_more' => $page < $pages,
        ];
    }

    private function build_collection_items( $modules, $favorites, $recent ) {
        $favorite_map = array_fill_keys( $favorites, true );
        $recent_map   = array_fill_keys( $recent, true );

        return [
            [ 'key' => 'favorites', 'label' => 'Favoriler', 'count' => count( array_intersect( array_keys( $favorite_map ), wp_list_pluck( $modules, 'slug' ) ) ) ],
            [ 'key' => 'recent', 'label' => 'Son Açılanlar', 'count' => count( array_intersect( array_keys( $recent_map ), wp_list_pluck( $modules, 'slug' ) ) ) ],
            [ 'key' => 'ai-generated', 'label' => 'AI Generated', 'count' => count( array_filter( $modules, static fn( $module ) => ! empty( $module['ai_enabled'] ) ) ) ],
            [ 'key' => 'drafts', 'label' => 'Taslaklar', 'count' => count( array_filter( $modules, static fn( $module ) => (int) $module['draft_count'] > 0 ) ) ],
            [ 'key' => 'shortcode-mismatch', 'label' => 'Shortcode Uyuşmazlığı', 'count' => count( array_filter( $modules, static fn( $module ) => ! empty( $module['shortcode_mismatch'] ) ) ) ],
            [ 'key' => 'unused', 'label' => 'Kullanılmayanlar', 'count' => count( array_filter( $modules, static fn( $module ) => (int) $module['post_count'] === 0 && (int) $module['draft_count'] === 0 && empty( $module['has_same_slug_post'] ) ) ) ],
            [ 'key' => 'no-category', 'label' => 'Kategorisiz', 'count' => count( array_filter( $modules, static fn( $module ) => empty( $module['category'] ) || 'Genel' === $module['category'] ) ) ],
            [ 'key' => 'archived', 'label' => 'Arşiv', 'count' => 0 ],
        ];
    }

    private function build_explorer_payload( $request = [], $include_bootstrap = false ) {
        $args      = $this->get_explorer_args( $request );
        $favorites = $this->get_favorite_slugs();
        $recent    = $this->get_recent_slugs();
        $modules   = HC_Module_Inventory::get_modules(
            [
                'search'      => $args['search'],
                'category'    => $args['category'],
                'post_status' => $args['post_status'],
            ]
        );

        $modules = $this->apply_collection_filter( $modules, $args['collection'], $favorites, $recent );
        $payload = [
            'query' => $args,
            'list'  => $this->paginate_explorer_modules( $modules, $args ),
        ];

        if ( $include_bootstrap ) {
            $all_modules = HC_Module_Inventory::get_modules();
            $payload['stats'] = HC_Module_Inventory::get_dashboard_stats();
            $payload['sidebar'] = [
                'categories'  => HC_Module_Inventory::get_category_tree_data( $all_modules ),
                'collections' => $this->build_collection_items( $all_modules, $favorites, $recent ),
            ];
            $payload['preferences'] = [
                'favorites' => $favorites,
                'recent'    => $recent,
            ];
        }

        return $payload;
    }

    public function ajax_explorer_bootstrap() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Yetkisiz istek.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'GÃ¼venlik doÄŸrulamasÄ± baÅŸarÄ±sÄ±z oldu.', 400 );
        }

        wp_send_json_success( $this->build_explorer_payload( $_REQUEST, true ) );
    }

    public function ajax_explorer_modules() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Yetkisiz istek.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'GÃ¼venlik doÄŸrulamasÄ± baÅŸarÄ±sÄ±z oldu.', 400 );
        }

        wp_send_json_success( $this->build_explorer_payload( $_REQUEST, false ) );
    }

    public function ajax_explorer_module_detail() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Yetkisiz istek.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'GÃ¼venlik doÄŸrulamasÄ± baÅŸarÄ±sÄ±z oldu.', 400 );
        }

        $slug   = sanitize_key( wp_unslash( $_REQUEST['slug'] ?? '' ) );
        $module = HC_Module_Inventory::get_module_detail( $slug );

        if ( ! $module ) {
            wp_send_json_error( 'ModÃ¼l bulunamadÄ±.', 404 );
        }

        wp_send_json_success(
            [
                'module'    => $module,
                'favorites' => $this->get_favorite_slugs(),
                'recent'    => $this->track_recent_slug( $slug ),
            ]
        );
    }

    public function ajax_save_module_categories() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Yetkisiz istek.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'GÃ¼venlik doÄŸrulamasÄ± baÅŸarÄ±sÄ±z oldu.', 400 );
        }

        $assignments = (array) wp_unslash( $_POST['assignments'] ?? [] );

        foreach ( $assignments as $slug => $category ) {
            HC_Module_Inventory::save_module_category_assignment( $slug, $category );
        }

        wp_send_json_success( [ 'message' => 'Kategori deÄŸiÅŸiklikleri kaydedildi.' ] );
    }

    public function ajax_save_module_catalog_state() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Yetkisiz istek.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'GÃ¼venlik doÄŸrulamasÄ± baÅŸarÄ±sÄ±z oldu.', 400 );
        }

        HC_Module_Inventory::save_catalog_settings( $_POST );

        wp_send_json_success( [ 'message' => 'ModÃ¼l kataloÄŸu gÃ¼ncellendi.' ] );
    }

    public function ajax_fix_shortcode_mismatch() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Yetkisiz istek.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'Güvenlik doğrulaması başarısız oldu.', 400 );
        }

        $slug    = sanitize_key( wp_unslash( $_POST['slug'] ?? '' ) );
        $post_id = (int) ( $_POST['post_id'] ?? 0 );
        $module  = $this->get_module_by_slug( $slug );

        if ( ! $module ) {
            wp_send_json_error( 'Modül bulunamadı.', 404 );
        }

        if ( ! $post_id ) {
            $post_id = (int) ( $module['matched_post_id'] ?? 0 );
        }

        if ( ! $post_id || $post_id !== (int) ( $module['matched_post_id'] ?? 0 ) ) {
            wp_send_json_error( 'Düzeltilecek post doğrulanamadı.', 400 );
        }

        $post = get_post( $post_id );

        if ( ! $post || 'post' !== $post->post_type || sanitize_title( $post->post_name ) !== sanitize_title( $slug ) ) {
            wp_send_json_error( 'Post kaydı doğrulanamadı.', 400 );
        }

        preg_match_all( '/\[hc_[a-zA-Z0-9_\-]+[^\]]*\]/u', (string) $post->post_content, $matches );
        $raw_shortcodes = array_values( array_unique( $matches[0] ?? [] ) );

        if ( count( $raw_shortcodes ) > 1 ) {
            wp_send_json_error( 'Birden fazla shortcode bulundu; manuel kontrol gerekli.', 400 );
        }

        if ( 0 === count( $raw_shortcodes ) ) {
            wp_send_json_error( 'Düzeltilecek shortcode bulunamadı.', 400 );
        }

        $replacement = (string) ( $module['expected_shortcode'] ?? $module['shortcode'] ?? '' );

        if ( ! $replacement ) {
            wp_send_json_error( 'Beklenen shortcode belirlenemedi.', 400 );
        }

        $current_shortcode = HC_Module_Inventory::extract_hc_shortcodes_from_content( (string) $post->post_content );

        if ( 1 === count( $current_shortcode ) && $current_shortcode[0] === $replacement ) {
            wp_send_json_success(
                [
                    'post_id'   => $post_id,
                    'edit_url'  => get_edit_post_link( $post_id, '' ),
                    'shortcode' => $replacement,
                    'message'   => 'Shortcode zaten doğru görünüyor.',
                ]
            );
        }

        $backup_key  = '_hc_shortcode_fix_backup_' . time();
        $new_content = preg_replace( '/' . preg_quote( $raw_shortcodes[0], '/' ) . '/u', $replacement, (string) $post->post_content, 1 );

        if ( null === $new_content ) {
            wp_send_json_error( 'Shortcode değiştirilemedi.', 500 );
        }

        update_post_meta( $post_id, $backup_key, (string) $post->post_content );

        $updated = wp_update_post(
            [
                'ID'           => $post_id,
                'post_content' => $new_content,
            ],
            true
        );

        if ( is_wp_error( $updated ) ) {
            wp_send_json_error( $updated->get_error_message(), 500 );
        }

        clean_post_cache( $post_id );
        HC_Module_Inventory::invalidate_caches();

        wp_send_json_success(
            [
                'post_id'   => $post_id,
                'edit_url'  => get_edit_post_link( $post_id, '' ),
                'shortcode' => $replacement,
                'message'   => 'Shortcode başarıyla düzeltildi.',
            ]
        );
    }

    public function ajax_toggle_module_favorite() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Yetkisiz istek.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'GÃ¼venlik doÄŸrulamasÄ± baÅŸarÄ±sÄ±z oldu.', 400 );
        }

        $slug      = sanitize_key( wp_unslash( $_POST['slug'] ?? '' ) );
        $favorites = $this->get_favorite_slugs();

        if ( in_array( $slug, $favorites, true ) ) {
            $favorites = array_values( array_diff( $favorites, [ $slug ] ) );
            $active    = false;
        } else {
            $favorites[] = $slug;
            $favorites   = array_values( array_unique( $favorites ) );
            $active      = true;
        }

        $this->save_favorite_slugs( $favorites );

        wp_send_json_success( [ 'slug' => $slug, 'active' => $active, 'favorites' => $favorites ] );
    }

    public function ajax_track_recent_module() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( 'Yetkisiz istek.', 403 );
        }

        if ( ! check_ajax_referer( 'hc_ajax_nonce', 'nonce', false ) ) {
            wp_send_json_error( 'GÃ¼venlik doÄŸrulamasÄ± baÅŸarÄ±sÄ±z oldu.', 400 );
        }

        $slug = sanitize_key( wp_unslash( $_POST['slug'] ?? '' ) );

        wp_send_json_success( [ 'recent' => $this->track_recent_slug( $slug ) ] );
    }

    private function render_modules_tab() {
        $args  = $this->get_explorer_args( $_GET );
        $nonce = wp_create_nonce( 'hc_ajax_nonce' );
        ?>
        <?php if ( isset( $_GET['modules_saved'] ) ) : ?>
            <div class="notice notice-success is-dismissible"><p>Modül kataloğu güncellendi.</p></div>
        <?php endif; ?>

        <div class="hc-card hc-catalog-intro">
            <div class="hc-card-head">
                <div>
                    <span class="hc-toolbar-kicker">Explorer UI</span>
                    <h2>Modül yönetimi artık arama ve sayfalama odaklı çalışıyor</h2>
                    <p class="hc-card-copy">İlk yüklemede sadece özet veriler ve ilk sayfa getirilir. Detaylar, kategori ağacı ve görünüm geçişleri AJAX ile artımlı yüklenir.</p>
                </div>
                <button type="button" class="button hc-button-ghost" data-hc-toggle-categories>Kategorileri Yönet</button>
            </div>
        </div>

        <div class="hc-card hc-category-manager-card" style="display:none;" id="hc-category-manager">
            <div class="hc-card-head">
                <div>
                    <h2>Kategori Yönetimi</h2>
                    <p class="hc-card-copy">Listeyi bozmadan kategori sözlüğünü burada düzenleyebilirsiniz.</p>
                </div>
                <button type="button" class="button button-primary" id="hc-explorer-save-categories">Kategori Değişikliklerini Kaydet</button>
            </div>
            <div class="hc-toolbar">
                <textarea id="hc-categories" rows="4" class="large-text" placeholder="Her satıra bir kategori yazın."></textarea>
                <div class="hc-category-add-row">
                    <input type="text" id="hc-new-category" class="regular-text" placeholder="Yeni kategori adı" />
                    <button type="button" class="button" id="hc-add-category-btn">Hızlı Ekle</button>
                </div>
            </div>
            <div class="hc-inline-status" id="hc-explorer-category-status" aria-live="polite"></div>
        </div>

        <div
            class="hc-explorer-shell"
            id="hc-explorer"
            data-hc-explorer
            data-nonce="<?php echo esc_attr( $nonce ); ?>"
            data-search="<?php echo esc_attr( $args['search'] ); ?>"
            data-category="<?php echo esc_attr( $args['category'] ); ?>"
            data-post-status="<?php echo esc_attr( $args['post_status'] ); ?>"
            data-collection="<?php echo esc_attr( $args['collection'] ); ?>"
            data-sort-by="<?php echo esc_attr( $args['sort_by'] ); ?>"
            data-sort-dir="<?php echo esc_attr( $args['sort_dir'] ); ?>"
            data-page="<?php echo esc_attr( $args['page'] ); ?>"
            data-per-page="<?php echo esc_attr( $args['per_page'] ); ?>"
            data-view="<?php echo esc_attr( $args['view'] ); ?>"
        >
            <div class="hc-stats-grid hc-stats-grid-skeleton" id="hc-explorer-stats">
                <?php for ( $i = 0; $i < 5; $i++ ) : ?>
                    <div class="hc-stat-card hc-skeleton-card">
                        <span class="hc-skeleton-line is-short"></span>
                        <span class="hc-skeleton-line is-large"></span>
                        <span class="hc-skeleton-line is-medium"></span>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="hc-explorer-layout">
                <button type="button" class="hc-sidebar-toggle" id="hc-sidebar-toggle" aria-label="Kenar çubuğunu aç/kapat">&#8249;</button>
                <aside class="hc-explorer-sidebar" aria-label="Modül gezgini kenar çubuğu">
                    <div class="hc-explorer-panel">
                        <div class="hc-explorer-panel-head"><h3>Akıllı Koleksiyonlar</h3></div>
                        <div id="hc-explorer-collections" class="hc-explorer-list hc-skeleton-block"></div>
                    </div>
                    <div class="hc-explorer-panel">
                        <div class="hc-explorer-panel-head"><h3>Kategori Ağacı</h3></div>
                        <div id="hc-explorer-categories" class="hc-explorer-tree hc-skeleton-block"></div>
                    </div>
                </aside>

                <section class="hc-explorer-main">
                    <div class="hc-explorer-toolbar">
                        <div class="hc-explorer-search">
                            <label class="screen-reader-text" for="hc-explorer-search-input">Modül ara</label>
                            <input type="search" id="hc-explorer-search-input" placeholder="Modül adı, shortcode, açıklama veya slug ara..." value="<?php echo esc_attr( $args['search'] ); ?>" />
                        </div>
                        <div class="hc-explorer-filters">
                            <select id="hc-explorer-status-filter">
                                <option value="">Tüm durumlar</option>
                                <option value="used" <?php selected( $args['post_status'], 'used' ); ?>>Kullanılanlar</option>
                                <option value="unused" <?php selected( $args['post_status'], 'unused' ); ?>>Kullanılmayanlar</option>
                                <option value="duplicates" <?php selected( $args['post_status'], 'duplicates' ); ?>>Mükerrerler</option>
                            </select>
                            <select id="hc-explorer-sort-by">
                                <option value="updated" <?php selected( $args['sort_by'], 'updated' ); ?>>Güncellenme</option>
                                <option value="name" <?php selected( $args['sort_by'], 'name' ); ?>>Ad</option>
                                <option value="category" <?php selected( $args['sort_by'], 'category' ); ?>>Kategori</option>
                                <option value="usage" <?php selected( $args['sort_by'], 'usage' ); ?>>Kullanım</option>
                                <option value="shortcode" <?php selected( $args['sort_by'], 'shortcode' ); ?>>Shortcode</option>
                            </select>
                            <button type="button" class="button hc-button-ghost" id="hc-explorer-sort-dir" data-direction="<?php echo esc_attr( $args['sort_dir'] ); ?>">
                                <?php echo 'asc' === $args['sort_dir'] ? 'A-Z / Eski-Yeni' : 'Z-A / Yeni-Eski'; ?>
                            </button>
                        </div>
                    </div>

                    <div class="hc-explorer-bulkbar" id="hc-explorer-bulkbar" hidden>
                        <span id="hc-explorer-selection-count">0 modül seçildi</span>
                        <select id="hc-explorer-bulk-category">
                            <option value="">Toplu kategori ata</option>
                        </select>
                        <button type="button" class="button button-primary" id="hc-explorer-bulk-apply">Seçilenlere uygula</button>
                        <button type="button" class="button" id="hc-explorer-bulk-draft">Taslak oluştur</button>
                    </div>

                    <div class="hc-explorer-surface">
                        <div class="hc-explorer-surface-head">
                            <div>
                                <h3 id="hc-explorer-list-title">Aktif Modüller</h3>
                                <p id="hc-explorer-list-meta">İlk sayfa yükleniyor...</p>
                            </div>
                            <div class="hc-inline-status" id="hc-explorer-status" aria-live="polite"></div>
                        </div>

                        <div class="hc-explorer-table-wrap" id="hc-explorer-table-wrap">
                            <table class="wp-list-table widefat striped hc-modules-table hc-explorer-table">
                                <thead>
                                    <tr>
                                        <th class="hc-cell-check"><input type="checkbox" id="hc-explorer-select-all" /></th>
                                        <th>Module Name</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Shortcode</th>
                                        <th>AI Enabled</th>
                                        <th>Usage Stats</th>
                                        <th>Updated Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="hc-explorer-table-body">
                                    <tr class="hc-skeleton-row"><td colspan="9"><div class="hc-skeleton-table"></div></td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="hc-explorer-gallery" id="hc-explorer-gallery" hidden></div>

                        <div class="hc-explorer-pagination" id="hc-explorer-pagination">
                            <button type="button" class="button" id="hc-explorer-prev">Önceki</button>
                            <span id="hc-explorer-page-label">Sayfa 1 / 1</span>
                            <button type="button" class="button" id="hc-explorer-next">Sonraki</button>
                        </div>
                    </div>
                </section>

                <aside class="hc-explorer-drawer" id="hc-explorer-drawer" aria-label="Modül detay paneli">
                    <div class="hc-explorer-drawer-empty">
                        <span class="dashicons dashicons-index-card"></span>
                        <h3>Detay paneli</h3>
                        <p>Bir modül seçtiğinizde açıklama, kullanım, shortcode ve hızlı aksiyonlar burada açılır.</p>
                    </div>
                </aside>
            </div>
        </div>

        <div class="hc-preview-modal" id="hc-preview-modal" hidden aria-hidden="true">
            <div class="hc-preview-backdrop" data-hc-preview-close></div>
            <div class="hc-preview-dialog" role="dialog" aria-modal="true" aria-labelledby="hc-preview-title">
                <div class="hc-preview-header">
                    <div>
                        <span class="hc-toolbar-kicker">Canlı shortcode</span>
                        <h2 id="hc-preview-title">Modül Önizleme</h2>
                        <button type="button" class="hc-shortcode-chip hc-preview-shortcode" data-hc-copy-shortcode data-shortcode="">
                            <span class="dashicons dashicons-shortcode" aria-hidden="true"></span>
                            <code id="hc-preview-shortcode-text"></code>
                        </button>
                    </div>
                    <button type="button" class="button hc-icon-button" data-hc-preview-close aria-label="Önizlemeyi kapat">
                        <span class="dashicons dashicons-no-alt" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="hc-preview-toolbar" aria-label="Önizleme araçları">
                    <div class="hc-preview-device-toggle" role="group" aria-label="Önizleme genişliği">
                        <button type="button" class="is-active" data-hc-preview-size="desktop">Masaüstü</button>
                        <button type="button" data-hc-preview-size="mobile">Mobil</button>
                    </div>
                    <div class="hc-preview-actions">
                        <button type="button" class="button" data-hc-modal-copy>Shortcode Kopyala</button>
                        <a class="button" id="hc-preview-standalone" href="#" target="_blank" rel="noopener">Bağımsız Aç</a>
                        <button type="button" class="button button-primary" id="hc-preview-insert">Taslak oluştur</button>
                    </div>
                </div>
                <div class="hc-preview-body">
                    <div class="hc-preview-frame" data-preview-size="desktop">
                        <div class="hc-preview-loading" id="hc-preview-loading" aria-live="polite">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="hc-preview-content" id="hc-preview-content"></div>
                    </div>
                </div>
                <div class="hc-preview-status" id="hc-preview-status" role="status" aria-live="polite"></div>
            </div>
        </div>
        <?php
        return;

        $search            = sanitize_text_field( wp_unslash( $_GET['s'] ?? '' ) );
        $selected_category = sanitize_text_field( wp_unslash( $_GET['module_category'] ?? '' ) );
        $post_status       = sanitize_text_field( wp_unslash( $_GET['post_status'] ?? '' ) );
        $modules           = HC_Module_Inventory::get_modules( [ 'search' => $search, 'category' => $selected_category, 'post_status' => $post_status ] );
        $all_modules       = HC_Module_Inventory::get_modules();
        $all_categories    = HC_Module_Inventory::get_all_categories();
        $nonce             = wp_create_nonce( 'hc_ajax_nonce' );
        $total_posts       = array_sum( wp_list_pluck( $all_modules, 'post_count' ) );
        $latest_post       = HC_Module_Inventory::get_dashboard_stats()['latest_post'] ?? null;
        $grouped_modules   = HC_Module_Inventory::group_modules_by_category( $modules );
        $duplicate_modules = array_values( array_filter( $all_modules, static fn( $module ) => (int) $module['post_count'] > 1 ) );
        $duplicate_extra_usage = array_sum(
            array_map(
                static fn( $module ) => max( 0, (int) $module['post_count'] - 1 ),
                $duplicate_modules
            )
        );
        ?>
        <?php if ( isset( $_GET['modules_saved'] ) ) : ?>
            <div class="notice notice-success is-dismissible"><p>Modül kataloğu güncellendi.</p></div>
        <?php endif; ?>

        <div class="hc-stats-grid">
            <div class="hc-stat-card">
                <span class="hc-stat-label">Toplam Modül</span>
                <strong class="hc-stat-value"><?php echo esc_html( count( $all_modules ) ); ?></strong>
                <span class="hc-stat-foot">Canlı katalog</span>
            </div>
            <div class="hc-stat-card">
                <span class="hc-stat-label">Kategori</span>
                <strong class="hc-stat-value"><?php echo esc_html( count( $all_categories ) ); ?></strong>
                <span class="hc-stat-foot">Filtrelenebilir yapı</span>
            </div>
            <div class="hc-stat-card">
                <span class="hc-stat-label">Toplam Kullanım</span>
                <strong class="hc-stat-value"><?php echo esc_html( $total_posts ); ?></strong>
                <span class="hc-stat-foot">Shortcode yerleşimi</span>
            </div>
            <div class="hc-stat-card">
                <span class="hc-stat-label">Mukerrer Kullanim</span>
                <strong class="hc-stat-value" style="color:var(--hc-secondary);"><?php echo esc_html( count( $duplicate_modules ) ); ?></strong>
                <span class="hc-stat-foot"><?php echo esc_html( $duplicate_extra_usage ); ?> ekstra yerlestim</span>
            </div>
            <div class="hc-stat-card">
                <span class="hc-stat-label">Son Eklenen</span>
                <strong class="hc-stat-value hc-stat-small"><?php echo esc_html( $latest_post['title'] ?? '-' ); ?></strong>
                <span class="hc-stat-foot"><?php echo esc_html( $latest_post['date'] ?? 'Yok' ); ?></span>
            </div>
        </div>

        <div class="hc-card" style="margin-bottom:20px;">
            <p style="margin:0; color:var(--hc-text-muted);">
                "Toplam Kullanim" tum yazi durumlarindaki shortcode sayisini gosterir. "Yazi Eklenmeyenler" hic kullanilmayan modulleri, "Mukerrer Kullanimlar" ise birden fazla yazida gecen modulleri listeler.
            </p>
        </div>

        <?php if ( ! empty( $duplicate_modules ) ) : ?>
            <div class="hc-card" style="margin-bottom:20px;">
                <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
                    <div>
                        <h2 style="margin:0 0 4px;">Mukerrer Kullanimlar</h2>
                        <p style="margin:0; color:var(--hc-text-muted);">
                            Ayni modulun birden fazla yazida gectigi yerleri buradan topluca gorebilirsiniz.
                        </p>
                    </div>
                    <a class="button" href="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite&post_status=duplicates' ) ); ?>">Sadece mukerrerleri filtrele</a>
                </div>
                <div class="hc-module-grid" style="margin-top:16px;">
                    <?php foreach ( array_slice( $duplicate_modules, 0, 12 ) as $module ) : ?>
                        <article class="hc-module-card hc-module-card-compact">
                            <div class="hc-module-card-top">
                                <span class="hc-category-badge"><?php echo esc_html( $module['category_child'] ?: $module['category_parent'] ?: 'Kategorisiz' ); ?></span>
                                <span class="hc-usage-badge is-used"><?php echo esc_html( $module['post_count'] . ' yazida' ); ?></span>
                            </div>
                            <div class="hc-module-card-main">
                                <h3><?php echo esc_html( $module['name'] ); ?></h3>
                                <p><?php echo esc_html( $module['shortcode'] ); ?></p>
                            </div>
                            <div class="hc-card-actions hc-card-actions-compact">
                                <a class="button" href="<?php echo esc_url( $module['posts_url'] ); ?>">
                                    <span class="dashicons dashicons-admin-post" aria-hidden="true"></span> Kullanimlari ac
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
                <?php if ( count( $duplicate_modules ) > 12 ) : ?>
                    <p style="margin:16px 0 0; color:var(--hc-text-muted);">
                        Ilk 12 modul gosteriliyor. Tum liste icin filtreyi kullanin.
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="hc-card" style="margin-bottom:20px;">
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:15px;">
                <h2 style="margin:0;">Modül Kataloğu</h2>
                <form method="get" class="hc-toolbar-form" style="margin:0;">
                    <input type="hidden" name="page" value="hesaplama-suite" />
                    <input type="search" name="s" value="<?php echo esc_attr( $search ); ?>" placeholder="Modül ara..." style="width:200px;" />
                    <select name="module_category">
                        <option value="">Tüm kategoriler</option>
                        <?php foreach ( $all_categories as $category ) : ?>
                            <option value="<?php echo esc_attr( $category ); ?>" <?php selected( $selected_category, $category ); ?>><?php echo esc_html( $category ); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="post_status">
                        <option value="">Kullanım Durumu</option>
                        <option value="used" <?php selected( $post_status, 'used' ); ?>>Yazı Eklenenler</option>
                        <option value="unused" <?php selected( $post_status, 'unused' ); ?>>Yazı Eklenmeyenler</option>
                    </select>
                    <button type="submit" class="button button-primary">Filtrele</button>
                    <a class="button" href="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite' ) ); ?>">Temizle</a>
                </form>
            </div>
        </div>

        <form method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite' ) ); ?>">
            <?php wp_nonce_field( 'hc_save_module_catalog' ); ?>
            <input type="hidden" name="hc_save_modules" value="1" />

            <div class="hc-card" style="display:none;" id="hc-category-manager">
                <h3>Kategori Yönetimi</h3>
                <div class="hc-toolbar">
                    <textarea id="hc-categories" name="hc_categories" rows="3" class="large-text" placeholder="Her satıra bir kategori yazın."><?php echo esc_textarea( HC_Module_Inventory::get_category_text() ); ?></textarea>
                    <div class="hc-category-add-row" style="margin-top:10px;">
                        <input type="text" id="hc-new-category" class="regular-text" placeholder="Yeni kategori adı" />
                        <button type="button" class="button" id="hc-add-category-btn">Hızlı Ekle</button>
                    </div>
                </div>
            </div>

            <div class="hc-card hc-catalog-shell">
                <div style="display:flex; justify-content:space-between; margin-bottom:15px; align-items:center;">
                    <h2 style="margin:0;">Aktif Modüller</h2>
                    <button type="button" class="button hc-button-ghost" data-hc-toggle-categories>Kategorileri Yönet</button>
                </div>
                
                <?php if ( empty( $modules ) ) : ?>
                    <div class="hc-empty-state">
                        <span class="dashicons dashicons-search" aria-hidden="true"></span>
                        <h3>Filtreye uygun modül bulunamadı</h3>
                        <p>Arama metnini veya kategori/kullanım filtresini değiştirerek tekrar deneyin.</p>
                        <a class="button button-primary" href="<?php echo esc_url( admin_url( 'admin.php?page=hesaplama-suite' ) ); ?>">Filtreleri Temizle</a>
                    </div>
                    <p>Filtreye uygun modül bulunamadı.</p>
                <?php else : ?>
                    <?php foreach ( $grouped_modules as $group_label => $group_modules ) : ?>
                    <section class="hc-module-group">
                        <div class="hc-module-group-header">
                            <div>
                                <h3><?php echo esc_html( $group_label ); ?></h3>
                                <p><?php echo esc_html( count( $group_modules ) ); ?> modül</p>
                            </div>
                        </div>
                    <div class="hc-module-grid">
                        <?php foreach ( $group_modules as $module ) : ?>
                            <?php
                            $is_used        = $module['post_count'] > 0;
                            $standalone_url = add_query_arg(
                                [
                                    'action'     => 'hc_preview_shortcode',
                                    'nonce'      => $nonce,
                                    'shortcode'  => $module['shortcode'],
                                    'standalone' => '1',
                                ],
                                admin_url( 'admin-ajax.php' )
                            );
                            ?>
                            <article class="hc-module-card hc-module-card-compact" data-module-card data-slug="<?php echo esc_attr( $module['slug'] ); ?>">
                                <div class="hc-module-card-top">
                                    <span class="hc-category-badge"><?php echo esc_html( $module['category_child'] ?: $group_label ); ?></span>
                                    <span class="hc-usage-badge <?php echo $is_used ? 'is-used' : 'is-unused'; ?>">
                                        <?php echo $is_used ? esc_html( 'Yazıda (' . $module['post_count'] . ')' ) : 'Eklenmedi'; ?>
                                    </span>
                                </div>
                                <div class="hc-module-card-main">
                                    <h3><?php echo esc_html( $module['name'] ); ?></h3>
                                    <p><?php echo esc_html( $module['desc'] ); ?></p>
                                </div>
                                <div class="hc-module-meta-grid">
                                    <div><span>Slug</span><code><?php echo esc_html( $module['slug'] ); ?></code></div>
                                    <div><span>Eklenme</span><strong><?php echo esc_html( $module['created_date'] ); ?></strong></div>
                                    <div><span>Yayıncı</span><strong><?php echo esc_html( $module['publisher'] ); ?></strong></div>
                                </div>
                                <button type="button" class="hc-shortcode-chip" data-hc-copy-shortcode data-shortcode="<?php echo esc_attr( $module['shortcode'] ); ?>">
                                    <span class="dashicons dashicons-shortcode" aria-hidden="true"></span>
                                    <code><?php echo esc_html( $module['shortcode'] ); ?></code>
                                </button>
                                <label class="hc-card-select-label">
                                    <span>Kategori</span>
                                    <select name="hc_module_category[<?php echo esc_attr( $module['slug'] ); ?>]" class="hc-category-select">
                                        <option value="">Seçiniz</option>
                                        <?php foreach ( $all_categories as $category ) : ?>
                                            <option value="<?php echo esc_attr( $category ); ?>" <?php selected( $module['category'], $category ); ?>><?php echo esc_html( $category ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>
                                <div class="hc-card-actions hc-card-actions-compact">
                                    <button type="button" class="button button-primary hc-preview-btn" data-hc-preview data-name="<?php echo esc_attr( $module['name'] ); ?>" data-shortcode="<?php echo esc_attr( $module['shortcode'] ); ?>" data-standalone-url="<?php echo esc_url( $standalone_url ); ?>">
                                        <span class="dashicons dashicons-visibility" aria-hidden="true"></span> Önizle
                                    </button>
                                    <button type="button" class="button hc-ai-category-btn" data-name="<?php echo esc_attr( $module['name'] ); ?>" data-desc="<?php echo esc_attr( $module['desc'] ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>">
                                        <span class="dashicons dashicons-category" aria-hidden="true"></span> AI ile kategori analizi
                                    </button>
                                    <button type="button" class="button hc-yazi-ekle-btn" data-name="<?php echo esc_attr( $module['name'] ); ?>" data-shortcode="<?php echo esc_attr( $module['shortcode'] ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>">
                                        <span class="dashicons dashicons-edit-page" aria-hidden="true"></span> Taslak oluştur
                                    </button>
                                    <a class="button hc-button-ghost" href="<?php echo esc_url( $module['posts_url'] ); ?>">
                                        <span class="dashicons dashicons-admin-post" aria-hidden="true"></span> Kullanımlar
                                    </a>
                                    <button type="button" class="button hc-button-danger" data-hc-delete-module data-slug="<?php echo esc_attr( $module['slug'] ); ?>" data-name="<?php echo esc_attr( $module['name'] ); ?>">
                                        <span class="dashicons dashicons-trash" aria-hidden="true"></span> Modülü sil
                                    </button>
                                    <span class="hc-yazi-ekle-msg"></span>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    </section>
                    <?php endforeach; ?>
                    <?php if ( false ) : ?>
                    <div class="hc-table-wrap" aria-hidden="true">
                        <table class="wp-list-table widefat striped hc-modules-table">
                            <thead>
                                <tr>
                                    <th style="width:20%">Modül Adı</th>
                                    <th style="width:15%">Kategori</th>
                                    <th style="width:15%">Shortcode</th>
                                    <th style="width:15%">Durum</th>
                                    <th style="width:20%">Açıklama</th>
                                    <th style="width:15%">İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $modules as $module ) : ?>
                                    <tr>
                                        <td>
                                            <strong style="display:block; font-size:14px; margin-bottom:4px;"><?php echo esc_html( $module['name'] ); ?></strong>
                                            <div class="hc-row-meta"><code><?php echo esc_html( $module['slug'] ); ?></code></div>
                                        </td>
                                        <td>
                                            <select name="hc_module_category[<?php echo esc_attr( $module['slug'] ); ?>]" class="hc-category-select" style="width:100%;">
                                                <option value="">Seçiniz</option>
                                                <?php foreach ( $all_categories as $category ) : ?>
                                                    <option value="<?php echo esc_attr( $category ); ?>" <?php selected( $module['category'], $category ); ?>><?php echo esc_html( $category ); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td><code class="hc-shortcode-code" style="cursor:pointer;" onclick="navigator.clipboard.writeText('<?php echo esc_attr( $module['shortcode'] ); ?>'); alert('Kopyalandı!');" title="Kopyalamak için tıkla"><?php echo esc_html( $module['shortcode'] ); ?></code></td>
                                        <td>
                                            <?php if ( $module['post_count'] > 0 ) : ?>
                                                <span class="hc-inline-badge" style="background:#4CAF50; color:#fff; font-size:11px;">Yazı Eklendi (<?php echo $module['post_count']; ?>)</span>
                                            <?php else : ?>
                                                <span class="hc-inline-badge" style="background:#f44336; color:#fff; font-size:11px;">Eklenmedi</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><div class="hc-module-desc"><?php echo esc_html( $module['desc'] ); ?></div></td>
                                        <td>
                                            <button type="button" class="button button-small hc-yazi-ekle-btn" data-name="<?php echo esc_attr( $module['name'] ); ?>" data-shortcode="<?php echo esc_attr( $module['shortcode'] ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>">Taslak oluştur</button>
                                            <span class="hc-yazi-ekle-msg" style="display:block;"></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                <p class="submit">
                    <button type="submit" name="hc_save_modules" class="button button-primary">Değişiklikleri Kaydet</button>
                </p>
            </div>
        </form>

        <div class="hc-preview-modal" id="hc-preview-modal" hidden aria-hidden="true">
            <div class="hc-preview-backdrop" data-hc-preview-close></div>
            <div class="hc-preview-dialog" role="dialog" aria-modal="true" aria-labelledby="hc-preview-title">
                <div class="hc-preview-header">
                    <div>
                        <span class="hc-toolbar-kicker">Canlı shortcode</span>
                        <h2 id="hc-preview-title">Modül Önizleme</h2>
                        <button type="button" class="hc-shortcode-chip hc-preview-shortcode" data-hc-copy-shortcode data-shortcode="">
                            <span class="dashicons dashicons-shortcode" aria-hidden="true"></span>
                            <code id="hc-preview-shortcode-text"></code>
                        </button>
                    </div>
                    <button type="button" class="button hc-icon-button" data-hc-preview-close aria-label="Önizlemeyi kapat">
                        <span class="dashicons dashicons-no-alt" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="hc-preview-toolbar" aria-label="Önizleme araçları">
                    <div class="hc-preview-device-toggle" role="group" aria-label="Önizleme genişliği">
                        <button type="button" class="is-active" data-hc-preview-size="desktop">Masaüstü</button>
                        <button type="button" data-hc-preview-size="mobile">Mobil</button>
                    </div>
                    <div class="hc-preview-actions">
                        <button type="button" class="button" data-hc-modal-copy>Shortcode Kopyala</button>
                        <a class="button" id="hc-preview-standalone" href="#" target="_blank" rel="noopener">Bağımsız Aç</a>
                        <button type="button" class="button button-primary" id="hc-preview-insert">Taslak oluştur</button>
                    </div>
                </div>
                <div class="hc-preview-body">
                    <div class="hc-preview-frame" data-preview-size="desktop">
                        <div class="hc-preview-loading" id="hc-preview-loading" aria-live="polite">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="hc-preview-content" id="hc-preview-content"></div>
                    </div>
                </div>
                <div class="hc-preview-status" id="hc-preview-status" role="status" aria-live="polite"></div>
            </div>
        </div>
        <?php
    }
}

