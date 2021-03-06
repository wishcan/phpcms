<?php
return array (
  'name' => 
  array (
    'fieldid' => '307',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'name',
    'name' => '姓名',
    'tips' => '中英文',
    'css' => '',
    'minlength' => '1',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '此歌手已存入数据库中',
    'formtype' => 'text',
    'setting' => 'array (
  \'size\' => \'50\',
  \'defaultvalue\' => \'\',
  \'ispassword\' => \'0\',
)',
    'formattribute' => '',
    'unsetgroupids' => '8,2,6,4,5',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '1',
    'isbase' => '1',
    'issearch' => '1',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '0',
    'disabled' => '0',
    'isomnipotent' => '0',
    'size' => '50',
    'defaultvalue' => '',
    'ispassword' => '0',
  ),
  'job' => 
  array (
    'fieldid' => '367',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'job',
    'name' => '职业',
    'tips' => '',
    'css' => '',
    'minlength' => '1',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'text',
    'setting' => 'array (
  \'size\' => \'50\',
  \'defaultvalue\' => \'\',
  \'ispassword\' => \'0\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '0',
    'issearch' => '0',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '0',
    'disabled' => '0',
    'isomnipotent' => '0',
    'size' => '50',
    'defaultvalue' => '',
    'ispassword' => '0',
  ),
  'birthday' => 
  array (
    'fieldid' => '308',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'birthday',
    'name' => '生日',
    'tips' => '',
    'css' => '',
    'minlength' => '1',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'datetime',
    'setting' => 'array (
  \'fieldtype\' => \'int\',
  \'format\' => \'Y-m-d\',
  \'defaulttype\' => \'0\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '1',
    'disabled' => '0',
    'isomnipotent' => '0',
    'fieldtype' => 'int',
    'format' => 'Y-m-d',
    'defaulttype' => '0',
  ),
  'eName' => 
  array (
    'fieldid' => '309',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'eName',
    'name' => '外文名',
    'tips' => '必须英语',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '0',
    'pattern' => '/^[a-z]+$/i',
    'errortips' => '必须为英文',
    'formtype' => 'text',
    'setting' => 'array (
  \'size\' => \'50\',
  \'defaultvalue\' => \'\',
  \'ispassword\' => \'0\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '1',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '2',
    'disabled' => '0',
    'isomnipotent' => '0',
    'size' => '50',
    'defaultvalue' => '',
    'ispassword' => '0',
  ),
  'height' => 
  array (
    'fieldid' => '314',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'height',
    'name' => '身高',
    'tips' => '',
    'css' => '',
    'minlength' => '100',
    'maxlength' => '0',
    'pattern' => '/^\\d{3}$/',
    'errortips' => '',
    'formtype' => 'number',
    'setting' => 'array (
  \'minnumber\' => \'1\',
  \'maxnumber\' => \'230\',
  \'decimaldigits\' => \'0\',
  \'defaultvalue\' => \'<?=$defaultvalue?>\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '3',
    'disabled' => '0',
    'isomnipotent' => '0',
    'minnumber' => '1',
    'maxnumber' => '230',
    'decimaldigits' => '0',
    'defaultvalue' => '<?=$defaultvalue?>',
  ),
  'nation' => 
  array (
    'fieldid' => '313',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'nation',
    'name' => '民族',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'linkage',
    'setting' => 'array (
  \'linkageid\' => \'3379\',
  \'space\' => \'\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '4',
    'disabled' => '0',
    'isomnipotent' => '0',
    'linkageid' => '3379',
    'space' => '',
  ),
  'blood_type' => 
  array (
    'fieldid' => '312',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'blood_type',
    'name' => '血型',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'linkage',
    'setting' => 'array (
  \'linkageid\' => \'3374\',
  \'showtype\' => \'0\',
  \'space\' => \'\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '0',
    'issearch' => '0',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '5',
    'disabled' => '0',
    'isomnipotent' => '0',
    'linkageid' => '3374',
    'showtype' => '0',
    'space' => '',
  ),
  'birthplace' => 
  array (
    'fieldid' => '318',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'birthplace',
    'name' => '出生地',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'linkage',
    'setting' => 'array (
  \'linkageid\' => \'1\',
  \'space\' => \'\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '6',
    'disabled' => '0',
    'isomnipotent' => '0',
    'linkageid' => '1',
    'space' => '',
  ),
  'nationality' => 
  array (
    'fieldid' => '311',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'nationality',
    'name' => '国籍',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'linkage',
    'setting' => 'array (
  \'linkageid\' => \'3436\',
  \'showtype\' => \'1\',
  \'space\' => \'|\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '0',
    'issearch' => '0',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '7',
    'disabled' => '0',
    'isomnipotent' => '0',
    'linkageid' => '3436',
    'showtype' => '1',
    'space' => '|',
  ),
  'good_works' => 
  array (
    'fieldid' => '310',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'good_works',
    'name' => '代表作品',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'text',
    'setting' => 'array (
  \'size\' => \'50\',
  \'defaultvalue\' => \'\',
  \'ispassword\' => \'0\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '8',
    'disabled' => '0',
    'isomnipotent' => '0',
    'size' => '50',
    'defaultvalue' => '',
    'ispassword' => '0',
  ),
  'constel' => 
  array (
    'fieldid' => '317',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'constel',
    'name' => '星座',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'linkage',
    'setting' => 'array (
  \'linkageid\' => \'3361\',
  \'space\' => \'\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '9',
    'disabled' => '0',
    'isomnipotent' => '0',
    'linkageid' => '3361',
    'space' => '',
  ),
  'fance' => 
  array (
    'fieldid' => '316',
    'modelid' => '12',
    'siteid' => '0',
    'field' => 'fance',
    'name' => '粉丝呢称',
    'tips' => '粉丝呢称',
    'css' => '',
    'minlength' => '1',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'text',
    'setting' => 'array (
  \'size\' => \'50\',
  \'defaultvalue\' => \'\',
  \'ispassword\' => \'0\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '10',
    'disabled' => '0',
    'isomnipotent' => '0',
    'size' => '50',
    'defaultvalue' => '',
    'ispassword' => '0',
  ),
);
?>