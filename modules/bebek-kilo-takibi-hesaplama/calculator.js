function hcBebekKiloTakipHesapla() {
    const t1 = new Date(document.getElementById('hc-bkt-t1').value);
    const t2 = new Date(document.getElementById('hc-bkt-t2').value);
    const v1 = parseFloat(document.getElementById('hc-bkt-v1').value);
    const v2 = parseFloat(document.getElementById('hc-bkt-v2').value);

    if (isNaN(t1.getTime()) || isNaN(t2.getTime()) || isNaN(v1) || isNaN(v2)) { alert('Lütfen bilgileri giriniz.'); return; }
    
    const gun = Math.floor((t2 - t1) / (1000 * 60 * 60 * 24));
    if (gun <= 0) { alert('Yeni tarih eskiden sonra olmalı.'); return; }

    const fark = v2 - v1;
    document.getElementById('hc-res-bkt-fark').innerText = (fark > 0 ? '+' : '') + fark.toFixed(2) + ' kg';
    document.getElementById('hc-res-bkt-gun').innerText = ((fark / gun) * 1000).toFixed(1) + ' gr';
    document.getElementById('hc-bebek-kilo-takip-result').classList.add('visible');
}
