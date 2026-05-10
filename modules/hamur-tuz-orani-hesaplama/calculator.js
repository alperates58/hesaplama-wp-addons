function hcDoughSaltHesapla() {
    const flour = parseFloat(document.getElementById('hc-salt-flour').value);
    const pct = parseFloat(document.getElementById('hc-salt-pct').value);

    if (isNaN(flour) || isNaN(pct) || flour <= 0) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    const salt = (flour * pct) / 100;

    document.getElementById('hc-salt-val').innerText = salt.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-dough-salt-result').classList.add('visible');
}
