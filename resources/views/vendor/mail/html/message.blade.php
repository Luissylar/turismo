<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
{{ config('app.name') }}
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
---
Gracias por elegirnos para tus aventuras y viajes. Estamos aquí para ayudarte a descubrir destinos increíbles y crear recuerdos inolvidables.

Para cualquier consulta, no dudes en contactarnos:
- **Correo:** soporte@tuagencia.com
- **Teléfono:** +51931998025

Síguenos en nuestras redes sociales para obtener inspiración diaria de viajes y ofertas exclusivas:
- [Facebook](https://facebook.com/tuagencia)
- [Instagram](https://instagram.com/tuagencia)
- [Twitter](https://twitter.com/tuagencia)


¿Necesitas cambiar o cancelar una reserva? Nuestro equipo de atención al cliente está disponible las 24 horas del día, los 7 días de la semana para asistirte.

---
**© {{ date('Y') }} {{ config('app.name') }}. {{ __('t0d0s los derechos.') }}**







Este correo electrónico y cualquier archivo transmitido con él son confidenciales y están destinados únicamente para el uso de la persona o entidad a quienes se dirige. Si has recibido este correo electrónico por error, por favor notifícalo al remitente y elimina el mensaje.





</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
