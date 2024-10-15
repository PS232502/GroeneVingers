<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groene Vingers</title>

    @vite('resources/css/app.css')
    
    <style>
        .map-container {
            width: 600px;
            height: 450px;
            margin: 0 auto;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button-container button {
            margin: 0 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50; /*Groene achtergrond*/
            color: white;
            border: none; 
            border-radius: 5px; 
            box-shadow: 0 4px #999; /*Voeg schaduw toe*/
            transition: all 0.3s ease;
        }

        .button-container button:hover {
            background-color: #45a049; /* Donker groene on hover */
        }

        .button-container button:active {
            background-color: #3e8e41; /* Nog donkerder groen met klik */
            box-shadow: 0 4px #666; /* Haal schaduw weg */
            transform: translateY(2px); /* Haal knop n beetje naar beneden */
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    @include('Include.Header')

    <main class="flex-grow p-6">
        <div class="map-container">
            <iframe id="mapFrame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2488.80706129022!2d5.386970876758497!3d51.40659971806189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6da6f282d36af%3A0xc22aae56b86144f8!2sTuincentrum%20Coppelmans%20Veldhoven!5e0!3m2!1snl!2snl!4v1718347332697!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="button-container">
            <button onclick="prevMap()">Vorige locatie</button>
            <button onclick="nextMap()">Volgende locatie</button>
        </div>
    </main>

    @include('Include.Footer')

    <script>
        const mapUrls = [
            "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2488.80706129022!2d5.386970876758497!3d51.40659971806189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6da6f282d36af%3A0xc22aae56b86144f8!2sTuincentrum%20Coppelmans%20Veldhoven!5e0!3m2!1snl!2snl!4v1718347332697!5m2!1snl!2snl",
            "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.713475215!2d5.364053991874074!3d51.51847243723156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6dcdfffb6c0bf%3A0x8546b0d86974f2c!2sAarleseweg%2050%2C%205684%20LN%20Best!5e0!3m2!1snl!2snl!4v1718347353798!5m2!1snl!2snl",
            "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4970.787220834216!2d5.531486076761604!3d51.469289013486495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6d8afd35a7913%3A0x49f1433de999aa23!2sTuincentrum%20Coppelmans%20Nuenen!5e0!3m2!1snl!2snl!4v1718347369495!5m2!1snl!2snl"
        ];

        let currentIndex = 0;

        function showMap(index) {
            const mapFrame = document.getElementById('mapFrame');
            mapFrame.src = mapUrls[index];
        }

        function prevMap() {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : mapUrls.length - 1;
            showMap(currentIndex);
        }

        function nextMap() {
            currentIndex = (currentIndex < mapUrls.length - 1) ? currentIndex + 1 : 0;
            showMap(currentIndex);
        }
    </script>

</body>

</html>