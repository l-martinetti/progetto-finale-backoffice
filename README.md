# Progetto finale Videogames Backoffice

Un sistema di gestione backoffice sviluppato con Laravel per amministrare un sito vetrina dedicato ai videogiochi.

## Descrizione

Questo progetto fornisce un'interfaccia di amministrazione completa per la gestione di contenuti di un sito vetrina di videogiochi. Il backoffice permette di gestire cataloghi, recensioni, notizie e tutti gli aspetti amministrativi del sito.

## Tecnologie Utilizzate

- **PHP**: ^8.2
- **Laravel Framework**: ^11.0
- **Laravel Sanctum**: ^4.0 (Autenticazione API)
- **Laravel Breeze**: ^2.3 (Autenticazione e scaffolding)

## Dipendenze di Sviluppo

- **PHPUnit**: ^10.5 (Testing)
- **Faker**: ^1.23 (Generazione dati di test)

## Installazione

### Prerequisiti

- PHP >= 8.2
- Composer
- Node.js e npm
- MySQL/PostgreSQL

### Procedura di Installazione

1. **Clona il repository**
```bash
git clone https://github.com/l-martinetti/progetto-finale-backoffice.git
cd progetto-finale-backoffice
```

2. **Installa le dipendenze PHP**
```bash
composer install
```

3. **Installa le dipendenze Node.js**
```bash
npm install
npm run build
```

4. **Configura l'ambiente**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configura il database**
Modifica il file `.env` con le tue credenziali del database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=videogames_backoffice
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. **Esegui le migrazioni**
```bash
php artisan migrate
```

7. **Seeders (opzionale)**
```bash
php artisan db:seed
```

### Autenticazione

Il progetto utilizza Laravel Breeze per l'autenticazione. Per personalizzare le viste di login:

```bash
php artisan breeze:install
```

### API Authentication

Laravel Sanctum è configurato per l'autenticazione delle API. Consulta la documentazione di Sanctum per la configurazione avanzata.

## Funzionalità

- **Gestione Videogiochi**: CRUD completo per il catalogo giochi
- **Gestione Utenti**: Amministrazione utenti e permessi
- **API REST**: Endpoints per integrazione frontend
- **Autenticazione Sicura**: Sistema di login e autorizzazioni

## Testing

Esegui i test con:

```bash
# Test completi
php artisan test

# Test specifici
php artisan test --filter=TestName
```
## Struttura del Progetto

```
├── app/
│   ├── Http/Controllers/     # Controller dell'applicazione
│   ├── Models/              # Modelli Eloquent
│   ├── Services/            # Logica di business
│   └── ...
├── database/
│   ├── migrations/          # Migrazioni database
│   └── seeders/            # Seeders
├── resources/
│   ├── views/              # Template Blade
│   └── js/                 # Assets JavaScript
├── routes/
│   ├── web.php             # Route web
│   └── api.php             # Route API
└── tests/                  # Test automatizzati
```

## Licenza

Questo progetto è rilasciato sotto licenza MIT. Vedi il file `LICENSE` per maggiori dettagli.

## Autore

**Luca Martinetti**
- GitHub: [@l-martinetti](https://github.com/l-martinetti)

---

