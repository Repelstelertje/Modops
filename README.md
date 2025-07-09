# Modops
Modops

## Environment variables

The form uses Google's reCAPTCHA service. Provide your secret key through the
`RECAPTCHA_SECRET` environment variable so that `views/form.php` can verify
incoming requests.

Example setup on a UNIX shell:

```sh
export RECAPTCHA_SECRET=your-secret-key
```

Ensure this variable is available to the PHP process (for example via your
web server or deployment configuration).
