<?php 
$config =[

		'add_article_rules'=>[
						[
							'field' => 'article_title',
							'label' => 'Article title',
							'rules' => 'required|alpha'
						],
						[
							'field'=>'article_body',
							'label'=>'Article body',
							'rules'=>'required|alpha'
						]
					],

		'add_users_rules'=>[
								[
									'field'=>'uname',
									'label'=>'uname',
									'rules'=>'required|alpha'
								],
								[
									'field'=>'pwd',
									'label'=>'pwd',
									'rules'=>'required'
								],
								[
									'field'=>'email',
									'label'=>'email',
									'rules'=>'required'
								]
		],
		
		'add_feedback_rules' =>[
								[
									'field'=>'name',
									'label'=>'name',
									'rules'=>'required'
								],
								[
									'field'=>'email',
									'label'=>'email',
									'rules'=>'required'
								],
								[
									'field'=>'feedback1',
									'label'=>'feedback1',
									'rules'=>'required'
								]
		],
];
?>