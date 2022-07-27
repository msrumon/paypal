# Issue with PayPal Checkout (Standard)

At times, PayPal goes haywire! It starts to throw errors without any touch to the code. This repo will act as a [minimal reproduction](https://en.wikipedia.org/wiki/Minimal_reproducible_example) of the issue.

## Steps

After cloning / downloading the repo, run the following command:

```bash
cp .env.example .env
```

Now fill the `.env` file with your PayPal app's credentials. Then run the following commands:

```bash
docker compose run --rm composer install
```

```bash
docker compose up --detach app
```
