<?php 
/**
* SBND F&CMS - Framework & CMS for PHP developers
*
* Copyright (C) 1999 - 2013, SBND Technologies Ltd, Sofia, info@sbnd.net, http://sbnd.net
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
* @author SBND Techologies Ltd <info@sbnd.net>
* @package cmp.sitemap
* @version 7.0.4  
*/

/**
 * Site navigation map generator
 * 
 * @author Evgeni Baldzhiyski
 * @since 11.10.2012
 * @version 0.3
 * @package cmp.sitemap
 */
class Sitemap extends CmsBox{
	public $template_list = 'sitemap.tpl';
	/**
	 * The returned data will put in the template.
	 * 
	 * @return string
	 * @access public
	 * @see CmsDysplayComponent::startPanel()
	 */
	function startPanel(){
		$map = array();
		$rdr = Builder::init()->getdisplayComponent("menu-positions",false)->read();
		
		while($rdr->read()){
			if($rdr->item('id') != 6){ //is not system
				$map[] = array(
					'title' => BASIC_LANGUAGE::init()->get($rdr->item('name').'_menu'),
					'data' => Builder::init()->pagesControler->getMenuData($rdr->item('name'))
				);
			}
		}
		BASIC_TEMPLATE2::init()->set(array(
			'pdata' => $this->pdata,
			'map'   => $map
		));
		return BASIC_TEMPLATE2::init()->parse($this->template_list);
	}
	
	// SETTINGS
	/**
	 * Define setting for component. Values will be overwrite values of these class properties
	 * 
	 * @access public
	 * @return array
	 */
	function settingsData(){
		return array(
			'template_list'	=> $this->template_list			
		);
	}
	/**
	 * 
	 * Desciption of fields for component setting
	 * @access public
	 * @return array
	 */
	function settingsUI(){
		return array(
			'template_list' => array(
				'text' => BASIC_LANGUAGE::init()->get('template_list'),		
			)
		);
	}
}