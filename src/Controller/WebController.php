<?php

namespace Phro\Web\Controller;

use Exception;

class WebController
{

    /**
     * @throws Exception
     */
    public function sendHtmlFile(): void
    {

        $filename = __DIR__. "/../../public/index.html";

        if (!file_exists($filename))
        {
            throw new Exception("HTML file \"$filename\" does not exist", 404);
        }

        echo file_get_contents($filename);

    }

}