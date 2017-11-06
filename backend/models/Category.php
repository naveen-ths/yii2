<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property integer $parent_id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PostToCategory[] $postToCategories
 */
class Category extends \yii\db\ActiveRecord
{
    public $cat_image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['parent_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['cat_image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'description' => 'Description',
            'parent_id' => 'Parent Category',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostToCategories()
    {
        return $this->hasMany(PostToCategory::className(), ['category_id' => 'id']);
    }
    
    public function getImageurl()
    {
    return \Yii::$app->request->BaseUrl.$this->image;
    }
}
