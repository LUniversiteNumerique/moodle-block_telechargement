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
 * telechargement block
 *
 * @package    block_telechargement
 * @copyright  2022 Fondation UNIT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtext(
        'block_telechargement/title',
        new lang_string('settings:title', 'block_telechargement'),
        new lang_string('settings:title_desc', 'block_telechargement'),
        '',
        PARAM_TEXT)
    );

    $settings->add(new admin_setting_confightmleditor(
        'block_telechargement/body',
        new lang_string('settings:body', 'block_telechargement'),
        new lang_string('settings:body_desc', 'block_telechargement'),
        '')
    );
}
