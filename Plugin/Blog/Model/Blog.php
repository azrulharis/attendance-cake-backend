<?php
App::uses('BlogAppModel','Blog.Model');


/**
 * Post Model
 *
 * @property User $User
 */
class Blog extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $name = 'Blog';
	public $displayField = 'title';

	public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */

 	
public $validate = array(
	'title' => array(
		'notEmpty' => array(
			'rule' => array('notEmpty'),
			'message' => 'Please fill the title.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
	),
	'slug' => array(
		'slug' => array(
				'rule' => array('alphaNumericDashUnderscore'),
				'message' => 'Slug can only be letters, numbers, dash and underscore',
			),
		),
	'visibility' => array(
		'notEmpty' => array(
			'rule' => array('notEmpty'),
			'message' => 'Please select visibility.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
			
			
		),
	'password' => array(
			'visibilityCheckFunction' => array(
				'rule' => array('visibilityCheckFunction'),
				'message' => 'Please fill password.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	
	'value' => array(
		'image' => array(
			'rule' => array(
				'extension',
				array('gif', 'jpeg', 'png', 'jpg', '')
			),
			'message' => 'Please supply a valid image.'
		),
	),
);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			
		),
		
		
	);
	
	
	
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'BlogMeta' => array(
			'className' => 'BlogMeta',
			'foreignKey' => 'blog_id',
			'dependent' => true,
			'conditions' =>array('BlogMeta.title != '=> 'ximage','BlogMeta.title !=' => 'xvideo'),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FeatureImage' => array(
			'className' => 'BlogMeta',
			'foreignKey' => 'blog_id',
			'conditions' => array('FeatureImage.title' => 'ximage')														
		),
		'Video' => array(
			'className' => 'BlogMeta',
			'foreignKey' => 'blog_id',
			'conditions' => array('Video.title' => 'xvideo')														
		),
		'BlogBlogTag' => array(
			'className' => 'BlogBlogTag',
			'foreignKey' => 'blog_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
												
	);


/**
 * hasOne associations
 *
 * @var array
 */
public $hasOne = array(
		'BlogTag' => array(
			'className' => 'BlogTag',
			'foreignKey' => '',
		),
		'BlogSeo' => array(
			'className' => 'BlogSeo',
			'foreignKey' => 'blog_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
public $hasAndBelongsToMany = array(
	'BlogCategory' =>
		array(
			'className' => 'BlogCategory',
			'joinTable' => 'blogs_blog_categories',
			'foreignKey' => 'blog_id',
			'associationForeignKey' => 'blog_category_id',
			'unique' => true,
		),
	'BlogTagTag' =>								// Created by Deepak Chittora on 26 April 2015
		array(
			'className' => 'BlogTag',
			'joinTable' => 'blog_blog_tags',
			'foreignKey' => 'blog_id',
			'associationForeignKey' => 'blog_tag_id',
			//'unique' => true,
	),
);

	############# Handling Blog Tag Start ###########
	 public function blogTag($tags,$user_id,$blog_id = NULL)
	 {
	 	$blogTags = array();
		if(!empty($blog_id))
		{
				$conditions = array('BlogBlogTag.blog_id' => $blog_id);
				$this->BlogBlogTag->deleteAll($conditions);
				$blogTags = $this->_insertBlogTag($tags,$user_id);
		}
		else
				$blogTags = $this->_insertBlogTag($tags,$user_id);
		
		return 	$blogTags;	
			
	 }
	############# Handling Blog Tag End ###########
	
	############ Insert Blog Tag Start #############
	public function _insertBlogTag($tags,$user_id) 
	{
		$blogTags = array();
	 	$tag_array = explode(',',$tags);
		$count = 0;
		foreach($tag_array as $key => $value)
					{
						$conditions = array('title'=>$value);
						if(!$this->BlogTag->hasAny($conditions))
							{
								$blogTag['BlogTag']['id'] 		= '';
								$blogTag['BlogTag']['user_id']  = $user_id;
								$blogTag['BlogTag']['title']  	= $value;
								if($this->BlogTag->save($blogTag))
								{
									$lastBlogId = $this->BlogTag->getLastInsertId();
									$blogTags[$count]['blog_id'] 	= '';
									$blogTags[$count]['blog_tag_id'] = $lastBlogId;
								}
							}
						else
							{
								$tagDetails = $this->BlogTag->find('first',array('conditions' => array('title' => $value),'fields' => array('BlogTag.id')));
								$blogTags[$count]['blog_id'] 	= '';
								$blogTags[$count]['blog_tag_id'] = $tagDetails['BlogTag']['id'];
								
							}
							
						$count++;	
					}
			return $blogTags;
	}
	############ Insert Blog Tag End #############
	
	
	########## Keyword Tag on Product Edit Start #######
			public function blogTagManage($tags)
			{

					$blogTags =array();
					$tag = array();
					if(!empty($tags))
						{		
							foreach($tags as  $value)
								{
								
									$blogTags[] = $this->BlogTag->find('first',array(
															'conditions' => array('BlogTag.id' => $value['blog_tag_id']),
															'fields' => array('BlogTag.title'),
															'contain' => array()
															)
														);
							
								}

								foreach($blogTags as $blogTag)
									$tag[] = $blogTag['BlogTag']['title'];
									
								$tag = implode(',',$tag);
						}
					
					
					return $tag;
					
			}
	########## Keyword Tag on Product Edit End #########
	
	 public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('|^[0-9a-zA-Z_-]*$|', $value);
    }
	
	
	public function visibilityCheckFunction()
		{
			$visibility = $this->data['Blog']['visibility'];
			
			if($visibility == 'PP')
			{
				$password =$this->data['Blog']['password'];
				if(!empty($password)) { return TRUE;}
				else
					{ return FALSE; }
			}
			else
				{
					return TRUE;
				}
		}
		
		
		
	public function widget($widget_slug, $fields = array())
	{
		if(!empty($fields))
		$fields = array('Blog.*');
		
		$widget = $this->find('first', array('conditions' => array(
											'Blog.status' => 1,
											'Blog.blog_type' => 'Widget',
											'Blog.slug'=>$widget_slug
											),
									'contain' => array(),
									'fields' => $fields
								)
					);
		return $widget;
	}

	public function page($page_slug, $fields = array())
	{
		if(!empty($fields))
		$fields = array('Blog.*');
		
		$page = $this->find('first', array('conditions' => array(
											'Blog.status' => 1,
											'Blog.blog_type' => 'Page',
											'Blog.slug'=>$page_slug
											),
									'contain' => array(),
									'fields' => $fields
								)
					);
		return $page;
	}

	/*
	$type = list or all
	*/
	public function pages($type)
	{
		$pages = $this->find($type, array('conditions' => array(
											'Blog.status' => 1,
											),
									'contain' => array(),
								)
					);
		return $pages;
	}
}
