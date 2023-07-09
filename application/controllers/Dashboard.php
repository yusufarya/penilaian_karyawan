<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController
{

    public function index()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Dashboard Admin';
        $data['active'] = 'Dashboard';

        $this->global['page_title'] = 'Dashboard - BAPENDA';
        $this->loadViewsAdmin('admin/dashboard', $this->global, $data, NULL, TRUE);
    }
}
