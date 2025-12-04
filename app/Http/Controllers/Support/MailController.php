<?php

namespace App\Http\Controllers\Support;

use Exception;
use App\Mail\QuoteToClient;
use Illuminate\Http\Request;
use App\Mail\PayrollDispersed;
use App\Models\{Payroll, Service};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendPayrollEmail(Payroll $payroll)
    {
        if (!isset($payroll->employee->email)){
            throw new Exception(
                sprintf('El empleado no tiene configurado un correo electronico')
            );
        }

        try {
            Mail::to($payroll->employee->email)->send(new PayrollDispersed($payroll));
        }

        catch (Exception $e) {            
            throw new Exception(
                sprintf('Ocurrio un error al enviar el correo: %s', $e->getMessage())
            );            
        }
    }

    public static function sendQuoteEmail(Service $service)
    {
        if (!isset($service->client->email)){
            throw new Exception(
                sprintf('El empleado no tiene configurado un correo electronico')
            );
        }

        try {
            Mail::to($service->client->email)->send(new QuoteToClient($service));
        }

        catch (Exception $e) {            
            throw new Exception(
                sprintf('Ocurrio un error al enviar el correo: %s', $e->getMessage())
            );
        }
    }
}
