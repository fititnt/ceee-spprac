<?php

/**
 * @package     Spprac Library
 * @author      Emerson Rocha Luiz - emerson at webdesign.eng.br - fititnt
 * @copyright   Copyright (C) 2011 Webdesign Assessoria em Tecniligia da Informacao. All rights reserved.
 * @license     GNU General Public License version 3. See license.txt
 */
defined('JPPRAC_PATH') or die('Restricted access');

/**
 *
 */
abstract class Jspprac {


    /**
     *
     * @var Object $log
     */
    public static $log;

    /**
     *
     * @var Object $remodedata
     */
    public static $remodedata;
	
    /**
     * Return Log Object, creating if aready doesent exists
     *
     * @return Object $log
     */
    public static function getLog() {
        if (!self::$log) {
            jimport('spprac.log.load');

            self::$log = LoadLog::getInstance();
        }
        return self::$log;
    }
	
    /**
     * Retorna informacoes de uma fonte remota, ja parseada
     *
     * @return Object $remodedata
     */
    public static function getRemoteData() {
        if (!self::$remodedata) {
            jimport('spprac.remotedata.load');

            self::$remodedata = SPPRACLoadRemoteData::getInstance();
        }
        return self::$remodedata;
    }
	

}