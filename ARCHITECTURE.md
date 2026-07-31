# typo3-cidmap
Stand: 2026-07-31, geprüft gegen Commit ebac3f0

## Zweck
TYPO3-CMS-Extension „cidmap": TYPO3-Gruppen→Customer-ID-Mapping (WIP). Entspricht dem gleichnamigen Package im
zentralen `typo3`-Monorepo, hier als eigenständiges Extension-Repo
(composer `homeinfo/cidmap`).

## Stack & Einstiegspunkte
PHP, TYPO3 CMS (Extbase/Fluid). Extension-Key `cidmap`. Registrierung über
`ext_localconf.php`/`ext_tables.php`; DB via `ext_tables.sql`; Klassen unter
`Classes/`, Konfiguration unter `Configuration/`, Assets unter `Resources/`.

## Schnittstellen
### Konsumiert
- **TYPO3-Core/Extbase**; ⚠️ ANNAHME: greift auf die Homeinfo-Datenbasis
  (`hwdb`/`mdb`/`sysmon`/`his`) zu — je nach Extension. Details in
  `composer.json`/`ext_emconf.php`.
### Bietet an
- **TYPO3-Plugin/Backend-Integration** für „cidmap" (Views/Module/Mappings).

## Deployment / Laufzeit
Installation als TYPO3-Extension per composer (`homeinfo/cidmap`) in einer
TYPO3-Instanz. ⚠️ ANNAHME: identisch/synchron mit dem Package `cidmap` in der
Haupt-`typo3`-Distribution — Doppelpflege prüfen.

## Ersetzbarkeit
Kopplungsgrad: **mittel**. Abgegrenzte Connector-/Plugin-Extension; an das
jeweilige Datenmodell und TYPO3/Extbase gebunden.

## Weitere Doku
- `README.md`, `ext_emconf.php`.
- Verwandt: `typo3` (Haupt-Distribution, Package `cidmap`), `typo3-hwdb`,
  `typo3-openweathermap`.
- ⚠️ ANNAHME: Zentrales Repo `homeinfo-architektur` noch nicht geprüft.
