<?php
/**
 * Load wallery template
 */
function wallery_load_template($template, $data = array())
{
    $template = sprintf('%s/templates/%s.php', WALLERY_ABSPATH, $template);
    if (file_exists($template)) {
        extract($data);
        require $template;
    }
}

/**
 * Get the Wallery asset URL by file name
 *
 * @param   string $path  The Wallery asset path
 *
 * @return  string         Full URL of Wallery asset
 */
function wallery_asset_url($path = '')
{
    $path = sprintf(
        '%s/assets/%s',
        str_replace(ABSPATH, '', WALLERY_ABSPATH),
        $path
    );
    return site_url($path);
}
