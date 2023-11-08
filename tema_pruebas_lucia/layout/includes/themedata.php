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
 * Theme layout data
 * @package    theme_tema_pruebas_lucia
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @author    LMSACE Dev Team
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$logourl = get_logo_url();
$phoneno = theme_tema_pruebas_lucia_get_setting('phoneno');
$emailid = theme_tema_pruebas_lucia_get_setting('emailid');
$scallus = get_string('callus', 'theme_tema_pruebas_lucia');
$semail = get_string('email', 'theme_tema_pruebas_lucia');
$themestyleheader = theme_tema_pruebas_lucia_get_setting('themestyleheader');
// Footer Content.
$logourl = get_logo_url();
$footlogo = theme_tema_pruebas_lucia_get_setting('footlogo');
$footlogo = (!$footlogo) ? 0 : 1;
$footnote = theme_tema_pruebas_lucia_get_setting('footnote', 'format_html');
$fburl = theme_tema_pruebas_lucia_get_setting('fburl');
$pinurl = theme_tema_pruebas_lucia_get_setting('pinurl');
$twurl = theme_tema_pruebas_lucia_get_setting('twurl');
$gpurl = theme_tema_pruebas_lucia_get_setting('gpurl');
$address = theme_tema_pruebas_lucia_get_setting('address');
$emailid = theme_tema_pruebas_lucia_get_setting('emailid');
$phoneno = theme_tema_pruebas_lucia_get_setting('phoneno');
$copyrightfooter = theme_tema_pruebas_lucia_get_setting('copyright_footer', 'format_html');
$infolink = theme_tema_pruebas_lucia_get_setting('infolink');
$infolink = theme_tema_pruebas_lucia_infolink();

$custommenu = $OUTPUT->custom_menu();
if ($custommenu == "") {
    $navbarclass = "navbar-toggler d-lg-none nocontent-navbar";
} else {
    $navbarclass = "navbar-toggler d-lg-none";
}

$sinfo = get_string('info', 'theme_tema_pruebas_lucia');
$scontactus = get_string('contact_us', 'theme_tema_pruebas_lucia');
$phone = get_string('phone', 'theme_tema_pruebas_lucia');
$email = get_string('email', 'theme_tema_pruebas_lucia');
$sfollowus = get_string('followus', 'theme_tema_pruebas_lucia');

$url = ($fburl != '' || $pinurl != '' || $twurl != '' || $gpurl != '') ? 1 : 0;
$block3 = ($address != '' || $phoneno != '' || $emailid != '' || $url != 0) ? 1 : 0;
$footerblock1 = ($footlogo != 0 || $footnote != '' || $infolink != '' || $url != 0 || $block3 != 0) ? 1 : 0;

$footerblock = ($footlogo != 0 || $footnote != '' || $infolink != ''
    || $url != 0 || $block3 != 0 || $copyrightfooter != '') ? 1 : 0;

$block1 = ($footlogo || $footnote) ? 1 : 0;
$infoslink = ($infolink != '') ? 1 : 0;
$blockarrange = $block1 + $infoslink + $block3;

switch ($blockarrange) {
    case 3:
        $colclass = 'col-md-4';
        break;
    case 2:
        $colclass = 'col-md-6';
        break;
    case 1:
        $colclass = 'col-md-12';
        break;
    case 0:
        $colclass = '';
        break;
    default:
        $colclass = 'col-md-4';
        break;
}

$templatecontext = [
    "logourl"          => $logourl,
    "phoneno"          => $phoneno,
    "emailid"          => $emailid,
    "footlogo"         => $footlogo,
    "footnote"         => $footnote,
    "fburl"            => $fburl,
    "pinurl"           => $pinurl,
    "twurl"            => $twurl,
    "gpurl"            => $gpurl,
    "address"          => $address,
    "copyright_footer" => $copyrightfooter,
    "infolink"         => $infolink,
    "s_contact_us"     => $scontactus,
    "phone"            => $phone,
    "email"            => $email,
    "s_followus"       => $sfollowus,
    "socialurl"        => $url,
    "navbarclass"      => $navbarclass,
    "block3"           => $block3,
    "footerblock"      => $footerblock,
    "footerblock1"     => $footerblock1,
    "colclass"         => $colclass,
    "block1"           => $block1,
    'themestyleheader' => $themestyleheader
];
