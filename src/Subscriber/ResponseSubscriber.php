<?php
/**
 * File ResponseSubscriber.php
 */

namespace Tebru\Random\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Tebru\Retrofit\Event\ReturnEvent;

/**
 * Class ResponseSubscriber
 *
 * @author Nate Brunette <n@tebru.net>
 */
class ResponseSubscriber implements EventSubscriberInterface
{
    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2')))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [ReturnEvent::NAME => 'onReturn'];
    }

    /**
     * Remove the new line from number
     *
     * @param ReturnEvent $event
     */
    public function onReturn(ReturnEvent $event)
    {
        $return = $event->getReturn();
        $return = str_replace(PHP_EOL, '', $return);
        $event->setReturn($return);
    }
}
