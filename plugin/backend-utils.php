<?php

namespace Plugin\PixobeDesigner;

use Plugin\PixobeDesigner\Constants;

class PixobeBackendHandler
{
    private static $instance; // Static property to hold the single instance
    private $pixobe_api_endpoint;
    private $app_name;
    private $option_prefix;

    // Private constructor to prevent external instantiation
    private function __construct()
    {
        $this->pixobe_api_endpoint = Constants::PIXOBE_API_ENDPOINT;
        $this->app_name = Constants::APP_NAME;
        $this->option_prefix = Constants::OPTION_PREFIX;
    }

    // Method to get the single instance of the class
    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Method to call backend API on plugin activation
    public function activate()
    {
        $site_url = parse_url(get_home_url(), PHP_URL_HOST);
        $payload = json_encode(array(
            'site_url' => $site_url,
            'app_name' => $this->app_name,
            'app_version' => PIXOBE_DESIGNER_VERSION,
            'platform' => 'wordpress'
        ));
        $args = array(
            'method' => 'POST',
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
            'body' => $payload,
        );
        $response = wp_remote_post("{$this->pixobe_api_endpoint}/subscriber", $args);
        if (is_wp_error($response)) {
            error_log('Error calling API: ' . $response->get_error_message());
        } else {
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body, true);
            $this->update_settings($data);
        }
    }

    // Method to handle deactivation
    public function deactivate()
    {
        $options = ['nonce', 'site_id', 'plan', 'message', 'expiry_date'];
        foreach ($options as $option) {
            delete_option("{$this->option_prefix}_$option");
        }
    }

    // Method to get free trial
    public function activate_trial()
    {
        delete_option("{$this->option_prefix}_nonce");
        $site_id = $this->get_site_id();
        if (empty($site_id)) {
            return;
        }
        $args = array(
            'headers' => array(
                'x-pixobe-site-id' => $site_id,
            ),
        );
        $response = wp_remote_post("{$this->pixobe_api_endpoint}/trial", $args);
        if (is_wp_error($response)) {
            error_log('Error calling API: ' . $response->get_error_message());
            return "Unable to activate, please try again later";
        } else {
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body, true);
            if (isset($data['success']) && $data['success'] && isset($data['site_id'])) {
                $this->update_settings($data);
            }
        }
    }

    // Method to get nonce
    public function get_nonce($refresh = false)
    {
        $nonce = false;
        if ($refresh != true) {
            $nonce = get_option("{$this->option_prefix}_nonce", array());
        }
        if ($nonce !== false && !empty($nonce)) {
            return $nonce;
        } else {
            return $this->update_nonce();
        }
    }

    // Method to fetch and store nonce
    private function update_nonce()
    {
        $site_id = $this->get_site_id();

        if (empty($site_id)) {
            return;
        }

        $args = array(
            'headers' => array(
                'x-pixobe-site-id' => $site_id,
            ),
        );

        $endpoint = "{$this->pixobe_api_endpoint}/nonce?version=" . PIXOBE_DESIGNER_VERSION;
        $response = wp_remote_get($endpoint, $args);

        if (!is_wp_error($response)) {
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body, true);
            $this->update_settings($data);
            if (isset($data['nonce'])) {
                return $data['nonce'];
            }
            return "";
        }
    }

    // Method to update site data
    private function update_settings($data)
    {
        $fields = ['nonce', 'site_id', 'plan', 'message', 'expiry_date'];
        foreach ($fields as $field) {
            if (isset($data[$field])) {
                update_option("{$this->option_prefix}_$field", $data[$field]);
            }
        }
    }

    private function get_site_id()
    {
        return  get_option("{$this->option_prefix}_site_id");
    }
}
