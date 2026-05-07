function hcDecToPerc() {
    const dec = parseFloat(document.getElementById('hc-dec-val').value);

    if (isNaN(dec)) {
        alert('Lütfen geçerli bir ondalık sayı giriniz.');
        return;
    }

    const percentage = dec * 100;

    document.getElementById('hc-res-dec-perc').innerText = percentage.toLocaleString('tr-TR', { 
        maximumFractionDigits: 6 
    });

    document.getElementById('hc-dec-result').classList.add('visible');
}
