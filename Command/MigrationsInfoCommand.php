<?php

namespace Saelker\MigrationsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class MigrationsInfoCommand extends ContainerAwareCommand
{
	/**
	 * @inheritdoc
	 */
	protected function configure()
	{
		parent::configure();

		$this
			->setName('saelker:migrations:info')
			->setDescription('Show infos from migrations manager');
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int|null|void
	 */
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$migrationsManager = $this->getContainer()->get('saelker.migrations_manager');

		$io = new SymfonyStyle($input, $output);

		$io->listing($migrationsManager->getFolders());

		$io->progressStart(100);
		$io->progressAdvance(10);
		$io->progressFinish();
	}
}