# Sidequest Kitchens — production deployment

This app is a standalone Docker stack on its own EC2 host. Nginx terminates TLS on ports 80/443 and serves the Laravel app directly.

## Prerequisites

- Ubuntu LTS EC2 instance with Docker (see `scripts/setup-server.sh`).
- DNS `A`/`AAAA` records for `sidequestkitchens.com`, `www.sidequestkitchens.com`, `sidequestfood.com`, and `www.sidequestfood.com` pointing at the instance.
- TLS certificates under `/etc/letsencrypt/live/sidequestkitchens.com/` covering all four hostnames (SAN cert recommended).

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

## First-time TLS

1. Point DNS at the server.
2. Ensure `/var/www/certbot` exists and is writable by Certbot.
3. Start the stack with HTTP-reachable nginx (or temporarily serve only the ACME location), then issue a SAN cert, for example:

```bash
sudo certbot certonly --webroot -w /var/www/certbot \
  -d sidequestkitchens.com \
  -d www.sidequestkitchens.com \
  -d sidequestfood.com \
  -d www.sidequestfood.com
```

4. Confirm paths match `docker/nginx/production.conf` (`live/sidequestkitchens.com/`).
5. Deploy with `bash scripts/deploy.sh`.

`sidequestfood.com` redirects to `https://sidequestkitchens.com`.

## Ongoing deploys

From `/var/www/sidequest-kitchens`:

```bash
bash scripts/deploy.sh
```

Or push to `main` and rely on GitHub Actions.

Certificate renewal: Certbot container renews periodically; host-side `scripts/renew-ssl.sh` can also reload nginx after renewals.

## Local development URLs

- Application: `http://localhost:8001`
- Vite (container): host port `5174` → container `5173`
- MySQL from host tools: `127.0.0.1:3307` (inside Docker, use `DB_HOST=db`, `DB_PORT=3306`)
