<?php

namespace Apps\Games\Packages;

use System\Base\BasePackage;

class Home extends BasePackage
{
    //protected $modelToUse = ::class;

    protected $packageName = 'home';

    public $home;

    public function getHomeById($id)
    {
        $home = $this->getById($id);

        if ($home) {
            //
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error', 1);
    }

    public function addHome($data)
    {
        //
    }

    public function updateHome($data)
    {
        $home = $this->getById($id);

        if ($home) {
            //
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error', 1);
    }

    public function removeHome($data)
    {
        $home = $this->getById($id);

        if ($home) {
            //
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error', 1);
    }
}