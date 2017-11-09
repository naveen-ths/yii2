<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property integer $author_id
 * @property string $title
 * @property string $slug
 * @property string $excerpt
 * @property string $description
 * @property string $featured_image
 * @property string $status
 * @property string $published_at
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PostToCategory[] $postToCategories
 */
class Post extends \yii\db\ActiveRecord
{
    public $upload;
    public $category_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug','status', 'published_at'], 'required'],
            [['author_id'], 'integer'],
            [['excerpt', 'description'], 'string'],
            [['published_at', 'created_at', 'updated_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['upload'], 'file', 'extensions' => 'png, jpg'],
            [['status'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'category_id' => 'Category',
            'excerpt' => 'Excerpt',
            'description' => 'Description',
            'featured_image' => 'Featured Image',
            'status' => 'Status',
            'published_at' => 'Published At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostToCategories()
    {
        return $this->hasMany(PostToCategory::className(), ['post_id' => 'id']);
    }
    
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['category_id' => 'id'])->viaTable('post_category', ['post_id' => 'id']);
    }
    
    public function getImageurl()
    {
        return \Yii::$app->request->BaseUrl.$this->featured_image;
    }
}
