<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function pmue_pmxe_template_header() {

    if (!class_exists('XmlExportUser', false) || !XmlExportUser::$is_active) return;

    // The free edition of WP All Export renders its own upgrade notices for user exports.
    if (!defined('PMXE_EDITION') || PMXE_EDITION !== 'paid') return;

    if (!class_exists('\Pmue\Pro\CombineFields') && apply_filters('pmue_is_show_pro_notice', true, 'combine_fields')) {
        ?>
        <div class="wpallexport-free-edition-notice" id="pmue_combine_fields_notice" style="margin: 15px 0; display: none;">
            <a class="upgrade_link" target="_blank"
               href="<?php echo esc_url('https://www.wpallimport.com/portal/discounts/?utm_source=user-export-free&utm_medium=upgrade-notice&utm_campaign=combine-fields'); ?>">Purchase
                the User Export Add-On Pro to Export Combined Fields</a>
        </div>
        <script type="text/javascript">
            jQuery(function ($) {
                var notice = $('#pmue_combine_fields_notice');
                notice.prependTo('#combine_multiple_fields_value_container');
                var syncCombineLock = function () {
                    if ($('input[name="combine_multiple_fields"]:checked').val() == '1') {
                        notice.show();
                        $('.wp-all-export-edit-column-buttons .save_action').attr('disabled', 'disabled');
                    } else {
                        notice.hide();
                        $('.wp-all-export-edit-column-buttons .save_action').removeAttr('disabled');
                    }
                };
                var deferredSync = function () {
                    setTimeout(syncCombineLock, 0);
                };
                $('input[name="combine_multiple_fields"]').on('change click', syncCombineLock);
                // Core sets the combine mode programmatically (no events) when the
                // editor opens, so re-sync after every open and close path.
                $(document).on('click', '#columns .custom_column', deferredSync);
                $(document).on('click', 'input.add_column', deferredSync);
                $(document).on('click', '.wp-all-export-edit-column-buttons .save_action, .wp-all-export-edit-column-buttons .close_action, .wp-all-export-edit-column-buttons .delete_action', deferredSync);
            });
        </script>
        <?php
    }
}
