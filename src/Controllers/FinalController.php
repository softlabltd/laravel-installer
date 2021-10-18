<?php

namespace Ffegu\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Ffegu\LaravelInstaller\Events\LaravelInstallerFinished;
use Ffegu\LaravelInstaller\Helpers\EnvironmentManager;
use Ffegu\LaravelInstaller\Helpers\FinalInstallManager;
use Ffegu\LaravelInstaller\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param \Ffegu\LaravelInstaller\Helpers\InstalledFileManager $fileManager
     * @param \Ffegu\LaravelInstaller\Helpers\FinalInstallManager $finalInstall
     * @param \Ffegu\LaravelInstaller\Helpers\EnvironmentManager $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent();

        event(new LaravelInstallerFinished);

        return view('LaravelInstaller::finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }
}
