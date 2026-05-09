function hcExcessHesapla() {
    const boy = parseFloat(document.getElementById('hc-excess-boy').value) / 100; // m
    const kilo = parseFloat(document.getElementById('hc-excess-kilo').value);

    if (isNaN(boy) || isNaN(kilo) || boy <= 0 || kilo <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // İdeal üst sınır BMI = 24.9
    const maxIdeal = 24.9 * (boy * boy);
    const excess = kilo - maxIdeal;

    if (excess > 0) {
        document.getElementById('hc-res-excess-val').innerText = excess.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
        document.getElementById('hc-res-excess-info').innerText = `İdeal kilonuzun üst sınırı ${Math.round(maxIdeal)} kg civarındadır.`;
    } else {
        document.getElementById('hc-res-excess-val').innerText = '0';
        document.getElementById('hc-res-excess-info').innerText = 'Kilonuz sağlıklı BMI aralığındadır (24.9 altı).';
    }

    document.getElementById('hc-excess-result').classList.add('visible');
}
