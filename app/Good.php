<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use Elasticquent\ElasticquentTrait;

class Good extends Model
{
    use ElasticquentTrait;

    /**
     * The elasticsearch settings.
     *
     * @var array
     */
    protected $indexSettings = [
        'analysis' => [
            'char_filter' => [
                'replace' => [
                    'type' => 'mapping',
                    'mappings' => [
                        '&=> and '
                    ],
                ],
            ],
            'filter' => [
                'word_delimiter' => [
                    'type' => 'word_delimiter',
                    'split_on_numerics' => false,
                    'split_on_case_change' => true,
                    'generate_word_parts' => true,
                    'generate_number_parts' => true,
                    'catenate_all' => true,
                    'preserve_original' => true,
                    'catenate_numbers' => true,
                ]
            ],
            'analyzer' => [
                'default' => [
                    'type' => 'custom',
                    'char_filter' => [
                        'html_strip',
                        'replace',
                    ],
                    'tokenizer' => 'whitespace',
                    'filter' => [
                        'lowercase',
                        'word_delimiter',
                    ],
                ],
            ],
        ],
    ];

    protected $mappingProperties = array(
        'title' => array(
            'type' => 'string',
            'analyzer' => 'standard'
        )
    );

    public function categorie()
    {
        return $this->belongsTo('App\Categories','categories_id');
    }

    public function characteristic()
    {
        return $this->hasOne('App\Characteristic','goods_id');
    }

    public function sale()
    {
        return $this->belongsTo('App\Sale','sales_id');
    }

    public function like()
    {
        return $this->belongsToMany('App\User','likes');
    }
}
