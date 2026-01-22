# Architecture Overview - StackFood

This document provides a high-level overview of the architectural patterns and project structure used in StackFood.

## 🏛 Core Pattern: CentralLogics

One of the unique aspects of this codebase is the use of **CentralLogics**. Instead of placing heavy business logic inside Models or Controllers, the project uses static classes located in `app/CentralLogics`.

### Why CentralLogics?

- **Dry (Don't Repeat Yourself):** Logic for calculating taxes, discounts, or formatting product data is often needed in both the Admin panel and the API. CentralLogics provides a single source of truth.
- **Thin Controllers:** Controllers remain focused on handling requests and returning responses, while the heavy lifting is delegated to helper classes.
- **Testability:** Static logic is easier to isolate and test in many scenarios.

### Key Logic Modules:

- `Helpers.php`: General utility functions (image processing, push notifications, tax calculation).
- `OrderLogic.php`: Handles complex order placement, status updates, and delivery man assignments.
- `RestaurantLogic.php`: Contains logic for restaurant-specific calculations and ratings.
- `ProductLogic.php`: Logic for food item management and search.

---

## 📂 Directory Structure

### `app/Http/Controllers`

The controllers are organized by portal to maintain separation of concerns:

- `Admin/`: Handles all administrative tasks.
- `Vendor/`: Handles restaurant-specific operations.
- `Api/V1/`: Endpoints for mobile applications and external integrations.

### `app/Models`

Standard Eloquent models representing the database entities:

- `Order`: Central entity for the delivery system.
- `Food`: Represents menu items.
- `Restaurant`: Stores restaurant profiles and settings.
- `Zone`: Geospatial data for delivery areas.
- `DeliveryMan`: Profiles for delivery personnel.

### `routes/`

Routes are split into logical files:

- `admin.php`: Admin panel routes.
- `vendor.php`: Restaurant portal routes.
- `api/v1/api.php`: API routes for the consumer and delivery apps.
- `web.php`: Frontend/User-facing web routes.

---

## 🗺 Geospatial Integration

StackFood utilizes the `grimzy/laravel-mysql-spatial` package to handle geographic data. This allows the system to:

- Determine if a customer's address falls within a restaurant's delivery **Zone**.
- Calculate distances between restaurants and customers for delivery fee calculations.
- Store real-time coordinates for delivery man tracking.

---

## 🔔 Real-time Communications

- **Firebase (FCM):** Used for pushing real-time notifications to mobile apps (Android/iOS) for order updates.
- **WebSockets (Optional):** Some components may utilize Pusher or native Laravel broadcasting for dashboard updates.

---

## 💸 Payment Architecture

The system supports a multi-gateway architecture. Each payment gateway (Stripe, PayPal, etc.) has its own controller in `app/Http/Controllers`, ensuring that adding a new payment method doesn't break existing ones.
