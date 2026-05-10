function hcAyakkabıNumarasıDönüştürmeHesapla() {
    const eu = parseFloat(document.getElementById('hc-sc-eu').value);
    const gender = document.getElementById('hc-sc-gender').value;

    if (!eu) return;

    let us = 0, uk = 0;

    if (gender === 'male') {
        us = eu - 32.5;
        uk = eu - 33;
    } else {
        us = eu - 31;
        uk = eu - 32;
    }

    document.getElementById('hc-sc-res-list').innerHTML = `
        <strong>Amerika (US):</strong> ${us.toFixed(1)}<br>
        <strong>İngiltere (UK):</strong> ${uk.toFixed(1)}<br>
        <strong>Türkiye (EU):</strong> ${eu}
    `;
    document.getElementById('hc-sc-result').classList.add('visible');
}
