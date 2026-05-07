function hcBebekBasTakipHesapla() {
    const t1 = new Date(document.getElementById('hc-bbct-t1').value);
    const t2 = new Date(document.getElementById('hc-bbct-t2').value);
    const v1 = parseFloat(document.getElementById('hc-bbct-v1').value);
    const v2 = parseFloat(document.getElementById('hc-bbct-v2').value);

    if (isNaN(t1.getTime()) || isNaN(t2.getTime()) || isNaN(v1) || isNaN(v2)) { alert('Lütfen bilgileri giriniz.'); return; }
    
    const gun = Math.floor((t2 - t1) / (1000 * 60 * 60 * 24));
    if (gun <= 0) { alert('Yeni tarih eskiden sonra olmalı.'); return; }

    const fark = v2 - v1;
    document.getElementById('hc-res-bbct-fark').innerText = (fark > 0 ? '+' : '') + fark.toFixed(1) + ' cm';
    document.getElementById('hc-bebek-bas-takip-result').classList.add('visible');
}
