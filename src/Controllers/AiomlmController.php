<?php

namespace Ffegu\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Ffegu\LaravelInstaller\Events\LaravelInstallerFinished;
use Ffegu\LaravelInstaller\Helpers\EnvironmentManager;
use Ffegu\LaravelInstaller\Helpers\FinalInstallManager;
use Ffegu\LaravelInstaller\Helpers\InstalledFileManager;

class AiomlmController extends Controller
{
     public function __construct()
     {
       // code...
     }

     public function siteConfiguration()
     {
         return view('LaravelInstaller::site-configuration');
     }
}
