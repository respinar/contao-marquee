<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   Marquee
 * @author    Hamid Abbaszadeh info@respinar.com
 * @license   LGPL-3.0+
 * @copyright respinar 2015
 */


/**
 * Namespace
 */
namespace marquee;


/**
 * Class ModuleMarquee
 *
 * @copyright  respinar 2015
 * @author     Hamid Abbaszadeh info@respinar.com
 * @package    Devtools
 */
class ModuleMarquee extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_marquee';
    
    
    /**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['marquee'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		// No marquee available
		if (empty($this->marquee))
		{
			return '';
		}
        
       $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/marquee/assets/jquery.marquee.min.js|static';
       $GLOBALS['TL_CSS'][]        = 'system/modules/marquee/assets/marquee.min.css|static';

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
        
        $this->Template->duration         = 10000;
        $this->Template->gap              = $this->marquee_gap;
        $this->Template->delayBeforeStart = $this->marquee_delayBeforeStart;        
        $this->Template->direction        = $this->marquee_direction;
        $this->Template->duplicate        = $this->marquee_duplicate;        
        
        $this->Template->pauseOnHover     = $this->marquee_pauseOnHover ? "true" : "false";        
        $this->Template->duplicated       = $this->marquee_duplicated ? "true" : "false";
        
        $this->Template->empty = $GLOBALS['TL_LANG']['MSC']['emptyMarquee'];
        
       
        $intTotal = \MarqueeTextModel::countPublishedByPid($this->marquee);
        
		if ($intTotal < 1)
		{
			return;
		}
        
        if (!($this->numberOfItem) or $this->numberOfItem > $intTotal) {
            $count = $intTotal;
        } else {
            $count = $this->numberOfItem;             
        }
        
        $objMarqueeTexts = \MarqueeTextModel::findPublishedByPid($this->marquee,$count);
        
        $arrMarqueeTexts = array();
        
        $intLen = 0;
        
        // No items found
		if ($objMarqueeTexts !== null)
		{
			while ($objMarqueeTexts->next())
            {
                $tmpArr= array();
                if(isset($objMarqueeTexts->text) && !empty($objMarqueeTexts->text)) {
                    $tmpArr ['text']   = $objMarqueeTexts->text;
                    $tmpArr ['url']    = $objMarqueeTexts->url;
                    $tmpArr ['target'] = $objMarqueeTexts->target;
                    $intLen            += strlen($objMarqueeTexts->text);
                    $arrMarqueeTexts[] = $tmpArr;
                }
            }
		}
        
        $this->Template->duration         = $this->marquee_speed * $intLen;
        
        $this->Template->texts = $arrMarqueeTexts;
	}
}
