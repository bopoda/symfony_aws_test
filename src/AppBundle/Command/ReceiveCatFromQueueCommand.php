<?php

namespace AppBundle\Command;

use Aws\Exception\AwsException;
use Aws\Sqs\SqsClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReceiveCatFromQueueCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:receive-cat');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = new SqsClient([
            'profile' => 'default',
            'region' => 'eu-west-1',
            'version' => '2012-11-05'
        ]);

        $queueUrl = 'https://sqs.eu-west-1.amazonaws.com/454474865531/CatsQueue';

    try {
        $result = $client->receiveMessage(array(
            'AttributeNames' => ['SentTimestamp'],
            'MaxNumberOfMessages' => 1,
            'MessageAttributeNames' => ['All'],
            'QueueUrl' => $queueUrl, // REQUIRED
            'WaitTimeSeconds' => 0,
        ));
        var_dump($result->get('Messages'));
        /*if (count($result->get('Messages')) > 0) {
            var_dump($result->get('Messages')[0]);
            $result = $client->deleteMessage([
                'QueueUrl' => $queueUrl, // REQUIRED
                'ReceiptHandle' => $result->get('Messages')[0]['ReceiptHandle'] // REQUIRED
            ]);
        } else {
            echo "No messages in queue. \n";
        }*/
    } catch (AwsException $e) {
        error_log($e->getMessage());
    }
    }
}

