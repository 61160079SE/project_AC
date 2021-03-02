<?php
/*
 * MK_controller
 * Material Kit example
 * @author 61160079 Adithep Phompha
 * @Create Date 2564-02-13
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include_once dirname(__FILE__) . '/../Main_Controller.php';

class MK_controller extends Main_Controller
{
    public function __construct()
    {
        parent::__construct();
    } //__construct

    // default
    public function index()
    {
        $this->page1();
    } //index

    public function page1()
    {
        $this->output_mk('template/material_kit_example/index');
    } //page1

    public function page2()
    {
        $this->output_mk('template/material_kit_example/landing-page');
    } //page4

    public function page3()
    {
        $this->output_mk('template/material_kit_example/login-page');
    } //page2

    public function page4()
    {
        $this->output_mk('template/material_kit_example/profile-page');
    } //page3

} //end class MK_controller