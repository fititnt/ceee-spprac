<?php

/**
 * @package     Spprac Library
 * @author      Emerson Rocha Luiz - emerson at webdesign.eng.br - @fititnt
 * @copyright   Copyright (C) 2011 Webdesign Assessoria em Tecniligia da Informacao. All rights reserved.
 * @license     GNU General Public License version 3. See license.txt
 */
defined('JPPRAC_PATH') or die('Restricted access');

class SPPRACLoadRemoteData {

    /**
     *
     * @return SPPRARemoteData 
     */
    public static function getInstance() {
        require_once dirname(__FILE__) . DS . 'remotedata.php';
        $instance = new SPPRARemoteData();
        return $instance;
    }

}