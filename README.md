# CMS Project

Kompletno funkcionalan Content Management System (CMS) napravljen u PHP-u sa MySQL bazom podataka.

## Pokretanje sajta

**POČNI OVDE:** Otvori `localhost/CMS_PROJECT/index.php` u browseru

Ova stranica je glavna stranica sajta sa linkovima za:
- Javni deo sajta
- Admin panel
- Registraciju/login

## Struktura projekta

```
CMS_PROJECT/
├── index.php           # GLAVNA STRANICA - počni ovde!
├── baza.php            # Konekcija sa MySQL bazom
├── cms.sql             # Baza podataka - importuj u phpMyAdmin
├── README.md           # Ovo uputstvo
│
├── admin/              # Admin panel - upravljanje sajtem
│   ├── index.php          # Admin dashboard
│   ├── add_post.php       # Dodaj novi post (backend)
│   ├── form_add_post.php  # Forma za dodavanje posta
│   ├── edit_post.php      # Edituj post (backend)
│   ├── form_edit_post.php # Forma za editovanje posta
│   ├── delete_post.php    # Obriši post
│   ├── post.php           # Prikaži post u admin panelu
│   ├── posts.php          # Lista svih postova
│   │
│   ├── categories.php     # Lista kategorija
│   ├── form_categories.php # Forma za kategorije
│   │
│   ├── add_tag.php        # Dodaj tag (backend)
│   ├── form_add_tag.php   # Forma za dodavanje taga
│   ├── delete_tag.php     # Obriši tag
│   ├── manage_tags.php    # Upravljanje tagovima
│   │
│   ├── add_user.php       # Dodaj korisnika (backend)
│   ├── form_add_user.php  # Forma za dodavanje korisnika
│   ├── delete_user.php    # Obriši korisnika
│   └── manage_users.php   # Upravljanje korisnicima
│
├── user/               # Javni deo - za posetioce
│   ├── index.php          # Lista svih postova
│   ├── post.php           # Čitanje pojedinačnog posta
│   ├── add_post.php       # Korisnici mogu dodati post
│   └── form_add_post.php  # Forma za korisnike
│
└── Autentifikacija/    # Login/logout sistem
    ├── form_login.php     # Login forma
    ├── login.php          # Login logika
    ├── form_register.php  # Registracija forma
    ├── register.php       # Registracija logika
    └── logout.php         # Logout
```

## Kako koristiti sajt

### 1. Otvori glavnu stranicu
```
localhost/CMS_PROJECT/index.php
```

### 2. Javni deo (za posetioce)
- Klikni uloguj se/registruj ili idi na `localhost/CMS_PROJECT/user/index.php`
- Vidi sve objavljene postove
- Klikni na naslov da čitaš ceo post
- Možeš se registrovati ili ulogovati

### 3. Admin panel (za upravljanje)
- Klikni admin login ili idi na `localhost/CMS_PROJECT/admin/index.php`
- **Login podaci**: `admin@gmail.com` / `12345`
- Upravljaj postovima, korisnicima, tagovima i kategorijama

## Instalacija i pokretanje

### 1. Preuzmi projekat
 ZIP fajl:
- Klikni "Code" → "Download ZIP"
- Raspakuj u `C:\xampp\htdocs\`


### 2. Pokreni XAMPP
- Pokreni XAMPP Control Panel
- Startuj **Apache** i **MySQL**

### 3. Importuj bazu podataka
- Otvori `localhost/phpmyadmin`
- Kreiraj novu bazu: `cms`
- Selektuj bazu `cms`
- Klikni Import tab
- Klikni Choose File → izaberi `cms.sql` iz projekta
- Klikni Go


### 4. Otvori sajt
```
localhost/CMS_PROJECT/index.php
```




