<!-- views/cb.php -->
<div id="cookie-banner" style="position: fixed; bottom: 0; left: 0; right: 0; background: #fff; border-top: 1px solid #ccc; font-family: Arial, sans-serif; padding: 20px; z-index: 10000; display: none;">
  <div style="max-width: 960px; margin: auto;">
    <p style="margin-bottom: 10px;">
      <?= $lang['cookie_message']; ?>
      <a href="/cp.php" target="_blank"><?= $lang['cookie_policy']; ?></a>.
    </p>
    <form id="cookie-form">
      <label><input type="checkbox" disabled checked> <?= $lang['cookie_necessary']; ?></label><br>
      <label><input type="checkbox" id="cookie-statistics"> <?= $lang['cookie_statistics']; ?></label><br>
      <label><input type="checkbox" id="cookie-marketing"> <?= $lang['cookie_marketing']; ?></label><br><br>
      <button type="submit" id="cookie-save-btn" style="background-color: #007BFF; color: white; border: none; padding: 10px 15px; margin-right: 10px; cursor: pointer;">
        <?= $lang['cookie_save']; ?>
      </button>
      <button type="button" id="cookie-accept-all" style="background-color: #28a745; color: white; border: none; padding: 10px 15px; cursor: pointer;">
        <?= $lang['cookie_accept_all']; ?>
      </button>
    </form>
  </div>
</div>

<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}

// Default block
gtag('consent', 'default', {
  ad_storage: 'denied',
  analytics_storage: 'denied',
  ad_user_data: 'denied',
  ad_personalization: 'denied',
  functionality_storage: 'granted',
  security_storage: 'granted',
  wait_for_update: 500
});

function setCookieConsent(statistics, marketing) {
  const consent = {
    necessary: true,
    statistics: statistics,
    marketing: marketing,
    timestamp: new Date().toISOString()
  };
  localStorage.setItem('cookieConsent', JSON.stringify(consent));
}

function getCookieConsent() {
  try {
    return JSON.parse(localStorage.getItem('cookieConsent'));
  } catch {
    return null;
  }
}

function loadGtag(statistics, marketing) {
  const script = document.createElement('script');
  script.src = "https://www.googletagmanager.com/gtag/js?id=G-JPDVY2QBLC";
  script.async = true;
  document.head.appendChild(script);

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

  gtag('consent', 'update', {
    ad_storage: marketing ? 'granted' : 'denied',
    analytics_storage: statistics ? 'granted' : 'denied',
    ad_user_data: marketing ? 'granted' : 'denied',
    ad_personalization: marketing ? 'granted' : 'denied'
  });

  gtag('config', 'G-JPDVY2QBLC');
  gtag('config', 'AW-354001742');

  if (window.location.pathname.includes('conv.php') && marketing) {
    gtag('event', 'conversion', {
      'send_to': 'AW-354001742/7SxnCLmlq9UaEM7G5qgB'
    });
  }
}

function showConfirmation() {
  const msg = document.createElement('div');
  msg.textContent = "Your preferences have been saved.";
  msg.style.cssText = "position: fixed; bottom: 10px; right: 10px; background: #28a745; color: #fff; padding: 10px 15px; border-radius: 6px; font-family: Arial; z-index: 99999;";
  document.body.appendChild(msg);
  setTimeout(() => msg.remove(), 4000);
}

document.addEventListener("DOMContentLoaded", function () {
  const consent = getCookieConsent();
  const banner = document.getElementById('cookie-banner');
  const form = document.getElementById('cookie-form');
  const acceptAllBtn = document.getElementById('cookie-accept-all');

  if (!consent) {
    banner.style.display = 'block';
  } else {
    loadGtag(consent.statistics, consent.marketing);
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    const statistics = document.getElementById('cookie-statistics').checked;
    const marketing = document.getElementById('cookie-marketing').checked;
    setCookieConsent(statistics, marketing);
    banner.style.display = 'none';
    showConfirmation();
    loadGtag(statistics, marketing);
  });

  acceptAllBtn.addEventListener('click', function () {
    document.getElementById('cookie-statistics').checked = true;
    document.getElementById('cookie-marketing').checked = true;
    setCookieConsent(true, true);
    banner.style.display = 'none';
    showConfirmation();
    loadGtag(true, true);
  });
});
</script>
