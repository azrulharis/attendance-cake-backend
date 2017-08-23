<?php
App::uses('BlogAppModel','Blog.Model');

class BlogTag extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	public $actsAs = array('Containable');


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'BlogBlogTag' => array(
			'className' => 'BlogBlogTag',
			'foreignKey' => 'blog_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		
	);

 }
