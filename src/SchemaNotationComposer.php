<?php namespace Laravelerator\Laravelerator\Composers;

use Input;
use Laravelerator\Alg\Template;

class SchemaNotationComposer {

    public function compose($view)
    {
    	$schemaNotation = $this->getNotation();

        $view->with(compact('schemaNotation'));
    }

    protected function getNotation()
    {
        return [
            'field : increments' => "\$table->increments('id');",
            'field : bigIncrements' => "\$table->bigIncrements('id');",
            'field : string' => "\$table->string('email');",
            'field : string(100)' => "\$table->string('name', 100);",
            'field : integer' => "\$table->integer('votes');",
            'field : bigInteger' => "\$table->bigInteger('votes');",
            'field : smallInteger' => "\$table->smallInteger('votes');",
            'field : float' => "\$table->float('amount');",
            'field : double(15.8)' => "\$table->double('column', 15, 8);",
            'field : decimal(5.2)' => "\$table->decimal('amount', 5, 2);",
            'field : boolean' => "\$table->boolean('confirmed');",
            'field : date' => "\$table->date('created_at');",
            'field : dateTime' => "\$table->dateTime('created_at');",
            'field : time' => "\$table->time('sunrise');",
            'field : timestamp' => "\$table->timestamp('added_on');",
            'field : text' => "\$table->text('description');",
            'field : binary' => "\$table->binary('data');",
            'field : enum([foo|bar])' => "\$table->enum('choices', array('foo', 'bar'));",
            'timestamps' => "\$table->timestamps();",
            'softDeletes' => "\$table->softDeletes();",
            'nullable' => "->nullable()",
            'default(\'value\')' => "->default(\$mixed)",
            'unsigned' => "->unsigned()",
            'after(\'field\') mysql only' => "->after('email')",
        ];
    }


}