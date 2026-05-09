# Sidequest Kitchens

Laravel 12 application with Vite and Tailwind CSS v4 (asset pipeline only for now—the landing page is plain HTML). Production runs in Docker on the same EC2 host as Skaldic Codeworks; Skaldic’s nginx terminates TLS and reverse-proxies this stack.

## Tech stack

- Laravel 12, PHP 8.4
- Vite, Tailwind CSS v4 (build pipeline)
- Pest 4
- MySQL 8.0 (Docker)
- GitHub Actions (tests + deploy)

## Local development

See [DOCKER.md](DOCKER.md). Summary:

- Copy `.env.example` to `.env`, run `docker compose up -d`.
- App: **http://localhost:8001**
- MySQL from the host: **127.0.0.1:3307**

## Production

See [docs/DEPLOYMENT.md](docs/DEPLOYMENT.md) for Parameter Store paths, GitHub environment secrets, TLS, and deploy order alongside Skaldic.
