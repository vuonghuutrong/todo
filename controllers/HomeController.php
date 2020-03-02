<?php
use Cores\Controller;
use Cores\View;
use Model\Work;

class HomeController extends Controller
{
    public function index()
    {
        $data = Work::index();
        return View::make('home', $data);
    }
}