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

namespace core_user\form;

use \core_contentbank\content;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot.'/lib/formslib.php');

/**
 * Form to edit a user's preferences concerning the content bank.
 *
 * @package core_user
 * @copyright 2020 François Moreau
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class contentbank_user_preferences_form extends \moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        global $CFG, $USER;

        $mform = $this->_form;

        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_INT);

        $options = [
            content::VISIBILITY_PUBLIC  => get_string('visibilitychoicepublic', 'core_contentbank'),
            content::VISIBILITY_UNLISTED => get_string('visibilitychoiceunlisted', 'core_contentbank')
        ];
        $mform->addElement('select', 'contentvisibility', get_string('visibilitypref', 'core_contentbank'), $options);
        $mform->addHelpButton('contentvisibility', 'visibilitypref', 'core_contentbank');
        $this->add_action_buttons(true, get_string('savechanges'));
    }
}
