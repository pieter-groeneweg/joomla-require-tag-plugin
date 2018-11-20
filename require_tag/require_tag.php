<?php

// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\Form\Form;
use Joomla\CMS\Plugin\CMSPlugin;

class PlgContentRequire_tag extends CMSPlugin

{
	protected $app;
	public function onContentPrepareForm($form, $data)
	{
		if (!$this->params->get('categories', array()) || $form->getName() != 'com_content.article')
		{
			return true;
		}
		if (!$data)
		{
			$data = $this->app->input->get('jform', array(), 'array');
		}
		if (is_array($data))
		{
			$data = (object) $data;
		}
		if (isset($data->catid) && in_array($data->catid, $this->params->get('categories', array())))
		{
			$form->setFieldAttribute('tags', 'required', 'true');
		}
		$document = JFactory::getDocument();
		$document->addScriptDeclaration('
			jQuery(function ($) {
				$("#jform_catid").change(function(){
					arr = '.json_encode($this->params->get('categories', array())).';
					cat = parseInt($("#jform_catid").val());
					if(arr.includes(cat)!= false)
					{
					$("#jform_tags-lbl").addClass("required");
					if ($("#jform_tags-lbl").find("span").length != 0) {
						$("#jform_tags-lbl span").show();
						return;
					}  
					else {
						$("#jform_tags-lbl").append("<span class=star>&#160;*</span>");
					}
					$("#jform_tags").addClass("required");
					$("#jform_tags").prop("required");
					$("#jform_tags").attr("aria-required","true");
					}
					else 
					{
					$("#jform_tags-lbl").removeClass("required");
					$("#jform_tags-lbl span").hide();
					$("#jform_tags").removeClass("required");
					$("#jform_tags").removeProp("required");
					$("#jform_tags").removeAttr("aria-required");
					}
				});
			});
		');		
		return true;
	}
}
?>