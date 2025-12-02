Laravel Start Script Uitleg - macOS & Windows
=============================================

Doel:
------
Met dit script kun je Laravel eenvoudig starten zonder dat je telkens handmatig PHP-versies moet checken of composer install moet uitvoeren. Het werkt op zowel macOS/Linux als Windows.

Bestanden:
----------
1. start-laravel.sh  --> voor macOS/Linux
2. start-laravel.bat --> voor Windows
3. README-start.txt  --> uitleg

Gebruik op macOS/Linux:
----------------------
1. Open Terminal.
2. Ga naar je Laravel-projectmap.
3. Geef uitvoerrechten aan het script:
   chmod +x run-laravel.sh
4. Voer het script uit:
   ./run-laravel.sh
5. Het script checkt PHP-versie, installeert composer dependencies en start de server.

Gebruik op Windows:
------------------
1. Dubbelklik op start-laravel.bat in de projectmap.
2. Het script checkt PHP-versie, installeert composer dependencies en start de server.
3. Als PHP te laag is, moet je PHP handmatig updaten via:
   - Laragon
   - XAMPP
   - WAMP
   - Of PHP standalone van php.net

Belangrijk:
-----------
- Laravel vereist minimaal PHP 8.1. Zorg dat je juiste PHP-versie actief is in je PATH.
- Composer moet geïnstalleerd zijn en in je PATH staan.
- Na het script kun je de server openen via: http://localhost:8000
