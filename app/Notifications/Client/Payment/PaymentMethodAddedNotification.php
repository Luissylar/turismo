<?php

namespace App\Notifications\Client\Payment;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentMethodAddedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $paymentMethod;

    /**
     * Create a new notification instance.
     */
    public function __construct($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nuevo método de pago agregado')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Se ha agregado un nuevo método de pago a tu cuenta en nuestra plataforma.')
            ->line('Detalles del método de pago:')
            ->line('Marca de la tarjeta: ' . ucfirst($this->paymentMethod->card->brand))
            ->line('Últimos 4 dígitos: ' . $this->paymentMethod->card->last4)
            ->line('Fecha de vencimiento: ' . $this->paymentMethod->card->exp_month . '/' . $this->paymentMethod->card->exp_year)
            ->line('Este método de pago se ha añadido a tu cuenta para facilitar tus próximas transacciones y asegurar que no haya interrupciones en el servicio.')
            ->line('Si no fuiste tú quien agregó este método de pago, por favor, contacta inmediatamente con nuestro equipo de soporte para asegurar la seguridad de tu cuenta.')
            ->action('Contactar Soporte', url('/contact-support'))
            ->line('Puedes ponerte en contacto con nosotros a través del correo soporte@nuestraempresa.com o llamando al número de teléfono +1-800-123-4567.')
            ->line('Además, te recomendamos que revises tu cuenta y actualices tu contraseña si notas alguna actividad sospechosa.')
            ->line('Recuerda que nunca te pediremos tu contraseña por correo electrónico o teléfono.')
            ->line('Gracias por usar nuestra aplicación y confiar en nuestros servicios. Trabajamos constantemente para brindarte la mejor experiencia posible.')
            ->line('Si tienes alguna pregunta o necesitas asistencia adicional, no dudes en comunicarte con nosotros.')
            ->salutation('Atentamente,')
            ->salutation('El equipo de Soporte de Nuestra Empresa');
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'paymentMethodId' => $this->paymentMethod->id,
        ];
    }
}
