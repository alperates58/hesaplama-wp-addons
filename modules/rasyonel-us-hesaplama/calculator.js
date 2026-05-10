function hcFracExpHesapla() {
    const a = parseFloat(document.getElementById('hc-fe-base').value);
    const b = parseFloat(document.getElementById('hc-fe-num').value);
    const c = parseFloat(document.getElementById('hc-fe-den').value);

    if (isNaN(a) || isNaN(b) || isNaN(c) || c === 0) {
        alert('Lütfen geçerli değerler giriniz (payda 0 olamaz).');
        return;
    }

    if (a < 0 && c % 2 === 0) {
        alert('Negatif sayıların çift dereceden kökü reel sayı değildir.');
        return;
    }

    const result = Math.pow(a, b / c);

    document.getElementById('hc-fe-res-val').innerText = result.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    document.getElementById('hc-rasyonel-us-result').classList.add('visible');
}
