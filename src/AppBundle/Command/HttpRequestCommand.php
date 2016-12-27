<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class HttpRequestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
         $this
	        // the name of the command (the part after "bin/console")
	        ->setName('app:http-request')

	        // the short description shown while running "php bin/console list"
	        ->setDescription('Http Request.')

	        ->addArgument('url', InputArgument::REQUIRED, 'The url of request.')
	        ->addArgument('method', InputArgument::OPTIONAL, 'The method of request.', 'GET')
	  	;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
	        '[NATURSHOP] HttpRequestCommand COMMAND BEGGIN',
	        '============',
	        '',
	    ]);

	    $arg = $input->getArgument('url');

	    $method = $input->getArgument('method');

	    // retrieve the argument value using getArgument()
	    $output->writeln('[NATURSHOP] url: '.$arg. 'method:'.$method);

	    $httpClient = $this->getContainer()->get('http-client');
	    $logger = $this->getContainer()->get('logger');
	    //$logger = new ConsoleLogger($output);

	    $method = strtoupper($method);

	    $response = $httpClient->Request($method, $arg);

	    $logger->notice('[NATURSHOP] url!!!!! ');

	    $output->writeln('[NATURSHOP] response: ' . $response);

	    return $response;
    }
}