<p align="center">
  <h1 align="center">UNIVERSITY_GUIDE</h1>
  <p align="center"><i>Empowering Students, Transforming Education Everywhere</i></p>
  <p align="center">
    <img alt="last commit" src="https://img.shields.io/github/last-commit/Mosab-Sabbagh/university_guide?style=flat-square">
    <img alt="php" src="https://img.shields.io/badge/php-blue?logo=php&logoColor=white&style=flat-square">
    <img alt="laravel" src="https://img.shields.io/badge/laravel-red?logo=laravel&logoColor=white&style=flat-square">
    <img alt="languages" src="https://img.shields.io/github/languages/count/Mosab-Sabbagh/university_guide?style=flat-square">
  </p>
  <p align="center"><i>Built with the tools and technologies:</i></p>
  <p align="center">
    <img alt="json" src="https://img.shields.io/badge/JSON-000000?logo=json&logoColor=white">
    <img alt="markdown" src="https://img.shields.io/badge/Markdown-000000?logo=markdown&logoColor=white">
    <img alt="npm" src="https://img.shields.io/badge/npm-CB3837?logo=npm&logoColor=white">
    <img alt="autoprefixer" src="https://img.shields.io/badge/-Autoprefixer-DD3735?logo=autoprefixer&logoColor=white">
    <img alt="redis" src="https://img.shields.io/badge/Redis-DC382D?logo=redis&logoColor=white">
    <img alt="postcss" src="https://img.shields.io/badge/PostCSS-DD3A0A?logo=postcss&logoColor=white">
    <img alt="composer" src="https://img.shields.io/badge/Composer-885630?logo=composer&logoColor=white">
    <img alt="js" src="https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black">
    <img alt="mysql" src="https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white">
    <img alt="docker" src="https://img.shields.io/badge/Docker-2496ED?logo=docker&logoColor=white">
    <img alt="xml" src="https://img.shields.io/badge/XML-006CB7?logo=xml&logoColor=white">
    <img alt="php" src="https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white">
    <img alt="vite" src="https://img.shields.io/badge/Vite-646CFF?logo=vite&logoColor=white">
    <img alt="axios" src="https://img.shields.io/badge/Axios-5A29E4?logo=axios&logoColor=white">
  </p>
</p>

---

## Table of Contents

- [Overview](#overview)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Testing](#testing)

---

## Overview

`university_guide` is a comprehensive developer toolkit designed to streamline the development and management of a Laravel-based university platform. It integrates essential workflows, container management, and modern styling configurations into a unified environment.

### Why university_guide?

This project simplifies complex development tasks, ensuring consistency and efficiency across your educational web application. The core features include:

- 💼 🛠️ **Docker Command Facilitation:** Quickly execute Docker Compose commands, access container shells, and manage container lifecycle within the application environment.
- 🎨 🖌️ **Tailwind CSS Integration:** Configure and customize Tailwind for a cohesive, responsive UI with automatic vendor prefixing.
- 🗄️ 🗃️ **Database & Container Orchestration:** Manage multi-container setups with Docker Compose, MySQL commands, and Laravel build tools.
- 🚀 🛠️ **Laravel Environment Setup:** Dockerfile and artisan commands streamline Laravel app deployment and management.
- 🧑‍💻 🛠️ **Git & Workflow Guidance:** Clear procedures for feature development, branch management, and version control.
- 🛠️ 🖥️ **Frontend & Backend Integration:** Vite, PHP, and JavaScript configurations support seamless asset bundling and development.

---

## Getting Started

### Prerequisites

This project requires the following dependencies:

- **Programming Language:** PHP
- **Package Manager:** Composer, Npm
- **Container Runtime:** Docker

---

### Installation

#### 1. Clone the repository

```bash
git clone https://github.com/Mosab-Sabbagh/university_guide.git
cd university_guide
```

#### 2. Copy the environment file

```bash
cp .env.example .env
```

#### 3. Build and run Docker containers

```bash
docker compose up --build
```

#### 4. (Optional) Run migrations

```bash
docker compose exec app php artisan migrate
```

The application will be available at `http://localhost:8000`

---

### Usage

- Access the development environment via your browser at `http://localhost:8000`.
- Use Laravel artisan commands as needed within the Docker container:
  ```bash
  docker compose exec app php artisan <command>
  ```
- To run Node scripts or build assets:
  ```bash
  docker compose exec app npm run dev
  ```

---

### Testing

To run tests inside the Docker container:

```bash
docker compose exec app php artisan test
```

---

## 🤝 Contributing

Contributions are welcome!  
To contribute:
1. Fork the repository
2. Create a new branch
3. Commit your changes
4. Open a Pull Request

---

## 👤 Author

- **Mosab Sabbagh**  
[GitHub Profile](https://github.com/Mosab-Sabbagh)

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

> ⭐ If you like the project, please give it a star!
