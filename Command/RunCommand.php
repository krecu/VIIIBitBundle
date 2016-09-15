<?php

namespace VIIIBitBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class RunCommand
 * @package VIIIBitBundle\Command
 */
class RunCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName('8bit:run');
        $this->setDescription('Load resource');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $getter = $this->getContainer()->get('viibit');

        foreach ($getter->get("sdfsdfsdf") as $item) {
            // DO Somsing with $item
        }
    }
}
