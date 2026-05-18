function hcOdMethodChange() {
    const method = document.getElementById('hc-od-method').value;
    document.getElementById('hc-od-trans-group').style.display = method === 'trans' ? 'block' : 'none';
    document.getElementById('hc-od-intensity-group').style.display = method === 'intensity' ? 'block' : 'none';
    document.getElementById('hc-od-beer-group').style.display = method === 'beer' ? 'block' : 'none';
}

function hcOptikYoğunlukHesapla() {
    const method = document.getElementById('hc-od-method').value;
    
    let od = 0;
    let transVal = 0; // decimal 0 to 1

    if (method === 'trans') {
        const pctT = parseFloat(document.getElementById('hc-od-t').value);
        if (isNaN(pctT) || pctT <= 0 || pctT > 100) {
            alert('Lütfen 0 ile 100 arasında geçerli bir transmitans yüzdesi giriniz.');
            return;
        }
        transVal = pctT / 100;
        // OD = -log10(T)
        od = -Math.log10(transVal);
    } else if (method === 'intensity') {
        const i0 = parseFloat(document.getElementById('hc-od-i0').value);
        const i = parseFloat(document.getElementById('hc-od-i').value);
        if (isNaN(i0) || isNaN(i) || i0 <= 0 || i <= 0 || i > i0) {
            alert('Geçen ışık şiddeti (I), gelen ışık şiddetinden (I₀) büyük veya sıfırdan küçük olamaz.');
            return;
        }
        transVal = i / i0;
        od = -Math.log10(transVal);
    } else {
        // Beer-Lambert
        const eps = parseFloat(document.getElementById('hc-od-ext').value);
        const conc = parseFloat(document.getElementById('hc-od-conc').value);
        const path = parseFloat(document.getElementById('hc-od-path').value);

        if (isNaN(eps) || isNaN(conc) || isNaN(path) || eps < 0 || conc < 0 || path <= 0) {
            alert('Lütfen tüm Beer-Lambert girdilerini pozitif sayılar olarak doldurunuz.');
            return;
        }

        // A = eps * c * l
        od = eps * conc * path;
        transVal = Math.pow(10, -od);
    }

    const tPercent = transVal * 100;
    const aPercent = (1 - transVal) * 100;

    document.getElementById('hc-od-val').innerText = od.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-od-trans-val').innerText = '%' + tPercent.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-od-absorb-val').innerText = '%' + aPercent.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-optik-yogunluk-result').classList.add('visible');
}
