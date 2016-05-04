<?php
/**
 * File RandomApplication.php
 */

namespace Tebru\Random;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Tebru\Random\Command\RunCommand;

/**
 * Class RandomApplication
 *
 * @author Nate Brunette <n@tebru.net>
 */
class RandomApplication extends Application
{

    /**
     * @inheritDoc
     */
    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();

        // remove command name from arguments
        $inputDefinition->setArguments();

        return $inputDefinition;
    }
    /**
     * @inheritDoc
     */
    protected function getCommandName(InputInterface $input)
    {
        return RunCommand::NAME;
    }
    /**
     * @inheritDoc
     */
    protected function getDefaultCommands()
    {
        $defaultCommands = parent::getDefaultCommands();
        $defaultCommands[] = new RunCommand(RunCommand::NAME);

        return $defaultCommands;
    }
}
