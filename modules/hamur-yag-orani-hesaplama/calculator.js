function hcDoughFatHesapla() {
    const flour = parseFloat(document.getElementById('hc-fat-flour').value);
    const pct = parseFloat(document.getElementById('hc-fat-pct').value);

    if (isNaN(flour) || isNaN(pct) || flour <= 0) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    const fat = (flour * pct) / 100;

    document.getElementById('hc-fat-val').innerText = fat.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-dough-fat-result').classList.add('visible');
}
