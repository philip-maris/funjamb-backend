<?php

namespace App\Util\BaseUtil;

use App\Models\Notification;
use App\Util\ExceptionUtil\ExceptionCase;
use App\Util\ExceptionUtil\ExceptionUtil;

trait NotificationUtil{
   public function SEND_NOTIFICATION(string $message, string $color,string $customerId, string $tittle): int
    {
        $notification = Notification::create([
            'notificationMessage' => $message,
            'notificationColor' => $color,
            'notificationCustomerType' =>'CUSTOMER',
            'notificationCustomerId' => $customerId,
            'notificationTittle' => $tittle,
            'notificationStatus' => 'ACTIVE',
        ]);
        if (!$notification) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE, "UNABLE TO CREATE NOTIFICATION");
        return 1;
    }
   public function SEND_UPDATE_NOTIFICATION(string $fullName, string $customerId,string $itemName,string $item): int
    {
        if($itemName == null ) $name= ''; else $name = $itemName;
        $notification = Notification::Create([
            'notificationMessage' => "{$fullName} updated {$name} {$item}",
            'notificationColor' => 'ORANGE',
            'notificationCustomerType' => 'ADMIN',
            'notificationCustomerId' => $customerId,
            'notificationTittle' => "{$item} UPDATED",
            'notificationStatus' => 'ACTIVE',
        ]);
        if (!$notification) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE, "UNABLE TO CREATE NOTIFICATION");
        return 1;
    }
   public function SEND_DELETE_NOTIFICATION(string $fullName, string $customerId,string $itemName,string $item): int
    {
        if($itemName == '' ) $name= ''; else $name = $itemName;
        $notification = Notification::Create([
            'notificationMessage' => "{$fullName} deleted {$name} {$item}",
            'notificationColor' => 'ORANGE',
            'notificationCustomerType' => 'ADMIN',
            'notificationCustomerId' => $customerId,
            'notificationTittle' => "{$item} DELETED",
            'notificationStatus' => 'ACTIVE',
        ]);
        if (!$notification) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE, "UNABLE TO CREATE NOTIFICATION");
        return 1;
    }
   public function SEND_CREATION_NOTIFICATION(string $fullName,string $customerId,string $itemName, string $item): int
   {
       if($itemName == null ) $name= ''; else $name = $itemName;
       $notification = Notification::Create([
           'notificationMessage' =>"{$fullName} created {$name} {$item} ",
           'notificationColor' => 'ORANGE',
           'notificationCustomerType' => 'ADMIN',
           'notificationCustomerId' => $customerId,
           'notificationTittle' => "NEW {$item} CREATED",
           'notificationStatus' => 'ACTIVE',
       ]);
       if (!$notification) throw new ExceptionUtil(ExceptionCase::UNABLE_TO_CREATE, "UNABLE TO CREATE NOTIFICATION");
       return 1;
   }
}
