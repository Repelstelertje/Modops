# ModOps

ModOps is a simple PHP application that serves a multi-language landing page where visitors can apply for a chat moderator position. The page contains several sections (description, benefits, FAQ, etc.) and a contact form protected by Google reCAPTCHA. Submissions are e‑mailed to the team and visitors are redirected to a confirmation page.

## Environment requirements

- PHP 7.4 or later with the `mail` extension enabled
- A web server such as Apache or the PHP built-in development server

### Environment variables

The form uses Google's reCAPTCHA service. Provide your secret key through the
`RECAPTCHA_SECRET` environment variable so that `views/form.php` can verify
incoming requests.

Example setup on a UNIX shell:

```sh
export RECAPTCHA_SECRET=your-secret-key
```

Ensure this variable is available to the PHP process (for example via your
web server or deployment configuration).

## Language selection

Language files live in the `languages/` folder (currently English, Dutch and German). The active language is chosen via the `lang` query parameter (for example `?lang=de`) and persisted in the session. Navigation flags are generated in `views/nav.php`.

## Running locally

You can run the site using PHP’s built-in server:

```bash
php -S localhost:8000
```


