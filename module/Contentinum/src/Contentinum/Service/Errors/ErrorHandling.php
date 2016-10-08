<?php
namespace Contentinum\Service\Errors;

class ErrorHandling
{
    /**
     * 
     * @var Zend\Log\Logger $logger Zend\Log\Logger
     */
    protected $logger;

    /**
     * 
     * @param Zend\Log\Logger $logger Zend\Log\Logger
     */
    function __construct($logger)
    {
        $this->logger = $logger;
    }

    /**
     * 
     * @param \Exception $e
     */
    public function logException(\Exception $e)
    {
        $trace = $e->getTraceAsString();
        $i = 1;
        $messages = array();
        do {
            $messages[] = $i ++ . ": " . $e->getMessage();
        } while ($e == $e->getPrevious());
        
        $log = "Exception:\n" . implode("\n", $messages);
        $log .= "\nTrace:\n" . $trace;
        
        $this->logger->err($log);
    }
}