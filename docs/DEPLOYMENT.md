# Sidequest Kitchens — production deployment

This app runs on the same EC2 host as Skaldic Codeworks. Skaldic’s nginx terminates TLS on ports 80/443 and reverse-proxies `sidequestkitchens.com` traffic to the Sidequest stack (`sidequest-kitchens-nginx-prod` on the shared Docker network `skaldic-codeworks-prod`).

## Prerequisites

- Skaldic Codeworks production stack deployed at `/var/www/skaldic-codeworks` so the edge nginx config and Docker network exist.
- Docker network name **`skaldic-codeworks-prod`** (pinned in Skaldic’s `docker-compose.prod.yml`). If you previously used a Compose-default prefixed network, redeploy Skaldic once after pulling that change so the named network is created, or create it manually to match before starting Sidequest.
- DNS `A`/`AAAA` records for `sidequestkitchens.com`, `www.sidequestkitchens.com`, `sidequestfood.com`, and `www.sidequestfood.com` pointing at the EC2 instance.
- TLS certificates on the host under `/etc/letsencrypt/live/` for:
  - `sidequestkitchens.com`
  - `sidequestfood.com`  
  Use the same webroot ACME flow as Skaldic (`/.well-known/acme-challenge/` → `/var/www/certbot`) once the updated Skaldic nginx config is loaded.

## AWS Systems Manager Parameter Store

Create secure parameters under **`/sidequest-kitchens/production/`**:

| Parameter suffix | Description |
|------------------|-------------|
| `db-password` | MySQL user password (matches `DB_PASSWORD` for user `laravel`). |
| `db-root-password` | MySQL root password. |
| `app-key` | Laravel `APP_KEY` (include `base64:...` prefix). |

Ensure the EC2 instance role allows `ssm:GetParameter` on these names.

## GitHub Actions

Repository **Settings → Environments → production** — environment secrets:

- `AWS_EC2_HOST`
- `AWS_EC2_USER`
- `AWS_EC2_SSH_KEY`

(Optional: set environment URL to `https://sidequestkitchens.com`.)

## Server directory

```bash
sudo mkdir -p /var/www/sidequest-kitchens
sudo chown -R ubuntu:ubuntu /var/www/sidequest-kitchens
cd /var/www/sidequest-kitchens
git clone <your-sidequest-repo-url> .
```

## Deploy order

1. Pull Skaldic changes (including `docker/nginx/production.conf` and pinned `skaldic-codeworks-prod` network), run Skaldic `scripts/deploy.sh`, obtain TLS certs for Sidequest hostnames, reload nginx if needed.
2. Start Sidequest once from `/var/www/sidequest-kitchens`: `bash scripts/deploy.sh` (or rely on GitHub Actions after pushing `main`).

`sidequestfood.com` HTTP(S) is configured at the Skaldic edge to redirect to `https://sidequestkitchens.com`.

## Local development URLs

- Application: `http://localhost:8001`
- Vite (container): host port `5174` → container `5173`
- MySQL from host tools: `127.0.0.1:3307` (inside Docker, use `DB_HOST=db`, `DB_PORT=3306`)
