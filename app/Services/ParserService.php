<?php

namespace App\Services;

use Exception;
use App\Models\News;
use App\Models\Category;
use App\Models\NewsSourcesData;
use App\Services\Contracts\Parser;
use App\QueryBuilders\CategoriesQueryBuilder;
use Orchestra\Parser\Xml\Facade as XmlParser;


class ParserService implements Parser
{
    private string $link;

    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    public function saveParserData(int $sourceId)
    {
        $xml = XmlParser::load($this->link);
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'category' => [
                'uses' => 'channel.category'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,author,guid,description,pubDate,category]'
            ]

        ]);


        $category = $data['news'][0]["category"];
        $categoryQueryBuilder = new CategoriesQueryBuilder;

        if (!empty($categoryQueryBuilder->getOneTitle($category))) {
            $categoriesTable = Category::create(['title' => $category]);
            if($categoriesTable){}

        }
        foreach ($data['news'] as $dataNews) {
            $news = new News(
                [
                    'title' => $dataNews['title'],
                    'author' => $dataNews['author'],
                    'status' => 'active',
                    'description' => $dataNews['description'],
                ]
            );

            $news->sources()->associate($sourceId);
            if ($news->save()) {
                $news->categories()->sync($categoriesTable->id);
            }
        }
        return \route('admin.news.index');


    }
}
