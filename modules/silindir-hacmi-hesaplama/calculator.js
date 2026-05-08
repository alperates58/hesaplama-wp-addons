function hcCcHesapla() {
    const bore = parseFloat(document.getElementById('hc-cc-bore').value);
    const stroke = parseFloat(document.getElementById('hc-cc-stroke').value);
    const count = parseInt(document.getElementById('hc-cc-count').value);

    if (isNaN(bore) || isNaN(stroke) || isNaN(count)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    // PI * r^2 * h * cylinders
    const volume = Math.PI * Math.pow(bore / 2, 2) * stroke * count / 1000;

    document.getElementById('hc-cc-val').innerText = Math.round(volume) + " cc";
    document.getElementById('hc-cc-result').classList.add('visible');
}
