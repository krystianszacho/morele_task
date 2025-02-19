# Movie Recommendation System

## Opis

Projekt to aplikacja backendowa w PHP 8.1 do rekomendacji filmów, wykorzystująca wzorce projektowe i funkcje wyższego rzędu (np. `array_map`, `array_filter`). Kod jest zgodny z PSR-4 i zawiera testy jednostkowe w PHPUnit 9.5.

## Struktura katalogów

```
├── src/
│   ├── Application/
│   │   ├── MovieRecommenderService.php
│   ├── Controller/
│   │   ├── RecommenderController.php
│   ├── Domain/
│   │   ├── Strategy/
│   │   │   ├── EvenLetterWRecommendation.php
│   │   │   ├── MultiWordRecommendation.php
│   │   │   ├── RandomRecommendation.php
│   │   ├── MovieRepository.php
│   │   ├── RecommendationStrategy.php
│   ├── Infrastructure/
│   │   ├── MovieFileRepository.php
├── tests/
│   ├── MovieRecommenderTest.php
├── data/
│   ├── movies.php
├── composer.json
├── phpunit.xml
├── README.md
├── index.php
```

## Instalacja

1. Sklonuj repozytorium:
   ```sh
   git clone https://github.com/krystianszacho/morele_task.git
   cd movrele_task
   ```
2. Zainstaluj zależności przez Composer:
   ```sh
   composer install
   ```

## Uruchomienie aplikacji

```sh
php index.php
```

## Uruchomienie testów jednostkowych

```sh
./vendor/bin/phpunit
```

## Opis algorytmów rekomendacji

1. **Losowe 3 filmy** - Zwraca 3 losowe tytuły.
2. **Filmy na literę 'W' o parzystej długości** - Wybiera tytuły zaczynające się na "W", które mają parzystą liczbę znaków.
3. **Filmy z więcej niż 1 słowem** - Zwraca filmy składające się z więcej niż jednego słowa.

## Zalety projektu

✅ **DDD (Domain, Application, Infrastructure, Controller)** – kod podzielony na warstwy.
✅ **Strategy Pattern** – strategie rekomendacji są oddzielone i łatwe do rozbudowy.
✅ **Factory & Dependency Injection** – wszystko podlega wstrzykiwaniu zależności.
✅ **Uniknięcie pętli** – użyłem `array_filter`, `array_map`, `array_slice`, `shuffle`.
✅ **Czysty i elegancki kod** – zgodny z SOLID, PSR-4, PSR-12.
✅ **Łatwość testowania** – rekomendacje testowane bez zależności od zewnętrznych źródeł.

## Autor

Krystian Szachogłuchowicz / contact@krystian.site

