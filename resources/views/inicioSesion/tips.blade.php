<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .recommendation-box {
            background-color: white;
            border: 2px solid #59009A;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 20px;
            margin-bottom: 30px;
        }

        .recommendation-header h1 {
            color: #59009A;
            font-size: 1.8rem;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0 0 20px;
            padding: 10px;
            border-bottom: 2px solid #59009A;
        }

        .recommendation-content img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            margin: 20px 0;
        }

        .recommendation-content p {
            font-size: 16px;
            color: #333;
            margin: 20px 0;
            text-align: left;
        }

        .back-button button {
            background-color: #59009A;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 20px;
        }

        .back-button button:hover {
            background-color: #923ccf;
        }

        .videos-section {
            margin-top: 20px;
            text-align: center;
            width: 100%;
            max-width: 1000px;
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 20px;
        }

        .videos-section h2 {
            color: #59009A;
            font-size: 1.5rem;
            text-transform: uppercase;
            margin-bottom: 20px;
            text-align: center;
        }

        .video-container {
            display: inline-flex;
            gap: 20px;
        }

        .video-container iframe {
            width: 300px;
            height: 180px;
            border: 2px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .loading-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
            color: #59009A; /* Spinner morado */
        }

        #tip-detail-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 160px;
        }

        .marca-agua::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('css/inicioSesion/imagenes/fondoooo.webp') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.5;
            z-index: -3;
        }
    </style>
</head>
<body>
    <div class="marca-agua">
        @include('inicioSesion.layouts.header')
        <div id="tip-detail-container">
            <div class="loading-spinner">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
        </div>
    </div>
    @include('inicioSesion.layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const tipId = '{{ $tipId }}';
            try {
                const response = await fetch(`https://back1-production-67bf.up.railway.app/api/tips/${tipId}`);
                if (!response.ok) {
                    throw new Error(`Error HTTP: ${response.status}`);
                }
                const tipData = await response.json();
                displayTipDetail(tipData);
            } catch (error) {
                console.error('Error:', error);
                document.getElementById('tip-detail-container').innerHTML = `
                    <div class="alert alert-danger">
                        Error al cargar los detalles del tip. Por favor, intenta nuevamente.
                    </div>
                `;
            }
        });

        function displayTipDetail(tip) {
            const container = document.getElementById('tip-detail-container');
            container.innerHTML = `
                <div class="recommendation-box">
                    <div class="recommendation-header">
                        <h1>${tip.title || 'Sin título'}</h1>
                    </div>
                    <div class="recommendation-content">
                        <img src="${tip.image_url || '{{ asset('css/inicioSesion/imagenes/default-tip.jpg') }}'}" 
                             alt="${tip.title || 'Tip'}" 
                             onerror="this.src='{{ asset('css/inicioSesion/imagenes/default-tip.jpg') }}'">
                        <p>${tip.recommendation || 'Descripción no disponible'}</p>
                        ${tip.content ? `<div class="tip-content">${tip.content}</div>` : ''}
                    </div>
                    <div class="back-button">
                        <a href="{{ url('/inicioSesion/home') }}">
                        <button>Volver</button>
                        </a>
                    </div>
                </div>
                <div class="videos-section">
                    <h2>Videos Relacionados</h2>
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/oeOXoK67ewE" 
                            title="Video relacionado 1" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                        <iframe src="https://www.youtube.com/embed/0dyebB9e-vM" 
                            title="Video relacionado 2" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                        <iframe src="https://www.youtube.com/embed/3oCC4NDgYrY" 
                            title="Video relacionado 3" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            `;
        }
    </script>
</body>
</html>