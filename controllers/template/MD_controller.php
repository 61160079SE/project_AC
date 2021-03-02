<?php
/*
 * MD_controller
 * Material Dashboard example
 * @author 61160079 Adithep Phompha
 * @Create Date 2564-02-13
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include_once dirname(__FILE__) . '/../Main_Controller.php';

class MD_controller extends Main_Controller
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
        $this->output_md('template/material_dashboard_example/dashboard');
    } //page1

    public function page2()
    {
        $this->output_md('template/material_dashboard_example/user');
    } //page2

    public function page3()
    {
        $this->output_md('template/material_dashboard_example/tables');
    } //page3

    public function page4()
    {
        $this->output_md('template/material_dashboard_example/typography');
    } //page4

    public function page5()
    {
        $this->output_md('template/material_dashboard_example/icons');
    } //page5

    public function page6()
    {
        $this->output_md('template/material_dashboard_example/map');
    } //page6

    public function page7()
    {
        $this->output_md('template/material_dashboard_example/notifications');
    } //page7

    public function page8()
    {
        $this->output_md('template/material_dashboard_example/rtl');
    } //page8

    public function page9()
    {
        $this->output_md('template/material_dashboard_example/upgrade');
    } //page9

} //end class MD_controller