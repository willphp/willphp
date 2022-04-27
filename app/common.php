<?php
//防刷新 字段增加
function get_hits($id, $hits, $table, $field) {
	$name = $table.'_'.$field;
	$value = $name.'_'.$id;
	if (session($name) != $value) {
		db($table)->where('id='.$id)->setInc($field);
		session($name, $value);
		$hits ++;
	}
	return $hits;
}
//生成form:select
function build_select($name, $options, $selected = '') {
	$options = is_array($options)? $options : explode(',', $options);	
	$html = "<select name=\"{$name}\">\n";
	foreach ($options as $val => $key) {
		if ($selected == $val) {
			$html .= "\t<option value=\"{$val}\" selected=\"selected\">{$key}</option>\n";
		} else {
			$html .= "\t<option value=\"{$val}\">{$key}</option>\n";
		}
	}
	$html .= "</select>\n";	
	return $html;	
}
//生成form:radios
function build_radios($name, $options, $selected = '') {
	$options = is_array($options)? $options : explode(',', $options);	
	$html = '';	
	foreach ($options as $val => $key) {
		if ($selected == $val) {
			$html .= "<label><input type=\"radio\" name=\"{$name}\" value=\"{$val}\" checked=\"checked\" />{$key}</label>\n";
		} else {
			$html .= "<label><input type=\"radio\" name=\"{$name}\" value=\"{$val}\" />{$key}</label>\n";
		}		
	}
	return $html;
}