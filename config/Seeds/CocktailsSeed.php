<?php
use Phinx\Seed\AbstractSeed;

/**
 * Cocktails seed.
 */
class CocktailsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $table = $this->table('cocktails');

        for ($i = 0; $i < 5; $i++)
            $table->insert([
                'name' => $faker->sentence(),
                'description' => $faker->text()
            ])->save();
    }
}
