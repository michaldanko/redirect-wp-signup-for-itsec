<?php

    /*
    Plugin Name:  Redirect WordPress Sign-up for Ithemes Security
    Plugin URI:   https://github.com/michaldanko/redirect-wp-signup-for-itsec
    Description:  This plugin redirects WordPress Sign-up to homepage if is activated "Hide Backend" module in iThemes Security settings.
    Version:      1.0
    Author:       md
    Author URI:   https://michaldanko.com/
    License:      GPL2
    License URI:  https://www.gnu.org/licenses/gpl-2.0.html
    Text Domain:  redirect-wp-signup-for-itsec

    Redirect WordPress Sign-up for Ithemes Security is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.

    Redirect WordPress Sign-up for Ithemes Security is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Redirect WordPress Sign-up for Ithemes Security. If not, see {License URI}.
    */

    // Security
    defined( 'ABSPATH' ) or die();


    /**
     * Check if are iThemes Security and module "Hide Backend" activated.
     */
    if ( class_exists('ITSEC_Modules')
        && ITSEC_Modules::is_always_active('hide-backend') === true
        && ! function_exists('dwpsuitsec_force_redirect_register_url')
    ) {

        /**
         * Redirect WordPress sign-up to homepage
         */
        function dwpsuitsec_force_redirect_register_url( $register_url )
        {
            // Return homepage url
            return home_url('/');
        }
        add_filter( 'register_url', 'dwpsuitsec_force_redirect_register_url' );

    }
