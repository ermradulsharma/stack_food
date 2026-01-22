# StackFood - Multi-Restaurant Delivery System

![Banner](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## 🚀 Overview

**StackFood** is a complete multi-restaurant food delivery system developed using the Laravel framework. It provides a robust solution for managing a food delivery business with separate portals for Administrators, Restaurant Owners, Customers, and Delivery Personnel.

From a centralized admin panel to intuitive mobile applications, StackFood streamlines the entire food ordering and delivery lifecycle.

---

## ✨ Key Features

### 🛠 Admin Panel

- **Dashboard:** Comprehensive overview of business performance, earnings, and order stats.
- **Zone Management:** Define specific delivery areas using Google Maps.
- **Restaurant Management:** Onboard, monitor, and manage restaurant partners.
- **Order Management:** Track orders from placement to delivery in real-time.
- **Cuisine & Category Management:** Flexible categorization of food items.
- **Campaigns & Coupons:** Powerful marketing tools for promotions.
- **Wallet & Loyalty Points:** Manage customer incentives and store credits.
- **Push Notifications:** Send targeted alerts via Firebase.

### 🍱 Restaurant Portal

- **Menu Management:** Control products, variations, and add-ons.
- **Order Processing:** Accept, prepare, and hand over orders to delivery men.
- **Earnings & Withdrawals:** Track revenue and request payouts.
- **Restaurant Settings:** Manage opening hours, schedules, and profile info.

### 📱 Customer Features

- **Intuitive UI:** Easy food discovery and ordering experience.
- **Real-time Tracking:** Monitor order status and delivery man location.
- **Multi-Payment:** Integrated with over 10+ payment gateways (Stripe, PayPal, Razorpay, etc.).
- **Wallet System:** Add funds and pay using wallet balance.
- **Loyalty Points:** Earn points on orders and convert them to wallet balance.
- **Wishlist:** Save favorite restaurants and food items.

### 🚴 Delivery Man Features

- **Order Dashboard:** View latest and current delivery tasks.
- **Location Tracking:** Record location data for real-time tracking.
- **Earnings History:** Detailed log of completed deliveries and earnings.
- **Profile Management:** Update status and personal information.

---

## 🛠 Tech Stack

- **Backend:** [Laravel 8](https://laravel.com/) (PHP)
- **Database:** MySQL (with Spatial extensions for mapping)
- **API:** RESTful API with Passport Authentication
- **Maps:** Google Maps API (Autocomplete, Distance, Geocoding)
- **Notifications:** Firebase Cloud Messaging (FCM)
- **Payments:** Stripe, PayPal, Razorpay, Paystack, Flutterwave, and more.
- **Image Processing:** Intervention Image

---

## 📂 Project Structure

StackFood follows a modular approach for business logic:

- `app/CentralLogics`: Contains the core business logic used across different portals.
- `app/Http/Controllers/Api`: API endpoints for the mobile applications.
- `app/Http/Controllers/Admin`: Backend logic for the administration panel.
- `app/Http/Controllers/Vendor`: Backend logic for the restaurant portal.
- `database/migrations`: Database schema definitions.

---

## 📥 Installation

Please refer to [INSTALLATION.md](file:///d:/github/Laravel%20Project/houseofdelivery/INSTALLATION.md) for detailed setup instructions.

## 🏗 Architecture

Detailed architectural overview can be found in [ARCHITECTURE.md](file:///d:/github/Laravel%20Project/houseofdelivery/ARCHITECTURE.md).

---

## 🤝 Contributing

We welcome contributions! Please see [CONTRIBUTING.md](file:///d:/github/Laravel%20Project/houseofdelivery/CONTRIBUTING.md) for details.

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](file:///d:/github/Laravel%20Project/houseofdelivery/LICENSE) file for details.
