function hcBeerHesapla() {
    const a = parseFloat(document.getElementById('hc-bl-a').value);
    const e = parseFloat(document.getElementById('hc-bl-e').value);
    const l = parseFloat(document.getElementById('hc-bl-l').value);

    if (isNaN(a) || isNaN(e) || isNaN(l)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (e === 0 || l === 0) {
        alert('Katsayı veya yol uzunluğu 0 olamaz.');
        return;
    }

    // c = A / (e * l)
    const c = a / (e * l);

    document.getElementById('hc-bl-val').innerText = c.toExponential(4) + ' mol/L';
    document.getElementById('hc-bl-result').classList.add('visible');
}
