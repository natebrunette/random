<?php
/**
 * File RunCommand.php
 */

namespace Tebru\Random\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tebru\Random\Factory\RandomClientFactory;
use Tebru\Retrofit\Exception\RetrofitException;

/**
 * Class RunCommand
 *
 * @author Nate Brunette <n@tebru.net>
 */
class RunCommand extends Command
{
    const NAME = 'run';
    const MIN = 'min';
    const MAX = 'max';

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    protected function configure()
    {
        $this->setName(self::NAME);
        $this->addArgument(self::MIN, InputArgument::REQUIRED, 'Random number lower bound');
        $this->addArgument(self::MAX, InputArgument::REQUIRED, 'Random number upper bound');
    }

    /**
     * @inheritDoc
     * @throws RetrofitException
     * @throws Exception
     * @throws InvalidArgumentException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $min = $input->getArgument(self::MIN);
        $max = $input->getArgument(self::MAX);

        $randomClient = RandomClientFactory::make();
        $number = $randomClient->getRandomNumber($min, $max);

        $output->write($number);
        $output->write(PHP_EOL);
    }
}
