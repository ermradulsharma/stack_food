# API Integration Guide - StackFood

StackFood provides a comprehensive RESTful API to power mobile applications and external integrations. The API is built with Laravel and uses Passport for secure authentication.

## 🔑 Authentication

Most endpoints require authentication. We use **Bearer Tokens**.

1. **Sign Up / Login:** Use `/api/v1/auth/sign-up` or `/api/v1/auth/login` to obtain a token.
2. **Include in Header:** For authenticated requests, include the token in the `Authorization` header:
    ```http
    Authorization: Bearer <your_access_token>
    ```

---

## 🛠 Core Endpoints

### 👤 Customer Endpoints

- **Profile:** `/api/v1/customer/info` (GET)
- **Update Profile:** `/api/v1/customer/update-profile` (POST)
- **Addresses:** `/api/v1/customer/address/list` (GET) | `/api/v1/customer/address/add` (POST)

### 🍔 Food & Restaurants

- **Latest Products:** `/api/v1/products/latest` (GET)
- **Popular Products:** `/api/v1/products/popular` (GET)
- **Search Products:** `/api/v1/products/search?name=Pizza` (GET)
- **All Restaurants:** `/api/v1/restaurants/get-restaurants/all` (GET)
- **Restaurant Details:** `/api/v1/restaurants/details/{id}` (GET)

### 🛒 Orders

- **Place Order:** `/api/v1/customer/order/place` (POST)
- **Order List:** `/api/v1/customer/order/list` (GET)
- **Track Order:** `/api/v1/customer/order/track?order_id={id}` (GET)

### 🚴 Delivery Man

- **Order History:** `/api/v1/delivery-man/all-orders` (GET)
- **Update Location:** `/api/v1/delivery-man/record-location-data` (POST)
- **Update Order Status:** `/api/v1/delivery-man/update-order-status` (PUT)

---

## 🗺 Map & Config

- **Config:** `/api/v1/config` (GET) - Returns business settings, base URLs for images, etc.
- **Geocode:** `/api/v1/config/geocode-api?lat={lat}&lng={lng}` (GET)

## 📡 Push Notifications

The system uses Firebase. You must register your FCM token via:

- `/api/v1/customer/cm-firebase-token` (PUT)
- `/api/v1/vendor/update-fcm-token` (PUT)
- `/api/v1/delivery-man/update-fcm-token` (PUT)

---

## 📖 Pagination

Most list endpoints support pagination. Use the `offset` and `limit` query parameters:
`GET /api/v1/products/latest?limit=10&offset=1`

## 🛠 Developer Tools

It is recommended to use **Postman** or **Insomnia** to explore the API. Ensure you set the `Accept` header to `application/json`.
