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
   * CourseEval Online Course Evaluation plugin
   *
   * @package    block_course_evals
   * @author     Michelle Melton, Fred Woolard (modified code from Scott Krajewski, Augsburg College)
   * @copyright  2015 Appalachian State University
   * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
   */

  class block_course_evals extends block_base 
  {
      function init() 
      {
          $this->title = get_string('pluginname', 'block_course_evals');
          $this->blockConfigs = get_config('block_course_evals');
      }

      function get_content() 
      {
          global $CFG, $USER;

          if($this->content !== NULL) {
              return $this->content;
          }
        
          $this->content = new stdClass;
          $this->content->footer = '';
          
          $urlstart = '';
          if (!empty($CFG->block_course_evals_url)) {
            $urlstart = $CFG->block_course_evals_url;
          }
          $this->content->text = "<script type='text/javascript' src='{$urlstart}&uid={$USER->username}'></script>";
          return $this->content;
      }
      
      /**
       * Override
       * @see block_base::has_config()
       */
      function has_config()
      {
          return true;
      }
  }
