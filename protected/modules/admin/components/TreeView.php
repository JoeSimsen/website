<?php
class TreeView extends CTreeView
{
/**
	 * Saves tree view data in JSON format.
	 * This method is typically used in dynamic tree view loading
	 * when the server code needs to send to the client the dynamic
	 * tree view data.
	 * @param array $data the data for the tree view (see {@link data} for possible data structure).
	 * @return string the JSON representation of the data
	 */
	public static function saveDataAsJson($data)
	{
		if(empty($data))
			return '[]';
		else
		{
			$tmp = CJavaScript::jsonEncode($data);
			print_r($tmp);die;
		}
	}
}