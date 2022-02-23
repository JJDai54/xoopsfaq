<?php
/**
 * select form element
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       (c) 2000-2017 XOOPS Project (www.xoops.org)
 * @license             GNU GPL 2 (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package             kernel
 * @subpackage          form
 * @since               2.0.0
 * @author              Kazumi Ono (AKA onokazu) http://www.myweb.ne.jp/, http://jp.xoops.org/
 * @author              Taiwen Jiang <phppp@users.sourceforge.net>
 */
defined('XOOPS_ROOT_PATH') || exit('Restricted access');

xoops_load('XoopsFormElement');

/**
 * A data-list for input form
 *
 * @author              JJDai <jjdelalandre@orange.fr>
 * @copyright       (c) 2000-2016 XOOPS Project (www.xoops.org)
 * @package             kernel
 * @subpackage          form
 * @access              public
 */
class XoopsFormDatalist extends XoopsFormElement
{
    /**
     * Options
     *
     * @var array
     * @access private
     */
    public $_options = array();

    /**
     * nom de l'attribut info. "" is default.
     *
     * @var string
     * @access private
     */
    public $_info_attr_name;

    /**
     * Constructor
     *
     * @param string $caption  Caption
     * @param string $name     "name" attribute
     * @param mixed  $value    Pre-selected value (or array of them).
     * @param int    $size     Number or rows. "1" makes a drop-down-list
     * @param bool   $multiple Allow multiple selections?
     */
    public function __construct($name, $options, $info_attr_name='info')
    {
        $this->setCaption('');
        $this->setName($name);
        $this->_info_attr_name = $info_attr_name;
        if (isset($options)) {
            $this->_options = $options;
        }
    }




    /**
     * Add an option
     *
     * @param string $value "value" attribute
     * @param string $name  "name" attribute
     */
    public function addOption($value, $name = '')
    {
        if ($name != '') {
            $this->_options[$value] = $name;
        } else {
            $this->_options[$value] = $value;
        }
    }

    /**
     * Add multiple options
     *
     * @param array $options Associative array of value->name pairs
     */
    public function addOptionArray($options)
    {
        if (is_array($options)) {
            foreach ($options as $k => $v) {
                $this->addOption($k, $v);
            }
        }
    }

    /**
     * Get an array with all the options
     *
     * Note: both name and value should be sanitized. However for backward compatibility, only value is sanitized for now.
     *
     * @param bool|int $encode To sanitizer the text? potential values: 0 - skip; 1 - only for value; 2 - for both value and name
     *
     * @return array Associative array of value->name pairs
     */
    public function getOptions($encode = false)
    {
        if (!$encode) {
            return $this->_options;
        }
        $value = array();
        foreach ($this->_options as $val => $name) {
            $value[$encode ? htmlspecialchars($val, ENT_QUOTES) : $val] = ($encode > 1) ? htmlspecialchars($name, ENT_QUOTES) : $name;
        }

        return $value;
    }

    /**
     * Prepare HTML for output
     *
     * @return string HTML
     */
    public function render()
    {
        $tHtml = array();
        $tHtml[] = "<datalist id='{$this->getName()}' name='{$this->getName()}'>";

        foreach($this->_options AS $key => $value){
            $tHtml[] = "<option value=\"{$key}\" label=\"{$key}\" {$this->_info_attr_name}=\"{$value}\">";
        }

        $tHtml[] = "</datalist>\n";

        $tHtml[] = "<script>";
        $tHtml[] = "function datalist_setInfo(datalistName, txtLibName, txtUrlName){";
        $tHtml[] = "    var obDatalist =  document.getElementById(datalistName);";
        $tHtml[] = "    var obLib =  document.getElementById(txtLibName);";
        $tHtml[] = "    var obUrl =  document.getElementById(txtUrlName);";
        $tHtml[] = "    var lib = obLib.value;";
        $tHtml[] = "    for (var h=0; h < obDatalist.options.length; h++){";
        $tHtml[] = "        opt = obDatalist.options[h];";
        $tHtml[] = "        if(opt.value == lib){";
        $tHtml[] = "            href = opt.getAttribute('info');";
        $tHtml[] = "            obUrl.value = href;";
        $tHtml[] = "        }";
        $tHtml[] = "    }";
        $tHtml[] = "}";
        $tHtml[] = "</script>";

        return implode("\n", $tHtml) . "\n";
    }

    /**
     * Render custom javascript validation code
     *
     * @seealso XoopsForm::renderValidationJS
     */
    public function renderValidationJS()
    {
        return '';
    }
}
