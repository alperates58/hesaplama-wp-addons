function hcSolukHacmiHesapla() {
    const weight = parseFloat(document.getElementById('hc-sh-weight').value);

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen geçerli bir vücut ağırlığı giriniz.');
        return;
    }

    const minTV = weight * 6;
    const maxTV = weight * 8;
    const avgTV = weight * 7;

    document.getElementById('hc-sh-res-val').innerText = minTV.toLocaleString('tr-TR') + ' - ' + maxTV.toLocaleString('tr-TR');
    document.getElementById('hc-sh-note').innerText = 'Ortalama önerilen hacim: ' + avgTV.toLocaleString('tr-TR') + ' mL.';
    document.getElementById('hc-soluk-hacmi-result').classList.add('visible');
}
