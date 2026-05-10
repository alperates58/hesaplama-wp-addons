function hcPostConcreteHesapla() {
    const HD = parseFloat(document.getElementById('hc-pc-hd').value);
    const HL = parseFloat(document.getElementById('hc-pc-hl').value);
    const PD = parseFloat(document.getElementById('hc-pc-pd').value);
    const shape = document.getElementById('hc-pc-ps').value;

    if (!HD || !HL || !PD) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    // Hole Volume (always cylindrical)
    const hr = (HD / 100) / 2;
    const hl = HL / 100;
    const holeVolM3 = Math.PI * Math.pow(hr, 2) * hl;

    // Post Volume
    let postVolM3 = 0;
    const pr = (PD / 100) / 2;
    if (shape === 'round') {
        postVolM3 = Math.PI * Math.pow(pr, 2) * hl;
    } else {
        postVolM3 = (PD / 100) * (PD / 100) * hl;
    }

    const netVolL = Math.max(0, (holeVolM3 - postVolM3) * 1000);
    const bags = Math.ceil(netVolL / 12); // Standard 25kg dry mix yields approx 12L

    const resVal = document.getElementById('hc-pc-res-val');
    resVal.innerText = netVolL.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });

    const resBags = document.getElementById('hc-pc-res-bags');
    resBags.innerText = `Yaklaşık ${bags} Torba (Hazır Beton - 25 kg)`;

    document.getElementById('hc-post-concrete-result').classList.add('visible');
}
