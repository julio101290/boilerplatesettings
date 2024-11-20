<?php

namespace julio101290\boilerplatesettings\Commands;

use CodeIgniter\CLI\BaseCommand;
use Config\Database;

/**
 * Class InstallCommand.
 */
class InstallCommand extends BaseCommand
{
    /**
     * The group the command is lumped under
     * when listing commands.
     *
     * @var string
     */
    protected $group = 'boilerplatesettings';

    /**
     * The command's name.
     *
     * @var string
     */
    protected $name = 'boilerplatesettings:install';

    /**
     * The command's short description.
     *
     * @var string
     */
    protected $description = 'Db install for basic boilerplate settings data.';

    /**
     * The command's usage.
     *
     * @var string
     */
    protected $usage = 'boilerplatesettings:install';

    /**
     * The commamd's argument.
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The command's options.
     *
     * @var array
     */
    protected $options = [];

    //--------------------------------------------------------------------

    /**
     * Displays the help for the spark cli script itself.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        try {
            $this->call('migrate');
            // then seed data
            $seeder = Database::seeder();
            $seeder->call('julio101290\boilerplatesettings\Database\Seeds\BoilerplateSettingsSeeder');
        } catch (\Exception $e) {
            $this->showError($e);
        }
    }
}
