<?php
//Agregar en futuro enviando un correo al usuario con la ubicación de inicio de sesión y la ip pepepe

namespace App\Listeners\Common\Auth;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;




use Illuminate\Auth\Events\Login;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Exception;


class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    use InteractsWithQueue;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        $ip = $this->request->ip();

        try {
            $location = Cache::remember("geoip_location_{$ip}", 60, function () use ($ip) {
                return GeoIP::getLocation($ip);
            });

            // Verifica que la ubicación obtenida no es nula
            if (!$location) {
                throw new Exception("No se pudo obtener la ubicación para la IP: {$ip}");
            }

            UserLogin::create([
                'user_id' => $event->user->id,
                'ip' => $ip,
                'iso_code' => $location->isoCode ?? 'Desconocido',
                'country' => $location->country ?? 'Desconocido',
                'city' => $location->city ?? 'Desconocido',
                'state' => $location->state ?? 'Desconocido', // Asegúrate de que este campo exista en tu objeto $location
                'state_name' => $location->state_name ?? 'Desconocido',
                'postal_code' => $location->postal_code ?? 'Desconocido',
                'latitude' => $location->lat ?? null,
                'longitude' => $location->lon ?? null,
                'timezone' => $location->timezone ?? 'Desconocido', // Asegúrate de que este campo exista en tu objeto $location
                'continent' => $location->continent ?? 'Desconocido', // Asegúrate de que este campo exista en tu objeto $location
                'default' => $location->default ?? false, // Considera cómo manejas este valor
                'currency' => $location->currency ?? 'Desconocido', // Asegúrate de que este campo exista en tu objeto $location
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (Exception $e) {
            Log::error("Error al loguear " . $e->getMessage());
        }
    }





}
