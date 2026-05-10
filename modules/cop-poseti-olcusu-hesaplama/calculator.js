function hcÇöpPoşetiÖlçüsüHesapla() {
    const type = document.getElementById('hc-bb-type').value;
    const w = parseFloat(document.getElementById('hc-bb-w').value);
    const d = parseFloat(document.getElementById('hc-bb-d').value) || 0;
    const h = parseFloat(document.getElementById('hc-bb-h').value);

    if (!w || !h) return;

    let bagW = 0;
    if (type === 'round') {
        // Çevre / 2 + pay
        bagW = Math.round((w * Math.PI) / 2) + 5;
    } else {
        // (En + Boy) + pay
        bagW = (w + d) + 5;
    }

    const bagH = h + Math.round(w / 2) + 10; // Yükseklik + taban payı + ağız payı

    document.getElementById('hc-bb-val').innerText = `${bagW} x ${bagH} cm`;
    document.getElementById('hc-bb-result').classList.add('visible');
}
