<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitación a Evento</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #444;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 20px;
        }

        .header {
            background-color: #3498db;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .greeting {
            text-align: center;
            padding: 20px;
        }

        .event-details {
            padding: 20px;
        }

        .event-details h2 {
            color: #3498db;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            max-width: 100%;
            height: auto;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #888;
        }

        .footer a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>¡Invitación a Evento Especial!</h1>
            </div>

            <div class="greeting">
                <p>¡Hola {{ $invitacion->name }}!</p>
                <p>¡Es un placer invitarte a nuestro evento especial! Esperamos que puedas unirte a nosotros para
                    compartir momentos inolvidables.</p>
            </div>

            <div class="event-details">
                <h2>Detalles del Evento</h2>
                <p><strong>Fecha:</strong> {{ $invitacion->date }}</p>
                <p><strong>Lugar:</strong> {{ $invitacion->address }}</p>
                <p><strong>Hora:</strong>{{ $invitacion->eventTime }}</p>
            </div>

            {{-- <div class="qr-code">
                <h2>Presenta este código QR para ingresar al evento:</h2>
                <!-- Coloca aquí la imagen del código QR generada -->
                <img src="{{ url($invitacion->qr) }}" class="img-fluid rounded-start" alt="...">
            </div> --}}
        </div>

        <div class="footer">
            <p>¡Gracias por ser parte de este evento especial! Esperamos verte allí.</p>
            <p>Para más detalles, visita nuestro <a href="http://18.216.173.51/">sitio web</a>.</p>
        </div>
    </div>
</body>

</html>
