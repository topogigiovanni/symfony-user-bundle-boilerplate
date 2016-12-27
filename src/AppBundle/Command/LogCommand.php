<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class LogCommand extends ContainerAwareCommand
{
    protected function configure()
    {
         $this
	        // the name of the command (the part after "bin/console")
	        ->setName('app:log')

	        // the short description shown while running "php bin/console list"
	        ->setDescription('log console event.')

	        //->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')

	        // the full command description shown when running the command with
	        // the "--help" option
	        ->setHelp("This command allows you to log...")
	    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
	        'Log beggin naturshop-',
	        '============',
	        '',
	    ]);

	    //$arg = $input->getArgument('username');

	    // retrieve the argument value using getArgument()
	    // $output->writeln('Username: '.$arg);

	    $logger = $this->getContainer()->get('logger');
	    //$logger = new ConsoleLogger($output);

	    $logger->notice('[NATUSHOP SCHEDULER]: notice LOG!!!!!!');

	    return true;
    }
}