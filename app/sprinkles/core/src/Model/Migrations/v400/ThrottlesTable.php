<?php
/**
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2013-2016 Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/licenses/UserFrosting.md (MIT License)
 */
namespace UserFrosting\Sprinkle\Core\Model\Migrations\v400;

use UserFrosting\System\Bakery\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

/**
 * Throttles table migration
 * Version 4.0.0
 *
 * @extends Migration
 * @author Alex Weissman (https://alexanderweissman.com)
 */
class ThrottlesTable extends Migration
{
    public function up()
    {
        if (!$this->schema->hasTable('throttles')) {
            $this->schema->create('throttles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('type');
                $table->string('ip')->nullable();
                $table->text('request_data')->nullable();
                $table->timestamps();

                $table->engine = 'InnoDB';
                $table->collation = 'utf8_unicode_ci';
                $table->charset = 'utf8';
                $table->index('type');
                $table->index('ip');
            });
        }
    }

    public function down()
    {
        $this->schema->drop('throttles');
    }
}