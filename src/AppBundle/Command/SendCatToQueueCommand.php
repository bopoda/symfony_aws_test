<?php

namespace AppBundle\Command;

use Aws\Exception\AwsException;
use Aws\Sqs\SqsClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendCatToQueueCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:send-cat');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = new SqsClient([
            'profile' => 'default',
            'region' => 'eu-west-1',
            'version' => '2012-11-05'
        ]);

        $cat = [
            'name' => 'Kitty',
            'color' => 'Red',
            'age' =>  rand(1, 15)
        ];
        $queueName = 'https://sqs.eu-west-1.amazonaws.com/454474865531/CatsQueue';

        $params = [
            'MessageBody' => json_encode($cat),
            'QueueUrl' => $queueName,
        ];

        try {
            $client->sendMessage($params);
            var_dump($cat);
        } catch (AwsException $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }
}

