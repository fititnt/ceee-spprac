<?php

/**
 * @package     Spprac Library
 * @author      Emerson Rocha Luiz - emerson at webdesign.eng.br - fititnt
 * @copyright   Copyright (C) 2011 Webdesign Assessoria em Tecniligia da Informacao. All rights reserved.
 * @license     GNU General Public License version 3. See license.txt
 */
defined('JPPRAC_PATH') or die('Restricted access');

class SPPRARemoteData {
	
	
	/**
	 * URL remota que sera usada para obter a informacao
	 * 
	 * @var string $target
	 */
	private $target;

    /**
     * Delete (set to NULL) generic variable
     * 
     * @param String $name: name of var do delete
     * @return Object $this
     */
    public function del($name) {
        $this->$name = NULL;
        return $this;
    }

    /**
     * Return generic variable
     * 
     * @param String $name: name of var to return
     * @return Mixed this->$name: value of var
     */
    public function get($name) {
        return $this->$name;
    }

    /**
     * Set one generic variable the desired value
     * 
     * @param String $name: name of var to set value
     * @param Mixed $value: value to set to desired variable
     * @return Object $this
     */
    public function set($name, $value) {
        $this->$name = $value;
        return $this;
    }
}
