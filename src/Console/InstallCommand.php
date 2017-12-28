<?php

namespace Angkee\Admin\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'admin:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the admin package';

    /**
     * Install directory.
     *
     * @var string
     */
    protected $directory = '';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->initDatabase();

        $this->initAdminDirectory();
    }

    /**
     * Create tables and seed it.
     *
     * @return void
     */
    public function initDatabase()
    {
        $this->call('migrate');

        // if (Administrator::count() == 0) {
        //     $this->call('db:seed', ['--class' => \Angkee\Admin\Database\AdminTablesSeeder::class]);
        // }
    }

    /**
     * Initialize the admAin directory.
     *
     * @return void
     */
    protected function initAdminDirectory()
    {
        $this->directory = config('admin.directory');

        if (is_dir($this->directory)) {
            $this->line("<error>{$this->directory} directory already exists !</error> ");

            return;
        }

        $this->makeDir('/');
        $this->line('<info>Admin directory was created:</info> '.str_replace(base_path(), '', $this->directory));

        $this->createAuthController();

        $this->createHomeController();

        $this->createRoutesFile();
    }

    /**
     * Create HomeController.
     *
     * @return void
     */
    public function createHomeController()
    {
        $homeController = $this->directory.'/HomeController.php';
        $contents = $this->getStub('HomeController');

        $this->laravel['files']->put(
            $homeController,
            str_replace('DummyNamespace', config('admin.route.namespace'), $contents)
        );
        $this->line('<info>HomeController file was created:</info> '.str_replace(base_path(), '', $homeController));
    }

    /**
     * Create HomeController.
     *
     * @return void
     */
    public function createAuthController()
    {
        $AuthController = $this->directory.'/AuthController.php';
        $contents = $this->getStub('AuthController');

        $this->laravel['files']->put(
            $AuthController,
            str_replace('DummyNamespace', config('admin.route.namespace'), $contents)
        );
        $this->line('<info>AuthController file was created:</info> '.str_replace(base_path(), '', $AuthController));
    }

    /**
     * Create routes file.
     *
     * @return void
     */
    protected function createRoutesFile()
    {
        $file = base_path('routes') . '/admin.php';

        $contents = $this->getStub('routes');
        $this->laravel['files']->put($file, str_replace('DummyNamespace', config('admin.route.namespace'), $contents));
        $this->line('<info>Routes file was created:</info> '.str_replace(base_path(), '', $file));
    }

    /**
     * Get stub contents.
     *
     * @param $name
     *
     * @return string
     */
    protected function getStub($name)
    {
        return $this->laravel['files']->get(__DIR__."/stubs/$name.stub");
    }

    /**
     * Make new directory.
     *
     * @param string $path
     */
    protected function makeDir($path = '')
    {
        $this->laravel['files']->makeDirectory("{$this->directory}/$path", 0755, true, true);
    }
}
