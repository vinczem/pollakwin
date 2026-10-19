# pollakwin
Nyereményjáték sorsoló weboldal a HSZC Szentesi Pollák Antal Technikum számára

## PostgreSQL és szerveres indítás

A PHP 8.2 alkalmazás PDO PostgreSQL (`pdo_pgsql`) meghajtót használ.
Meghajtó-dokumentáció: https://www.php.net/manual/en/ref.pdo-pgsql.php
A Docker image tartalmazza a szükséges PHP-bővítményt.

A GitHub Actions pull requesteknél és a `master`/`main` ágakra pusholáskor
elkülönített PostgreSQL-adatbázissal teszteli a regisztrációt, a visszajelzést,
a sorsolást és az órarendet. Sikeres push után `linux/amd64` és `linux/arm64`
image-et publikál a GHCR-be, `latest` és ág szerinti taggel.

A szerveren a `docker-compose.yml`, a `create_users_table.sql` és a `.env`
fájl szükséges. A PHP-fájlokat a GitHub Actions által elkészített image tartalmazza;
a szerver könyvtára nem írja felül az image alkalmazáskódját.

1. Másold a `.env.example` fájlt `.env` néven, és állíts be erős `DB_PASS` értéket.
2. Indítsd el a szolgáltatásokat:

```sh
docker compose pull
docker compose up -d --no-build --wait
```

Az oldal: http://localhost:8080. PostgreSQL csak a Docker belső hálózatán,
`db:5432` címen érhető el. A `postgres_data` kötet tárolja az adatokat.
Az inicializáló SQL csak új, üres PostgreSQL-kötetnél fut le.

Saját vagy másik GHCR-image-hez módosítsd a `.env` fájl `POLLAKWIN_IMAGE`
értékét. Privát image esetén előbb jelentkezz be a GHCR-be a szerveren.
Helyi image építéséhez: `docker compose up -d --build --wait`.

Docker nélkül PHP 8.2+, `pdo_pgsql` és PostgreSQL szükséges. A kapcsolatot
a `DB_HOST`, `DB_PORT` (alapérték: `5432`), `DB_NAME` (alapérték:
`pollakrendezvenyek`), `DB_USER` (alapérték: `pollakwin`), `DB_PASS`
környezeti változókkal állítsd be, és töltsd be a `create_users_table.sql` fájlt.

## Meglévő MySQL-adatok áthozása

Az átállítás új PostgreSQL-kötetet hoz létre; nem másolja át automatikusan
a régi MySQL-adatokat. A régi MySQL-kötetet ne töröld: a visszaálláshoz
a régi alkalmazásverzióval és Compose-konfigurációval újra használható.
Az átállás után beérkező PostgreSQL-adatokat visszaállítás előtt külön mentsd.

Átállás előtt állítsd le az adatbevitelt és készíts MySQL-mentést. Hozd létre
az új PostgreSQL-adatbázist a mellékelt SQL-lel, majd export/import eszközzel
vagy CSV-n keresztül töltsd át a táblákat. Egy nyers MySQL SQL-dump nem
futtatható közvetlenül PostgreSQL-en.

- A `users.won` mező PostgreSQL-ben `BOOLEAN`: a korábbi `True`/`False`
  értékeket logikai értékként importáld.
- Tartsd meg az azonosítókat és az időbélyegeket. Betöltési sorrend:
  `users`, `orak`, `oktatok`, majd `feedback`, `korok`.
- A `feedback`, `orak`, `oktatok`, `korok` eredeti SQL-sémája nem volt a
  repóban; a mellékelt séma a PHP által használt mezőkből készült. Import
  előtt vesd össze a tényleges régi sémával, különösen az időpontok formátumát.
- Import után igazítsd az identity-számlálókat az importált azonosítókhoz.
  Példa a `users` táblára (a többi `id` mezős táblánál is ismételd meg):

```sql
SELECT setval(pg_get_serial_sequence('users', 'id'),
              COALESCE((SELECT MAX(id) FROM users), 1),
              EXISTS (SELECT 1 FROM users));
```

Végül hasonlítsd össze a rekordszámokat, a nyerteseket, a visszajelzéseket és
az órarendet, mielőtt újra engedélyezed az adatbevitelt. Az új séma nem
tartalmaz minta-résztvevőket, így tesztfelhasználó nem kerül a sorsolásba.

## Elkülönített integrációs teszt

A teszt Compose-fájl külön projektet és ideiglenes adatbázist használ,
nem kapcsolódik a szerver éles adatbázisához. GitHub Actions ugyanezt futtatja:

```sh
docker compose -p pollakwin-test -f tests/compose.yml up -d --build --wait
docker compose -p pollakwin-test -f tests/compose.yml exec -T web php tests/postgres.php
docker compose -p pollakwin-test -f tests/compose.yml down -v
```

A teszt futtatása üríti a `pollakwin_test` adatbázis alkalmazástábláit;
más nevű adatbázisban a futtatást megtagadja.
