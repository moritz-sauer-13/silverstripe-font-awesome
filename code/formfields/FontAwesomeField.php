<?php

namespace SilverStripe\FontAwesome;

use SilverStripe\Forms\TextField;
use SilverStripe\View\Requirements;

/**
 * Class FontAwesomeField
 */
class FontAwesomeField extends TextField
{
    private static $version = '5.0.8';

    /**
     * @return string
     */
    public function Type()
    {
        return 'text';
    }

    /**
     * @param array $properties
     *
     * @return mixed
     */
    public function Field($properties = array())
    {
        $this->addExtraClass('form-control icp icp-auto');

        // Libraries
        Requirements::css('https://use.fontawesome.com/releases/v5.0.8/css/all.css');
        Requirements::css(FONT_AWESOME_DIR . '/client/dist/css/lib/fontawesome-iconpicker.min.css');
        Requirements::javascript(FONT_AWESOME_DIR . '/client/dist/js/lib/fontawesome-iconpicker.min.js');

        // Module
        Requirements::css(FONT_AWESOME_DIR . '/client/dist/css/font-awesome-module.css');
        Requirements::javascript(FONT_AWESOME_DIR . '/client/dist/js/font-awesome-module.js');

        Requirements::set_force_js_to_bottom(true);

        return parent::Field($properties);
    }

    /**
     * @param $validator
     *
     * @return bool
     */
    public function validate($validator)
    {
        if (!empty($this->value) && !preg_match('/^fas fa-[a-z0-9]+/', $this->value)) {
            $validator->validationError(
                $this->name,
                'Please enter a valid Font Awesome font name format.',
                'validation',
                false
            );

            return false;
        }

        return true;
    }
}
