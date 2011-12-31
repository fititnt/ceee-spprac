<?php

/**
 * @package     Spprac Library
 * @author      Emerson Rocha Luiz - emerson at webdesign.eng.br - fititnt
 * @copyright   Copyright (C) 2011 Webdesign Assessoria em Tecniligia da Informacao. All rights reserved.
 * @license     GNU General Public License version 3. See license.txt
 */
defined('JPPRAC_PATH') or die('Restricted access');

require_once 'PageParser.php';
require_once 'WebDig.php';

class SPPRARemoteData {

	/**
	 * URL remota que sera usada para obter a informacao
	 * 
	 * @var string $target
	 */
	private $target;

	/**
	 * Instancia da classe PageParser
	 * 
	 * @var instancia de classe
	 */
	private $PageParser;

	/**
	 * Instancia da classe WebDig
	 * 
	 * @var instancia de classe
	 */
	private $WebDig;

	/**
	 * Conteudo do ultimo alvo pesquisado
	 * 
	 * @var string
	 */
	private $content;

	/**
	 * Automaticamente carrega as bibliotecas PageParser e WebDig
	 * 
	 */
	function __construct() {
		$this->PageParser = new PageParser;
		$this->WebDig = new WebDig;
	}

	/**
	 * Retorna o conteudo inteiro de uma fonte externa. Caso o parametro
	 * $target nao esteja preenchido, usara o $this->target da classe
	 * 
	 * @todo Fazer com que os parametros adicionados em $PageParserParam sejam
	 *		transferidos de forma dinamica ao metodo previamente definido, de 
	 *		modo que metodo fique extreamente flexivel sem forçar codigos hardcoded.
	 * 
	 * @example
	 * @code
	  jimport('spprac.spprac');
	  $slib = Jspprac::getRemoteData();
	  echo $slib->dumpContentParsed('http://fititnt.org', 'ppId', 'rodape-alpha');
	  //Emerson Rocha Luiz © 2011 Consultor e programador de extensões Joomla! Joomla! | HTML5* | CSS3
	 * @endcode
	 * 
	 * @param string $target
	 * @param string $PageParserMethod O metodo que deve ser chamado na classe PageParser
	 * @param mixed $PageParserParam Os parametros que devem ser chamados no metodo definido no parametro anterior
	 * @return string Conteudo do target
	 */
	public function dumpContentParsed($target = NULL, $PageParserMethod = 'ppId', $PageParserParam = NULL) {

		if ($target) {
			$this->content = $this->WebDig->dig($target, true);
		} else {
			$target = $this->target;
		}
		if (!$target) {
			return JTEXT::_('LIB_SPPRAC_TARGET_NOT_DEFINED');
		}
		//Seta qual conteudo externo deve ser usado para o parseamento
		$this->PageParser->set('content', $this->content);
		//Parseia o conteudo previamente definido
		$resultado = $this->PageParser->$PageParserMethod($PageParserParam, TRUE);

		return $resultado;
	}

	/**
	 * Retorna o conteudo inteiro de uma fonte externa. Caso o parametro
	 * $target nao esteja preenchido, usara o $this->target da classe
	 * 
	 * @param string $target
	 * @return string Conteudo do target
	 */
	public function dumpContentRaw($target = NULL) {
		if (!$target) {
			$target = $this->target;
		}
		if (!$target) {
			return JTEXT::_('LIB_SPPRAC_TARGET_NOT_DEFINED');
		}
		$contents = $this->WebDig->dig($target, true);
		return $contents;
	}

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
