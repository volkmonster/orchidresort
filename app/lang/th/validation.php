<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"         => "The :attribute must be accepted.",
	"active_url"       => "The :attribute is not a valid URL.",
	"after"            => "The :attribute must be a date after :date.",
	"alpha"            => "The :attribute may only contain letters.",
	"alpha_dash"       => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"        => ":attribute ใส่ได้เฉพาะตัวเลขและตัวอักษรเท่านั้น.",
	"array"            => "The :attribute must be an array.",
	"before"           => "The :attribute must be a date before :date.",
	"between"          => array(
		"numeric" => ":attribute ต้องมีความยาวตัวเลขระหว่าง :min ถึง :max.",
		"file"    => ":attribute ต้องมีขนาดไฟล์ระหว่าง :min ถึง :max กิโลไบต์.",
		"string"  => ":attribute ต้องมีความยาวตัวอักษรระหว่าง :min และ :max ตัวอักษร.",
		"array"   => ":attribute ต้องมีจำนวนรายการระหว่าง :min ถึง :max รายการ",
	),
	"confirmed"        => ":attribute ไม่เหมือนกัน.",
	"date"             => "The :attribute is not a valid date.",
	"date_format"      => "The :attribute does not match the format :format.",
	"different"        => "The :attribute and :other must be different.",
	"digits"           => ":attribute ต้องมีความยาวตัวเลข :digits หลัก",
	"digits_between"   => "The :attribute must be between :min and :max digits.",
	"email"            => "รูปแบบ :attribute ไม่ถูกต้อง",
	"exists"           => ":attribute ซ้ำกับในระบบ.",
	"image"            => ":attribute ต้องเป็นรูปภาพเท่านั้น.",
	"in"               => "The selected :attribute is invalid.",
	"integer"          => ":attribute ต้องเป็นตัวเลขเท่านั้น.",
	"ip"               => ":attribute รูปแบบที่ไม่ถูกต้อง.",
	"max"              => array(
		"numeric" => ":attribute ต้องมีความยาวไม่มากเกิน :max.",
		"file"    => ":attribute ต้องมีขนาดไฟล์ไม่เกิน :max กิโลไบต์.",
		"string"  => ":attribute ต้องมีความยาวไม่เกิน :max ตัวอักษร.",
		"array"   => ":attribute ต้องมีจำนวนรายการไม่เกิน :max รายการ.",
	),
	"mimes"            => "The :attribute must be a file of type: :values.",
	"min"              => array(
		"numeric" => ":attribute ต้องมีตัวเลขอย่างน้อย :min ตัว",
		"file"    => ":attribute ต้องมีขนาดไฟล์อย่างน้อย :min กิโลไบต์.",
		"string"  => ":attribute ต้องมีตัวอักษรอย่างน้อย :min ตัวอักษร",
		"array"   => ":attribute ต้องมีอย่างน้อย :min รายการ.",
	),
	"not_in"           => "The selected :attribute is invalid.",
	"numeric"          => ":attribute ต้องเป็นตัวเลขเท่านั้น.",
	"regex"            => ":attribute รูปแบบไม่ถูกต้อง",
	"required"         => "โปรดระบุ :attribute",
	"required_if"      => "The :attribute field is required when :other is :value.",
	"required_with"    => "The :attribute field is required when :values is present.",
	"required_without" => "The :attribute field is required when :values is not present.",
	"same"             => "The :attribute and :other must match.",
	"size"             => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	),
	"unique"           => ":attribute มีซำ้กับในระบบ.",
	"url"              => ":attribute รูปแบบไม่ถูกต้อง.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'email'=>'อีเมล์',
		'email_confirmation'=>'อีเมล์(ยืนยัน)',
		'firstname'=>'ชื่อ',
		'lastname'=>'นามสกุล',
		'mobile'=>'หมายเลขโทรศัพท์',
		'captcha'=>'อักษรภาพ',
		'checkin'=>'วันย้ายเข้า',
		'checkout'=>'วันย้ายออก'
		),

);
