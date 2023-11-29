<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitación a Evento</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #555;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #007bff;
            margin: 0;
        }

        .content {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .event-details {
            flex-grow: 1;
        }

        .event-details p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .event-image {
            flex-shrink: 0;
            margin-left: 20px;
        }

        .cta-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
            color: #777;
        }

        .unsubscribe-link {
            color: #007bff;
            text-decoration: none;
        }

        .unsubscribe-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Invitación a {{ $invitacion->title }}</h1>
        </div>
        <div class="content">
            <div class="event-details">
                <div class="card">
                    <p>¡Hola {{ $invitacion->name }}!</p>
                    <p>Estás invitado a nuestro evento especial. Nos encantaría que te unieras a nosotros para compartir
                        momentos inolvidables.</p>
                    <p>Fecha: {{ $invitacion->date }}</p>
                    <p>Ubicación: {{ $invitacion->address }}</p>
                </div>
                <a href="{{ route('eventos.invitation', $invitacion->eventoId) }}" class="cta-button">Confirmar
                    Asistencia</a>
            </div>
            <div class="event-image">
                <img src="{{url($invitacion->qr)}}" class="img-fluid rounded-start" alt="...">
            </div>
        </div>
        <div class="footer">
            <p>Este correo electrónico fue enviado desde PhotoFolio. Si no deseas recibir más correos, puedes <a
                    href="#" class="unsubscribe-link">cancelar la suscripción aquí</a>.</p>
        </div>
    </div>
</body>

</html>
