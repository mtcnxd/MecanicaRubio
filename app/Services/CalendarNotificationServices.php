<?php

namespace App\Services;

class CalendarNotificationServices 
{
    public function scheduledServiceNotification(Notification $notification, Service $service)
    {
        $notification->send(
            sprintf('Se agendo un servicio %s para el cliente %s', $service->service_type, $service->client_name)
        );
    }

    public function scheduledMaintenanceNotification(Notification $notification, Calendar $calendar)
    {
        $notification->send(
            sprintf('Proximo mantenimiento programado para la fecha %s del cliente %s', $calendar->event_date, $calendar->client)
        );
    }
}