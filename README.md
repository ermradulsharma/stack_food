# StackFood - Multi-Restaurant Delivery System

![Banner](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## 🚀 Overview

**StackFood** is a complete, enterprise-grade multi-restaurant food delivery system built on the powerful **Laravel** framework. Designed to scale, it offers a seamless ecosystem for various stakeholders including Administrators, Restaurant Owners, Customers, and Delivery Personnel.

Whether you are starting a hyper-local food delivery service or a city-wide marketplace, StackFood provides the tools to manage orders, dispatch deliveries, and track earnings efficiently.

---

## ✨ Key Features

### 🛠 Admin Panel

The command center of your operations.

- **Dashboard:** Real-time business analytics, earning reports, and order statistics.
- **Zone Management:** Draw precise delivery zones on Google Maps to manage coverage.
- **Restaurant Management:** Onboard partners, manage menus, and monitor performance.
- **Campaigns & Coupons:** Create targeted promotions to boost sales.
- **Dispatch Management:** Assign orders to delivery men manually or automatically.

### 🍱 Restaurant Portal

Empowering restaurant partners.

- **Menu Management:** Create categories, add-ons, and product variations.
- **Order Processing:** Accept, prepare, and handover orders seamlessly.
- **Business Insights:** Track daily sales, payouts, and customer reviews.
- **Scheduling:** Manage restaurant opening and closing times.

### 📱 Customer App & Web

A premium experience for end-users.

- **User-Friendly UI:** Modern, responsive design for easy navigation.
- **Smart Search:** Find food by cuisine, restaurant, or dietary preference.
- **Real-Time Tracking:** Live order tracking from preparation to delivery.
- **Loyalty Program:** Earn points on every order and redeem them for discounts.
- **Multi-Gateway Support:** Secure payments via major global and local gateways.

### 🚴 Delivery Man App

Efficient logistics management.

- **Task Management:** Receive instant order requests and delivery details.
- **Route Optimization:** Integrated maps for the fastest delivery routes.
- **Earnings Tracker:** View delivery history and collected cash.

---

## 💳 Supported Payment Gateways

StackFood integrates with a wide range of payment providers to ensure smooth transactions globally:

- **Global:** Stripe, PayPal
- **Asia & Middle East:** Razorpay, Paystack, Flutterwave, **SslCommerz**, **SenangPay**, **Paymob**, **Paytabs**, **Bkash**, **Paytm**
- **Europe & CIS:** **LiqPay**
- **Latin America:** MercadoPago

_Note: Credentials for these gateways can be configured directly in the `.env` file._

---

## 🛠 Tech Stack

- **Backend:** [Laravel 8+](https://laravel.com/) (PHP)
- **Database:** PostgreSQL / MySQL (Spatial Extensions enabled)
- **Authentication:** Laravel Passport (OAuth2)
- **Real-Time:** Firebase Cloud Messaging (FCM) & Pusher
- **Maps:** Google Maps API (Geocoding, Places, Directions)
- **Storage:** Local or AWS S3

---

## 📂 Project Structure

This project follows a modular and clean architecture:

- `app/Services`: Domain-specific business logic (e.g., Payment Gateways).
- `app/CentralLogics`: Core helper functions and shared logic.
- `app/Http/Controllers/Api`: API endpoints for mobile apps.
- `app/Http/Controllers/Admin`: Logic for the Admin Dashboard.
- `app/Http/Controllers/Vendor`: Logic for the Restaurant Portal.
- `config`: Configuration files for services and third-party integrations.

---

## 📥 Installation

For detailed setup instructions, including server requirements and deployment steps, please refer to [INSTALLATION.md](INSTALLATION.md).

## 🏗 Architecture

To understand the system design and data flow, check out [ARCHITECTURE.md](ARCHITECTURE.md).

---

## 🤝 Contributing

We welcome contributions from the community! Please read our [CONTRIBUTING.md](CONTRIBUTING.md) guide to get started.

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
