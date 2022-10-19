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
 * Block informations pour le téléchargement.
 *
 * @package    block_telechargement
 * @copyright  2022 Fondation UNIT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

class block_telechargement extends block_base {
    public function init() {
        $defaulttitle = get_string('defaulttitle', 'block_telechargement');
        $configtitle = get_config('block_telechargement', 'title');
        $this->title = empty($configtitle) ? $defaulttitle : $configtitle;
    }

    public function instance_allow_multiple() {
        return false;
    }

    public function has_config() {
        return true;
    }

    public function instance_allow_config() {
        return true;
    }

    public function get_content() {
        global $OUTPUT;
        $this->content = new stdClass();
        
        $defaultbody = get_string('defaultbody', 'block_telechargement');
        $configbody = get_config('block_telechargement', 'body');
        $this->content->text = empty($configbody) ? $defaultbody : $configbody;

        if (!isloggedin() or isguestuser()) {
            $button = new single_button(new moodle_url('/login/index.php',
                            ['sesskey' => sesskey()]),
                            get_string('login', 'core'));
            $this->content->footer = $OUTPUT->render($button);
        }
        return $this->content;
    }

    public function specialization() {
        $defaulttitle = get_string('defaulttitle', 'block_telechargement');
        $configtitle = get_config('block_telechargement', 'title');
        $this->title = empty($configtitle) ? $defaulttitle : $configtitle;
    }

    public function applicable_formats() {
        return array(
            'admin' => false,
            'site-index' => false,
            'course-view' => true,
            'mod' => true,
            'my' => false,
        );
    }
}
