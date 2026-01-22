# Contributing to StackFood

Thank you for your interest in contributing to StackFood! We welcome contributions from the community to help make this project better.

## 🚦 Getting Started

1. **Fork the Repository:** Create a personal copy of the project.
2. **Clone the Fork:** `git clone https://github.com/your-username/houseofdelivery.git`
3. **Set Up Environment:** Follow the steps in [INSTALLATION.md](file:///d:/github/Laravel%20Project/houseofdelivery/INSTALLATION.md).
4. **Create a Branch:** Always work on a separate branch for your feature or bug fix. `git checkout -b feature/your-feature-name`

## 🛠 Coding Standards

To maintain consistency throughout the codebase, please follow these guidelines:

### PSR-12 Compliance

We follow [PSR-12](https://www.php-fig.org/psr/psr-12/) for PHP coding standards. Ensure your code is properly formatted before submitting.

### CentralLogics Pattern

If you are adding new business logic that might be shared across different portals (Admin, Vendor, User), consider adding it to a static class in `app/CentralLogics` instead of directly in a controller.

### Commits

- Use descriptive commit messages.
- Reference issue numbers if applicable.

## 🧪 Testing

While we are working on expanding our test suite, please ensure:

- Your changes do not break existing functionality.
- You test your changes manually in both the web panels and the API (using tools like Postman).

## 📝 Pull Request Process

1. Ensure your code is up-to-date with the main branch.
2. Provide a clear description of the changes in your PR.
3. Screenshots or videos of UI changes are highly encouraged.
4. Wait for a maintainer to review your submission.

---

## 🐞 Reporting Bugs

If you find a bug, please open an issue and include:

- A clear title and description.
- Steps to reproduce the bug.
- Expected vs. Actual behavior.
- Environment details (PHP version, OS, etc.).

---

By contributing, you agree that your contributions will be licensed under the MIT License.
