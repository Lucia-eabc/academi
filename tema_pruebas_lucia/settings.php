<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Settings configuration for admin setting section
 * @package    theme_tema_pruebas_lucia
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @author    LMSACE Dev Team
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if (is_siteadmin()) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingtema_pruebas_lucia', get_string('configtitle', 'theme_tema_pruebas_lucia'));
    $ADMIN->add('themes', new admin_category('theme_tema_pruebas_lucia', 'tema_pruebas_lucia'));

    /* Header Settings */
    $temp = new admin_settingpage('theme_tema_pruebas_lucia_header', get_string('headerheading', 'theme_tema_pruebas_lucia'));

    // Primary pattern color.
    $name = 'theme_tema_pruebas_lucia/primarycolor';
    $title = get_string('primarycolor', 'theme_tema_pruebas_lucia');
    $description = get_string('primarycolor_desc', 'theme_tema_pruebas_lucia');
    $default = "#88b77b";
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Secondary pattern color.
    $name = 'theme_tema_pruebas_lucia/secondarycolor';
    $title = get_string('secondarycolor', 'theme_tema_pruebas_lucia');
    $description = get_string('secondarycolor_desc', 'theme_tema_pruebas_lucia');
    $default = "#f60";
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);


    $name = 'theme_tema_pruebas_lucia/themestyleheader';
    $title = get_string('themestyleheader', 'theme_tema_pruebas_lucia');
    $description = get_string('themestyleheader_desc', 'theme_tema_pruebas_lucia');
    $default = '1';
    $choices = array(
        1 => get_string('themebased', 'theme_tema_pruebas_lucia'),
        0 => get_string('moodlebased', 'theme_tema_pruebas_lucia'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $temp->add($setting);

    // Logo file setting.
    $name = 'theme_tema_pruebas_lucia/logo';
    $title = get_string('logo', 'theme_tema_pruebas_lucia');
    $description = get_string('logodesc', 'theme_tema_pruebas_lucia');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Custom CSS file.
    $name = 'theme_tema_pruebas_lucia/customcss';
    $title = get_string('customcss', 'theme_tema_pruebas_lucia');
    $description = get_string('customcssdesc', 'theme_tema_pruebas_lucia');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    $settings->add($temp);

    /* Slideshow Settings Start */
    $temp = new admin_settingpage('theme_tema_pruebas_lucia_slideshow', get_string('slideshowheading', 'theme_tema_pruebas_lucia'));
    $temp->add(new admin_setting_heading('theme_tema_pruebas_lucia_slideshow', get_string('slideshowheadingsub', 'theme_tema_pruebas_lucia'),
    format_text(get_string('slideshowdesc', 'theme_tema_pruebas_lucia'), FORMAT_MARKDOWN)));

    // Display Slideshow.
    $name = 'theme_tema_pruebas_lucia/toggleslideshow';
    $title = get_string('toggleslideshow', 'theme_tema_pruebas_lucia');
    $description = get_string('toggleslideshowdesc', 'theme_tema_pruebas_lucia');
    $yes = get_string('yes');
    $no = get_string('no');
    $default = 1;
    $choices = array(1 => $yes , 0 => $no);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $temp->add($setting);

    // Number of slides.
    $name = 'theme_tema_pruebas_lucia/numberofslides';
    $title = get_string('numberofslides', 'theme_tema_pruebas_lucia');
    $description = get_string('numberofslides_desc', 'theme_tema_pruebas_lucia');
    $default = 3;
    $choices = array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
    );
    $temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    // Slideshow settings.
    $numberofslides = get_config('theme_tema_pruebas_lucia', 'numberofslides');
    for ($i = 1; $i <= $numberofslides; $i++) {

        // This is the descriptor for Slide One.
        $name = 'theme_tema_pruebas_lucia/slide' . $i . 'info';
        $heading = get_string('slideno', 'theme_tema_pruebas_lucia', array('slide' => $i));
        $information = get_string('slidenodesc', 'theme_tema_pruebas_lucia', array('slide' => $i));
        $setting = new admin_setting_heading($name, $heading, $information);
        $temp->add($setting);

        // Slide Image.
        $name = 'theme_tema_pruebas_lucia/slide' . $i . 'image';
        $title = get_string('slideimage', 'theme_tema_pruebas_lucia');
        $description = get_string('slideimagedesc', 'theme_tema_pruebas_lucia');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide' . $i . 'image');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Slide Caption.
        $name = 'theme_tema_pruebas_lucia/slide' . $i . 'caption';
        $title = get_string('slidecaption', 'theme_tema_pruebas_lucia');
        $description = get_string('slidecaptiondesc', 'theme_tema_pruebas_lucia');
        $default = get_string('slidecaptiondefault', 'theme_tema_pruebas_lucia', array('slideno' => sprintf('%02d', $i) ));
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $temp->add($setting);

        // Slide Description Text.
        $name = 'theme_tema_pruebas_lucia/slide' . $i . 'desc';
        $title = get_string('slidedesc', 'theme_tema_pruebas_lucia');
        $description = get_string('slidedesctext', 'theme_tema_pruebas_lucia');
        $default = get_string('slidedescdefault', 'theme_tema_pruebas_lucia');
        $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
        $temp->add($setting);
    }
    $settings->add($temp);

    /* Slideshow Settings End*/

    /* Footer Settings start */
    $temp = new admin_settingpage('theme_tema_pruebas_lucia_footer', get_string('footerheading', 'theme_tema_pruebas_lucia'));

    /* Enable and Disable footer logo */
    $name = 'theme_tema_pruebas_lucia/footlogo';
    $title = get_string('enable', 'theme_tema_pruebas_lucia');
    $description = '';
    $default = '1';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    /* Footer Content */
    $name = 'theme_tema_pruebas_lucia/footnote';
    $title = get_string('footnote', 'theme_tema_pruebas_lucia');
    $description = get_string('footnotedesc', 'theme_tema_pruebas_lucia');
    $default = get_string('footnotedefault', 'theme_tema_pruebas_lucia');
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // INFO Link.
    $name = 'theme_tema_pruebas_lucia/infolink';
    $title = get_string('infolink', 'theme_tema_pruebas_lucia');
    $description = get_string('infolink_desc', 'theme_tema_pruebas_lucia');
    $default = get_string('infolinkdefault', 'theme_tema_pruebas_lucia');
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $temp->add($setting);

    // Copyright.
    $name = 'theme_tema_pruebas_lucia/copyright_footer';
    $title = get_string('copyright_footer', 'theme_tema_pruebas_lucia');
    $description = '';
    $default = get_string('copyright_default', 'theme_tema_pruebas_lucia');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    /* Address , Email , Phone No */
    $name = 'theme_tema_pruebas_lucia/address';
    $title = get_string('address', 'theme_tema_pruebas_lucia');
    $description = '';
    $default = get_string('defaultaddress', 'theme_tema_pruebas_lucia');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_tema_pruebas_lucia/emailid';
    $title = get_string('emailid', 'theme_tema_pruebas_lucia');
    $description = '';
    $default = get_string('defaultemailid', 'theme_tema_pruebas_lucia');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_tema_pruebas_lucia/phoneno';
    $title = get_string('phoneno', 'theme_tema_pruebas_lucia');
    $description = '';
    $default = get_string('defaultphoneno', 'theme_tema_pruebas_lucia');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    /* Facebook, Pinterest, Twitter, Google+ Settings */
    $name = 'theme_tema_pruebas_lucia/fburl';
    $title = get_string('fburl', 'theme_tema_pruebas_lucia');
    $description = get_string('fburldesc', 'theme_tema_pruebas_lucia');
    $default = get_string('fburl_default', 'theme_tema_pruebas_lucia');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_tema_pruebas_lucia/pinurl';
    $title = get_string('pinurl', 'theme_tema_pruebas_lucia');
    $description = get_string('pinurldesc', 'theme_tema_pruebas_lucia');
    $default = get_string('pinurl_default', 'theme_tema_pruebas_lucia');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_tema_pruebas_lucia/twurl';
    $title = get_string('twurl', 'theme_tema_pruebas_lucia');
    $description = get_string('twurldesc', 'theme_tema_pruebas_lucia');
    $default = get_string('twurl_default', 'theme_tema_pruebas_lucia');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_tema_pruebas_lucia/gpurl';
    $title = get_string('gpurl', 'theme_tema_pruebas_lucia');
    $description = get_string('gpurldesc', 'theme_tema_pruebas_lucia');
    $default = get_string('gpurl_default', 'theme_tema_pruebas_lucia');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $settings->add($temp);
     /*  Footer Settings end */
}
