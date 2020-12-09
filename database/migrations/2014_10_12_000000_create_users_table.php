<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('role');
            $table->string('state');
            $table->string('street');
            $table->string('country');
            $table->string('phone');
            $table->timestamps();
        });

        $entity = new User();
        $entity->name = 'John Smith';
        $entity->role = 'Marketing Manager';
        $entity->image = 'john-smith';
        $entity->state = 'Riviera State 32/106';
        $entity->street = '795 Folson Ave, Suite 600';
        $entity->country = 'San Francisco, CA 94107';
        $entity->phone = '(123) 456-7890';
        $entity->save();

        $entity = new User();
        $entity->name = 'Alex Johnatan';
        $entity->role = 'CEO';
        $entity->image = 'alex jonathan';
        $entity->state = 'Riviera State 32/106';
        $entity->street = '795 Folson Ave, Suite 600';
        $entity->country = 'San Francisco, CA 94107';
        $entity->phone = '(123) 456-7890';
        $entity->save();

        $entity = new User();
        $entity->name = 'Monica Smith';
        $entity->role = 'Marketing Manager';
        $entity->image = 'monica smith';
        $entity->state = 'Riviera State 32/106';
        $entity->street = '795 Folson Ave, Suite 600';
        $entity->country = 'San Francisco, CA 94107';
        $entity->phone = '(123) 456-7890';
        $entity->save();

        $entity = new User();
        $entity->name = 'Michael Zimber';
        $entity->role = 'CEO';
        $entity->image = 'michael zimber';
        $entity->state = 'Riviera State 32/106';
        $entity->street = '795 Folson Ave, Suite 600';
        $entity->country = 'San Francisco, CA 94107';
        $entity->phone = '(123) 456-7890';
        $entity->save();

        $entity = new User();
        $entity->name = 'Sandra Smith';
        $entity->role = 'Marketing Manager';
        $entity->image = 'sandra smith';
        $entity->state = 'Riviera State 32/106';
        $entity->street = '795 Folson Ave, Suite 600';
        $entity->country = 'San Francisco, CA 94107';
        $entity->phone = '(123) 456-7890';
        $entity->save();

        $entity = new User();
        $entity->name = 'Janeth Carton';
        $entity->role = 'CEO';
        $entity->image = 'janeth carton';
        $entity->state = 'Riviera State 32/106';
        $entity->street = '795 Folson Ave, Suite 600';
        $entity->country = 'San Francisco, CA 94107';
        $entity->phone = '(123) 456-7890';
        $entity->save();

        $entity = new User();
        $entity->name = 'Alex Johnatan';
        $entity->role = 'CEO';
        $entity->image = 'alex jonathan';
        $entity->state = 'Riviera State 32/106';
        $entity->street = '795 Folson Ave, Suite 600';
        $entity->country = 'San Francisco, CA 94107';
        $entity->phone = '(123) 456-7890';
        $entity->save();

        $entity = new User();
        $entity->name = 'John Smith';
        $entity->role = 'Marketing Manager';
        $entity->image = 'john-smith';
        $entity->state = 'Riviera State 32/106';
        $entity->street = '795 Folson Ave, Suite 600';
        $entity->country = 'San Francisco, CA 94107';
        $entity->phone = '(123) 456-7890';
        $entity->save();


    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
