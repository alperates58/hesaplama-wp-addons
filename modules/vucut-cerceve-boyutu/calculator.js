function hcFrameHesapla() {
    const gender = document.querySelector('input[name="hc-frame-gender"]:checked').value;
    const boy = parseFloat(document.getElementById('hc-frame-boy').value);
    const wrist = parseFloat(document.getElementById('hc-frame-wrist').value);

    if (isNaN(boy) || isNaN(wrist) || wrist <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const r = boy / wrist;
    let frame = '';
    let info = '';

    if (gender === 'male') {
        if (r > 10.4) frame = 'Küçük';
        else if (r >= 9.6) frame = 'Orta';
        else frame = 'İri / Geniş';
    } else {
        if (r > 11.0) frame = 'Küçük';
        else if (r >= 10.1) frame = 'Orta';
        else frame = 'İri / Geniş';
    }

    info = `Oran: ${r.toFixed(2)}`;

    document.getElementById('hc-res-frame-val').innerText = frame;
    document.getElementById('hc-res-frame-info').innerText = info;
    document.getElementById('hc-frame-result').classList.add('visible');
}
