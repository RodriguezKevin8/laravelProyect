<!DOCTYPE html>
<html>
<head>
    <title>Comprobante de Venta</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6; /* Fondo similar al de tus vistas */
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 95%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff; /* Fondo blanco para el comprobante */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0; /* Borde */
        }
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #2d3748; /* Color de texto oscuro */
        }
        p {
            font-size: 16px;
            margin: 10px 0;
            line-height: 1.5;
        }
        .bold {
            font-weight: bold;
        }
        .divider {
            height: 1px;
            background-color: #e2e8f0;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #4a5568;
            margin-top: 30px;
        }
        .thanks {
            margin-top: 30px;
            font-size: 18px;
            color: #2d3748;
            text-align: center;
        }
        .contract {
            margin-top: 30px;
            text-align: justify;
            font-size: 14px;
            color: #4a5568;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Comprobante de Venta</h1>
        <div class="divider"></div>
        <p><span class="bold">Descripción:</span> {{ $datosComprobante['descripcion'] }}</p>
        <p><span class="bold">Total:</span> ${{ number_format($datosComprobante['total'], 2) }}</p>
        <p><span class="bold">Fecha de Emisión:</span> {{ $datosComprobante['fecha_emision'] }}</p>
        <p><span class="bold">Modelo del Auto:</span> {{ $datosComprobante['auto'] }}</p>
        <p><span class="bold">Marca del Auto:</span> {{ $datosComprobante['marca'] }}</p>
        <p><span class="bold">Número de Serie:</span> {{ $datosComprobante['numero_serie'] }}</p>
        <div class="divider"></div>
        <div class="thanks">
            <p>Gracias por su compra con nosotros. En nombre de <strong>Concesionaria Star</strong>, le agradecemos su confianza.</p>
            <p>Estamos comprometidos a ofrecerle el mejor servicio y esperamos verlo nuevamente pronto.</p>
        </div>
        <div class="divider"></div>

        <div class="contract">
            <p><strong>Declaración de Calidad:</strong></p>
            <p>Todos los vehículos vendidos por <strong> Star</strong> han sido revisados exhaustivamente para garantizar su calidad y rendimiento. Nos comprometemos a que cada vehículo cumple con los más altos estándares de seguridad y funcionamiento. Además, todos nuestros vehículos incluyen una garantía limitada, cuyo período de vigencia está especificado en la sección de la garantía de este comprobante.</p>

            <p><strong>Términos y Condiciones:</strong></p>
            <p>Este contrato de venta se rige por las leyes aplicables en El salvador. El comprador declara haber recibido el vehículo en las condiciones acordadas y renuncia a cualquier reclamación que no esté cubierta por la garantía proporcionada.</p>

            <p>El comprador se compromete a realizar el mantenimiento del vehículo según las recomendaciones del fabricante y a utilizarlo de manera responsable. Cualquier daño ocasionado por el mal uso del vehículo no estará cubierto por la garantía.</p>

            <p><strong>Política de Devoluciones:</strong></p>
            <p>No se aceptan devoluciones una vez que el vehículo ha sido entregado y el contrato de venta ha sido firmado, salvo en los casos donde la ley aplicable lo permita. En tales casos, se aplicarán las políticas de devolución de la concesionaria, las cuales se encuentran disponibles a solicitud.</p>

            <p>Para cualquier consulta adicional o asistencia postventa, no dude en ponerse en contacto con nuestro equipo de servicio al cliente.</p>
        </div>

        <div class="divider"></div>
        <div class="footer">
            <p><strong>Star</strong></p>
            <p>Dirección: Ave. miraflores, San salvador</p>
            <p>Teléfono: 2200-0000</p>
            <p>Email: Star@gmail.com</p>
            <p>Sitio Web: www.starconcesionario.com</p>
        </div>
    </div>
</body>
</html>
