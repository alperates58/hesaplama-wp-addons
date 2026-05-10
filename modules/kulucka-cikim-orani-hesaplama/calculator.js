function hcKuluckaHesapla() {
    const total = parseFloat(document.getElementById('hc-kc-total').value);
    const hatched = parseInt(document.getElementById('hc-kc-hatched').value);

    if (!total || isNaN(hatched)) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    const percentage = (hatched / total) * 100;

    const resVal = document.getElementById('hc-kc-res-val');
    resVal.innerText = percentage.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-kulucka-verim-result').classList.add('visible');
}
