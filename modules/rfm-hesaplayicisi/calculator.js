function hcRfmHesapla() {
    const gender = document.querySelector('input[name="hc-rfm-gender"]:checked').value;
    const boy = parseFloat(document.getElementById('hc-rfm-boy').value);
    const bel = parseFloat(document.getElementById('hc-rfm-bel').value);

    if (isNaN(boy) || isNaN(bel) || bel <= 0) {
        alert('Lütfen geçerli ölçüler giriniz.');
        return;
    }

    // RFM Formülleri
    // Erkek: 64 - (20 * (Boy/Bel))
    // Kadın: 76 - (20 * (Boy/Bel))
    const base = (gender === 'male') ? 64 : 76;
    const rfm = base - (20 * (boy / bel));

    document.getElementById('hc-res-rfm-val').innerText = rfm.toLocaleString('tr-TR', { maximumFractionDigits: 1 });

    let cat = '';
    if (gender === 'male') {
        if (rfm < 2) cat = 'Düşük Yağ';
        else if (rfm < 14) cat = 'Atletik';
        else if (rfm < 18) cat = 'Fit';
        else if (rfm < 25) cat = 'Normal';
        else cat = 'Obezite Riski';
    } else {
        if (rfm < 10) cat = 'Düşük Yağ';
        else if (rfm < 21) cat = 'Atletik';
        else if (rfm < 25) cat = 'Fit';
        else if (rfm < 32) cat = 'Normal';
        else cat = 'Obezite Riski';
    }

    document.getElementById('hc-res-rfm-cat').innerText = cat;
    document.getElementById('hc-rfm-result').classList.add('visible');
}
