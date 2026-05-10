function hcKopekKaloriHesapla() {
    const weight = parseFloat(document.getElementById('hc-kok-weight').value);
    const factor = parseFloat(document.getElementById('hc-kok-status').value);

    if (!weight || weight <= 0) {
        alert('Lütfen geçerli bir kilo giriniz.');
        return;
    }

    // RER = 70 * (weight ^ 0.75)
    const rer = 70 * Math.pow(weight, 0.75);
    const der = rer * factor;

    const resVal = document.getElementById('hc-kok-res-val');
    resVal.innerText = Math.round(der).toLocaleString('tr-TR');

    document.getElementById('hc-kopek-kalori-result').classList.add('visible');
}
