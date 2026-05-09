function hcPiHesapla() {
    const boy = parseFloat(document.getElementById('hc-pi-boy').value) / 100; // m
    const kilo = parseFloat(document.getElementById('hc-pi-kilo').value);

    if (isNaN(boy) || isNaN(kilo) || boy <= 0 || kilo <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // PI = Weight / Height^3
    const pi = kilo / Math.pow(boy, 3);

    document.getElementById('hc-res-pi-val').innerText = pi.toLocaleString('tr-TR', { maximumFractionDigits: 1 });

    let info = '';
    if (pi < 11) info = 'Zayıf';
    else if (pi < 15) info = 'Normal Aralık';
    else info = 'Kilolu';

    document.getElementById('hc-res-pi-info').innerText = info;
    document.getElementById('hc-pi-result').classList.add('visible');
}
