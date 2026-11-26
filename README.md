<h1 align="center">HohoPro</h1>
<p align="center">
  <b>Client and invoice management with online payments</b><br/>
  Manage clients, issue invoices, download them as PDF and let clients pay online through Mollie.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=flat-square&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Blade-templates-F05340?style=flat-square" />
  <img src="https://img.shields.io/badge/Mollie-payments-000000?style=flat-square" />
  <img src="https://img.shields.io/badge/PDF-DomPDF-B30B00?style=flat-square" />
</p>

---

## Features

- **Clients** — full CRUD for client records.
- **Invoices** — create invoices with line items, list and edit them.
- **PDF export** — download any invoice as a PDF.
- **Online payment** — "Pay now" link per invoice through Mollie, with a success page and a webhook that marks the invoice as paid.
- **Dashboard** — overview after login.
- **Public pages** — home, pricing, about, FAQ and contact.
- **Authentication** — registration, login and profile management.

## Payment flow

```
Invoice ──▶ /invoices/{id}/mollie-pay ──▶ Mollie checkout
                                             │
          /payment/success/{id} ◀────────────┤
          /payment/webhook      ◀──── Mollie status update ──▶ invoice marked as paid
```

## Tech stack

| Layer | Technology |
|---|---|
| Backend | Laravel 12, PHP 8.2 |
| Frontend | Blade, Vite |
| Payments | Mollie (`mollie/laravel-mollie`) |
| PDF | DomPDF |

## Getting started

```bash
git clone https://github.com/oiseaubleuc/HohoPro.git
cd HohoPro
composer install
npm install && npm run build
cp .env.example .env          # set database and MOLLIE_KEY
php artisan key:generate
php artisan migrate
php artisan serve
```

---

<p align="center">Built by <a href="https://github.com/oiseaubleuc">Hoho</a> · Belgium</p>
