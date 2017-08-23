<?php
App::uses('BlogAppModel','Blog.Model');

class BlogBlogTag extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	public $actsAs = array('Containable');


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'BlogTag' => array(
			'className' => 'BlogTag',
			'foreignKey' => 'blog_tag_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			
		),
		'Blog' => array(
			'className' => 'Blog',
			'foreignKey' => 'blog_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		
	);

 }
